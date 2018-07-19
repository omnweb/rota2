<!DOCTYPE html>
	<html>
	<head>
		<title>Pontos Turísticos</title>
		<link type="text/css" rel="stylesheet" href="estilo/style.css" />
	</head>
	<body>
	<div id="geral">
	<header>
	</header>
	<nav>
			<?php	
			echo "<div id='menucentro'>";
				echo "<div id='menudireita'>";
					echo "<ul>";
						echo "<div id='in'>";
                            echo "<li><a href='index.php?controle=inicioControle&metodo=iniciar'>Início</a></li>&nbsp;&nbsp;";
							echo "<li><a href='index.php?controle=mapaControle&metodo=mostrarPontos'>Mostrar Pontos Turísticos</a></li>&nbsp;&nbsp;";

							// verifica se foi logado
							if(!isset($_SESSION["login"]) == "interno")
							{
								echo "<li><a href='index.php?controle=usuarioControle&metodo=login'>Entrar</a></li>&nbsp;&nbsp;";
								echo "<li><a href='?controle=cadastroControle&metodo=cadastro'>Cadastre-se</a></li>&nbsp;&nbsp;";
							} else {                                
								echo "<li><a href='index.php?controle=mapaControle&metodo=listarPontos'>Listar Pontos Turísticos</a></li>&nbsp;&nbsp;";
								echo "<li><a href='index.php?controle=mapaControle&metodo=tracarRota'>Rota</a></li>&nbsp;&nbsp;";								
								echo "<li><a href='index.php?controle=usuarioControle&metodo=logout'>Sair</a></li>";
							}
						echo "</div>";
					echo "</ul>";
			echo "</div>";
			?>
		</div>
	</nav>
</div>
