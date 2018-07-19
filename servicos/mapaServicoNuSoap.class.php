<?php
	require_once "../lib/nusoap.php";
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/pontosDAO.class.php";
	//servidor
	$server = new nusoap_server();
	//iniciar parametrização WSDL
	
	$server->configureWSDL("mapaServico");
	$server->wsdl->schemaTargetNamespace = "urn:mapaServico"; 
	class mapaServicoNuSoap
	{
		function buscarTodosPontos()
		{
			$pontosDAO = new pontosDAO();
			$retorno = $pontosDAO->buscarPontos();
			return json_encode($retorno);
		}
		
	}	
	
	// registra operação
	
	$server->register("mapaServicoNuSoap.buscarTodosPontos", 
	array(), 
	array("retorno"=>"xsd:string"), "urn:mapaServico", //namespace, 
	"urn:mapaServico#buscarTodospontos",//soapaction
	"rpc", //style
	"encode",
	"Busca todos os pontos turísticos no mapa"); //Descrição
	
	//pega a requisição
	$chamada =file_get_contents("php://input");
	
	//executa a operação requisitada
	$server->service($chamada);
?>