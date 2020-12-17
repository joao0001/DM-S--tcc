<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>DM System</title>

	   <link rel="stylesheet" href="vendas-style.css">
	   <link rel="stylesheet" href="../style.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300'  type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		

		
		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	     <script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>	
	   <script src="../main.js"></script>


	</head>
	<body>
		<!-- Cabeçalho -->
		<div class="header">
			<div class="logo">
				<img src="img/logo.jpg" class="img-logo2">
				<span>Vendas</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>

		<!-- Menu de navegação-->
		<div class="side-nav">
			<div class="logo">
				<img src="img/logo.jpg" class="img-logo1">
				<span>Vendas</span>
			</div>
			<nav>
				<ul>
					<li >
						<a href="../home/home.php" >
							<span><i class="fa fa-home icon"></i></span>
							<span>Home</span>
						</a>
					</li>
					<li >
						<a href="../cliente/cliente.php" >
							<span><i class="fa fa-user icon" ></i></span>
							<span>Clientes</span>
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
					<li class="active">
						<a href="#">
							<span><i class="fa fa-file icon"></i></span>
							<span>Vendas</span>
						</a>
					</li>
					<li>
						<a href="../index.php">
							<span><i class="fa fa-power-off icon"></i></span>
							<span>SAIR</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<!-- conteûdo do corpo do site -->
		<div class="main-content">
			<div class="container mt-3" style="margin-left:-1%;padding:1px 16px;height:1000px;">
				<details>
						<summary>REALIZAR VENDA</summary>
						<form class="formulario" id="formVenda"  method="post" action="insert.php"  >  
								
								
								<div class="field">
									<label for="CPF">CPF Cliente</label>
								<input type="text"  id="cpf" placeholder="CPF" name="cpf" required>
								</div>
								
								
								<div class="field">
									<label for="codigo_fiscal">CODIGO FISCAL Produto</label>
									<input type="text"  id="codigo_fiscal" placeholder="Codigo Fiscal"  name="codigo_fiscal" required>
								</div>
								
								<div class="field">
									<label for="valor">Valor Total:</label>
									<input type="number" step="0.10"  id="valor" placeholder="Valor" name="valor" required>
								</div> 

								<div class="field">
									<label for="pagamento">Forma de Pgamento</label>
									<input type="text"  id="pagamento" placeholder="Forma de Pagamento" name="pagamento" required>
								</div> 
								
								<div class="field">
									<label for="quantidade">Quantidade:</label>
									<input type="number"  id="quantidade" placeholder="quantidade" name="quantidade" required>
								</div>  
								
								<div class="field">
									<label for="data_venda">Data de Venda:</label>
									<input type="date"  id="data_venda" placeholder="data_venda" name="data_venda" required>
								</div>
								
								
								
								<input type="submit" name="acao" value="Cadastrar">
						</form>
				</details>

				<br> <br><input class="form-control" id="myInput" type="text"  placeholder="Pesquisar Venda">
				<br>

				<table class="table table-bordered" >
					<thead>
						<tr>
							<th>ID</th>
							<th>CPF</th>
							<th>Produo</th>
							<th>Valor</th>
							<th>Quantidade</th>
							<th>Data De Venda</th>
								
						</tr>
					</thead>
					<tbody id="myTable">
						<!-- realizando a conexão com o banco -->
						<?php 
							include "../conect.php";

							$dados = mysqli_query($sql, "SELECT * FROM venda");
								
							while($coluna = mysqli_fetch_array($dados)) {
								$id= $coluna['id_venda'];
								$cpf = $coluna['cpf'];
								$produto = $coluna['codigo_fiscal'];
								$valor = $coluna['valor_total'];
								$quantidade = $coluna['quantidade'];
								$data_venda  = $coluna['data_venda'];
									
									
								echo"<tr>
										<td>$id </td>
										<td>$cpf</td>
										<td>$produto</td>
										<td>R$ $valor</td>
										<td>$quantidade</td>
										<td>$data_venda</td>
									</tr>";	
							}						
							?>
   						 </tbody>
  					</table>
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
	</body>
</html>
