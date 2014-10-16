<?php

		

			$conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($conexao, "vagasweb") or die("Banco não encontrado");

			
		

?>