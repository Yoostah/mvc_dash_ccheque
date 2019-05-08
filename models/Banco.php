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
}