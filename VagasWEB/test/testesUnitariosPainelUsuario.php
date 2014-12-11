<?php

	require_once "classeBD.php";
	require_once "cidade.php";
	require_once "curso.php";
	require_once "usuario.php";

	class testeVagaDisponibilidade extends PHPUnit_Framework_Testcase{


		$usuario = new Usuario();
		
		public function testeNomeCorreto() {


			$this->assertEquals('Daew', $usuario->getId());
		}

		public function testeIdadeCorreta(){
			$this->assertEquals('20', $usuario->getIdade());
		}

		public function testeCidadeCorreta(){
			$this->assertEquals('viamao', $cidade->getCidade());
		}

		public function testeCursoCorreto(){
			$this->assertEquals('ADS', $vagas[0]->getCurso());
		}



	}
?>
