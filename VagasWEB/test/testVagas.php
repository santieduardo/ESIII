<?php
	

	/*

	1.1. entrada: (cursoId) [34] OK
	1.2. entrada: (cursoId) [1] OK
	1.3. entrada: (cursoId, cidadeId) [1, 35]

	Operação inválidas

	1.1. entrada: (curso) [-15] 
	1.2. entrada: (curso) [Recurso Humano] 
	1.3. entrada: (cursoId, cidadeId) [1, 0]
	*/

	class testVagas extends PHPUnit_Framework_TestCase{

	

	/*
	* Teste verifica se o ID do curso está de acordo com o pesquisado
	*/

		public function testIdCurso(){
			
			include '../curso.php';

			$curso = new Curso();

			$curso.setId(34);

			$this -> assertEquals(34, $curso->getId());

		}	

	}


?>