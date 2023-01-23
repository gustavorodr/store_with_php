<?php
    function Autoload($nomeClasse){
        require_once("classes/" . $nomeClasse . ".class.php");
    }

    spl_autoload_register("Autoload");
?>