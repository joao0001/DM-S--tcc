<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>DM System</title>

		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300'  type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="styleLembrete.css">
		<link rel="stylesheet" href="../style.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
				<span>NOTAS</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>

		<!-- Menu de navegação-->
		<div class="side-nav">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo1">
				<span>NOTAS</span>
			</div>
		<nav>
				<ul>
					<li >
						<a href="../Home/home.php" >
							<span><i class="fa fa-home icon"></i></span>
							<span>Home</span>
						</a>
					</li>
					<li >
						<a href="../Cliente/cliente.php" >
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
					<li class="active">
						<a href="#">

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
				<div class="widget" style="background-color:#FAFAFA">
				<!--adicionando o Google agenda-->	
                <iframe src="https://calendar.google.com/calendar/embed?height=510&amp;wkst=1&amp;bgcolor=%23E4C441&amp;ctz=America%2FSao_Paulo&amp;src=bmV3Y29udGF2aXRvcjEyM0BnbWFpbC5jb20&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;src=M3YxN21lODdrZmI3Zm5pa2VwZWVtcTNiMW9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=cHQuYnJhemlsaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23039BE5&amp;color=%2333B679&amp;color=%23EF6C00&amp;color=%230B8043&amp;showTabs=1&amp;showTitle=0&amp;showNav=0" style="border-width:0" width="516" height="380" frameborder="0" scrolling="no"></iframe>
				
				</div>
				<div class="widget" style="background-color:#FAFAFA">
					
					<div class="title">
						<i><img src="../img/pedido.svg"alt="Icon" style="width:5%;height:5%;"></i>
						Notificações
					<!--Alert que ficara fixo na tela -->
					</div>   
						  <div class="alert alert-info">
                          <strong>Informação</strong> Lembre de Consultar as entregas na pagina de vendas.
                     </div>
					
					<!--Realizando a conexão com o banco de bancos -->
					<?php 
                       include "../conect.php";
                      $dados = mysqli_query($sql, "SELECT * FROM produto");
                      while($coluna = mysqli_fetch_array($dados)) {
 
     	              $quantidade= $coluna['quantidade'];
                      $produto = $coluna['produto'];
                      $cor = $coluna['cor'];
                     #adicionando uma condição
		             if($quantidade <= 1) {
                      echo "<div class='alert alert-danger alert-dismissible fade in'>
                             <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                           <strong>Atenção!</strong> O $produto $cor Possui Poucas peças a disposição 
                          </div>";
                          }
                        }
                    ?>			
				</div>	
			</div>
		</div>

	</body>
</html>