<?php

$cpf = "$_POST[cpf]";
$codigo_fiscal = "$_POST[codigo_fiscal]";
$valor = "$_POST[valor]";
$data_venda = "$_POST[data_venda]";
$quantidade = "$_POST[quantidade]";
$pagamento = "$_POST[pagamento]";


try{
    $conn = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
} catch (PDOException $e) {
    print "Erro: {$e->getMessage()}<br>";
    exit;
}
try{

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  $conn->beginTransaction();
  
  $conn->exec("UPDATE produto SET quantidade= quantidade -$quantidade WHERE codigo_fiscal='$codigo_fiscal'");

  $conn->exec("INSERT INTO venda(cpf, pagamento, valor_total, quantidade, codigo_fiscal, data_venda) 
                            VALUES ('$cpf', '$pagamento', '$valor', '$quantidade','$codigo_fiscal', '$data_venda')");

  $conn->commit();
  header("Refresh: 0; url=vendas.php");
} catch(PDOException $e) {
 
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}

$conn = null;

?>