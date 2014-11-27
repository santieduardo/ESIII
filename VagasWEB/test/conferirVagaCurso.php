<?php

	include "curso.php";
	include "vaga.php";
	
	class ConferirVagaCurso {
	
		private $curso;
		private $vaga;
		
	
		public function __construct() {
			$this->curso = new Curso(3, "Gastronomia");
			$this->vaga = new Vaga(3, "Cozinheiro", "Cozinhar", 1, "Manhã", 1);

		}
		

		public function conferirVaga() { 
			$codVaga = $this->vaga->getId();
			$codCurso = $this->curso->getId();
			
			if($codVaga === 3 && $codCurso === 3) {
				return true;
			}
				return false;
			
		}
		
		$this->curso->setId();
	}
	
?>