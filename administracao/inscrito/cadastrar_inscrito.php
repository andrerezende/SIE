<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="../../estilo_selecao.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include_once ("../classes/DB.php");
include_once ("../classes/Inscrito.php");

$nome=null;
$endereco=null;
$bairro=null;
$cep=null;
$municipio=null;
$uf=null;
$email=null;
$cpf=null;
$rg=null;
$especial=null;
$senha=null;
$nacionalidade=null;
$telefone=null;
$telefone2=null;
$celular=null;
$datanascimento=null;
$sexo=null;
$estadocivil=null;
$orgaoexpedidor=null;
$uf_org_exp=null;
$dataexpedicao=null;
$especial_descricao=null;
$responsavel=null;
$isencao=null;
$declaracao=null;
$localprova=null;
$numinscricao=null;
$especial_prova=null;
$especial_prova_descricao=null;
$vaga_especial=null;
$vaga_rede_publica=null;
$vaga_rural=null;
$campus=null;
$data_cadastro=null;
$ultima_alteracao=null;
$curso=null;
$nis=null;
$nota=null;


//$i=1;
foreach ($_POST as $key => $valor) {
	$$key = addslashes(strtoupper($valor));
//        echo($i++." - ".$key."<br />");
}

//exit;

/*Acesso ao banco de dados */
$banco    = DB::getInstance();
$conexao  = $banco->ConectarDB();

$resultado = $banco->ExecutaQueryGenerica('SELECT MAX(id) +1 AS novo_id FROM inscrito');
$resultado = mysql_fetch_assoc($resultado);
$id = $resultado['novo_id'];
$numinscricao = substr($cpf, 0,4).$id;

/*Verificar se possui cadastrado na base*/
//$inscrito = new Inscrito($nome, $endereco, $bairro, $cep, $municipio, $uf,
//			$email, $cpf, $rg, $especial, $senha, $nacionalidade, $telefone, null, $celular, $datanascimento,
//			$sexo, $estadocivil, $orgaoexpedidor, $uf_org_exp, $dataexpedicao, $especial_descricao, $responsavel,
//			$isencao, $declaracao, $localprova, $numinscricao, $especial_prova, $especial_prova_descricao,
//			$vaga_especial, $vaga_rede_publica, $vaga_rural, $campus, null, null, null, $curso, $nis);





$inscrito = new Inscrito();
//$inscrito->setcpf($cpf);
//echo($inscrito->getcpf());
//exit;

$inscrito->setnome($nome);
$inscrito->setendereco($endereco);
$inscrito->setbairro($bairro);
$inscrito->setcep($cep);
$inscrito->setcidade($municipio);
$inscrito->setestado($uf);
$inscrito->setemail($email);
$inscrito->setcpf($cpf);
$inscrito->setrg($rg);
$inscrito->setespecial($especial);
$inscrito->setsenha($senha);
$inscrito->setnacionalidade($nacionalidade);
$inscrito->settelefone($telefone);
$inscrito->settelefone2($telefone2);
$inscrito->setcelular($celular);
$inscrito->setdatanascimento($datanascimento);
$inscrito->setsexo($sexo);
$inscrito->setestadocivil($estadocivil);
$inscrito->setorgaoexpedidor($orgaoexpedidor);
$inscrito->setuf($uf_org_exp);
$inscrito->setdataexpedicao($dataexpedicao);
$inscrito->setespecialdescricao($especial_descricao);
$inscrito->setresponsavel($responsavel);
$inscrito->setisencao($isencao);
$inscrito->setdeclaracao($declaracao);
$inscrito->setlocalprova($localprova);
$inscrito->setnuminscricao($numinscricao);
$inscrito->setespecialprova($especial_prova);
$inscrito->setespecialprovadescricao($especial_prova_descricao);
$inscrito->setvagaespecial($vaga_especial);
$inscrito->setvagaredepublica($vaga_rede_publica);
$inscrito->setvagarural($vaga_rural);
$inscrito->setcampus($campus);
$inscrito->setdatacadastro($data_cadastro);
$inscrito->setultimaalteracao($ultima_alteracao);
$inscrito->setcurso($curso);
$inscrito->setnis($nis);
$inscrito->setnota($nota);

$existe = $inscrito->Existe($conexao);

if ($existe) {
	echo("<div align='center'");
		echo("<img src="."../../imgs/topo2/topo_formulario.png"." alt="."Instituto Federal Baiano"." />");
		echo("<h2>Requerimento de Inscri&ccedil;&atilde;o</h2>");
		echo("<table border='0'>");
		echo("	<tr>");
		echo("		<td><div align='center'>Problemas ao preencher o requerimento de inscri&ccedil;&atilde;o. O CPF informado (<b>".$cpf."</b>) encontra-se associado a outro candidato.<br/>Caso ocorra algum problema, favor entrar em contato (P&aacute;gina Inicial / Contato).</div></td>");
		echo("	</tr>");
		echo("	<tr>");
		echo("		<td><br /><div align='center'><a href="."javascript:window.history.go(-1)".">Voltar</a>"." - "."<a href="."../../index.php".">P&aacute;gina Inicial</a></div></td>");
		echo("	</tr>");
		echo("</table>");
	echo("</div>");
} else {
	$banco->startTransaction();
	$id_inscrito = $inscrito->Inserir($conexao);
	if ($id_inscrito > -1) {
		$banco->commitTransaction();
?>

	<form id="frmo" name="frm" action="mostrar.php" method="post">
		<input type="hidden" name="cpf" value="<?php echo($cpf);?>" />
		<input type="hidden" name="pwd" value="<?php echo($senha);?>" />
		<input type="hidden" name="mensagem" value="0" />
	</form>

	<script type="text/javascript">
		document.forms['frm'].submit()		
	</script>

<?php
	} else {
		$banco->rollbackTransaction();
		echo("<div align='center'");
		echo("<img src="."../../imgs/topo2/topo_formulario.png"." alt="."Instituto Federal Baiano"." />");
		echo("<h2>Ficha de Inscri&ccedil;&atilde;o</h2>");
		echo("<table border='0'>");
		echo("	<tr>");
		echo("		<td><br /><div align='center'><a href='#'>Problemas ao efetuar inscri&ccedil;&atilde;o</div></td>");
		echo("	</tr>");
		echo("</table>");
		echo("</div>");

	}
}
$banco->DesconectarDB($conexao);
?>
</body>
</html>
