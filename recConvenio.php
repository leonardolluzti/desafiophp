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
        
        <?php
        include("conexao.php");
        $codigo=$_POST["codigo"];
        $convenio=$_POST["convenio"];
        $verba=$_POST["verba"];
        $banco=$_POST["banco"];

        $sql = pg_query($connection, "INSERT INTO tb_convenio (codigo, convenio, verba, banco) VALUES ('$codigo', '$convenio', '$verba', '$banco')");
        if ($sql==true){echo ("<div class='w3-panel w3-green'><b>Convênio Inserido com Sucesso!</b></div>");}
        else{echo ("<div class='w3-panel w3-red'><b>Convênio Não Inserido!</b></div>");}            
        pg_close($connection);
        ?>
        <h3>Lista de Convênios</h3>
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

        <br><br>
	</section>
	</main>
	<footer class="w3-container w3-bottom w3-center w3-black">LeoTech Informática - 2024</footer>  
  </body>
</html>