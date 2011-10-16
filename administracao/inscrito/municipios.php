<?php session_start("SELECAO"); ?>
<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
/* Acesso ao banco de dados */

include ("../classes/DB.php");
include ("../classes/UnidadeFederativa.php");

$banco   = DB::getInstance();
$conexao = $banco->ConectarDB();

$uf = addslashes($_POST['uf']);

$sql = "SELECT * FROM municipio WHERE unidade_federativa_id = '$uf' ORDER BY nome ASC";
$qr = $banco->ExecutaQueryGenerica($sql);

if (mysql_num_rows($qr) == 0) {
	echo '<option value="0">'.htmlentities('Nao existem cidades nesse Estado').'</option>';
} else {
	while($ln = mysql_fetch_assoc($qr)){
		echo '<option value="'.$ln['id'].'">'.strtoupper($ln['nome']).'</option>';
	}
}
?>
