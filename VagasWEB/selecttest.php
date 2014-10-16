<?php
#chama o arquivo de configuração com o banco
//require 'conn.php';
#seleciona os dados da tabela produto
$conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($conexao, "vagasweb") or die("Banco não encontrado");
$query = mysql_query("SELECT * FROM cidades");
# abaixo montamos um formulário em html
# e preenchemos o select com dados
?>
<form name="produto" method="post" action="">
 <label for="">Selecione um produto</label>
 <select>
 <option>Selecione...</option>
 
 <?php while($prod = mysql_fetch_array($query)) { ?>
 <option value="<?php echo $prod['idCidade'] ?>"><?php echo $prod['municipio'] ?></option>
 <?php } ?>
 
 </select>
</form>
