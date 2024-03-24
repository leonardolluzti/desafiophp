<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <title>Sistema Hospitalar</title>
    <meta name="author" content="Leonardo Lopes da Luz" />
    <meta name="date" content="2024-03-22T21:32:33-0300" />
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
		<h1 class="w3-center">Sistema Hospitalar - Listagens</h1>
		<div class="w3-bar w3-green">
		  <button class="w3-bar-item w3-button" onclick="openList('Relatorios')">Relatórios</button>
		  <button class="w3-bar-item w3-button" onclick="openList('Bancos')">Bancos</button>
		  <button class="w3-bar-item w3-button" onclick="openList('Convenios')">Convênios</button>
		  <button class="w3-bar-item w3-button" onclick="openList('Servicos')">Serviços</button>
		  <button class="w3-bar-item w3-button" onclick="openList('Contratos')">Contratos</button>
		</div>

		<div id="Relatorios" class="w3-container w3-display-container item">
		  <span onclick="this.parentElement.style.display='none'"
		  class="w3-button w3-large w3-display-topright">&times;</span>
		  <h2>Relatorios</h2>
		  <?php
				include("conexao.php");
				$resultado = pg_query($connection, "SELECT tb_banco.nome as banco, tb_convenio.verba as verba, tb_contrato.codigo as contrato, tb_contrato.data_inclusao as dta, tb_contrato.valor as valor, tb_contrato.prazo as prazo FROM tb_banco, tb_contrato, tb_convenio, tb_convenio_servico WHERE tb_convenio_servico.convenio=tb_convenio.codigo AND tb_contrato.convenio_servico=tb_convenio_servico.codigo AND tb_banco.codigo=tb_convenio.banco;");
				echo "<table border='1'>";
				echo "<thead>Lista de Contratos</thead>";
				echo "<th>Banco</th><th>Verba</th><th>Código Contrato</th><th>Data Inclusão</th><th>Valor</th><th>Prazo</th>";
				while ($row = pg_fetch_assoc($resultado)) {
					echo "<tr>";
					echo "<td>".$row["banco"]."</td>";
					echo "<td>".$row["verba"]."</td>";
					echo "<td>".$row["contrato"]."</td>";
					echo "<td>".$row["dta"]."</td>";
					echo "<td>".$row["valor"]."</td>";
					echo "<td>".$row["prazo"]."</td>";
					echo "</tr>";
				}		
				echo "</table>";
				echo "<br><br>";	
				?>

				<?php
					include("conexao.php");
				$result = pg_query($connection, "SELECT tb_banco.nome AS banco, tb_convenio.verba AS verba, MIN(tb_contrato.data_inclusao) AS dtmin, MAX(tb_contrato.data_inclusao) AS dtmax, SUM(tb_convenio.verba) AS somaverba FROM tb_banco, tb_convenio, tb_contrato, tb_convenio_servico WHERE tb_convenio.banco=tb_banco.codigo AND tb_convenio_servico.convenio=tb_convenio.codigo AND tb_contrato.convenio_servico=tb_convenio_servico.codigo GROUP BY tb_banco.nome, tb_convenio.verba ORDER BY banco;");
				echo "<table border='1'>";
				echo "<thead>Relatório de Bancos e Verbas</thead>";
				echo "<th>Banco</th><th>Verba</th><th>Data Inclusão Mais Antiga</th><th>Data Inclusão Mais Recente</th><th>Soma Verba</th>";
				while ($row = pg_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["banco"]."</td>";
					echo "<td>".$row["verba"]."</td>";
					echo "<td>".$row["dtmin"]."</td>";
					echo "<td>".$row["dtmax"]."</td>";
					echo "<td>".$row["somaverba"]."</td>";
					echo "</tr>";				
				}			
				echo "</table>";			
				?>
		</div>
				
		<div id="Bancos" class="w3-container w3-display-container item" style="display:none">
		  <span onclick="this.parentElement.style.display='none'"
		  class="w3-button w3-large w3-display-topright">&times;</span>
		  <h2>Bancos</h2>
		  	<?php
		        include("conexao.php");
		        $result = pg_query($connection, "SELECT * FROM tb_banco order by codigo;");   
				echo "<table border='1'>";
		    	echo "<th>Código</th><th>Banco</th>";     
		        while ($row = pg_fetch_assoc($result)) {
					echo "<tr>";		          
					echo "<td>".$row["codigo"]."</td><td>".$row["nome"]."</td>";
					echo "</tr>";
				}
				echo "</table>";
		        pg_close($connection);
			?>
		</div>
			
		<div id="Convenios" class="w3-container w3-display-container item" style="display:none">
		  <span onclick="this.parentElement.style.display='none'"
		  class="w3-button w3-large w3-display-topright">&times;</span>
		  <h2>Convênios</h2>
		  <?php
			include("conexao.php");
			$result = pg_query($connection, "SELECT * FROM tb_convenio");
		    echo "<table border='1'>";
		    echo "<th>Código</th><th>Convênio</th><th>Verba</th><th>Banco</th>";
			while ($row = pg_fetch_assoc($result)) {
		        echo "<tr>";
		        echo "<td>".$row["codigo"]."</td><td>".$row["convenio"]."</td><td>".$row["verba"]."</td><td>".$row["banco"]."</td>";
		        echo "</tr>";
			   }
		        echo "</table>";
		        pg_close($connection);
				?>
		</div>
		
		<div id="Servicos" class="w3-container w3-display-container item" style="display:none">
		  <span onclick="this.parentElement.style.display='none'"
		  class="w3-button w3-large w3-display-topright">&times;</span>
		  <h2>Serviços</h2>
		  <?php
		        include("conexao.php");
		        $result = pg_query($connection, "SELECT * FROM tb_convenio_servico order by codigo;"); 
				echo "<table border='1'>";
		        echo "<th>Código</th><th>Convênio</th><th>Serviço</th>";		             
		        while ($row = pg_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["codigo"]."</td><td>".$row["convenio"]."</td><td>".$row["servico"]."</td>";
					echo "</tr>";
		        }
				echo "</table>";        
		        pg_close($connection);
		  ?>
		</div>
		
		<div id="Contratos" class="w3-container w3-display-container item" style="display:none">
		  <span onclick="this.parentElement.style.display='none'"
		  class="w3-button w3-large w3-display-topright">&times;</span>
		  <h2>Contratos</h2>
		  <?php
		        include("conexao.php");
		        $result = pg_query($connection, "SELECT * FROM tb_contrato order by codigo;");
		        echo "<table border='1'>";
		        echo "<th>Código</th><th>Prazo</th><th>Valor</th><th>Data de Inclusão</th><th>Serviço</th>";
		        while ($row = pg_fetch_assoc($result)) {
		            echo "<tr>";
		            echo "<td>".$row["codigo"]."</td><td>".$row["prazo"]."</td><td>".$row["valor"]."</td><td>".$row["data_inclusao"]."</td><td>".$row["convenio_servico"]."</td>";
		            echo "</tr>";
		        }
		        echo "</table>";
		        pg_close($connection);
		        ?>
		</div>
			
		<script>
		function openList(itemName) {
		  var i;
		  var x = document.getElementsByClassName("item");
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";  
		  }
		  document.getElementById(itemName).style.display = "block";  
		}
		</script>
		<br><br>
    </section>
	</main>
	<footer class="w3-container w3-bottom w3-center w3-black">LeoTech Informática - 2024</footer>  
  </body>
</html>
