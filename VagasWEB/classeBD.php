<?php
	class FuncoesBD{
		static function conectar(){
			$conexao = mysql_connect("localhost", "root", "") or die ("Falha na conex�o com o Banco de Dados");
						mysql_select_db("vagasweb") or die("Banco n�o encontrado");
		}

		static function incluirUsuario($nome, $endereco, $email, $senha, $confirmaSenha, $idade, $curso, $cidade){
			$consulta = "SELECT email FROM usuarios WHERE email='$email'";
			$resultado = mysql_query($consulta) or die ("N�o foi possivel verificar o e-mail");

			if(mysql_num_rows($resultado) !=0){
				echo "E-mail j� cadastrado";
			}else if($senha != $confirmaSenha){
				echo "As senhas n�o conferem";
			}else{
				$inserir = "INSERT INTO usuarios (nome, endereco, email, senha, idade, curso, cidade) 
				VALUES ('$nome', '$endereco', '$email', '$senha', '$idade', '$curso', '$cidade')";
				$resultado = mysql_query($inserir) or die ("N�o foi poss�vel inserir o usu�rio");
				//echo"Cadastro efetuado com sucesso !";
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=login.html'>";
			}
		}

		static function logar($email, $senha){
			$consulta = "SELECT email, senha FROM usuarios WHERE email='$email' and senha='$senha'";
			$resultado = mysql_query($consulta) or die ("N�o foi poss�vel encontrar seus dados");

			if(mysql_num_rows($resultado) != 1){
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


	}
?>