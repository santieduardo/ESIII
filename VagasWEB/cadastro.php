<?php
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$confirmaSenha = $_POST['confirmasenha'];
	$idade = $_POST['idade'];
	$curso = $_POST['curso'];
	$cidade = $_POST['cidade'];

	if($senha == $confirmaSenha){
		include "classeBD.php";

		FuncoesBD::conectar();
		FuncoesBD::incluirUsuario($nome, $endereco, $email, $senha, $confirmaSenha, $idade, $curso, $cidade);
		FuncoesBD::fecharConexao();
	}else{
		echo "Insira as senhas iguais";
	}
	
?>