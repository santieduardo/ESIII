<?php
include "classeBD.php";
$bd = new FuncoesBD();

try {
	$bd->conectar();
	$cursos = $bd->getCursos();
	$cidades = $bd->getCidades();


	if(isset($_POST) && !empty($_POST)){
		$nome = $_POST['nome'];
		$endereco = $_POST['endereco'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$confirmaSenha = $_POST['confirmasenha'];
		$idade = $_POST['idade'];
		$curso = $_POST['curso'];
		$cidade = $_POST['cidade'];

		if($senha == $confirmaSenha){
			$bd->incluirUsuario($nome, $endereco, $email, $senha, $confirmaSenha, $idade, $curso, $cidade);

		} else {
			echo "Insira as senhas iguais";
		}
	}
} catch(Exception $ex){
	die($ex->getMessage());
}
$bd->fecharConexao();

?><!DOCTYPE html>
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
					<li><a href="index.php">Vagas</a></li>
  					<li class="active"><a href="cadastro.html">Cadastro</a></li>
  					<li><a href="login.html">Login</a></li>
				</ul>
			</div>
		</header>
	
		<main>
			<section id="dados">
				<article>
					<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<form role="form" action="cadastro.php" method="post">
							<div class="form-group">
								<label for="label-nome">Nome</label>
								<input type="text" class="form-control" name="nome" id="label-nome" placeholder="Insira seu nome">
							 </div>
							 <div class="form-group">
								<label for="label-endereco">Endereço</label>
								<input type="text" class="form-control" name="endereco" id="label-endereco" placeholder="Insira seu endereço">
							 </div>
							 <div class="form-group">
								<label for="label-email">E-mail</label>
								<input type="email" class="form-control" name="email" id="label-email" placeholder="Insira seu E-mail">
							 </div>
							 <div class="form-group">
								<label for="label-senha">Senha</label>
								<input type="password" class="form-control" name="senha" id="label-senha" placeholder="Insira sua senha">
							 </div>
							 <div class="form-group">
								<label for="label-confirmasenha">Confirmar Senha</label>
								<input type="password" class="form-control" name="confirmasenha" id="label-confirmasenha" placeholder="Repita sua senha">
							 </div>
							 <div class="form-group">
								<label for="label-idade">Idade</label>
								 <select name="idade" id="label-idade" class="form-control">
								  <option>16</option>
								  <option>17</option>
								  <option>18</option>
								  <option>19</option>
								  <option>20</option>
								  <option>21</option>
								  <option>22</option>
								</select>
								</div>
								<div class="form-group">
									<label for="label-curso">Curso</label>
									<select name="curso" id="label-curso" class="form-control">
										<?php foreach($cursos as $curso){ ?>
											<option value="<?=$curso['idCurso']; ?>"><?=$curso['curso']; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="label-cidade">Cidade</label>
									<select name="cidade" id="label-cidade" class="form-control">
										<?php foreach($cidades as $cidade){ ?>
											<option value="<?=$cidade['idCidade']; ?>"><?=$cidade['municipio']; ?></option>
										<?php } ?>
									</select>
								</div>

								<a class="pull-left link-secundario" href="admin/cadastrovagas.html">Para Empresas</a>

								<button type="submit" class="btn btn-success pull-right">		
									<span class="glyphicon glyphicon-ok"></span>
									Enviar
								</button>
						</form>
					</div>
					<div class="col-md-4"></div>
					</div>
				</article>
			</section>
		</main>

		<footer>

		

		</footer>
	</body>
</html>