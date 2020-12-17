<?php

    $produto = "$_POST[produto]";
    $cor = "$_POST[cor]";
    $valor = "$_POST[valor]";
    $quantidade = "$_POST[quantidade]";
    $fornecedor = "$_POST[fornecedor]";   
    $data_compra = "$_POST[data_compra]";
    $codigo_fiscal = "$_POST[codigo_fiscal]";
    try{
        $con = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
    } catch (PDOException $e) { 
        print "Erro: {$e->getMessage()}<br>";
        exit;
    }
    try{
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //inserindo os dados na tabela de produtos
        $cadastro=$con->exec ("INSERT INTO produto(produto, cor, valor, quantidade, fornecedor, data_compra , codigo_fiscal) 
        VALUES ('$produto','$cor','$valor','$quantidade', '$fornecedor' , '$data_compra' , '$codigo_fiscal')");

    } catch (PDOException $e){;

        print "Erro:{$e->getMessage()}<br>";
    }
?>