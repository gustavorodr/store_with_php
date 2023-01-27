<?php
	require_once 'header.php';
	$pdo = Conect::getInstance();

	$nome = $_POST['nome'];
	$artista = $_POST['artista'];
	$genero = $_POST['genero'];
	$gravadora = $_POST['gravadora'];
	$data = date('Y-m-d');

	if (isset($_POST['tipo']) == 'CD') {
		$tipo = 1;
	}else
		$tipo = 2;

?>

	<body>
		<div class="container">
			<center>
			
		<?php

			try{
				$sql = ('INSERT INTO produtos (p_nome, p_autor, p_tipo, p_genero,p_data,p_gravadora) VALUES (:nome, :artista, :tipo, :genero, :data, :gravadora)');
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
				$stmt->bindParam(':artista', $artista, PDO::PARAM_STR);
    			$stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
    			$stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
    			$stmt->bindParam(':data', $data, PDO::PARAM_STR);
    			$stmt->bindParam(':gravadora', $gravadora, PDO::PARAM_STR);
    			$stmt->execute();

    			echo '<h5 class="alert alert-success">Item cadastrado com sucesso</h5>';
			}catch (PDOException $e){
				echo 'Erro: ' . $e->getMessage();
			}

		?>
			<br>
			<a href="put.php" class="btn btn-primary"> <<- Voltar </a>
			</center>
		</div>
	</body>