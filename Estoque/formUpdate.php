<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>DM System</title>

        <link rel="stylesheet" href="formUpdate.css">
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
	   <script src="main.js"></script>

	
			


		

	</head>
	<body>
		<!-- Cabeçalho -->
		<div class="header">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo2">
				<span>Estoque</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>

		<!-- Menu de navegação-->
		<div class="side-nav">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo1">
				<span>Estoque</span>
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
					
					    <li class="active">
						<a href="estoque.php" >
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
						<a href="../vendas/vendas.php">
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
		
		<!-- formulário de Udate de produto-->
		<div class="main-content">
			<div class="main">
				<div class="widget">
					<div class="title">
						<i class="fa fa-archive icon"></i>
						ATUALIZAR PRODUTO
					</div>

					<?php
						$id_produto = $_GET["id_produto"];
					?>

					<form class="form-update container form-inline"  method="post" action="update.php">

						<label>ID</label>
						<input type="text" id="id_produto" name="id_produto" value="<?php echo $id_produto; ?>" readonly="readonly" required>

						<label >M² comprados</label>
						<input type="text" id="quantidade_comprada" name="quantidade_comprada" required>

							
						<input class="btn" type="submit" value="Atualizar">
							
					</form>
				</div>

	</body>
</html>
