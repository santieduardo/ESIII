<?php
	
require_once "vaga.php";

	class FuncoesBD {
	
		private $conexao;

		function conectar(){
			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "vagasweb") or die("Banco não encontrado");

			mysqli_set_charset($this->conexao, "utf8");
		}

		function fecharConexao(){
			mysqli_close($this->conexao);
		}
		
		function getCidades(){
			$sql = "SELECT idCidade, municipio FROM cidades ORDER BY municipio ASC";
			$array = array();
			if($resultado = mysqli_query($this->conexao, $sql)){
			
				while ($row = mysqli_fetch_array($resultado))
					array_push($array, $row);
				
				mysqli_free_result($resultado);
			}
			return $array;
		}
		
		function getCursos(){
			$sql = "SELECT idCurso, curso FROM cursos ORDER BY curso ASC";
			$array = array();
			if($resultado = mysqli_query($this->conexao, $sql)){
			
				while ($row = mysqli_fetch_array($resultado))
					array_push($array, $row);
				
				mysqli_free_result($resultado);
			}
			return $array;
		}
		
		function incluirUsuario($nome, $endereco, $email, $senha, $confirmaSenha, $idade, $curso, $cidade){
			$consulta = "SELECT email FROM usuarios WHERE email='$email'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possivel verificar o e-mail");

			if(mysqli_num_rows($resultado) !=0){
				echo "E-mail já cadastrado";
			}else if($senha != $confirmaSenha){
				echo "As senhas não conferem";
			}else{
				$inserir = "INSERT INTO usuarios (nome, endereco, email, senha, idade, curso, cidade) 
				VALUES ('$nome', '$endereco', '$email', '$senha', '$idade', '$curso', '$cidade')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir o usuário");
				//echo"Cadastro efetuado com sucesso !";
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=login.html'>";
			}
		}

		function logar($email, $senha){
			$consulta = "SELECT email, senha FROM usuarios WHERE email='$email' and senha='$senha'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possível encontrar seus dados");

			if(mysqli_num_rows($resultado) != 1){
				echo "Dados incorretos";
			}else{
				session_start();
				session_name("secreta");
				$validacao = 1;
				$_SESSION['email'] = $email;
				$_SESSION['validacao'] = $validacao;
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
			}
		}
		
		function getVagasPublicas(){
			$this->conectar();
			
			$consulta = "SELECT vagas.idVaga, vagas.nome, vagas.descricao, vagas.cidades_idCidade, vagas.turno, cidades.municipio FROM vagas
						 INNER JOIN cidades 
						 ON vagas.cidades_idCidade = cidades.idCidade WHERE vagas.publico = 1";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");
			$vagas = array();
			while($registro=mysqli_fetch_array($resultado)){
				array_push($vagas, new Vaga(
					$registro['idVaga'],
					$registro['nome'],
					$registro['descricao'],
					null,
					$registro['turno'],
					null,
					$registro['municipio']
				));
			}
			
			$this->fecharConexao();
			
			return $vagas;
		}
		
		function getVagas(){
			/*
			$consulta = "SELECT vagas.idVaga, vagas.nome, vagas.descricao, vagas.cidades_idCidade, vagas.turno, cidades.municipio FROM vagas
						 INNER JOIN cidades 
						 ON vagas.cidades_idCidade = cidades.idCidade WHERE vagas.publico = 1";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");
			*/
			
			$this->displayVagas($this->getVagasPublicas());

		}

		function filtarVagas($cidade="", $curso=""){
			$consulta = "SELECT vagas.idVaga, vagas.nome, vagas.descricao, vagas.cidades_idCidade, vagas.turno, cidades.municipio
						from vagas inner join cidades on vagas.cidades_idcidade = cidades.idcidade 
						inner join cursos on vagas.cursos_idcurso = cursos.idcurso 
						where cidades.idcidade = '$cidade' or cursos.idcurso = '$curso'";

			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");

			$this->displayVagas($resultado);
			
		}

		function displayVagas($vagas){
			foreach($vagas as $vaga){
				echo "<div class='dtl-vagas'>";	
				echo "<div class='codigo-vaga'>".$vaga->getId()."<br></div>";
				echo $vaga->getNome()."<br>";
				echo $vaga->getDescricao()."<br>";
				echo $vaga->getMunicipio()."<br>";
				echo $vaga->getTurno()."<br><br><br>";
				echo "</div>";
			}
		}
		
		function getNome($email){
			$consulta = "SELECT nome FROM usuarios WHERE email='$email'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possível encontrar seus dados");

			if(mysqli_num_rows($resultado) != 1){
				echo "Dados incorretos";
			}else{
				echo $resultado;
			}
		}
		
		function getIdUsuario($id){
			$consulta = "SELECT idUsuarios FROM usuarios";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possível encontrar seus dados");
			
			if(mysqli_num_rows($resultado) != 1){
				echo "Dados incorretos";
			}else{
				echo $resultado;
			}
		}
		function getIdVaga($id){
			$consulta = "SELECT idVaga FROM vagas";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possível encontrar seus dados");
			
			if(mysqli_num_rows($resultado) != 1){
				echo "Dados incorretos";
			}else{
				echo $resultado;
			}
		}

	}
?>