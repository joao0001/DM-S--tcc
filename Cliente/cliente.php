<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DM System</title>
		
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="style-cliente.css">
		<link rel="stylesheet" href="styleButton.css">
		
		

		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="../main.js"></script>

		<style>	
		</style>
		

	</head>
	<body>
		<div class="header">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo2">
				<span>Cliente</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
				<a href="index.php">
					<img src="../img/logo.jpg" class="img-logo1">
				</a>
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
						<a href="#" >
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

		
		
		<div class="main-content">
			<div class="main">
				<div class="widget">
					<div class="title">
						<i class="fa fa-user"></i>
						CADASTRAR CLIENTES
					</div>

					<form class="form-cadastro container form-inline"  method="" action=""  id="ajax" action="">

						<label>Nome</label>
						<input type="text" id="nome"  name="nome" placeholder="Nome" required>

						<label >CPF</label>
						<input type="text" id="cpf" name="cpf" placeholder="CPF"  required>

						<label><b>Contato:</b></label><br><br>

						<label>DDD</label>
						<input type="text" id="ddd" name="ddd" placeholder="DDD" required>
							
						<label>Telefone</label>
						<input type="text" id="telefone" name="telefone" placeholder="Telefone" required>

						<label>E-mail</label>
						<input type="text" id="email" name="email" placeholder="E-mail">
						
						<label><b>Endereço:</b></label><br><br>

						<label>CEP</label>
						<input type="text" id="cep" name="cep" placeholder="CEP" required>

						<label>Rua</label>
						<input type="text" id="rua" name="rua" placeholder="Rua"  required>

						<label>Bairro</label>
						<input type="text" id="bairro" name="bairro" placeholder="Bairro" required>

						<label>Complemento</label>
						<input type="text" id="complemento" name="complemento" placeholder="complemento" >

						<label>Cidade</label>
						<input type="text" id="cidade" name="cidade" placeholder="Cidade" required>

						<label>Estado</label>
						<input type="text" id="estado" name="estado" placeholder="Estado: SP" required>

							
						<input class="btn" type="submit" value="Cadastrar">
							
					</form>
				</div>


				<div class="widget" id="client-list">		

					<div class="title">
						<i class="fa fa-user"></i>
						<label>LISTA DE CLIENTES</label>
					
						<a class="button" href="clienteLista.php">Dados Completos</a>
					</div>
					<div>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>NOME</th>
									<th>TELEFONE</th>
									<th>E-MAIL</th>
									<th>CEP</th>
								</tr>
							</thead>
							<tbody id="myTable">
						
								<?php 
									include "../conect.php";
									$dados = mysqli_query($sql,"SELECT	cliente.nome,
																		cliente.cpf,
																		cliente.email,
																		endereco.cep,
																		contato.ddd,
																		contato.telefone 
																FROM cliente	INNER JOIN endereco ON (cliente.cpf = endereco.cpf)
																				INNER JOIN contato ON (contato.cpf = cliente.cpf)
																				GROUP BY cliente.nome,
																						 cliente.cpf,
																						 cliente.email,
																						 endereco.cep,
																						 contato.ddd,
																						 contato.telefone");

									while($coluna = mysqli_fetch_array($dados)) {
										
										$nome = $coluna['nome'];
										$cpf = $coluna['cpf'];
										$ddd= $coluna['ddd'];
										$telefone= $coluna['telefone'];
										$email= $coluna['email'];
										$cep= $coluna['cep'];		
											
										echo"<tr>
												<td>$nome</td>
												<td>($ddd)-$telefone</td>
												<td>$email</td>
												<td>$cep</td>
											</tr>";
									}				
								?>

							</tbody>
						</table>
					</div>
				</div>	
			</div>
		</div>

		<script>
			$(document).ready(function(){
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>	
		<!--Implementando ajax -->	
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#ajax').submit(function(){
					var dados = $( this ).serialize();

					$.ajax({
						type: "POST",
						url: "salvarCliente.php",
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
