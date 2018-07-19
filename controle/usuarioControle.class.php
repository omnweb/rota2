<?php
require_once"funcao.php";
 class usuarioControle
 {
  function login()
  	 {
  		 require_once "visao/login.php";
  		 if($_POST)
  		 {
  			$_SESSION ["login"] = "interno";

  			$email=$_POST["email"];
  			$senha=$_POST["senha"];
  			$user = new usuarios(null,null,$email,$senha);
  			$userDAO = new usuariosDAO();
  			$ret = $userDAO->autenticar($user);

  				if(count($ret)>0) //encontrar user
          {
  					$_SESSION["id"]= $ret[0]->iduser;
  					$_SESSION ["login"] = "interno";
  					echo "<script>alert('Bem-vindo!')</script>";
  					echo "<script>location.href='index.php?controle=inicioControle&metodo=iniciar';</script>";
  				}
  				else
  				{
  					echo"<script>alert('E-mail ou senha invalido!');</script>";

  				}


  		 }

  	 }//login
  	   function logout()
  	     {
      		unset($_SESSION["id"]);
      		$_SESSION = array();
      		session_destroy();//destroi a sessão //sair
      		header('location:index.php?controle=inicioControle&metodo=iniciar');
  	     }

 }//class
?>
