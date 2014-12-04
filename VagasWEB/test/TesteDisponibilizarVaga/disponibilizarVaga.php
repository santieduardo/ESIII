<?php
	include "testeVaga.class.php";
	include "testeCurso.class.php";
	
	class disponibilizarVaga {
	
		private $curso;
		private $vaga;
		
	
		public function __construct() {
			$this->curso = new testeCurso(1, "Informatica");
			$this->vaga = new testeVaga(1, 1, "Analista", "blablabla", 1, 'Tarde', 1, "Porto Alegre" );
		}
		
		public function mostrarVaga() { 
			$codVagaCurso = $this->vaga->getidVagaCurso();
			$codCurso = $this->curso->getId();
			
			if($codVagaCurso === 1 && $codCurso === 1) {
				return true;
			} else {
				return false;
			}
		}
		
		$this->vaga->setId();
	}
	
?>