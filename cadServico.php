<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>Sistema Hospitalar</title>
    <meta name="author" content="Leonardo Lopes da Luz" />
    <meta name="date" content="2024-03-22T21:32:18-0300" />
    <meta name="copyright" content="LeoTech Informática" />
    <meta name="keywords" content="Sistema Hospitalar" />
    <meta name="description" content="Sistema Hospitalar" />
    <meta name="viewport" content="width=device.width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="./w3.css" />    
  </head>
  <body class="w3-responsive">
	<header>
		<nav class="w3-container">
			<ul class="w3-bar w3-black">
				<li class="w3-bar-item w3-mobile"><a class="w3-button w3-hover-blue" href="index.php">Listar</a></li>
				<li class="w3-bar-item w3-mobile"><a class="w3-button w3-hover-blue" href="cadContrato.php">Cadastrar Contrato</a></li>
				<li class="w3-bar-item w3-mobile"><a class="w3-button w3-hover-blue" href="cadConvenio.php">Cadastrar Convênio</a></li>
				<li class="w3-bar-item w3-mobile"><a class="w3-button w3-hover-blue" href="cadServico.php">Cadastrar Serviço</a></li>
				<li class="w3-bar-item w3-mobile"><a class="w3-button w3-hover-blue" href="cadBanco.php">Cadastrar Banco</a></li>
				<li class="w3-bar-item w3-mobile"><a class="w3-button w3-hover-blue" href="sobre.php">Sobre</a></li>
			</ul>
		</nav>
	</header>
	<main>
	<section class="w3-container">
		<h1 class="w3-center">Sistema Hospitalar</h1>
		<hr/>
		<h3>Cadastrar Serviços</h3>
        
        <form method="post" action="recServico.php">
			Código: <input type="text" name="codigo">
			<br><br>
			Serviço: <input type="text" name="servico"><br><br>
			Convênio:
			<select name="convenios">
			<?php
			include("conexao.php");
			$result = pg_query($connection, "SELECT * FROM tb_convenio");
			while ($row = pg_fetch_assoc($result)) {
			  echo "<option value='".$row["codigo"]."'>".$row["convenio"]."</option>";
			}
			?>
			</select><br><br>
			<input class="w3-button w3-blue" type="submit" name="btnEnviar" value="Enviar"> 
			<input class="w3-button w3-red" type="reset" name="btnLimpar" value="Limpar">
			<br><br>
        </form>
		<br><br>
	</section>
	</main>
	<footer class="w3-container w3-bottom w3-center w3-black">LeoTech Informática - 2024</footer>  
  </body>
</html>
