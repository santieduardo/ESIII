<?php
	if(isset($_POST)){
		$cidade = $_POST['cidade'];
		$curso = $_POST['curso'];

		include "classeBD.php";

		$bd = new FuncoesBD();
		$bd->conectar();
		$bd->filtarVagas($cidade, $curso);
		$bd->fecharConexao();
	}
?>