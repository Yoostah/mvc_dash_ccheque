<?php
class _MUNICIPIO extends model {    

    /**
     * listMun_UF_JSON
     * ESTA FUNCAO RECEBE COMO PARÂMETRO UM $uf_cod DE UM ESTADO E RETORNA UM JSON COM A LISTAGEM DE TODDOS OS MUNICÍPIOS DO ESTADO SOLICITADO.
     * 
     * @return json
     */
    public function listMun_UF_JSON($uf_cod){
        $array = array();

        $sql = $this->db->prepare("SELECT mun_cod, mun_nome, uf_id FROM mun_municipio WHERE uf_id = :estado ORDER BY mun_nome");
        $sql->bindValue(":estado", $uf_cod);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();

            foreach ($array as $key => $value) {
                $cidades[] = array(
                    'cod_cidade'  => $value['mun_cod'],
                    'nome_cidade' => $value['mun_nome'],
                );
            }
        }       

        return ( json_encode( $cidades ) );
    }

}

?>