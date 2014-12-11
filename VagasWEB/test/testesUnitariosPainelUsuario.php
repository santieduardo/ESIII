<?php

		require_once "classeBD.php";
		require_once "cidade.php";
		require_once "curso.php";
		require_once "usuarios.php";

	class testePainelUsuario extends PHPUnit_Framework_Testcase{
		
		
			
		public function testeNomeCorreto() {
			
			$dao = new FuncoesBD();
			$dados = $dao->getDadosPainel();
		
			$this->assertEquals('Eduardo Santi', $dados['nome']);
		}

		public function testeIdadeCorreta(){
			
			$dao = new FuncoesBD();
			$dados = $dao->getDadosPainel();
		
			$this->assertEquals('20', $dados['idade']);
		}

		public function testeCidadeCorreta(){
			
			$dao = new FuncoesBD();
			$dados = $dao->getDadosPainel();
		
			$this->assertEquals('Rio Grande', $dados['municipio']);
		}

		public function testeCursoCorreto(){
			
			$dao = new FuncoesBD();
			$dados = $dao->getDadosPainel();
		
			$this->assertEquals('Analise e Desenvolvimento de Sistemas', $dados['curso']);
		}
	}
?>
