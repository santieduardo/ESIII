<?php 

	require_once "cidade.php";
	require_once "curso.php";

	class TestesUnitarios extends PHPUnit_Framework_Testcase{

		public function testIdCurso(){
			$curso = new Curso();

			$curso->setId(34);
			$this->assertEquals(34, $curso->getId());

			$curso->setId(1);
			$this->assertEquals(1, $curso->getId());
		}


	public function testCursoIdCidadeId() {

		$curso = new Curso();

		$cidade = new Cidade();

		$curso->setId(1);

		$cidade->setId(35);
		
		$this->assertEquals(35, $cidade->getId());

		$this->assertEquals(1, $curso->getId());

	}


	public function testCursoNegativo(){
		$curso = new Curso();
		$curso->setId(-15);
		
		$this->assertEquals(0, $curso->getId());
	}
	
	
	public function testCursoString(){
		
		$curso = new Curso();
		$curso->setId("Recursos Humanos");
		
		$this->assertEquals(0, $curso->getId());
	}
	
	
	public function testIdIsZero(){
		$curso = new Curso();

		$cidade = new Cidade();

		$curso->setId(1);

		$cidade->setId(0);
		
		$this->assertEquals(0, $cidade->getId());

		$this->assertEquals(1, $curso->getId());
	}
	
	
	//Eu candidato, gostaria de me candidatar a uma vaga.
	public function testeSelecionaVaga(){
		$usuario = new Usuario();
		$vaga = new Vaga();
		
		
		
		
	}
}
	
	

?>