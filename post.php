<?php
	require_once 'header.php';
	$pdo = Conect::getInstance();
?>

<body>
	<div class="container">
		<h2>Cadastro de Produtos</h2>
		<p><hr></p>
			<div class="col-sm-8">
				<form action="cad_prod.php" method="post">
			<label>Titulo: </label>
			<input type="text" name="nome" class="form-control" required>
			<label>Artista: </label>
			<input type="text" name="artista" class="form-control" required>
			<label>Tipo: </label>
			<select name="tipo" class="form-control">
				<option>CD</option>
				<option>DVD</option>
			</select>
			<label>Genero:</label>
			<input type="text" name="genero" class="form-control" required>
			<label>Gravadora: </label>
			<input type="text" name="gravadora" class="form-control">
			<br>
			<input type="submit" name="confirmar" value="Confirmar" class="btn btn-info"><br>
			<small>Ao clicar em confirmar os dados serão gravados na base dados.</small>
				</form>
				
			</div>

	</div>
</body>