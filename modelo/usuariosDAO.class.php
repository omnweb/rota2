<?php
	class usuariosDAO extends conexao
	{
			function __construct()
			{
				parent:: __construct();
			}


		function inserir($usuarios)
		{            
			$sql = "INSERT INTO usuarios(iduser, nome, email, senha) VALUES (?,?,?,?)";
				try
				{
					$stmt = $this->db->prepare($sql);
						$stmt->bindValue(1,$usuarios->getId());
						$stmt->bindValue(2,$usuarios->getNome());
						$stmt->bindValue(3,$usuarios->getEmail());
						$stmt->bindValue(4,$usuarios->getSenha());
					$ret = $stmt->execute();
					$this->db = null;
					if(!$ret)
					{
						die("Erro ao inserir o usuario");
					}

				}
				catch (PDOException $e)
				{
					die ($e->getMessage());
				}
		}

			function autenticar($user)
		{
			$sql = "SELECT iduser, nome FROM usuarios WHERE email = ? AND senha = ?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1,$user->getEmail());
				$stmt->bindValue(2,$user->getSenha());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao validar usuario/senha");
				}
				else
				{
					$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}
		}
		
		function buscarTodosLocais()
		{
			$sql = "SELECT * FROM pontos";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos os pontos");
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
		
		function buscarTodosUsuarios()
		{
			$sql = "SELECT * FROM usuarios";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos os usuarios");
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
	}//class
?>
