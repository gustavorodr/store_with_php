<?php
	require_once 'header.php';
	$pdo = Conect::getInstance();
	$id = $_GET['id'];
?>

<body>
	<div class="container">
		<center>
			
	<?php

		try{
			$sql = ('DELETE FROM produtos WHERE p_id = :id');

				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':id', $id, PDO::PARAM_STR);
				$stmt->execute();

				echo '<hr>';
				echo '<img src="img\delete.png"><br>';
				echo '<h4 class="alert alert-success">O item foi deletado com sucesso.</h4>';
				echo '<a href="home.php" class="btn btn-primary"> <<- Voltar</a>';



		}catch (PDOExecption $e){
			echo 'Houve um erro: ' . $e->getMessage();
		}


	?>


		</center>
		
	</div>
</body>
</html>