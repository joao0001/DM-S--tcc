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
    $conn = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $conn->beginTransaction();
    
    $conn->exec("INSERT INTO cliente(nome, cpf, email)
    VALUES ('$nome','$cpf','$email')");

    $conn->exec("INSERT INTO endereco(rua, bairro, complemento, cep, cidade, estado, cpf)
    VALUES ('$rua','$bairro','$complemento','$cep','$cidade','$estado','$cpf')");

    $conn->exec("INSERT INTO contato(ddd, telefone, cpf)
              VALUES ('$ddd','$telefone','$cpf')");

    $conn->commit();
    echo "New records created successfully";
  } catch(PDOException $e) {
  
    $conn->rollback();
    echo "Error: " . $e->getMessage();
  }

  $conn = null;

?>
