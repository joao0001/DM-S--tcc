<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>DM System</title>

		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300'  type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style-cliente.css">
		<link rel="stylesheet" href="styleButton.css">
		
		

		


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
							LISTA DE CLIENTES
								
							<a class="button2" href="cliente.php"><i class="fa fa-times icon"></i></a>
							
						</div>
						<div>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>NOME</th>
										<th>CPF</th>
										<th>TELEFONE</th>
										<th>E-MAIL</th>
										<th>CEP</th>
										<th>RUA</th>
										<th>COMPLEMENTO</th>
										<th>BAIRRO</th>
										<th>CIDADE</th>
										<th>ESTADO</th>
									</tr>
								</thead>
								<tbody id="myTable">
	
									<?php 
										include "../conect.php";
										$dados = mysqli_query($sql,"SELECT	cliente.nome,
																			cliente.cpf,
																			cliente.email,
																			contato.ddd,
																			contato.telefone,
																			endereco.cep,
																			endereco.rua,
																			endereco.bairro,
																			endereco.complemento,
																			endereco.cidade,
																			endereco.estado
																	FROM cliente	INNER JOIN endereco ON (cliente.cpf = endereco.cpf)
																					INNER JOIN contato ON (contato.cpf = cliente.cpf)
																					GROUP BY		cliente.nome,
																								cliente.cpf,
																								cliente.email,
																								contato.ddd,
																								contato.telefone,
																								endereco.cep,
																								endereco.rua,
																								endereco.bairro,
																								endereco.complemento,
																								endereco.cidade,
																								endereco.estado");
					
										while($coluna = mysqli_fetch_array($dados)) {
											


											$nome = $coluna['nome'];
											$cpf = $coluna['cpf'];
											$ddd= $coluna['ddd'];
											$telefone= $coluna['telefone'];
											$email= $coluna['email'];
											$cep= $coluna['cep'];
											$rua= $coluna['rua'];
											$bairro = $coluna['bairro'];
											$complemento = $coluna['complemento'];
											$cidade = $coluna['cidade'];
											$estado = $coluna['estado'];
												
											echo"<tr>
													<td>$nome</td>
													<td>$cpf</td>
													<td>($ddd)-$telefone</td>
													<td>$email</td>
													<td>$cep</td>
													<td>$rua</td>
													<td>$complemento</td>
													<td>$bairro</td>
													<td>$cidade</td>
													<td>$estado</td>
													<td><pre><a href='deleteCliente.php?cpf=$cpf'><img src='../img/lixeira.png' ></a></pre></td>
													<td><pre><a href='formUpdateCliente.php?cpf=$cpf&nome=$nome&ddd=$ddd&telefone=$telefone&email=$email&cep=$cep&rua=$rua&complemento=$complemento&bairro=$bairro&cidade=$cidade&estado=$estado'><img src='../img/teste.png' class='update'></pre></td>
												</tr>";
										}				
									?>
	
								</tbody>
							</table>
						</div>
					</div>	
					
			</div>
		</div>
	</body>
</html>