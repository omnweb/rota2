<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/pontosDAO.class.php";
	//servidor
	$opcao = array("uri"=>"http://localhost");
	$server = new soapServer(null, $opcao);
	class rotaServico
	{
		function buscarTodosPontos()
		{
			$pontosDAO = new pontosDAO();
			$retorno = $pontosDAO->buscarPontos();
			return $retorno;
		}
		
	}
	$server->setObject(new rotaServico());
	$server->handle();
	//$d = new autorServico();
	//var_dump($d->buscarTodosAutores());
?>