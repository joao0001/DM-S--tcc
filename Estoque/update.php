<?php
$id = "$_POST[id_produto]";
$quantidade_comprada = "$_POST[quantidade_comprada]";


try{
  $conn = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
} catch (PDOException $e) {
  print "Erro: {$e->getMessage()}<br>";
  exit;
}
try{

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
$conn->beginTransaction();

//deletando um produto
$conn->exec("UPDATE produto SET quantidade= quantidade +$quantidade_comprada WHERE id_produto='$id'");

$conn->commit();
header("Refresh: 0; url=estoque.php");
} catch(PDOException $e) {

$conn->rollback();
echo "Error: " . $e->getMessage();
}

$conn = null;

?>

