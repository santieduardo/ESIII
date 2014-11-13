<?php 
require_once "vagas.php";

class TestesUnitarios extends PHPUnit_Framework_Testcase{

	public function testVagas(){
		$vagas = new Vagas();
		$cursos = $vagas->getVagasPublicas();
			
		$this->assertEquals(3, sizeof($cursos));
			
		$this->assertEquals(1, $cursos[0]->getId());
		$this->assertEquals(2, $cursos[1]->getId());
	}
}
?>