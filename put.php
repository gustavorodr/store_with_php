<?php
	require_once 'header.php';
	$pdo = Conect::getInstance();
	$id = $_GET['id'];
?>

	<body>
		<div class="container">
			
			<h2>Informações do Album: </h2>
			<p>
			<hr>	
			</p>
			
			<form action="#!" method="post">
				<?php 
	$sql = ('SELECT p_id,p_nome,p_autor,p_tipo,p_genero,p_data,p_gravadora FROM produtos WHERE p_id = :id');
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
			$stmt->execute();
			$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);


		foreach ($produtos as $key => $value) {
      
           	$id_alb = $value['p_id'];
 
       echo '<label>Nome:</label><input type="text" name="nome" class="form-control" value=" '. $value['p_nome'] . '" required>';
       echo '<label>Autor</label><input type="text" name="autor" class="form-control" value=" '. $value['p_autor'] . '" required>';
        		if ($value['p_tipo'] == 1) {
        			$tipo = 'CD';
        			}else{
        				$tipo = 'DVD';
        					}
echo '<label>Tipo:</label><input type="text" name="tipo" class="form-control" value="'.$tipo.'" disabled>';
echo '<label>Genero:</label><input type="text" name="genero" class="form-control" value=" '. $value['p_genero'] . '">';
echo '<label>Data:</label><input type="text" name="data" class="form-control" value=" '. $value['p_data'] . '" disabled>';
echo '<label>Gravadora</label><input type="text" name="gravadora" class="form-control" value=" '. $value['p_gravadora'] . '"><br>';
echo '<input type="submit" name="botao" class="btn btn-primary" value="Alterar"> &nbsp ';
echo '<a href="exclui.php?id=' . $id . ' "class="btn btn-danger"> Excluir </a>';

				 
		echo "</form>";

		if (isset($_POST['botao'])) {
			$nome = $_POST['nome'];
			$autor = $_POST['autor'];
    		$genero = $_POST['genero'];
    		$gravadora = $_POST['gravadora'];

    			try{
    				$sql = ('UPDATE produtos SET p_nome = :nome,p_autor = :autor,p_genero = :genero,p_gravadora = :gravadora WHERE p_id = :id_alb');
    				$stmt = $pdo->prepare($sql);
    				$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    	$stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
    	$stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
    	$stmt->bindParam(':gravadora', $gravadora, PDO::PARAM_STR);
    	$stmt->bindParam(':id_alb', $id_alb, PDO::PARAM_STR);
		$stmt->execute();

		echo '<h4 class="alert alert-success">Item atualizado com sucesso!!</h4>';
    			}catch (PDOException $e){
    				echo 'Erro ao atualizar os dados!!' . $e->getMessage(); }
    			}
		}

				 ?>
			
<hr>
		</div>
	</body>