<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {


require_once("captiveportal-conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$bairro = $_POST['bairro'];
$celular = $_POST['celular'];
$ip = getHostByName(getHostName());
$estou_ciente = $_POST['estou_ciente'];  

// Define o fuso horário para o Brasil
date_default_timezone_set('America/Sao_Paulo');

// Crie um objeto DateTime representando o momento atual no Brasil
$dataHoraAtual = new DateTime();

// Obtenha o dia atual (como número)
$dia = $dataHoraAtual->format('d,m,Y');

// Obtenha a hora atual (formato de 24 horas)
$hora = $dataHoraAtual->format('H:i:s');

echo "Dia: $dia<br>";
echo "Hora: $hora";


    $inserir = $pdo->prepare("INSERT INTO records SET nome = :nome, email = :email, cpf = :cpf, bairro = :bairro, celular = :celular, ip = :ip, estou_ciente = :estou_ciente, dia = :dia, hora = :hora");
    $inserir->bindValue(":nome", $nome);
    $inserir->bindValue(":email", $email);
    $inserir->bindValue(":cpf", $cpf);
    $inserir->bindValue(":bairro", $bairro);
    $inserir->bindValue(":celular", $celular);
    $inserir->bindValue(":ip", $ip);
    $inserir->bindValue(":estou_ciente", $estou_ciente);
    $inserir->bindValue(":dia", $dia);
    $inserir->bindValue(":hora", $hora);
    $inserir->execute();



}
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

<script> 

$(document).ready(function (){
//$('#cep').mask('00000-000');
$('#cpf').mask('000.000.000-00');
//$('#sus').mask('000-0000-0000-0000');
$('#celular').mask('(00) 00000-0000');
//$('#telefone').mask('(00) 00000-0000');
$("#data").mask("00/00/0000");
})

</script>


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
                    <h2 class="text-center">Portal de Acesso</h2>
                    <form id="meuForm" action="$PORTAL_ACTION$" method="post">
                        <div class="mb-3">
                            <label for="nomeCompleto" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" id="nomeCompleto" placeholder="Digite seu nome completo" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail" required>
                        </div>
                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" placeholder="Digite seu Celular" required>
                        </div>

                        <div class="mb-3">
                            <label>
                                <h6>Bairro onde reside <i class="bi bi-asterisk"></i></h6>
                            </label>

                            <select class="form-select" name="bairro" id="bairro" required>
                                <option value="" disabled selected>Escolha um bairro</option>
                                <option <?php if (@$bairro == "ARRAIAL PAULISTA") {
                                            echo "selected";
                                        } ?> value="ARRAIAL PAULISTA">ARRAIAL PAULISTA</option>
                                <option <?php if (@$bairro == "CENTRO") {
                                            echo "selected";
                                        } ?> value="CENTRO">CENTRO</option>
                                <option <?php if (@$bairro == "CHACARA AGRINDUS") {
                                            echo "selected";
                                        } ?> value="CHACARA AGRINDUS">CHACARA AGRINDUS</option>
                                <option <?php if (@$bairro == "CIDADE INTERCAP") {
                                            echo "selected";
                                        } ?> value="CIDADE INTERCAP">CIDADE INTERCAP</option>
                                <option <?php if (@$bairro == "CONDOMINIO IOLANDA") {
                                            echo "selected";
                                        } ?> value="CONDOMINIO IOLANDA">CONDOMINIO IOLANDA</option>
                                <option <?php if (@$bairro == "JARDIM ALTOS DO TABOAO") {
                                            echo "selected";
                                        } ?> value="JARDIM ALTOS DO TABOAO">JARDIM ALTOS DO TABOAO</option>
                                <option <?php if (@$bairro == "JARDIM AMERICA") {
                                            echo "selected";
                                        } ?> value="JARDIM AMERICA">JARDIM AMERICA</option>
                                <option <?php if (@$bairro == "JARDIM BEATRIZ") {
                                            echo "selected";
                                        } ?> value="JARDIM BEATRIZ">JARDIM BEATRIZ</option>
                                <option <?php if (@$bairro == "JARDIM BOM TEMPO") {
                                            echo "selected";
                                        } ?> value="JARDIM BOM TEMPO">JARDIM BOM TEMPO</option>
                                <option <?php if (@$bairro == "JARDIM BONANZA") {
                                            echo "selected";
                                        } ?> value="JARDIM BONANZA">JARDIM BONANZA</option>
                                <option <?php if (@$bairro == "JARDIM CANER") {
                                            echo "selected";
                                        } ?> value="JARDIM CANER">JARDIM CANER</option>
                                <option <?php if (@$bairro == "JARDIM CLEMENTINO") {
                                            echo "selected";
                                        } ?> value="JARDIM CLEMENTINO">JARDIM CLEMENTINO</option>
                                <option <?php if (@$bairro == "JARDIM DA GLORIA") {
                                            echo "selected";
                                        } ?> value="JARDIM DA GLORIA">JARDIM DA GLORIA</option>
                                <option <?php if (@$bairro == "JARDIM ELIZABETE") {
                                            echo "selected";
                                        } ?> value="JARDIM ELIZABETE">JARDIM ELIZABETE</option>
                                <option <?php if (@$bairro == "JARDIM FLORIDA") {
                                            echo "selected";
                                        } ?> value="JARDIM FLORIDA">JARDIM FLORIDA</option>
                                <option <?php if (@$bairro == "JARDIM FREI GALVAO") {
                                            echo "selected";
                                        } ?> value="JARDIM FREI GALVAO">JARDIM FREI GALVAO</option>
                                <option <?php if (@$bairro == "JARDIM FREITAS JUNIOR") {
                                            echo "selected";
                                        } ?> value="JARDIM FREITAS JUNIOR">JARDIM FREITAS JUNIOR</option>
                                <option <?php if (@$bairro == "JARDIM GUACIARA") {
                                            echo "selected";
                                        } ?> value="JARDIM GUACIARA">JARDIM GUACIARA</option>
                                <option <?php if (@$bairro == "JARDIM GUAYANA") {
                                            echo "selected";
                                        } ?> value="JARDIM GUAYANA">JARDIM GUAYANA</option>
                                <option <?php if (@$bairro == "JARDIM HELENA") {
                                            echo "selected";
                                        } ?> value="JARDIM HELENA">JARDIM HELENA</option>
                                <option <?php if (@$bairro == "JARDIM HENRIQUETA") {
                                            echo "selected";
                                        } ?> value="JARDIM HENRIQUETA">JARDIM HENRIQUETA</option>
                                <option <?php if (@$bairro == "JARDIM IRACEMA") {
                                            echo "selected";
                                        } ?> value="JARDIM IRACEMA">JARDIM IRACEMA</option>
                                <option <?php if (@$bairro == "JARDIM IRAPUA") {
                                            echo "selected";
                                        } ?> value="JARDIM IRAPUA">JARDIM IRAPUA</option>
                                <option <?php if (@$bairro == "JARDIM KUABARA") {
                                            echo "selected";
                                        } ?> value="JARDIM KUABARA">JARDIM KUABARA</option>
                                <option <?php if (@$bairro == "JARDIM LEME") {
                                            echo "selected";
                                        } ?> value="JARDIM LEME">JARDIM LEME</option>
                                <option <?php if (@$bairro == "JARDIM LOTEC") {
                                            echo "selected";
                                        } ?> value="JARDIM LOTEC">JARDIM LOTEC</option>
                                <option <?php if (@$bairro == "JARDIM MARGARIDA") {
                                            echo "selected";
                                        } ?> value="JARDIM MARGARIDA">JARDIM MARGARIDA</option>
                                <option <?php if (@$bairro == "JARDIM MARIA DA COSTA") {
                                            echo "selected";
                                        } ?> value="JARDIM MARIA DA COSTA">JARDIM MARIA DA COSTA</option>
                                <option <?php if (@$bairro == "JARDIM MARIA HELENA") {
                                            echo "selected";
                                        } ?> value="JARDIM MARIA HELENA">JARDIM MARIA HELENA</option>
                                <option <?php if (@$bairro == "JARDIM MARIA LUIZA") {
                                            echo "selected";
                                        } ?> value="JARDIM MARIA LUIZA">JARDIM MARIA LUIZA</option>
                                <option <?php if (@$bairro == "JARDIM MARIA ROSA") {
                                            echo "selected";
                                        } ?> value="JARDIM MARIA ROSA">JARDIM MARIA ROSA</option>
                                <option <?php if (@$bairro == "JARDIM MARLENE") {
                                            echo "selected";
                                        } ?> value="JARDIM MARLENE">JARDIM MARLENE</option>
                                <option <?php if (@$bairro == "JARDIM MIRNA") {
                                            echo "selected";
                                        } ?> value="JARDIM MIRNA">JARDIM MIRNA</option>
                                <option <?php if (@$bairro == "JARDIM MITUZI") {
                                            echo "selected";
                                        } ?> value="JARDIM MITUZI">JARDIM MITUZI</option>
                                <option <?php if (@$bairro == "JARDIM MONTE ALEGRE") {
                                            echo "selected";
                                        } ?> value="JARDIM MONTE ALEGRE">JARDIM MONTE ALEGRE</option>
                                <option <?php if (@$bairro == "JARDIM OLINDA") {
                                            echo "selected";
                                        } ?> value="JARDIM OLINDA">JARDIM OLINDA</option>
                                <option <?php if (@$bairro == "JARDIM DAS OLIVEIRAS") {
                                            echo "selected";
                                        } ?> value="JARDIM DAS OLIVEIRAS">JARDIM DAS OLIVEIRAS</option>
                                <option <?php if (@$bairro == "JARDIM OURO PRETO") {
                                            echo "selected";
                                        } ?> value="JARDIM OURO PRETO">JARDIM OURO PRETO</option>
                                <option <?php if (@$bairro == "JARDIM PANORAMA") {
                                            echo "selected";
                                        } ?> value="JARDIM PANORAMA">JARDIM PANORAMA</option>
                                <option <?php if (@$bairro == "JARDIM PARAISO") {
                                            echo "selected";
                                        } ?> value="JARDIM PARAISO">JARDIM PARAISO</option>
                                <option <?php if (@$bairro == "JARDIM PAZINI") {
                                            echo "selected";
                                        } ?> value="JARDIM PAZINI">JARDIM PAZINI</option>
                                <option <?php if (@$bairro == "JARDIM PEDRO GONCALVES") {
                                            echo "selected";
                                        } ?> value="JARDIM PEDRO GONCALVES">JARDIM PEDRO GONCALVES</option>
                                <option <?php if (@$bairro == "JARDIM PIRAJUSSARA") {
                                            echo "selected";
                                        } ?> value="JARDIM PIRAJUSSARA">JARDIM PIRAJUSSARA</option>
                                <option <?php if (@$bairro == "JARDIM RECORD") {
                                            echo "selected";
                                        } ?> value="JARDIM RECORD">JARDIM RECORD</option>
                                <option <?php if (@$bairro == "JARDIM ROBERTO") {
                                            echo "selected";
                                        } ?> value="JARDIM ROBERTO">JARDIM ROBERTO</option>
                                <option <?php if (@$bairro == "JARDIM SAINT MORITZ") {
                                            echo "selected";
                                        } ?> value="JARDIM SAINT MORITZ">JARDIM SAINT MORITZ</option>
                                <option <?php if (@$bairro == "JARDIM SALETE") {
                                            echo "selected";
                                        } ?> value="JARDIM SALETE">JARDIM SALETE</option>
                                <option <?php if (@$bairro == "JARDIM SANTA CECILIA") {
                                            echo "selected";
                                        } ?> value="JARDIM SANTA CECILIA">JARDIM SANTA CECILIA</option>
                                <option <?php if (@$bairro == "JARDIM SANTA CRUZ") {
                                            echo "selected";
                                        } ?> value="JARDIM SANTA CRUZ">JARDIM SANTA CRUZ</option>
                                <option <?php if (@$bairro == "JARDIM SANTA ROSA") {
                                            echo "selected";
                                        } ?> value="JARDIM SANTA ROSA">JARDIM SANTA ROSA</option>
                                <option <?php if (@$bairro == "JARDIM SANTA TEREZINHA") {
                                            echo "selected";
                                        } ?> value="JARDIM SANTA TEREZINHA">JARDIM SANTA TEREZINHA</option>
                                <option <?php if (@$bairro == "JARDIM SANTO ONOFRE") {
                                            echo "selected";
                                        } ?> value="JARDIM SANTO ONOFRE">JARDIM SANTO ONOFRE</option>
                                <option <?php if (@$bairro == "JARDIM SAO JOAO") {
                                            echo "selected";
                                        } ?> value="JARDIM SAO JOAO">JARDIM SAO JOAO</option>
                                <option <?php if (@$bairro == "JARDIM SAO JUDAS TADEU") {
                                            echo "selected";
                                        } ?> value="JARDIM SAO JUDAS TADEU">JARDIM SAO JUDAS TADEU</option>
                                <option <?php if (@$bairro == "JARDIM SAO LUIZ") {
                                            echo "selected";
                                        } ?> value="JARDIM SAO LUIZ">JARDIM SAO LUIZ</option>
                                <option <?php if (@$bairro == "JARDIM SAO MATEUS") {
                                            echo "selected";
                                        } ?> value="JARDIM SAO MATEUS">JARDIM SAO MATEUS</option>
                                <option <?php if (@$bairro == "JARDIM SAO MIGUEL") {
                                            echo "selected";
                                        } ?> value="JARDIM SAO MIGUEL">JARDIM SAO MIGUEL</option>
                                <option <?php if (@$bairro == "JARDIM SAO PAULO") {
                                            echo "selected";
                                        } ?> value="JARDIM SAO PAULO">JARDIM SAO PAULO</option>
                                <option <?php if (@$bairro == "JARDIM SAO SALVADOR") {
                                            echo "selected";
                                        } ?> value="JARDIM SAO SALVADOR">JARDIM SAO SALVADOR</option>
                                <option <?php if (@$bairro == "JARDIM SAPORITO") {
                                            echo "selected";
                                        } ?> value="JARDIM SAPORITO">JARDIM SAPORITO</option>
                                <option <?php if (@$bairro == "JARDIM SCANDIA") {
                                            echo "selected";
                                        } ?> value="JARDIM SCANDIA">JARDIM SCANDIA</option>
                                <option <?php if (@$bairro == "JARDIM SILVIO SAMPAIO") {
                                            echo "selected";
                                        } ?> value="JARDIM SILVIO SAMPAIO">JARDIM SILVIO SAMPAIO</option>
                                <option <?php if (@$bairro == "JARDIM SUINA") {
                                            echo "selected";
                                        } ?> value="JARDIM SUINA">JARDIM SUINA</option>
                                <option <?php if (@$bairro == "JARDIM TABOAO") {
                                            echo "selected";
                                        } ?> value="JARDIM TABOAO">JARDIM TABOAO</option>
                                <option <?php if (@$bairro == "JARDIM TRES IRMAOS") {
                                            echo "selected";
                                        } ?> value="JARDIM TRES IRMAOS">JARDIM TRES IRMAOS</option>
                                <option <?php if (@$bairro == "JARDIM TRES MARIAS") {
                                            echo "selected";
                                        } ?> value="JARDIM TRES MARIAS">JARDIM TRES MARIAS</option>
                                <option <?php if (@$bairro == "JARDIM TRIANGULO") {
                                            echo "selected";
                                        } ?> value="JARDIM TRIANGULO">JARDIM TRIANGULO</option>
                                <option <?php if (@$bairro == "JARDIM TRIANON") {
                                            echo "selected";
                                        } ?> value="JARDIM TRIANON">JARDIM TRIANON</option>
                                <option <?php if (@$bairro == "JARDIM VIRGINIA") {
                                            echo "selected";
                                        } ?> value="JARDIM VIRGINIA">JARDIM VIRGINIA</option>
                                <option <?php if (@$bairro == "JARDIM WANDA") {
                                            echo "selected";
                                        } ?> value="JARDIM WANDA">JARDIM WANDA</option>
                                <option <?php if (@$bairro == "NUCLEO RESIDENCIAL ISABELA") {
                                            echo "selected";
                                        } ?> value="NUCLEO RESIDENCIAL ISABELA">NUCLEO RESIDENCIAL ISABELA</option>
                                <option <?php if (@$bairro == "PARQUE ALBINA") {
                                            echo "selected";
                                        } ?> value="PARQUE ALBINA">PARQUE ALBINA</option>
                                <option <?php if (@$bairro == "PARQUE ASSUNCAO") {
                                            echo "selected";
                                        } ?> value="PARQUE ASSUNCAO">PARQUE ASSUNCAO</option>
                                <option <?php if (@$bairro == "PARQUE DAS CIGARREIRAS") {
                                            echo "selected";
                                        } ?> value="PARQUE DAS CIGARREIRAS">PARQUE DAS CIGARREIRAS</option>
                                <option <?php if (@$bairro == "PARQUE INDUSTRIAL DACI") {
                                            echo "selected";
                                        } ?> value="PARQUE INDUSTRIAL DACI">PARQUE INDUSTRIAL DACI</option>
                                <option <?php if (@$bairro == "PARQUE INDUSTRIAL DAS OLIVEIRAS") {
                                            echo "selected";
                                        } ?> value="PARQUE INDUSTRIAL DAS OLIVEIRAS">PARQUE INDUSTRIAL DAS OLIVEIRAS</option>
                                <option <?php if (@$bairro == "PARQUE INDUSTRIAL TABOAO DA SERRA") {
                                            echo "selected";
                                        } ?> value="PARQUE INDUSTRIAL TABOAO DA SERRA">PARQUE INDUSTRIAL TABOAO DA SERRA</option>
                                <option <?php if (@$bairro == "PARQUE JACARANDA") {
                                            echo "selected";
                                        } ?> value="PARQUE JACARANDA">PARQUE JACARANDA</option>
                                <option <?php if (@$bairro == "PARQUE LAGUNA") {
                                            echo "selected";
                                        } ?> value="PARQUE LAGUNA">PARQUE LAGUNA</option>
                                <option <?php if (@$bairro == "PARQUE MARABA") {
                                            echo "selected";
                                        } ?> value="PARQUE MARABA">PARQUE MARABA</option>
                                <option <?php if (@$bairro == "PARQUE MONTE ALEGRE") {
                                            echo "selected";
                                        } ?> value="PARQUE MONTE ALEGRE">PARQUE MONTE ALEGRE</option>
                                <option <?php if (@$bairro == "PARQUE PINHEIROS") {
                                            echo "selected";
                                        } ?> value="PARQUE PINHEIROS">PARQUE PINHEIROS</option>
                                <option <?php if (@$bairro == "PARQUE RESIDENCIAL MONICA") {
                                            echo "selected";
                                        } ?> value="PARQUE RESIDENCIAL MONICA">PARQUE RESIDENCIAL MONICA</option>
                                <option <?php if (@$bairro == "PARQUE SANTOS DUMONT") {
                                            echo "selected";
                                        } ?> value="PARQUE SANTOS DUMONT">PARQUE SANTOS DUMONT</option>
                                <option <?php if (@$bairro == "PARQUE SAO JOAQUIM") {
                                            echo "selected";
                                        } ?> value="PARQUE SAO JOAQUIM">PARQUE SAO JOAQUIM</option>
                                <option <?php if (@$bairro == "PARQUE TABOAO") {
                                            echo "selected";
                                        } ?> value="PARQUE TABOAO">PARQUE TABOAO</option>
                                <option <?php if (@$bairro == "SITIO DAS MADRES TABOAO DA SERRA") {
                                            echo "selected";
                                        } ?> value="SITIO DAS MADRES TABOAO DA SERRA">SITIO DAS MADRES TABOAO DA SERRA</option>
                                <option <?php if (@$bairro == "VILA CARMELINA GONCALVES") {
                                            echo "selected";
                                        } ?> value="VILA CARMELINA GONCALVES">VILA CARMELINA GONCALVES</option>
                                <option <?php if (@$bairro == "VILA DAS OLIVEIRAS") {
                                            echo "selected";
                                        } ?> value="VILA DAS OLIVEIRAS">VILA DAS OLIVEIRAS</option>
                                <option <?php if (@$bairro == "VILA FRANCISCO REMEIKIS") {
                                            echo "selected";
                                        } ?> value="VILA FRANCISCO REMEIKIS">VILA FRANCISCO REMEIKIS</option>
                                <option <?php if (@$bairro == "VILA IASI / VILA INDIANA") {
                                            echo "selected";
                                        } ?> value="VILA IASI / VILA INDIANA">VILA IASI / VILA INDIANA</option>
                                <option <?php if (@$bairro == "VILA MAFALDA") {
                                            echo "selected";
                                        } ?> value="VILA MAFALDA">VILA MAFALDA</option>
                                <option <?php if (@$bairro == "VILA SANTA LUZIA") {
                                            echo "selected";
                                        } ?> value="VILA SANTA LUZIA">VILA SANTA LUZIA</option>
                                <option <?php if (@$bairro == "VILA SONIA DO TABOAO") {
                                            echo "selected";
                                        } ?> value="VILA SONIA DO TABOAO">VILA SONIA DO TABOAO</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input name="estou_ciente" class="form-check-input" type="checkbox" value="Aceitação dos termos Lei 13.709/2018." required>
                            <label class="form-check-label">
                                <h6>Estou ciente de que as informações contidas nesse formulário não serão compartilhadas
                                    ou expostas a terceiros, a finalidade é para a segurança do estagiário, conforme Lei
                                    13.709/2018. <i class="bi bi-asterisk"></i></h6>
                            </label>
                        </div>
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