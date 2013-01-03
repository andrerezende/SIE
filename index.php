<?php 
//Variáveis de sessão para parametrização - Serão extraídas do Banco de Dados

session_start("SELECAO");
$_SESSION["Gnomeprocessoseletivo"]      = "Processo Seletivo para Alunos - 2013";
$_SESSION["Gdatainicio"]                = mktime(0, 0, 0, 10, 9, 2012); // 0,0,0, M/D/Y
$_SESSION["Gdatatermino"]               = mktime(18, 1, 0, 11, 30, 2013);
$_SESSION["Gdataterminoisencao"]        = mktime(18, 1, 0, 10, 23, 2012);

$_SESSION["Gvalorboleto"] = "10,00";
$_SESSION["Gconvenio"] = "2203078";
$_SESSION["Gedital"] = "162";
$_SESSION["Gano"] = "2012";
$_SESSION["Gpaginaconcurso"] = "http://www.ifbaiano.edu.br/concursos/portal/discente2013/";
$_SESSION["Gusrmail"] = "estudante@concursos.ifbaiano.edu.br";
$_SESSION["Gpwdmail"] = "";

//ATENÇÃO: Lembrar de dar permissão de escrita na pasta do servidor WEB
$_SESSION["Gcaminhoupload"]= "http://localhost/2013_discente/administracao/pagamentos/retorno/";

//Atribuído da página parametrizada responsável pelo cadastro,edição e impressão do candidato 
$_SESSION["Gpaginaeditar"]	="ead-editar.php";		   
$_SESSION["Gpaginaimpressao"]	="ead-impressao.php";
$_SESSION["Gpaginacadastro"]	="ead-cadastro.php";


?>

<?php include_once 'inc.path.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo ($_SESSION["Gnomeprocessoseletivo"]);?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="estilo_selecao.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="tudo">
		<div id="conteudoGeral">
			<div id="topo1">
				<div class="topo1_imagem1">
					<img src="imgs/topo1/ministerio_educacao.jpg" alt="Minist&eacute;rio de Educa&ccedil;&a&atilde;o" />
				</div>
				<!--<div class="topo1_imagem2">
					<img src="imgs/topo1/brasil_um_pais_para_todos.jpg" alt="Brasil, um País para Todos" />
				</div>-->

				<div id="topo1_destaqueGoveno">
					<form action="">
						<select name="destaque_governo" id="destaque_governo" onchange="if (this.value != '0')window.open(this.value);">
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
				<img src="imgs/topo2/topo2.png" alt="Instituto Federal Baiano" />
				
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
									<li><a href="index.php?sc=Inicial">P&aacute;gina Inicial</a></li>
									<li><a href="index.php?sc=Inscricao">Nova Inscri&ccedil;&atilde;o</a></li>
									<li><a href="index.php?sc=Alterar">Alterar / Imprimir Inscri&ccedil;&atilde;o</a></li>
									<li><a href="index.php?sc=Recuperar">Recuperar Senha</a></li>
                                                                        <li><a href="index.php?sc=Boleto">2&#170; via Boleto</a></li>
									<li><a href="<?php echo ($_SESSION["Gpaginaconcurso"]);?>">P&aacute;gina do Concurso</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div id="colunaMeio">
					<div id="tituloPrincipal"><?php  echo $scTitulo ?></div>
					<div class="conteudoColunaMeio">
						<?php
						if ((isset($sc)) and (file_exists($sc))) {
							include($sc);
						} else {
							echo "<p><strong>A p&aacute;gina solicitada n&atilde;o existe ou as inscri&ccedil;&otilde; est&atilde.o ecerradas!</strong></p><p><a href=\"javascript:history.back();\">Voltar</a></p>";
						}
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
=======
<?php 
//Variáveis de sessão para parametrização - Serão extraídas do Banco de Dados

session_start("SELECAO");
$_SESSION["Gnomeprocessoseletivo"]      = "Processo Seletivo para Alunos - 2013";
$_SESSION["Gdatainicio"]                = mktime(0, 0, 0, 11, 12, 2012); // 0,0,0, M/D/Y
$_SESSION["Gdatatermino"]               = mktime(18, 1, 0, 11, 30, 2012);
$_SESSION["Gdataterminoisencao"]        = mktime(18, 1, 0, 10, 1, 2012);

$_SESSION["Gvalorboleto"] = "10,00";
$_SESSION["Gconvenio"] = "2203078";
$_SESSION["Gedital"] = "162";
$_SESSION["Gano"] = "2012";
$_SESSION["Gpaginaconcurso"] = "http://www.ifbaiano.edu.br/concursos/portal/discente2013/";
$_SESSION["Gusrmail"] = "devteste@ifbaiano.edu.br";
$_SESSION["Gpwdmail"] = "dev123*@";

//ATENÇÃO: Lembrar de dar permissão de escrita na pasta do servidor WEB
$_SESSION["Gcaminhoupload"]= "E:/home/ifbaiano/Web/concursos/aplicacoes/2013_discente/administracao/pagamento/";

//Atribuído da página parametrizada responsável pelo cadastro,edição e impressão do candidato 
$_SESSION["Gpaginaeditar"]	="alu-editar.php";		   
$_SESSION["Gpaginaimpressao"]	="alu-impressao.php";
$_SESSION["Gpaginacadastro"]	="alu-cadastro.php";


?>

<?php include_once 'inc.path.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> <?php echo ($_SESSION["Gnomeprocessoseletivo"]);?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link href="estilo_selecao.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="tudo">
		<div id="conteudoGeral">
			<div id="topo1">
				<div class="topo1_imagem1">
					<img src="imgs/topo1/ministerio_educacao.jpg" alt="Minist&eacute;rio de Educa&ccedil;&a&atilde;o" />
				</div>
				<!--<div class="topo1_imagem2">
					<img src="imgs/topo1/brasil_um_pais_para_todos.jpg" alt="Brasil, um País para Todos" />
				</div>-->

				<div id="topo1_destaqueGoveno">
					<form action="">
						<select name="destaque_governo" id="destaque_governo" onchange="if (this.value != '0')window.open(this.value);">
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
				<img src="imgs/topo2/topo2.png" alt="Instituto Federal Baiano" />
				
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
									<li><a href="index.php?sc=Inicial">P&aacute;gina Inicial</a></li>
									<li><a href="index.php?sc=Inscricao">Nova Inscri&ccedil;&atilde;o</a></li>
									<li><a href="index.php?sc=Alterar">Alterar / Imprimir Inscri&ccedil;&atilde;o</a></li>
									<li><a href="index.php?sc=Recuperar">Recuperar Senha</a></li>
                                                                        <li><a href="index.php?sc=Boleto">2&#170; via Boleto</a></li>
									<li><a href="<?php echo ($_SESSION["Gpaginaconcurso"]);?>">P&aacute;gina do Concurso</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div id="colunaMeio">
					<div id="tituloPrincipal"><?php  echo $scTitulo ?></div>
					<div class="conteudoColunaMeio">
						<?php
						if ((isset($sc)) and (file_exists($sc))) {
							include($sc);
						} else {
							echo "<p><strong>A p&aacute;gina solicitada n&atilde;o existe ou as inscri&ccedil;&otilde; est&atilde.o ecerradas!</strong></p><p><a href=\"javascript:history.back();\">Voltar</a></p>";
						}
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
>>>>>>> branch 'master' of https://github.com/andrerezende/SIE.git
