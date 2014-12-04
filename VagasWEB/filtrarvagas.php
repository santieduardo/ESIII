<!DOCTYPE html>
<html>
	<head>
		<title>Pesquisa de Vagas de Estágios</title>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

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
					<li class="active"><a href="index.php">Vagas</a></li>
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
					<div>
						<?php
							include_once "classeBD.php";
							mysql_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
							mysql_select_db("vagasweb") or die("Banco não encontrado");

							mysql_set_charset("utf8");
							$query = mysql_query("SELECT idCidade, municipio FROM cidades");
						?>
						<!--
						<form action="index.php" method="post">
							<h4>Filtrar Vagas</h4>
							<select name="cidade" id="label-cidade" class="form-control">
								<option value="0">-- Selecione a Cidade --</option>								
								<?php

									while ($municipio = mysql_fetch_array($query)) { ?> 																									
										<option value="<?php echo $municipio['idCidade']; ?>"><?php echo $municipio['municipio']; ?></option>
								<?php } ?>

							</select>
							<br>
							<?php
								$query = mysql_query("SELECT idCurso, curso FROM cursos");
							?>
							<select name="curso" id="label-cidade" class="form-control">
								<option value="0">-- Selecione o Curso --</option>
								<?php

									while ($curso = mysql_fetch_array($query)) { ?> 
																									
										<option value="<?php echo $curso['idCurso']; ?>"><?php echo $curso['curso']; ?></option>	
										

								<?php } ?>
							</select>
							<br>
							<input type="submit" class="btn btn-info" name="buscar" id="buscar" value="Buscar Vagas" /> -->
							<a href="index.php"
								<input type="submit" class="btn btn-info" value="Buscar Vagas" />
							Retornar</a>
							<br><br><br>
						</form>
					</div>
					</div>
					<div class="vagas">
						<?php
							if(isset($_POST)){
								$cidade = $_POST['cidade'];
								$curso = $_POST['curso'];

								include_once "classeBD.php";

								$bd = new FuncoesBD();
							
								$bd->filtrarVagas($cidade, $curso);
								
							}
						?>
					</div>
					<div class="col-md-4"></div>
					</div>
				</article>
			</section>
		</main>

		<footer>

		<br><br>

		</footer>
	</body>
</html>