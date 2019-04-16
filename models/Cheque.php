<?php
class Cheque extends model {
    
    public function getCheque(int $id){
        $array = array();

        $sql = $this->db->prepare('SELECT * 
                                   FROM cheques 
                                   WHERE cheque_id = :id');
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) { 
            $array = $sql->fetch();
            
        }
        return ( json_encode( $array ) );
    }

    public function listCheques(int $usu_id){
        $array = array();

		$sql = $this->db->prepare('SELECT cheque_id, b.banco_logo, cheque_agencia, cheque_conta_corrente, cheque_num, cheque_valor, cheque_taxa, DATE_FORMAT(cheque_rec_em, "%d/%m/%Y") AS cheque_rec_em, DATE_FORMAT(cheque_bom_para, "%d/%m/%Y") AS cheque_bom_para, DATE_FORMAT(cheque_data_comp, "%d/%m/%Y") AS cheque_data_comp, cheque_dias_correcao, cheque_valor_corrigido, cheque_cliente, cheque_titular  
								   FROM cheques AS c
                                   JOIN bancos AS b ON c.cheque_banco_id = b.banco_id
								   WHERE cheque_usu = :user
								   ORDER BY cheque_data_comp');
								   
		$sql->bindValue(":user", $usu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
}