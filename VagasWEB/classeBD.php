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
			$consulta = "SELECT idUsuarios, email, senha FROM usuarios WHERE email='$email' and senha='$senha'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possível encontrar seus dados");

			if(mysqli_num_rows($resultado) != 1){
				echo "Dados incorretos";
			}else{
				$registro=mysqli_fetch_array($resultado);

				session_start();
				$validacao = 1;

				$_SESSION['email'] = $email;
				$_SESSION['idUsuarios'] = $registro['idUsuarios'];
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

		function filtrarVagas($cidade="", $curso=""){
			
			$this->displayVagas($this->getVagasCurso($curso));
			
		}

		function displayVagas($vagas){
			session_start();
			foreach($vagas as $vaga){
				echo "<div class='dtl-vagas'>";	
				echo "<div class='codigo-vaga'>".$vaga->getId()."<br></div>";
				echo $vaga->getNome()."<br>";
				echo $vaga->getDescricao()."<br>";
				echo $vaga->getMunicipio()."<br>";
				echo $vaga->getTurno()."<br><br><br>";
				if(isset($_SESSION['idUsuarios'])){
					echo '<a href="vagaUsuario.php?vagaId='.$vaga->getId().'&usuarioId=',$_SESSION['idUsuarios'],'" class"btn">candidatar-se</a>';
				}
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
	
		function getVagasCurso($curso){
			$this->conectar();
			
			$consulta = "SELECT idVaga, nome, descricao, turno FROM vagas WHERE cursos_idCurso = " . mysqli_real_escape_string($this->conexao, $curso);
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");
			$vagasCurso = array();
			while($registro=mysqli_fetch_array($resultado)){
				array_push($vagasCurso, new Vaga(
					$registro['idVaga'],
					$registro['nome'],
					$registro['descricao'],
					'a',
					$registro['turno'],
					'b',
					'c'
				));
			}
			
			$this->fecharConexao();
			
			return $vagasCurso;
		}

		public function inserirVagaUsuario($vaga, $usuario) {
		
			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "vagasweb") or die("Banco não encontrado");
			mysqli_set_charset($this->conexao, "utf8");
			
			$consulta = "INSERT INTO vaga_selecionada(idVaga,idUsuario)VALUES($vaga, $usuario)";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("erro ao candidatar-se");
			if($resultado){
				return true;	
			}		
		}

		public function retornaPainelUsuario($varID){			
			mysql_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysql_select_db("vagasweb") or die("Banco não encontrado");
			mysql_set_charset("utf8");
			$query = mysql_query("SELECT usuarios.nome,usuarios.idade, cidades.municipio, cursos.curso
								FROM usuarios
								INNER JOIN cidades
								ON usuarios.cidade = cidades.idCidade
								INNER JOIN cursos 
								ON usuarios.curso = cursos.idCurso
								WHERE usuarios.idUsuarios=$varID");

			$dados = mysql_fetch_array($query);
			return $dados;
		}
		
		public function retornaIdSessao(){
			if($_SESSION['idUsuarios'] == null){
				return "";
			}else{
				return $_SESSION['idUsuarios'];
			}
		}
	
	}
?>