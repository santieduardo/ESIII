<?php

	require_once "cidade.php";
	require_once "curso.php";
	require_once "usuario.php";
	require_once "vaga.php";

	class testeVagaDisponibilidade extends PHPUnit_Framework_Testcase{
		
		public function testeVagaDisponivel() {
				$vaga = new Vaga($idVaga=1, $nome="Desenvolvedor PHP", $descricao="Auxiliar no desenvolvimento de novas aplicações", $status=1, $turno="manhã", $publico=0, $municipio = "Porto Alegre");
				
				$status = $vaga->getStatus();
				$resposta = $vaga->checkStatus($status);
				$this->assertTrue($resposta);
				
				$vaga->setStatus(0);
				$status = $vaga->getStatus();
				$resposta = $vaga->checkStatus($status);
				$this->assertFalse($resposta);
				
				$vaga->setStatus("ola");
				$status = $vaga->getStatus();
				$resposta = $vaga->checkStatus($status);
				$this->assertFalse($resposta);
		}
	}
?>
