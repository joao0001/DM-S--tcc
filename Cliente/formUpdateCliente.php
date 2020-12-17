<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>DM System</title>

		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300'  type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style-cliente.css">
		


		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="../main.js"></script>

		<style>	
		</style>
		

	</head>
	<body>
		<!-- Cabeçalho -->
		<div class="header">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo2">
				<span>Cliente</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>

		<!-- Menu de navegação-->
		<div class="side-nav">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo1">
				<span>Cliente</span>
			</div>
			<nav>
				<ul>
					<li>
						<a href="../Home/home.php" >
							<span><i class="fa fa-home icon"></i></span>
							<span>Home</span>
						</a>
					</li>
					<li class="active">
						<a href="cliente.php" >
							<span><i class="fa fa-user icon"></i></span>
							<span>Cliente</span>
						</a>
					</li>
					<li>
						<a href="../estoque/estoque.php" >
							<span><i class="fa fa-archive icon"></i></span>
							<span>Estoque</span>
						</a>
					</li>
					<li>
						<a href="../lembrete/lembrete.php">

							<span><i class="fa fa-calendar icon"></i></span>
							<span>Notas</span>
						</a>
					</li>	
					<li>
						<a href="#">
							<span><i class="fa fa-file icon"></i></span>
							<span>vendas</span>
						</a>
					</li>
					<li>
						<a href="../Index.php">
							<span><i class="fa fa-power-off icon"></i></span>
							<span>SAIR</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<!-- conteûdo do corpo do site -->
		<div class="main-content">
			<div class="main">
				<div class="widget">
					<div class="title">
						<i class="fa fa-user"></i>
						ATUALIZAR CLIENTE
					</div>

					<?php
						$cpf = $_GET["cpf"];
						$nome = $_GET["nome"];
						$ddd = $_GET["ddd"];
						$telefone = $_GET["telefone"];
						$email = $_GET["email"];
						$cep = $_GET["cep"];
						$rua = $_GET["rua"];
						$bairro = $_GET["bairro"];
						$complemento = $_GET["complemento"];
						$cidade = $_GET["cidade"];
						$estado = $_GET["estado"];


					?>

					<form class="form-update container form-inline"  method="post"  action="updateCliente.php">

						<label>Nome</label>
						<input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" readonly="readonly"  required>

						<label >CPF</label>
						<input type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>" readonly="readonly" required>

						<label><b>Contato:</b></label><br><br>

						<label>DDD</label>
						<input type="text" id="ddd" name="ddd" value="<?php echo $ddd; ?>" required>
							
						<label>Telefone</label>
						<input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" required>

						<label>E-mail</label>
						<input type="text" id="email" name="email" value="<?php echo $email; ?>">
						
						<label><b>Endereço:</b></label><br><br>

						<label>CEP</label>
						<input type="text" id="cep" name="cep" value="<?php echo $cep; ?>" required>

						<label>Rua</label>
						<input type="text" id="rua" name="rua" value="<?php echo $rua; ?>"  required>

						<label>Bairro</label>
						<input type="text" id="bairro" name="bairro" value="<?php echo $bairro; ?>" required>

						<label>Complemento</label>
						<input type="text" id="complemento" name="complemento" value="<?php echo $complemento; ?>" >

						<label>Cidade</label>
						<input type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>" required>

						<label>Estado</label>
						<input type="text" id="estado" name="estado" value="<?php echo $estado; ?>" required>

							
						<input class="btn" type="submit" value="Atualizar">
							
					</form>
				</div>

				<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#ajax').submit(function(){
					var dados = $( this ).serialize();

					$.ajax({
						type: "POST",
						url: "updateCliente.php",
						data: dados,
						success: function( data ){
							document.location.reload(true);
						}
					});
					return false;
				});
			});
		</script>

	</body>
</html>
