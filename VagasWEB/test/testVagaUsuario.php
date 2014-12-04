<?php 
	chdir(__DIR__);
	ini_set('include_path', __DIR__);
	include "../classeBD.php";
	class TestesUnitarios extends PHPUnit_Framework_Testcase{
	
	public function testVagaUsuario() {
		
		$conferir = new FuncoesBD();
		
		$resposta = $conferir->inserirVagaUsuario(2,2);
		
		$this->assertTrue($resposta);
	
	}		
}
?>