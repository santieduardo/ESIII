<?php
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	include "classeBD.php";
	
	$bd = new FuncoesBD();
	$bd->conectar();
	$bd->logar($email, $senha);
	$bd->fecharConexao();

	//FuncoesBD::conectar();
	//FuncoesBD::logar($email, $senha);
	//FuncoesBD::fecharConexao();
?>