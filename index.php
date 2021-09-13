<?php
    include_once ('buscacep.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Busca Cep</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row header bg-info">
            <div class="col-lg-3 col-0">
                
            </div>
            <div class="col-lg-6 col-12">
                <nav class="navbar navbar-light">
                    <span class="navbar-brand mb-0 h1 text-white">PHPtest - BuscaCEP</span>
                  </nav>
            </div>
            <div class="col-lg-3 col-0">
                
            </div>
        </div>
        <div class="row body">
            <div class="col-lg-3 col-0"></div>
            <div class="col-lg-6 col-12">

                <div class="jumbotron bg-white border border-info">
                    <h1 class="display-4 text-info">Busca Cep</h1>
                    <p class="lead">Buscador de CEP construido em php e bootstrap.</p>
                    <hr class="my-3">
                    <form action="." method="post">
                      <div class="form-group">
                        <label for="cep">Digite o cep desejado</label>
                        <input type="text" required class="form-control" id="cep" name="cep"  placeholder="CEP">
                        
                      </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                    <?php
                        if($error){
                            echo "
                            <hr class='my-4'>
                            <p class='text-danger'>CEP NÃO ENCONTRADO, POR FAVOR VERIFIQUE OS DADOS.</p>
                            <hr class='my-4'>
                            ";
                        }
                        if($response){
                            echo "
                            <hr class='my-4'>
                            <p><b>Cep:  </b>$endereco->cep</p>
                            <p><b>Estado:  </b>$endereco->estado</p>
                            <p><b>Cidade:  </b>$endereco->cidade</p>
                            <p><b>Rua:  </b>$endereco->logradouro</p>
                            <p><b>Bairro:  </b>$endereco->bairro</p>
                            <hr class='my-4'>
                            ";
                        };
                    ?>
                  </div>
            </div>
            <div class="col-lg-3 col-0"></div>
        </div>
        <div class="footer bg-info">
            <hr class="my-4">
            <p>Desenvolvido por iZichtl</p>
        </div>
    </div>
</body>
</html>