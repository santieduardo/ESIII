<?php 


	require_once "conferirVagaCurso.php";



	class TestesUnitarios extends PHPUnit_Framework_Testcase{
	
	public function testVagasCursoGastron() {
		
		$conferir = new ConferirVagaCurso();
		
		$resposta = $conferir->conferirVaga();
		
		
		$this->assertTrue($resposta);
		
		
	}
		

}

?>