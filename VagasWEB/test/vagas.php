<?php 
require_once "curso.php";
	
class Vagas {
	public function getVagasPublicas(){
		return array(
			new Curso(1, "An�lise e Desenvolvimento de Sistemas"),
			new Curso(2, "An�lise e Desenvolvimento de Sistemas"),
			new Curso(3, "Gastronomia"),
		);
	}
}
?>