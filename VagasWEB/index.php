<!DOCTYPE html>
<html>
	<head>
		<title>Pesquisa de Vagas de Estágios</title>
		<meta charset="utf-8"/>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="estilos/geral.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="page-header">
  				<h1>Vagas de Estágio <small>encontre uma oportunidade</small></h1>
			</div>
			<div class="menus">
				<ul class="nav nav-pills">
					<li class="active"><a href="index.html">Vagas</a></li>
  					<li><a href="cadastro.html">Cadastro</a></li>
  					<li><a href="login.html">Login</a></li>
				</ul>
			</div>
		</header>
	
		<main>
			<section id="dados">
				<article>
					<div class="row">
					<div class="col-md-2" id="dadosusuario">
						<div class="panel panel-default">
						  <div class="panel-heading">Painel do Usuário</div>
						  <ul class="list-group">
							<li class="list-group-item">Nome: </li>
							<li class="list-group-item">Idade: </li>
							<li class="list-group-item">Cidade: </li>
							<li class="list-group-item">Curso: </li>
						  </ul>
						</div>
					</div>
					<div class="col-md-4">
						<?php
						include "classeBD.php";

						$bd = new FuncoesBD();
						$bd -> conectar();
						$bd -> getVagas();
						
						?>
					</div>
					<!--<div class="col-md-4"></div> -->
					</div>
				</article>
			</section>
		</main>

		<footer>

		

		</footer>
	</body>
</html>