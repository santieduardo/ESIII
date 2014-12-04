<?php
	
require_once "vaga.php";

	class FuncoesBDX {
	
		private $conexao;

		function conectar(){
			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "vagasweb") or die("Banco não encontrado");

			mysqli_set_charset($this->conexao, "utf8");
		}

		function fecharConexao(){
			mysqli_close($this->conexao);
		}
		
		function getVagasCurso($curso){
			$this->conectar();
			
			$consulta = "SELECT idVaga, nome, descricao FROM vagas WHERE cursos_idCurso = " . mysqli_real_escape_string($this->conexao, $curso);
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");
			$vagasCurso = array();
			while($registro=mysqli_fetch_array($resultado)){
				array_push($vagasCurso, new Vagas(
					$registro['idVaga'],
					$registro['nome'],
					$registro['descricao']
				));
			}
			
			$this->fecharConexao();
			
			return $vagasCurso;
		}

	}
?>