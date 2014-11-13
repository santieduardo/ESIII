<?php 


	require_once "curso.php";
	include "classeBD.php";


	class TestesUnitarios extends PHPUnit_Framework_Testcase{
	
	public function testVagasCursoGastron() {
			$vaga = 3;	
			$curso = 3;
			
			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "vagasweb") or die("Banco não encontrado");

			mysqli_set_charset($this->conexao, "utf8");
			
			$consulta = "SELECT vagas.idVaga, vagas.nome, vagas.descricao, vagas.cursos_idCurso, vagas.turno, cursos.curso
						from vagas inner join cursos on vagas.cursos_idCurso = cursos.idCurso
	
						where cursos.idCurso = '$curso' and vagas.cursos_idCurso = 'vaga'";

			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");
			
	}
		
	public function testVagasCursoADS() {
			$vaga = 1;	
			$curso = 1;
			
			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "vagasweb") or die("Banco não encontrado");

			mysqli_set_charset($this->conexao, "utf8");
			
			$consulta = "SELECT vagas.idVaga, vagas.nome, vagas.descricao, vagas.cursos_idCurso, vagas.turno, cursos.curso
						from vagas inner join cursos on vagas.cursos_idCurso = cursos.idCurso
	
						where cursos.idCurso = '$curso' and vagas.cursos_idCurso = 'vaga'";

			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");
			
	}
	
		public function testVagasCursoModa() {
			$vaga = 0;	
			$curso = 2;
			
			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "vagasweb") or die("Banco não encontrado");

			mysqli_set_charset($this->conexao, "utf8");
			
			$consulta = "SELECT vagas.descricao
						from vagas inner join cursos on vagas.cursos_idCurso = cursos.idCurso
	
						where cursos.idCurso = '$curso' and vagas.cursos_idCurso = 'vaga'";

			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");
			
			if(mysqli_num_rows($resultado) == 0){
				echo "Dados incorretos";
			}else{
				echo $resultado;
			}
			
			//$this->assertEquals("Chefe de Cozinha", $resultado['nome']);
	}
}

	
?>