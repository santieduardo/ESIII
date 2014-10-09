<?php
	class FuncoesBD{
<<<<<<< HEAD
		
		private $conexao;

		function conectar(){
			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "vagasweb") or die("Banco não encontrado");

			mysqli_set_charset($this->conexao, "utf8");
		}

		function fecharConexao(){
			mysqli_close($this->$conexao);
=======
		static function conectar(){
			$conexao = mysql_connect("localhost", "root", "") or die ("Falha na conex�o com o Banco de Dados");
						mysql_select_db("vagasweb") or die("Banco n�o encontrado");
>>>>>>> origin/master
		}

		static function incluirUsuario($nome, $endereco, $email, $senha, $confirmaSenha, $idade, $curso, $cidade){
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

		static function logar($email, $senha){
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
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=vagas.html'>";
			}
		}

<<<<<<< HEAD
		function getVagas(){
			$consulta = "SELECT idVaga, nome, descricao, turno FROM vagas";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Erro ao encontrar vagas");

			while($registro=mysqli_fetch_array($resultado)){
				echo "<span>Código: </span>".$registro['idVaga']."<br>";
				echo "<span>Título: </span>".($registro['nome'])."<br>";
				echo "<span>Descrição: </span>".($registro['descricao'])."<br>";
				echo "<span>Turno: </span>".$registro['turno']."<br><br><br>";
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
=======
>>>>>>> origin/master

	}
?>