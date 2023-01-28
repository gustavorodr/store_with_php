<?php
	session_start();
	require 'autoload.php';

		if (isset($_POST['ok'])):
			$login = filter_input(INPUT_POST, 'login',FILTER_SANITIZE_MAGIC_QUOTES);
			$senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_MAGIC_QUOTES);
			
			$l = new login;
			$l->setLogin($login); 
			$l->setSenha($senha);

			if($l->logar()):
				header("location: home.php");
			else:
				$erro = '<p><b class="alert alert-danger">Usuário ou senha inválidos</b></p>';
			endif;
		endif;

		if(isset($_SESSION['logado'])):
			header("Location: home.php");
		else:

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de CD's</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

	<h3> Cadastro de CD's </h3><hr>
			<div class="container">
				<center>
		<div id="login">
			<form action="" method="POST" class="formulario">
		
				<div class="row">
				<label>Usuário</label>
				<input type="text" name="login" class="form-control" required="">
				<label>Senha</label>
				<input type="password" name="senha" class="form-control" required>
				<input type="submit" name="ok" value="Logar" class="btn btn-primary btn-block" >
				</div>
			</form>
			<?php echo isset($erro) ? $erro : '';  ?>
			
		</div>
		</div>

			<?php endif; ?>

</body>
</html>