<?php session_start("SELECAO"); 

$pagina_editar	      = $_SESSION["Gpaginaeditar"];		   
$pagina_impressao     = $_SESSION["Gpaginaimpressao"];

?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo ($_SESSION["Gnomeprocessoseletivo"]);?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="../../estilo_selecao.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php

include_once ("../classes/DB.php");
include_once ("../classes/Inscrito.php");
include_once ("../classes/Curso.php");
include_once ("../classes/Campus.php");
include_once ("../classes/Localprova.php");
include_once ("../classes/UnidadeFederativa.php");
include_once ("../classes/Municipio.php");
include_once ("../classes/Questionario.php");

$questionario = new Questionario();

//if($_POST['cpf']!=null){
//    $id = $questionario->getId($_POST['cpf']);
//}

foreach ($_POST as $key => $valor) {
	$$key = addslashes(strtoupper($valor));
}


/*Acesso ao banco de dados */
$banco    = DB::getInstance();
$conexao  = $banco->ConectarDB();

/*Verificar se possui cadastrado na base*/
$banco->startTransaction();

$inscrito = new Inscrito();

$inscrito->setid($id);
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
//$inscrito->settelefone2($telefone2);
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
//$inscrito->setdatacadastro($data_cadastro);
//$inscrito->setultimaalteracao($ultima_alteracao);
$inscrito->setcurso($curso);
$inscrito->setnis($nis);
//$inscrito->setnota($nota);

//implementação para atender ao processo seletivo de discente EAD
$inscrito->setmediapor1($mediapor1);
$inscrito->setmediapor2($mediapor2);
$inscrito->setmediapor3($mediapor3);
$inscrito->setmediamat1($mediamat1);
$inscrito->setmediamat2($mediamat2);
$inscrito->setmediamat3($mediamat3);

$resultado = $inscrito->atualizar($conexao);

if ($resultado) {
	$banco->commitTransaction();
?>
	<div align="center">
		<img src="../../imgs/topo2/topo_formulario.png" alt="Instituto Federal Baiano" />
		<div id="topoFormTexto">
			<?php echo ($_SESSION["Gnomeprocessoseletivo"]);?>
		</div>
		<tr align='center'>
		<br>
		<td><div aligne='center'>Ficha de Inscri&ccedil;&atilde;o alterada com sucesso.<br />
			Utilize o n&uacute;mero do CPF (<b><?php echo ($cpf);?></b>) e Senha informados para imprimir a ficha de inscri&ccedil;&atilde;o <br />
			na P&aacute;gina Inicial / Inscri&ccedil;&otilde;es.</div></td>
		</tr>
		<p>
		<div id="tituloPrincipal" align="center" style="width: 820px">Op&ccedil;&otilde;es do Inscrito</div>
		<div class="conteudoColunaMeio" style="width: 820px; line-height: 25px">
			<div align="center">
				<form id="frmeditar" name="frmeditar" action="<?php echo($pagina_editar)?>" method="post">
					<input type="hidden" name="id" value="<?php echo($id);?>" />
					<a href="#" onclick="document.forms['frmeditar'].submit();">Editar Inscri&ccedil;&atilde;o</a>
				</form>
			</div>

		<div align="center">
			<form id="frmimpressao" name="frmimpressao" action="<?php echo($pagina_impressao)?>" method="post">
				<input type="hidden" name="cpf" value="<?php echo($cpf);?>" />
				<a href="#" onclick="document.forms['frmimpressao'].submit();">Imprimir Ficha de Inscri&ccedil;&atilde;o</a>
			</form>
		</div>
		<div align="center">
			<form id="frmboleto" name="frmboleto" action="../boleto/boleto_bb.php" method="post">
				<input type="hidden" name="id" value="<?echo($id);?>" />
				<a href="#" onclick="document.forms['frmboleto'].submit();">Imprimir Boleto para Pagamento</a>
			</form>
		</div>
                            <?  if ($questionario->verificaQuestionario2($id) == false) {?>
                      

                        <div align="center">
                            <form id="questionario" name="questionario" action="../questionario/questionario.php" method="post">
                                <input type="hidden" name="id" value="<? echo($id); ?>" />
                                <a href="#" onclick="document.forms['questionario'].submit();">Question&aacute;rio Socioecon&ocirc;mico</a>
                            </form>
                        </div>
                       
<?}else{
    ?><div align="center">
                            <form id="questionario" name="questionario" action="../questionario/questionario_editar.php" method="post">
                                <input type="hidden" name="id" value="<? echo($id); ?>" />
                                <a href="#" onclick="document.forms['questionario'].submit();">Question&aacute;rio Socioecon&ocirc;mico</a>
                            </form>
                        </div><?}?>
		<div align="center">
			<br />
                        <a href="../../fechar_sistema.php">Sair</a>
		</div>

	</div>
<?php 
}else {
	$banco->rollbackTransaction();
	echo("<div align=".'"'."center".'"'.">");
		echo("<img src=".'"'."../../imgs/topo2/topo_formulario.png".'"'." alt=".'"'."Instituto Federal Baiano".'"'." />");
		echo("<table border='0'>");
		echo("	<tr>");
		echo("		<td><div>Problemas ao alterar a inscri&ccedil;&atilde;o.</div></td>");
		echo("	</tr>");
		echo("	<tr>");
		echo("		<td align=".'"'."center".'"'.">"."<br /><div><a href="."javascript:window.history.go(-1)".">Voltar</a>"." - "."<a href="."../../index.php".">P&aacute;gina Inicial</a></div></td>");
		echo("	</tr>");
		echo("</table>");
	echo("</div>");
}

function redireciona($link){
    if ($link==-1){
        echo" <script>history.go(-1);</script>";
    }else{
        echo" <script>document.location.href='$link'</script>";
    }
}
$link = 'mostrar.php';
redireciona($link);

?>
</body>
</html>
