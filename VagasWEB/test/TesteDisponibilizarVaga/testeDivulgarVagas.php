<?php

require_once "disponibilizarVaga.php";

class testeDivulgarVagas extends PHPUnit_Framework_Testcase {

	
	public function divulgarVagas() {
	
		$divulgar = new disponibilizarVaga();
		
		$retorno = $divulgar->mostrarVaga();
		
		$this->assertTrue($retorno);
	
	}

}

?>