<?php

	//constantes
define('HOST', 'localhost');
define('DBNAME', 'loja');
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWORD', 'mysql001');

	class Conect{
		// atributo estático para instanciar do PDO
		private static $pdo;

		private function __construct(){
			//
		} 

		//metodo estático 

		public static function getInstance(){
			if (!isset(self::$pdo)) {
				try{
					$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',PDO::ATTR_PERSISTENT => TRUE);

					self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
			echo "conectado ao banco de dados: " . DBNAME;
				}catch (PDOException $e) {
					print "Erro ao se conectar ao banco: " . $e->getMessage();
				}
			}
			return self::$pdo;
		}
	}
?>