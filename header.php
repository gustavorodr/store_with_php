<?php
  
      session_start();
    require 'autoload.php';
    if(isset($_GET['logout'])):
      if($_GET['logout'] == 'confirmar'):
        Login::deslogar();
      endif;
    endif;

	

  if(isset($_SESSION['logado'])):
?>

<!DOCTYPE html>
<html>
<head>
	<title>Loja de CD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<nav>
		<ul class="nav nav-pills">
			<li class="nav-item">
    			<a class="nav-link" href="home.php"><b>LOJA DE CD </b></a>
  			</li>
  			<li class="nav-item">
    			<a class="nav-link" href="home.php">HOME</a>
  			</li>
  			<li class="nav-item">
    			<a class="nav-link" href="put.php">CADASTRAR</a>
  			</li>
  			<li class="nav-item">
  				<a class="nav-link" href="#">SAIR</a>	
  			</li>
		</ul>
	</nav>
	<hr>

<?php
  
	else:
		echo '<center><h3>ACESSO NEGADO!!</h3></center>';
		exit();
	endif;

?>