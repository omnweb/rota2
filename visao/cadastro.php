<?php
include "cabec.php";
?>
	<article>
		<form method="POST" action="#"  id="cadastro">
			<p><h3>Cadastro de usuário</h3>
			<input type="hidden" name="id" />
			<p>
			<label>Nome:
			<input type="text" name="nome"  title="Nome" required=""/>
			</label>
			</p>
			<p><label>E-mail:
			<input type="email" name="email" title="E-mail" required=""/>
			</label>
			</p>
			<p><label>Senha:
			<input type="password" name="senha"  title="Senha" required=""/>
			</label>
			</p>
			<p>
			<input type="submit" name="salvar" value="Salvar" class="botao"/>
			</p>
			<br/>

		</form>
	</article>
