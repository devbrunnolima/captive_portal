<?php 

require_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];

    $inserir = $pdo->prepare("INSERT INTO records SET nome = :nome, email = :email, cpf = :cpf");
    $inserir->bindValue(":nome", $nome);
    $inserir->bindValue(":email", $email);
    $inserir->bindValue(":cpf", $cpf);
    $inserir->execute();

   

 ?>