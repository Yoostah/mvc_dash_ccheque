<?php
class Feriado extends model {

    
    /**
     * getFeriado
     * RECEBE UM PARAMETRO INTEIRO $fer_id E RETORNA UM ARRAY COM AS INFORMACOES DO FERIADO COM O CODIGO INFORMADO
     *
     * @param  int $fer_id
     *
     * @return $array
     */
    public function getFeriado(int $id){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM feriados WHERE fer_id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) { 
            $array = $sql->fetch();
        }

        return $array;
    }

    
    /**
     * addUF
     * RECEBE O PARAMETRO INTEIRO $uf_cod, E OS PARAMETROS STRING $nome E $sigla.
     * E FEITA A INSERCAO NO BANCO E CASO HAJA ALGUM PROBLEMA RETORNA FALSE
     *
     * @param  int $cod
     * @param  string $nome
     * @param  string $sigla
     *
     * @return boolean
     */
    public function addFeriado(int $usu_id, string $nome, string $data, string $tipo, int $municipio, string $descricao = ""){
        
        $sql = $this->db->prepare("INSERT INTO feriados SET fer_nome = :nome, fer_data = STR_TO_DATE(:data, '%Y-%m-%d'), fer_usu = :user, fer_tipo = :tipo, fer_mun_id = :municipio, fer_descricao = :descricao");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":data", $data);
        $sql->bindValue(":user", $usu_id);
        $sql->bindValue(":tipo", $tipo);
        $sql->bindValue(":municipio", $municipio);
        $sql->bindValue(":descricao", $descricao);
        
        $sql->execute();
        
        if($sql->errorCode() == 0) {
            return true;
        } else {           
            $error = $sql->errorInfo();
            return ($error[2]);
        }
    }

    /**
     * deleteFeriado
     * RECEBE UM PARAMETRO INTEIRO $fer_id E EFETUA O DELETE DO BANCO.
     * CASO HAJA ALGUM PROBLEMA RETORNA FALSE
     *  
     * @param  int $id
     *
     * @return boolean
     */
    public function deleteFeriado(int $id){
        $sql = $this->db->prepare("DELETE FROM feriados WHERE fer_id = :id");
        $sql->bindValue(":id", $id);
        return $sql->execute();

    }

    /**
     * listFeriado
     * ESTA FUNCAO RETORNA UM ARRAY COM A LISTAGEM DE TODDOS OS FERIADOS CADASTRADOS.
     * CASO ESTEJA VAZIO, RETORNA UM ARRAY VAZIO
     * @return array
     */
    public function listFeriado(int $usu_id){
        $array = array();

		$sql = $this->db->prepare('SELECT DATE_FORMAT(fer_data, "%d/%m/%Y") AS fer_data, fer_data AS dia, fer_nome, fer_tipo, mun_nome as fer_cidade, fer_descricao, fer_id 
								   FROM feriados JOIN mun_municipio ON fer_mun_id = mun_id 
								   WHERE fer_usu = :user
								   ORDER BY dia');
								   
		$sql->bindValue(":user", $usu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}