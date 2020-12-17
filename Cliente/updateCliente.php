<?php

  $nome = "$_POST[nome]";
  $cpf = "$_POST[cpf]";
  $ddd = "$_POST[ddd]";
  $telefone = "$_POST[telefone]";
  $email = "$_POST[email]";
  $rua = "$_POST[rua]";
  $bairro = "$_POST[bairro]";
  $complemento = "$_POST[complemento]";
  $cidade = "$_POST[cidade]";
  $estado = "$_POST[estado]";
  $cep = "$_POST[cep]";

  try {
    //conect BD
    $conn = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();
    
    //realizando um update nos dados do cliente
    $conn->exec("UPDATE cliente SET nome='$nome', email='$email' WHERE cpf='$cpf'");

    $conn->exec("UPDATE endereco SET cep='$cep', rua='$rua', bairro='$bairro', complemento='$complemento', cidade='$cidade', estado='$estado' WHERE cpf='$cpf'");

    $conn->exec("UPDATE contato SET ddd='$ddd', telefone='$telefone' WHERE cpf='$cpf'");

    $conn->commit();
    header("Refresh: 0; url=clienteLista.php");
  } catch(PDOException $e) {
  
    $conn->rollback();
    echo "Error: " . $e->getMessage();
  }

  $conn = null;

?>
