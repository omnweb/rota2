<?php
	class previsaoDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function inserir($previsao)
		{
			$sql = "INSERT INTO previsao (nome_cidade, codigo_cidade, uf, maxima, minima, data_previsao) VALUE (?,?,?,?,?,?)";
			try
			{
				$stmt = $this->db->prepare($sql);				
                $stmt->bindValue(1, $previsao->getCidade());
                $stmt->bindValue(2, $previsao->getCodigo());
                $stmt->bindValue(3, $previsao->getUf());
                $stmt->bindValue(4, $previsao->getMax());
                $stmt->bindValue(5, $previsao->getMin());
                $stmt->bindValue(6, $previsao->getData());
				$ret = $stmt->execute();				
				$this->db = null;			
			    if(!$ret)                
				{
					die("Erro ao inserir Previsao");
				}
                else 
                {
                    echo"<script> alert('Previsao inserida com sucesso')</script>";                   
                }
            }//try
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}            
        }//método inserir
		
        function buscarPrevisaoData($previsao)
        {
            $sql = "SELECT DISTINCT nome_cidade, codigo_cidade, uf, maxima, minima, data_previsao FROM previsao WHERE                   data_previsao = ?";
            try
            {
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $previsao->getData());
                $ret = $stmt->execute();
                $this->db = null;
                if(!$ret)
                {
                    die("Erro ao buscar Previsoes");
                }
                else
                {
                    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                    return $resultado;
                }
            }
            catch (PDOException $e)
            {
                die( $e->getMessage());
            }
        }
        
        function buscarPrevisaoCidadeData($previsao)
        {
            $sql = "SELECT DISTINCT nome_cidade, codigo_cidade, uf, maxima, minima, data_previsao FROM previsao WHERE                   nome_cidade = ? and data_previsao = ?";
            try
            {
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(1, $previsao->getCidade());
                $stmt->bindValue(2, $previsao->getData());
                $ret = $stmt->execute();
                $this->db = null;
                if(!$ret)
                {
                    die("Erro ao buscar Previsoes");
                }
                else
                {
                    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                    return $resultado;
                }
            }
            catch (PDOException $e)
            {
                die( $e->getMessage());
            }
        }
        
	}//classe
?>