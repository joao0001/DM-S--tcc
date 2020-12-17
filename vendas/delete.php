<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$id = $_GET["id"];

try {
  $conn = new PDO("mysql:host=localhost;dbname=tcc", "root", "");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to delete a record
  $sql = " DELETE FROM vendas WHERE id_vendas = $id  ";

  // use exec() because no results are returned
  $conn->exec($sql);
  header("Refresh: 0; url=vendas.php");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
