<?php

define('HOST', 'localhost');
define('DBNAME', 'loja');
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWORD', 'mysql001');

	class Conect{
		private static $pdo;

		private function __construct(){
			//
		} 

		public static function getInstance(){
			if (!isset(self::$pdo)) {
				try{
					$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',PDO::ATTR_PERSISTENT => TRUE);

					self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
				}catch (PDOException $e) {
					print "Erro ao se conectar ao banco: " . $e->getMessage();
				}
			}
			return self::$pdo;
		}
	}





?>