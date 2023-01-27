<?php
	require_once 'header.php';
	$pdo = Conect::getInstance();
?>
<body>
	<div class="container">
		<h1>Loja de CD's</h1>
				<br>
				<br>
		<div class="col-sm-12">
			<table class="table">
				<tr>
					<th>
						ID
					</th>
					<th>
						NOME
					</th>
					<th>
						ARTISTA
					</th>
					<th>EDITAR</th>
				</tr>
		<?php
			$sql = ('SELECT p_id, p_nome, p_autor FROM produtos');
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($produtos as  $value) {
				echo "<tr>";
				echo '<td>' . $value['p_id'] . '</td>';
				echo '<td>' . $value['p_nome'] . '</td>';
				echo '<td>' . $value['p_autor'] . '</td>';
				echo '<td><a href="edit.php?id=' . $value['p_id'] . '">Editar</a></td>';
				echo "</tr>";
			}

		?>



			</table>
	</div>


</body>
</html>