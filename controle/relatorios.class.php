<?php
	include_once "funcao.php";
	class relatorios
	{
		function listarLocaisPDF()
		{
			//buscar os dados Modelo
			$usuariosDAO = new usuariosDAO();
			$retorno = $usuariosDAO->buscarTodosLocais();
			//gerar o PDF visao
			require_once "visao/ListarTodosPontos.php";
		}
		
		function listarUsuariosPDF()
		{
			//buscar os dados Modelo
			$usuariosDAO = new usuariosDAO();
			$retorno = $usuariosDAO->buscarTodosUsuarios();
			//gerar o PDF visao
			require_once "visao/ListarTodosUsuarios.php";
		}

	}
?>