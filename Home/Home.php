<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>DM System</title>

		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300'  type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../style.css">
		<link rel="stylesheet" href="styleHome.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="../main.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		
	</head>
	
	<body>
		<!-- Cabeçalho -->
		<div class="header">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo2">
				<span>Home</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>

		<!-- Menu de navegação-->
		<div class="side-nav">
			<div class="logo">
				<img src="../img/logo.jpg" class="img-logo1">
				<span>Home</span>
			</div>
			<nav>
				<ul>
					<li class="active">
						<a href="#" >
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
					<li >
						<a href= "../Estoque/estoque.php" >
							<span><i class="fa fa-archive icon"></i></span>
							<span>Estoque</span>
						</a>
					</li>
					<li>
						<a href= "../lembrete/lembrete.php">

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

		<!-- formulário de venda -->
		<div class="main-content">
			<div class="main">
				
				<div class="widget"  >
					<div class="title">
						<span><i class="fa fa-money"></i></span>
						REALIZAR VENDA
					</div>
						
					<form class="form"  method="post" id="ajax"  >  
									
									
									<div class="field">
										<label class="formLabel" for="CPF">CPF Cliente</label>
									<input type="text"  id="cpf" placeholder="CPF" name="cpf" required>
									</div>
									
									
									<div class="field">
										<label class="formLabel" for="codigo_fiscal">CODIGO FISCAL Produto</label>
										<input type="text"  id="codigo_fiscal" placeholder="Codigo Fiscal"  name="codigo_fiscal" required>
									</div>
									
									<div class="field">
										<label class="formLabel" for="valor">Valor Total:</label>
										<input type="text" id="valor" placeholder="Valor" name="valor" required>
									</div> 

									<div class="field">
										<label class="formLabel" for="pagamento">Forma de Pgamento</label>
										<input type="text"  id="pagamento" placeholder="Forma de Pagamento" name="pagamento" required>
									</div> 
									
									<div class="field">
										<label class="formLabel" for="quantidade">Quantidade:</label>
										<input type="text"  id="quantidade" placeholder="quantidade" name="quantidade" required>
									</div>  
									
									<div class="field">
										<label class="formLabel" for="data_venda">Data de Venda:</label>
										<input type="date"  id="data_venda" placeholder="data_venda" name="data_venda" required>
									</div>
									
									
									<input class="btn" type="submit" name="acao" value="FINALIZAR">
					</form>
				</div>

				<!-- formulário de orçamento -->
				<div class="widget" style="width:5%;height:5%;">
					
					<div class="title">
						<span><i class="fa fa-calendar icon"></i></span>
						Orçamento
					</div>

					<form class="formulario"  method="post" action=""> 
						<label class="formLabel" >Valor por M²: </label>
						<input  type="text" name="valor_unitario" id="valor_unitario" />
						
						<label class="formLabel">M² Usado: </label>
						<input type="text" name="qnt" id="qnt" value="0" />

						<label class="formLabel">Total: </label>
						<input type="text" name="total" id="total" readonly="readonly" />
					</form>
				</div>
			</div>
		</div>
				<!-- script responsavel por realizar o calculo de orçamento -->
        		<script type="text/javascript">
						function id(el) {
						return document.getElementById( el );
						}
						function total( un, qnt ) {
						return parseFloat(un.replace(',', '.'), 10) * parseFloat(qnt.replace(',', '.'), 10);
						}
						window.onload = function() {
						id('valor_unitario').addEventListener('keyup', function() {
						var result = total( this.value , id('qnt').value );
						id('total').value = String(result.toFixed(2)).formatMoney();
						});

						id('qnt').addEventListener('keyup', function(){
						var result = total( id('valor_unitario').value , this.value );
						id('total').value = String(result.toFixed(2)).formatMoney();
						});
						}

						String.prototype.formatMoney = function() {
						var v = this;

						if(v.indexOf('.') === -1) {
						v = v.replace(/([\d]+)/, "$1,00");
						}

						v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
						v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
						v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

					return v;
					};
				</script>
				
				<!--implementando AJAX-->
				<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
				
				<!-- script responsavel por enviar dados do formulário de vendas através do ajax para o arquivo de inserção -->
				 <script type="text/javascript">
					$(document).ready(function(){
						$('#ajax').submit(function(){
							var dados = $( this ).serialize();

							$.ajax({
								type: "POST",
								url: "../vendas/insert.php",
								data: dados,
								success: function( data )
								{
									document.location.reload(true);
								}
							});
							return false;
						});
					});
				</script>		
	</body>
</html>