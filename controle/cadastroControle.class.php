<?php
require_once"funcao.php";

class cadastroControle
{

		function cadastro()
		{
			require_once "visao/cadastro.php";
			if($_POST)
			{
				$opcao = array("location"=>"http://localhost/rota2/servicos/cadastroServico.class.php","uri"=>"http://localhost");
                $cli = new soapClient(null, $opcao);
                $usuarios = $cli->inserir((string)$_POST["nome"], (string) $_POST["email"], (string) $_POST["senha"]); 
               
                echo "<script>alert('Cadastro realizado com sucesso')</script>";
				echo '<script>location.href="index.php?controle=inicioControle&metodo=iniciar";</script>';                
			}
		}


}
?>
