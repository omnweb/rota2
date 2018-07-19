<?php
	require_once "visao/cabec.php"
?>
		<article>
		<form method="POST" action="#">
		  <table cellspacing="0" summary="Tabela de Produtos" class="tablesorter" id="tabcat">
			  <thead>
				<tr>
				  <th>Código</th>
				  <th>Nome</th>
				  <th colspan = "3" class="{sorter: false}">Ações</th>
				</tr>
			  </thead>
			  <tbody>
		<?php
        	if(count($retorno) > 0)
			{
				for($x=0; $x < count($retorno); $x++)
				{
					
					echo "<tr>";
						echo "<td>{$retorno[$x]->idpontos}</td>";
						echo "<td>{$retorno[$x]->nome}</td>";
						echo "<td><a href='index.php?controle=mapaControle&metodo=alterar&id={$retorno[$x]->idpontos}'><img src='imagens/edit-page-blue.gif' /></a></td>";
						echo "<td><a href='index.php?controle=mapaControle&metodo=excluir&id={$retorno[$x]->idpontos}'><img src='imagens/delete-page-blue.gif' /></a></td>";						
						echo "</tr>";
				}
			}
			else
			{
				header("Location:index.php?controle=mapaControle&metodo=inserir");
			}
		?>
		  
		  </tbody>
	  	
		</table>
		<p>
			<a class="botao" href="index.php?controle=mapaControle&metodo=inserir">Novo ponto turístico</a>
		</p>
	</form>
	</article>
</body>
</html>  
	
  


  
  