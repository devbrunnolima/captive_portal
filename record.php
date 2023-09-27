<?php 

require_once("captiveportal-conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$bairro = $_POST['bairro'];
$celular = $_POST['celular'];
$ip = getHostByName(getHostName());
$estou_ciente = $_POST['estou_ciente'];  


    $inserir = $pdo->prepare("INSERT INTO records SET nome = :nome, email = :email, cpf = :cpf, bairro = :bairro, celular = :celular, ip = :ip, estou_ciente = :estou_ciente");
    $inserir->bindValue(":nome", $nome);
    $inserir->bindValue(":email", $email);
    $inserir->bindValue(":cpf", $cpf);
    $inserir->bindValue(":bairro", $bairro);
    $inserir->bindValue(":celular", $celular);
    $inserir->bindValue(":ip", $ip);
    $inserir->bindValue(":estou_ciente", $estou_ciente);
    $inserir->execute();

 

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="captiveportal-bootstrap.css">
    <link rel="stylesheet" href="captiveportal-bootstrap.min.css">
    <style>
        .container {
            background-color: rgba(252, 252, 252, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin-top: 100px;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        /* Estilos para a imagem (ocultar em telas menores) */
        .img-fluid {
            width: 100%;
            height: auto;
        }

        .cb-block {
            display: none;
        }

        @media (max-width: 768px) {
            .d-md-block {
                display: none;
            }

            .cb-block {
                display: inline;
            }

        }
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">

            <!-- Parte com a imagem à direita -->
            <div class="cb-block">
                <img src="captiveportal-background8.png" alt="Imagem de Fundo" class="img-fluid">
            </div>

            <!-- Parte com a imagem à direita -->
            <div class="col-md-6 d-none d-md-block">
                <img src="captiveportal-background8.png" alt="Imagem de Fundo" class="img-fluid">
            </div>

            <!-- Parte com o formulário à esquerda -->
            <div class="col-md-6">
                <div class="login-container">
                <h3>Cadastrado com sucesso!</h3>
                    <form id="meuForm" action="$PORTAL_ACTION$" method="post">
                        
                        <input name="auth_user" type="hidden" value=" " type="text">
                        <input name="auth_pass" type="hidden" value=" " type="password">
                        <input name="auth_voucher" type="hidden" value=" " type="text">
                        <input name="redirurl" type="hidden" value="$PORTAL_REDIRURL$">
                        <input name="zone" type="hidden" value="$PORTAL_ZONE$">

                        <input name="accept" type="submit" value="Continue" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>





</body>

</html>