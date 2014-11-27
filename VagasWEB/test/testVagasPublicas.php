<?php 
require_once "classeBD.php";

class TestesUnitarios extends PHPUnit_Framework_Testcase{

	public function testVagasPublicas(){
		$db = new FuncoesBD();
		$vagas = $db->getVagasPublicas();
			
		$this->assertEquals(3, sizeof($vagas));
			
		$this->assertEquals(1, $vagas[0]->getId());
		$this->assertEquals(2, $vagas[1]->getId());
		$this->assertEquals(3, $vagas[2]->getId());
	}
}
?>