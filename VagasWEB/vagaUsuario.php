<?php
	session_start();
	$vaga = $_GET['vagaId'];
	$usuario = $_GET['usuarioId'];
	
	include "classeBD.php";
	
	$bd = new FuncoesBD();
	$bd->conectar();
	$bd->inserirVagaUsuario($vaga, $usuario);
	$bd->fecharConexao();

?>
<a href="index.php" >voltar</a>