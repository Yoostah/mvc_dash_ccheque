<?php
class Cheque extends model {
    
    public function getCheque(int $id, int $user){
        $array = array();

        $sql = $this->db->prepare('SELECT c.*, b.banco_logo 
                                   FROM cheques AS c
                                   JOIN bancos AS b ON c.chq_banco = b.banco_id
								   WHERE chq_usu = :user 
                                   AND chq_id = :id');
        $sql->bindValue(":user", $user);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) { 
            $array = $sql->fetch();
            
        }
        return ( json_encode( $array ) );
    }

    public function listCheques(int $usu_id){
        $array = array();

		$sql = $this->db->prepare('SELECT chq_id, chq_cod, banco_logo, chq_num, chq_agencia, chq_conta, DATE_FORMAT(chq_bom_para, "%d/%m/%Y") AS chq_bom_para, chq_valor ,chq_titular , chq_cliente, chq_status, chq_usu
								   FROM cheques AS c
                                   JOIN bancos AS b ON c.chq_banco = b.banco_id
								   WHERE chq_usu = :user
								   ORDER BY chq_bom_para');
								   
		$sql->bindValue(":user", $usu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }

    public function addCheque(int $chq_banco, int $chq_num, int $chq_agencia, int $chq_conta, string $chq_bom_para, int $chq_valor, string $chq_titular, string $chq_cliente, int $chq_usu , int $chq_status){
        
        $sql = $this->db->prepare("INSERT INTO cheques SET chq_banco = :chq_banco, chq_num = :chq_num, chq_agencia = :chq_agencia, chq_conta = :chq_conta, 
                                chq_bom_para = STR_TO_DATE(:chq_bom_para, '%d/%m/%Y'), chq_valor = :chq_valor, chq_titular = :chq_titular, 
                                chq_cliente = :chq_cliente, chq_usu = :chq_usu, chq_status = :chq_status");
        $sql->bindValue(":chq_banco", $chq_banco);
        $sql->bindValue(":chq_num", $chq_num);
        $sql->bindValue(":chq_agencia", $chq_agencia);
        $sql->bindValue(":chq_conta", $chq_conta);
        $sql->bindValue(":chq_bom_para", $chq_bom_para);
        $sql->bindValue(":chq_valor", $chq_valor);
        $sql->bindValue(":chq_titular", $chq_titular);
        $sql->bindValue(":chq_cliente", $chq_cliente);
        $sql->bindValue(":chq_usu", $chq_usu);
        $sql->bindValue(":chq_status", $chq_status);

        
        $sql->execute();
        
        if($sql->errorCode() == 0) {
            return true;
        } else {           
            $error = $sql->errorInfo();
            return ($error[2]);
        }
    }

    public function deleteCheque(int $id, int $user){
        $sql = $this->db->prepare("DELETE FROM cheques WHERE chq_id = :id AND chq_usu = :user");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":user", $user);
        $sql->execute();
        
        if($sql->errorCode() == 0) {
            return true;
        } else {           
            $error = $sql->errorInfo();
            return ($error[2]);
        }

    }
}




 