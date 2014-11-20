<?php 
class Curso {

	private $idCurso;
	private $curso;
	
	public function __construct($id = 0, $curso = null){
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