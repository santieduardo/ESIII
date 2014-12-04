<?php
chdir(__DIR__);
ini_set('include_path', __DIR__);

function autoload($names, $path = "./"){
	if(is_array($names)){
		foreach($names as $file){
			$class = (basename($file ,".php"));
			require $path . lcfirst($class) . ".php";
			
			if(!class_exists($class, false))
				trigger_error("Falha ao carregar a classe: $class", E_USER_WARNING);
		}
	} else {
		$class = (basename($names ,".php"));
		require $path . lcfirst($names) . ".php";
			
		if(!class_exists($class, false))
			trigger_error("Falha ao carregar a classe: $class", E_USER_WARNING);
	}
}

/* Classes */
$models = array("vaga", "cidade", "curso", "usuario", "classeBD");
$testes = glob(PATH . "test/test*.php");

/* Autoload */
autoload($models);
autoload($testes);
