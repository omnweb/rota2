<?php
	require_once "../modelo/conexao.class.php";
	require_once "../modelo/usuariosDAO.class.php";
	require_once "../modelo/usuarios.class.php";
	//servidor
	$opcao = array("uri"=>"http://localhost");
	$server = new soapServer(null, $opcao);
	class cadastroServico
	{
		function inserir($nome, $email, $senha)
		{
			$usuarios = new usuarios(null, $nome, $email, $senha);			
			$usuariosDAO = new usuariosDAO();
            $retorno = $usuariosDAO->inserir($usuarios);
                   
		}//operação
		
	}
	$server->setObject(new cadastroServico());
	$server->handle();	
?>