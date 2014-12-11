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
						<?php
							include_once "classeBD.php";
							
							mysql_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
							mysql_select_db("vagasweb") or die("Banco não encontrado");
							mysql_set_charset("utf8");

							$query = mysql_query("SELECT usuarios.nome,usuarios.idade, cidades.municipio, cursos.curso
												FROM usuarios
												INNER JOIN cidades
												ON usuarios.cidade = cidades.idCidade
												INNER JOIN cursos 
												ON usuarios.curso = cursos.idCurso
												WHERE usuarios.idUsuarios=2");

							$dados = mysql_fetch_array($query);
							
							/*$dao = new classeBD();
							$dados = $dao->retornaPainelUsuario();
							*/
						?>
						<div class="panel panel-default">
						  <div class="panel-heading">Painel do Usuário</div>
						  <ul class="list-group">
						  	<li class="list-group-item"><label><?php echo 'Nome: '.$dados['nome'];?></label></li>
						  	<li class="list-group-item"><label><?php echo 'Idade:'.$dados['idade'];?></label></li>
						  	<li class="list-group-item"><label><?php echo 'Cidade:'.$dados['municipio'];?></label></li>
						  	<li class="list-group-item"><label><?php echo 'Curso:'.$dados['curso'];?></label></li>
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

						<form action="filtrarvagas.php" method="post">
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
							<input type="submit" class="btn btn-info" name="buscar" id="buscar" value="Buscar Vagas" />
							<br><br><br>
						</form>
					</div>
					</div>
					<div class="vagas">
						<?php
						
						include_once "classeBD.php";
						$bd = new FuncoesBD();
						//$bd -> conectar();
						$bd->getVagas();
						//$bd -> fecharConexao();
						
						?>
					</div>
					<a href="logout.php">
						<input type="button" name="sair" value="Logout">
					</a>
					<div class="col-md-4"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
					</div>
				</article>
			</section>
		</main>

		<footer>

		<br><br>

		</footer>
	</body>
</html>