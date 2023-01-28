<?php

	class Login extends Conect {
		private $login;
		private $senha;

		public function setLogin($login){
			$this->login = $login;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

		public function getLogin(){
			return $this->login;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function logar(){
			$pdo = parent::getInstance();

			$logar = $pdo->prepare('SELECT * FROM usuarios WHERE us_user = ? AND us_senha = ?');
			$logar->bindValue(1, $this->getLogin());
			$logar->bindValue(2, $this->getsenha());
			$logar->execute();

			if ($logar->rowCount() == 1) {
				$dados = $logar->fetch(PDO::FETCH_OBJ);
				$_SESSION['usuarios'] = $dados->us_nome;
				$_SESSION['logado'] = true;

				return true;
			}else
				return false;
			
		}

		public static function deslogar(){
			if(isset($_SESSION['logado'])):
				unset($_SESSION['logado']);
				session_destroy();
				header("Location: index.php");
			endif;
		}
	}



?>