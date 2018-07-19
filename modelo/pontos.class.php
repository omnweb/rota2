<?php
	class pontos
	{
		private $idpontos;
		private $nome;		
		private $cidade;
		private $pais;
		private $latitude;
		private $longitude;		
		
		function  __construct($id="", $nome="", $cid = "", $pais="", $lat="", $long = "")
		{
			$this->idpontos = $id;
			$this->nome = $nome;			
			$this->cidade = $cid;
			$this->pais =$pais;
			$this->latitude = $lat;
			$this->longitude = $long;
			
		}
		function getId()
		{
			return $this->idpontos;
		}
		function getNome()
		{
			return $this->nome;
		}		
		function getCidade()
		{
			return $this->cidade;
		}
		function getPais()
		{
			return $this->pais;
		}
		function getLatitude()
		{
			return $this->latitude;
		}
		function getLongitude()
		{
			return $this->longitude;
		}		
	}//classe
?>