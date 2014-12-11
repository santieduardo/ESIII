<?php 
class Curso {

	private $idCurso;
	private $curso;
	
	public function __construct($id = "", $curso = ""){
		$this->idCurso = $id;
		$this->curso = $curso;
	}
	
	public function getId(){
		return $this->idCurso;
	}

	public function getCurso(){
		return $this->curso;
	}


}
?>