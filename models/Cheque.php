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




 