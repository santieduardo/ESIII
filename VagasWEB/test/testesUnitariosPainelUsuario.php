<?php

	require_once "classeBD.php";
	require_once "test\cidade.php";
	require_once "test\curso.php";
	require_once "test\usuarios.php";

	class testeVagaDisponibilidade extends PHPUnit_Framework_Testcase{


		$usuario = new Usuario('1','Daew','Rua A','daew@daew.com.br','123456','20','1','1');
		$curso = new Curso('1', 'ADS');
		$cidade = new Cidade('1','viamao');
		
		public function testeNomeCorreto() {
			$this->assertEquals('Daew', $usuario->getNome());
		}

		public function testeIdadeCorreta(){
			$this->assertEquals('20', $usuario->getIdade());
		}

		public function testeCidadeCorreta(){
			$this->assertEquals('viamao', $cidade->getMunicipio());
		}

		public function testeCursoCorreto(){
			$this->assertEquals('ADS', $curso->getCurso());
		}
	}
?>
