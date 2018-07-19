<?php
	require_once "../lib/nusoap.php";
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/pontosDAO.class.php";
	//servidor
	$server = new nusoap_server();
	//iniciar parametrização WSDL
	
	$server->configureWSDL("listarServico");
	$server->wsdl->schemaTargetNamespace = "urn:listarServico"; 
	class listaServicoNuSoap
	{
		function listarTodosPontos()
		{
			$pontosDAO = new pontosDAO();
			$retorno = $pontosDAO->buscarPontos();
			return json_encode($retorno);
		}
		
	}	
	
	// registra operação
	
	$server->register("listaServicoNuSoap.listarTodosPontos", 
	array(), 
	array("retorno"=>"xsd:string"), "urn:listarServico", //namespace, 
	"urn:listaServico#listarTodosPontos",//soapaction
	"rpc", //style
	"encode",
	"Lista Todos os Pontos Turísticos cadastrados banco de dados"); //Descrição
	
	//pega a requisição
	$chamada =file_get_contents("php://input");
	
	//executa a operação requisitada
	$server->service($chamada);
?>