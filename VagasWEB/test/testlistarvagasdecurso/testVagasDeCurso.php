<?php 
require_once "FuncoesDBx.class.php";

class TestesUnitarios extends PHPUnit_Framework_Testcase{

	public function testVagasCurso(){
		$db = new FuncoesBDx();
		
		$listaVagasCurso = $db->getVagasCurso();
			
		$this->assertEquals(2, sizeof($listaVagasCurso));
			
		$this->assertEquals(1, $listaVagasCurso[0]->getId());
		$this->assertEquals(2, $listaVagasCurso[1]->getId());
	
	}
}
?>