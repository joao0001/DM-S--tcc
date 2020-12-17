<?php
include "../conect.php";

//recebendo dados do formulário de login
$nome = "$_POST[nome]";
$senha = "$_POST[senha]";

//Realizando o processo de login
$logar = $sql->query("select * from usuario
WHERE nome = '$nome' AND senha ='$senha' ");
    $check = mysqli_num_rows($logar);
    if($check == 1){
        header("Refresh: 0; url=../Home/Home.php");
    }
    else{
      
      echo "<script type='text/javascript'> alert('Usuario Ou Senha Incorreto'); </script>" ;
               header("Refresh: 0; url=../Index.html");
	}


?>