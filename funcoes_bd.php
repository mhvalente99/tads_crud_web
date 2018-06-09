<?php
    function getConnection(){
        $conn = mysqli_connect("localhost","root", "", "trabalho_2_bimestre_serv_inter");
        return $conn;
    }

    function addAtleta($atleta){
      if (($atleta['codigo'] == null) || ($atleta['codigo'] == '')){
            $SQL = "INSERT INTO atleta VALUES('', '" . $atleta['nome'] . "', " 
                                        . $atleta['idade'] . ", "
                                        . $atleta['numero_camiseta'] . ", '"  
                                        . $atleta['posicao'] . "')";
       } else {
            $SQL = "UPDATE atleta SET nome ='" . $atleta['nome'] . "' , idade =" . $atleta['idade'] . ", numero_camiseta =" . $atleta['numero_camiseta'] . ", posicao ='" . $atleta['posicao'] . "'" .
                   " WHERE id =" . $atleta['codigo'];
       }
       
       return  mysqli_query(getConnection(), $SQL);
    }

    function delAtleta($id) {
        $SQL = "DELETE FROM atleta WHERE id = " . $id;
        return mysqli_query(getConnection(), $SQL);
    }

    function getAtleta($id = ''){
        if ($id !== ''){
            $SQL = "SELECT * FROM atleta WHERE id =" . $id . " ORDER BY id";
        } else {
            $SQL = "SELECT * FROM atleta ORDER BY id";
        }

        $retorno = array();
        
        $resultado = mysqli_query(getConnection(), $SQL);

        while ($atleta = mysqli_fetch_array($resultado)){
            $retorno[] = $atleta;
        }

        return $retorno;
    }
?>