<?php
	class pontosDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
		function buscarUmpontos($pontos)
		{
			$sql = "SELECT * FROM pontos where idpontos = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $pontos->getId());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar pontos");
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
		}//buscarUm	
		
		function buscarPontos()
		{
			$sql = "SELECT * FROM pontos";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar Pontos");
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
		}//buscarTodos	
		
		public function inserir( $pontos )
		{
			
			$sql = "INSERT INTO pontos (idpontos, nome, cidade, pais, latitude, longitude ) VALUE (?, ?, ?, ?, ?, ? )";
			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $pontos->getId());
				$stmt->bindValue(2, $pontos->getNome());				
				$stmt->bindValue(3, $pontos->getCidade());
				$stmt->bindValue(4, $pontos->getPais());
				$stmt->bindValue(5, $pontos->getLatitude());
				$stmt->bindValue(6, $pontos->getLongitude());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao inserir pontos");
				}
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
		public function alterar($pontos)
		{
			
			$sql = "UPDATE pontos SET nome = ?, cidade= ?, pais= ?, latitude= ?, longitude= ? WHERE idpontos = ?";
			try
			{
			$stmt = $this->db->prepare($sql);			
			$stmt->bindValue(1, $pontos->getNome());				
			$stmt->bindValue(2, $pontos->getCidade());
			$stmt->bindValue(3, $pontos->getPais());
			$stmt->bindValue(4, $pontos->getLatitude());
			$stmt->bindValue(5, $pontos->getLongitude());
			$stmt->bindValue(6, $pontos->getId());
			$ret = $stmt->execute();
			if(!$ret)
			{
				die("Erro ao Alterar o pontos");
			}
			
			$this->db = null;
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		}
		public function excluir($pontos)
		{
			
			$sql = "DELETE FROM pontos WHERE idpontos = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $pontos->getId());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao deletar o pontos");
				}
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		}
		
	}//fim da classe
?>