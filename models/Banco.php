<?php
class Banco extends model {
    
    public function getBanco(int $id, int $usu_id){
        $array = array();

        $sql = $this->db->prepare('SELECT * 
                                   FROM bancos 
                                   WHERE banco_id = :id
                                   AND banco_usu = :user');
        $sql->bindValue(":id", $id);
        $sql->bindValue(":user", $usu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) { 
            $array = $sql->fetch();
            
        }
        return ( json_encode( $array ) );
    }

    public function listBancos(int $usu_id){
        $array = array();

		$sql = $this->db->prepare('SELECT * 
								   FROM bancos 
								   WHERE banco_usu = :user
								   ORDER BY banco_nome');
								   
		$sql->bindValue(":user", $usu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

    public function addBanco(int $usu_id, string $banco_cod, string $banco_nome){
        
        $sql = $this->db->prepare("INSERT INTO bancos SET banco_nome = :nome, banco_cod = :cod, banco_usu = :user, banco_logo = :logo");
        $sql->bindValue(":nome", $banco_nome);
        $sql->bindValue(":cod", $banco_cod);
        $sql->bindValue(":user", $usu_id);
        $sql->bindValue(":logo", '_bancos/'.$usu_id.'/_logo_'.$banco_cod);
        
        $sql->execute();
        
        if($sql->errorCode() == 0) {
            return true;
        } else {           
            $error = $sql->errorInfo();
            return ($error[2]);
        }
    }

    public function updBanco(int $usu_id, int $banco_id, string $banco_nome, string $banco_cod){
        
        $sql = $this->db->prepare("UPDATE bancos SET banco_nome = :nome, banco_cod = :cod, banco_logo = :logo 
                                   WHERE banco_id = :banco_id AND banco_usu = :user");
        $sql->bindValue(":nome", $banco_nome);
        $sql->bindValue(":user", $usu_id);
        $sql->bindValue(":cod", $banco_cod);
        $sql->bindValue(":banco_id", $banco_id);
        $sql->bindValue(":logo", '_bancos/'.$usu_id.'/_logo_'.$banco_cod);
        
        $sql->execute();
        
        if($sql->errorCode() == 0) {
            return true;
        } else {           
            $error = $sql->errorInfo();
            return ($error[2]);
        }
    }

    public function deleteBanco(int $id){
        $sql = $this->db->prepare("DELETE FROM bancos WHERE banco_id = :id");
        $sql->bindValue(":id", $id);
        
        $sql->execute();
        
        if($sql->errorCode() == 0) {
            return true;
        } else {           
            $error = $sql->errorInfo();
            return ($error[2]);
        }

    }
}