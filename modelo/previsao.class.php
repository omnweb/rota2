<?php
	class previsao
	{
		private $idprevisao;
		private $nome_cidade;
		private $codigo_cidade;
		private $uf;
		private $maxima;
		private $minima;
		private $data_prevsao;
		
		function  __construct($id=null, $cidade=null, $cod=null, $uf=null, $max=null, $min=null, $data=null)
		{
			$this->idprevisao = $id;
			$this->nome_cidade = $cidade;
            $this->codigo_cidade = $cod;
			$this->uf = $uf;
			$this->maxima = $max;
			$this->minima = $min;			
			$this->data_prevsao = $data;
		}
		function getId()
		{
			return $this->idprevisao;
		}
		function getCidade()
		{
			return $this->nome_cidade;
		}
		function getCodigo()
		{
			return $this->codigo_cidade;
		}
		function getUf()
		{
			return $this->uf;
		}
		function getMax()
		{
			return $this->maxima;
		}
		function getMin()
		{
			return $this->minima;
		}
		function getData()
		{
			return $this->data_prevsao;
		}
        function setData($data)
		{
			$this->data_prevsao = $data;
		}
	}
?>