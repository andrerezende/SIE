<?php 

session_start("SELECAO"); 
ini_set('display_errors', true);
require_once '../classes/DB.php';
require_once '../classes/Inscrito.php';

$cpf = addslashes($_POST['cpf']);
/*Acesso ao banco de dados */
$banco = DB::getInstance();
$conexao  = $banco->ConectarDB();

$inscrito = new Inscrito();
$objinscrito = $inscrito->SelectByCpf($conexao, $cpf);

if (empty($objinscrito[0])) {
	$_SESSION['flashMensagem'] = 'CPF n&atilde;o encontrado na nossa base de dados.';
	header("Location:" . $_SERVER['HTTP_REFERER']);
	exit;	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo ($_SESSION["Gnomeprocessoseletivo"]);?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="../../estilo_selecao.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../js/jquery-1.3.2.min.js"></script>
</head>
<body>
	<div id="tudo">
		<div id="conteudoGeral">
			<div id="topo1">
				<div class="topo1_imagem1">
					<img src="../../imgs/topo1/ministerio_educacao.jpg" alt="Minist&eacute;rio de Educa&ccedil;&a&atilde;o" />
				</div>

				<div id="topo1_destaqueGoveno">
					<form action="">
						<select name="destaque_governo" id="destaque_governo" onchange="if( this.value != '0' )window.open(this.value);">
							<option value="0">Destaques do Governo</option>
							<option value="http://www.brasil.gov.br">Portal de Servi&ccedil;os do Governo</option>
							<option value="http://www.radiobras.gov.br/">Portal da Ag&ecirc;ncia de Not&iacute;cias</option>
							<option value="http://www.brasil.gov.br/noticias/em_questao">Em Quest&atilde;o</option>
							<option value="http://www.fomezero.gov.br/">Programa Fome Zero</option>
						</select>
					</form>
				</div>
			</div>
			<div id="topo2">
				<img src="../../imgs/topo2/topo2.png" alt="Instituto Federal Baiano" />
				
				<div id="topo2Texto">
					<?php echo ($_SESSION["Gnomeprocessoseletivo"]);?>
				</div>
				
			</div>						
			<div id="meioGeral">
				<div id="colunaEsquerda">
					<div class="conteudoColunaEsquerda">
						<div id="menuEsquerdo">
							<div id="menu2">
								<ul class="menu">
									<li><a href="../../index.php?sc=Inicial">P&aacute;gina Inicial</a></li>
									<li><a href="../../index.php?sc=Inscricao">Nova Inscri&ccedil;&atilde;o</a></li>
									<li><a href="../../index.php?sc=Alterar">Alterar / Imprimir Inscri&ccedil;&atilde;o</a></li>
									<li><a href="../../index.php?sc=Recuperar">Recuperar Senha</a></li>
									<li><a href="<?php echo ($_SESSION["Gpaginaconcurso"]);?>">P&aacute;gina do Concurso</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div id="colunaMeio">
					<div id="tituloPrincipal">Recuperar Senha</div>
					<div class="conteudoColunaMeio">
<?php
if (count($objinscrito[0]) == 0) :
	echo("<p class='textoDestaque2'>Inscri&ccedil;&atilde;o n&atilde;o encontrada na base de dados.</p>");
else :
	$email_inscrito = strtolower($objinscrito[0]->getemail());
	$nome_inscrito 	= $objinscrito[0]->getnome();
	$senha_inscrito	= $objinscrito[0]->getsenha();
	$servidorSMTP 	= 'smtp.ifbaiano.edu.br';
	//$usuarioSMTP 	= $_SESSION["Gusrmail"];
	//$senhaSMTP 	= $_SESSION["Gpwdmail"];

	$retorno = false;
	$destinatario = $email_inscrito;
	$assunto = "Recuperação de senha - Processo Seletivo";
	$corpo = "Prezado Candidato,\n\nFoi solicitada a recuperação de sua senha no Sistema de Inscrição Eletrônica.\nOs dados do candidato são:\n\nNome: ".$nome_inscrito."\nSenha: ".$senha_inscrito."\n\n\nEste e-mail foi gerado automaticamente pelo sistema, favor não o responda.\n\nAtenciosamente,\nComissão do Processo Seletivo\nInstituto Federal Baiano.";
	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
	$headers .= "From:".$usuarioSMTP."\r\n";
	$headers .= "Return-Path:".$usuarioSMTP."\r\n";
	$enviar = mail($destinatario,$assunto,$corpo,$headers);

	if ($enviar) {
		echo("<p class='textoDestaque2'>A senha foi enviada ao seu email.</p>");
	} else {
		echo("<p class='textoDestaque2'>Problemas ao enviar o email.</p>");
	}
	
endif;
?>
					</div>
				</div>
				<div id="rodape">
					<div id="conteudoRodape">
						<p><b>Instituto Federal de Educa&ccedil;&atilde;o, Ci&ecirc;ncia e Tecnologia Baiano</b><br />
							Reitoria &ndash; Rua do Rouxinol, 115 - Imbu&iacute;<br />
							Salvador &ndash; Bahia &ndash; CEP: 41.720&ndash;052<br />
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
