<?php

class testeCurso {

	private $idCurso;
	private $nomeCurso
	
	
	function __construct($idCurso="", $nomeCurso="");
	
	
	public function getId(){
		return $this->idCurso;
	}
	
	
	public function checkIdCurso($id){
		if($id > 0){
			return true;
		}
		return false;
	}
	
	
	public function setId($id){
		if(self::checkIdCurso($id)){
			$this->idCurso = $id;
		}else{
			$this->idCurso = 0;
		}
	}
	
	
	public function setNomeCurso($nome) {
		$this->nome = $nome;
	}
	
	
	public function getNomeCurso() {
		return $this->nomeCurso;
	}
	
}

?>