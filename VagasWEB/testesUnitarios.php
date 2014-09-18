<?php 

	require_once "cidade.php";
	require_once "curso.php";

	class TestesUnitarios extends PHPUnit_Framework_Testcase{

		public function testIdCurso(){
			$curso = new Curso();

			$curso->setId(34);
			assertEquals(34, $curso->getId());

			$curso->setId(1);
			assertEquals(1, $curso->getId());
		}
	}
?>