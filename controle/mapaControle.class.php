<?php
	include_once "funcao.php";
	class mapaControle
	{
		function mostrarPontos(){
            require_once "lib/nusoap.php";
            $client = new nusoap_client("http://localhost/rota2/servicos/mapaServicoNuSoap.class.php?wsdl");
            $retorno = $client->call("mapaServicoNuSoap.buscarTodosPontos");
            $retorno = json_decode($retorno);
            require_once "visao/mapaPontos.php";
        }
      
		
		function tracarRota()
		{
			$opcao = array("location"=>"http://localhost/rota2/servicos/rotaServico.class.php","uri"=>"http://localhost");
			$cli = new soapClient(null, $opcao);
			$retorno = $cli->buscarTodosPontos();			
			require_once "visao/rotaPontos.php";
		}
		function listarPontos()
		{
            require_once "lib/nusoap.php";
            $client = new nusoap_client("http://localhost/rota2/servicos/listaServicoNuSoap.class.php?wsdl");
            $retorno = $client->call("listaServicoNuSoap.listarTodosPontos");
            $retorno = json_decode($retorno);           
			require_once "visao/ListarPontos.php";
		}
		
		//método inserir
		
		function inserir()
		{
			$id = "";
			if($_POST)
			{
				$pontos = new pontos(null, $_POST["nome"], $_POST["cidade"], $_POST["pais"], $_POST["latitude"], $_POST["longitude"]);
				$pontosDAO= new pontosDAO();
				$pontosDAO->inserir($pontos);
				header("Location:index.php?controle=mapaControle&metodo=listarPontos");
			}
			require_once "visao/CadastrarPonto.php";
		}
		
		//alterar
		
		function alterar()
		{
			$id="";
			if($_GET)
			{
				$id = $_GET["id"];
				$pontos = new pontos($id);
				$pontosDAO = new pontosDAO();
				$retorno = $pontosDAO->buscarUmpontos($pontos);
				require_once "visao/CadastrarPonto.php";
			}
			if($_POST)
			{
				$pontos = new pontos($_POST["id"], $_POST["nome"], $_POST["cidade"], $_POST["pais"], $_POST["latitude"], $_POST["longitude"]);
				$pontosDAO= new pontosDAO();
				$pontosDAO->alterar($pontos);
				header("Location:index.php?controle=mapaControle&metodo=listarPontos");
			}			
		}
		
		//excluir
		function excluir()
		{
			if($_GET)
			{
				$pontos = new pontos($_GET["id"]);
				$pontosDAO = new pontosDAO();
				$pontosDAO->excluir($pontos);
				header("Location:index.php?controle=mapaControle&metodo=listarPontos");
			}
		}
		
		function logar()
		{
			
			require_once "visao/login.php";
			$erro=0;
			if($_POST)
			{
				if($_POST["login"]=="")
				{
					echo"<script>alert('Preencha seu e-Mail')</script>";
					$erro++;
				}
				if($_POST["senha"]=="")
				{
					echo"<script>alert('Preencha sua senha')</script>";
					$erro++;
				}
				if($erro==0)
				{
					$login= $_POST["login"];
					$senha= $_POST["senha"];
					$usuario = new usuario(null, null, null, null, $login, $senha);			
					$usuarioDAO = new usuarioDAO();
					$ret = $usuarioDAO->login($usuario);		
					if(count($ret) > 0)
					{
						//se for identificado
						session_start();
						$_SESSION["perfil"] = $ret[0]->idperfil;
						$_SESSION["id"] = $ret[0]->idusuario;
						
						// buscar as permissões de acordo com o acesso
						$perfil = new perfil($ret[0]->idperfil);				
						$perfilDAO = new perfilDAO();
						$retorno = $perfilDAO->buscarPermissoes($perfil);				
						$_SESSION["menu"]= $retorno;				
						echo "<script>alert('Bem-Vindo!!!')</script>";
						require_once "index.php?controle=mapaControle&metodo=denunciar";
					}
					else
					{
						echo "<script>alert('email/senha não conferem')</script>";
					}
				}
			}
		}	
	}//class
?>