<?php
    require_once("funcoes_bd.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['operacao'] == 'c'){
            //$descricao = $_POST['ds_produto'];
            //$valor = $_POST['vl_produto'];
            $codigo = $_POST['data'][0]['value'];
            $nome = $_POST['data'][1]['value'];
            $idade = $_POST['data'][2]['value'];
            $numero_camiseta = $_POST['data'][3]['value'];
            $posicao = $_POST['data'][4]['value'];

            $data = array (
                'codigo' => $codigo,
                'nome' => $nome,
                'idade' => $idade,
                'numero_camiseta' => $numero_camiseta,
                'posicao' => $posicao
            );       

            $mensagemSucesso =  '0 - Cadastrado com sucesso';
            $mensagemErro = '1 - Erro ao cadastrar';

            if ($codigo){
                $mensagemSucesso =  '0 - Alterado com sucesso';
                $mensagemErro = '1 - Erro ao alterar';
            }
    
            if (addAtleta($data)){
                print $mensagemSucesso;
            }else {
                print $mensagemErro;
            }
        } else if ($_POST['operacao'] == 'd') {
            $codigo = $_POST['dados'];

            if (delAtleta($codigo)){
                print "0 - Eliminado com sucesso";
            } else {
                print "1 - Erro ao eliminar";
            }
        } else if ($_POST['operacao'] == 'p'){
            $arrayAtleta = "";
            $delimitador = " ";
            $delimitadorAtleta = "%%&&";

            if (isset($_POST['dados'])){
                foreach (getAtleta($_POST['dados']) as $atleta){
                    $arrayAtleta = $atleta['id'] . $delimitadorAtleta . $atleta['nome']  .  $delimitadorAtleta . $atleta['idade'] .  $delimitadorAtleta . $atleta['numero_camiseta'] .  $delimitadorAtleta . $atleta['posicao'];
                }
            } else {            
                foreach (getAtleta() as $atleta){
                    if ($arrayAtleta != ''){
                        $delimitador = ' - ';                
                    }
                    
                    $arrayAtleta = $atleta['id'] . $delimitadorAtleta . $atleta['nome']  .  $delimitadorAtleta . $atleta['idade'] . $delimitadorAtleta . $atleta['numero_camiseta'] . $delimitadorAtleta . $atleta['posicao'] . $delimitador . $arrayAtleta;
                }    
            }
            
            print $arrayAtleta;            
            exit;
        }

    } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    }