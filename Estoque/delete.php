<?php
//recendo id 
$id = $_GET["id_produto"];

try {
  $conn = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //deletando produto
  $sql = " DELETE FROM produto WHERE id_produto = '$id'  ";

  $conn->exec($sql);
  header("Refresh: 0; url=estoque.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
