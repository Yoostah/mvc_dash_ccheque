<?php
class _UF extends model {
    
    /**
     * getUF
     * RECEBE UM PARAMETRO INTEIRO $uf_cod E RETORNA UM ARRAY COM AS INFORMACOES DO ESTADO COM O CODIGO INFORMADO
     *
     * @param  int $uf_cod
     *
     * @return $array
     */
    public function getUF(int $uf_cod){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM uf_estado WHERE uf_cod = :cod");
        $sql->bindValue(":cod", $uf_cod);
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
    public function addUF(int $cod, string $nome, string $sigla){
        $sql = $this->prepare("INSERT INTO uf_estado SET uf_cod = :cod, uf_nome = :nome, uf_sigla = :sigla");
        $sql->bindValue(":cod", $cod);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":sigla", $sigla);
        return $sql->execute();

    }

    /**
     * deleteUF
     * RECEBE UM PARAMETRO INTEIRO $uf_cod E EFETUA O DELETE DDO BANCO.
     * CASO HAJA ALGUM PROBLEMA RETORNA FALSE
     *  
     * @param  int $cod
     *
     * @return boolean
     */
    public function deleteUF(int $cod){
        $sql = $this->db->prepare("DELETE FROM uf_estado WHERE uf_cod = :cod");
        $sql->bindValue(":cod", $cod);
        return $sql->execute();

    }

    /**
     * listUF
     * ESTA FUNCAO RETORNA UM ARRAY COM A LISTAGEM DE TODDOS OS ESTADDOS CADASTRADOS NO BANCO.
     * CASO ESTEJA VAZIO, RETORNA UM ARRAY VAZIO
     * @return array
     */
    public function listUF(){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM uf_estado ORDER BY uf_nome");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    

}

