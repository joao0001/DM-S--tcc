<?php
$cpf = $_GET["cpf"];

try {
  $conn = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
  $conn->beginTransaction();

  $conn->exec("DELETE FROM contato WHERE cpf = '$cpf' ");

  $conn->exec("DELETE FROM endereco WHERE cpf = '$cpf' ");

  $conn->exec("DELETE FROM cliente WHERE cpf = '$cpf' ");

 

  $conn->commit();
  header("Refresh: 0; url=clienteLista.php");
} catch(PDOException $e) {
 
  $conn->rollback();
  echo "Error: " . $e->getMessage();
}

$conn = null;
?>
