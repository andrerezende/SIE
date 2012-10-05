<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="../../estilo_selecao.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php session_start("SELECAO"); ?>
    
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
$mediapor1=null;
$mediapor2=null;
$mediapor3=null;
$mediamat1=null;
$mediamat2=null;
$mediamat3=null;
$banco    = DB::getInstance();
$conexao  = $banco->ConectarDB();
//var_dump($_POST);
$curso2 = $_POST['curso'];
$campus2 = $_POST['campus'];


$sql = "SELECT nome,campus FROM curso as c where cod_curso = $curso2 and campus = $campus2 and nome LIKE '%PROEJA%'";
$result = mysql_query($sql);
$rows = mysql_num_rows($result);
if($rows>0){
    
    $_POST['localprova'] = $_POST['campus'];
   $novolocalprova = $_POST['campus'];
 
}
    
   
foreach ($_POST as $key => $valor) {
	$$key = addslashes(strtoupper($valor));
}

/*Acesso ao banco de dados */


$resultado = $banco->ExecutaQueryGenerica('SELECT (COALESCE(MAX(id), 0) + 1) AS novo_id FROM inscrito');
$resultado = mysql_fetch_assoc($resultado);
$id = $resultado['novo_id'];
//Geração do número de inscrição: [ano-edital + número-edital + quatro-digitos-cpf + sequencial]
//ANTES: $numinscricao = substr($cpf, 0,2).$id;
$edital= $_SESSION["Gedital"];
$ano   = $_SESSION["Gano"];
$numinscricao = $ano.$edital.substr($cpf, 0,4).$id;

$inscrito = new Inscrito();

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
if($novolocalprova!=null){
    $inscrito->setlocalprova($novolocalprova);
}else{
    $inscrito->setlocalprova($localprova);
}

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

//implementação para atender ao processo seletivo de discente EAD
$inscrito->setmediapor1($mediapor1);
$inscrito->setmediapor2($mediapor2);
$inscrito->setmediapor3($mediapor3);
$inscrito->setmediamat1($mediamat1);
$inscrito->setmediamat2($mediamat2);
$inscrito->setmediamat3($mediamat3);

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
