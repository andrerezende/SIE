<?php
//session_start("SELECAO"); //sempre session_start antes de usar sessions

//Atribuição da página parametrizada responsável pelo cadastro do candidato 
$pagina_cadastro = $_SESSION["Gpaginacadastro"];

//Controle de término do processo seletivo
$data_inicio   = $_SESSION["Gdatainicio"];
$data_fim      = $_SESSION["Gdatatermino"];
$data_atual    = strtotime("now"); 

//var_DUMP($data_inicio, $data_fim, $data_atual);
//exit;
?>


<?php 

@$sc = $_REQUEST['sc'];
@$scTitulo;

if ($sc == "") {
	$scTitulo = "P&aacute;gina Inicial";
	$sc = "inicial/pagina_inicial.php";
} elseif ($sc == "Inicial") {
	$scTitulo = "P&aacute;gina Inicial";
	$sc = "inicial/pagina_inicial.php";
} elseif ($sc == "Inscricao") {

	$scTitulo = "Inscri&ccedil;&otilde;es";

	if ($data_inicio >= $data_atual){
                $sc = "inscricao/inscricao_nao_aberta.html";
        }elseif ($data_fim >= $data_atual){
		$sc = "inscricao/inscricao_aberta.html";
        }else{
		$sc = "inscricao/inscricao_encerrada.html";
	}

} elseif ($sc == "Requerimento") {
	$scTitulo = "Requerimento de Inscri&ccedil;&atilde;o";
	$sc = "administracao/inscrito/<?php echo($pagina_cadastro)?>";
} elseif ($sc == "Alterar") {
	$scTitulo = "Alterar / Imprimir Inscri&ccedil;&atilde;o";
	$sc = "inscricao/alterar_inscricao.php";
} elseif ($sc == "Recuperar Senha") {
	$scTitulo = "Recuperar Senha";
	$sc = "inscricao/recuperar_senha.html";
} elseif ($sc == "Recuperar") {
	$scTitulo = "Recuperar Senha";
	$sc = "inscricao/recuperar_senha.php";
} elseif ($sc == "Boleto") {
	$scTitulo = "Emiss&atilde;o de Boleto";
	$sc = "inscricao/emitir_boleto.php";
}elseif ($sc == "Questionario") {
	$scTitulo = "Question&aacute;rio Socioecon&ocirc;mico";
	$sc = "administracao/questionario/questionario.php";
}