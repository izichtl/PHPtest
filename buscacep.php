<?php

    $pdo = new PDO('mysql:host=localhost;dbname=testecep','root','senhacep');
    
    $endereco = (object) [
        'cep' => '',
        'estado' => '',
        'cidade' => '',
        'logradouro' => '',
        'bairro' => ''
    ];
    $response = false;
    $error = false;

    if(isset ($_POST['cep'])){
        $cep = $_POST['cep'];
        $cep = preg_replace('/[^0-9]/', '', $cep );
        
        if(strlen($cep) == 8){
    
            $sql = $pdo->prepare("SELECT * FROM ceps where cep=?");
            $sql->execute(array($cep));
            $db_return = $sql->fetchAll();
            if(isset($db_return[0])){
                $endereco->cep = $db_return[0][0];
                $endereco->estado = $db_return[0][1];
                $endereco->cidade = $db_return[0][2];
                $endereco->logradouro = $db_return[0][3];
                $endereco->bairro = $db_return[0][4];
                $response = true;
            }else{
                $url = "https://viacep.com.br/ws/{$cep}/xml/";
                $xml = file_get_contents($url);
                $api_response = json_decode(json_encode(simplexml_load_string($xml)));
                if(isset($api_response->erro)){
                    $error = true;
                }else{
                    $api_response->cep = str_replace('-','',$api_response->cep);
                    $sql = $pdo->prepare("INSERT INTO ceps VALUES (?,?,?,?,?)");
                    $sql->execute(array(
                        $api_response->cep,
                        $api_response->uf,
                        $api_response->localidade,
                        $api_response->logradouro,
                        $api_response->bairro));
                    $endereco->cep = $api_response->cep;
                    $endereco->estado = $api_response->uf;
                    $endereco->cidade = $api_response->localidade;
                    $endereco->logradouro = $api_response->logradouro;
                    $endereco->bairro = $api_response->bairro;
                    $response = true;
                    }
            }
        }else{
            $error = true;
        }
        
    }



?>
