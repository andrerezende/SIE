<?
session_start("FINAL");

session_start("QUESTIONARIO");
session_start("SELECAO");


include_once("../classes/Inscrito.php");
include_once ("../classes/DB.php");
include_once '../../inc.path.php';
include_once '../classes/Questionario.php';

 $respostaInscrito = new Questionario();
$id = $_SESSION['idEditar'];

/* Acesso ao banco de dados */
$banco = DB::getInstance();
$conexao = $banco->ConectarDB();

$inscrito = new Inscrito();

if ($id) {
	$objinscrito = $inscrito->SelectById($conexao, $id);
} elseif ($cpf) {
	$objinscrito = $inscrito->SelectByCpf($conexao, $cpf);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title> <?php echo ($_SESSION["Gnomeprocessoseletivo"]); ?> </title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <link href="../../estilo_selecao.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="tudo">
            <div id="conteudoGeral">
                <div id="topo1">
                    <div class="topo1_imagem1">
                        <img src="../../imgs/topo1/ministerio_educacao.jpg" alt="Minist&eacute;rio de Educa&ccedil;&a&atilde;o" />
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
                    <img src="../../imgs/topo2/topo2.png" alt="Instituto Federal Baiano" />

                    <div id="topo2Texto">
                        <?php echo ($_SESSION["Gnomeprocessoseletivo"]); ?>
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
                                        <li><a href="../../index.php?sc=Boleto">2&#170; via Boleto</a></li>
                                        <li><a href="<?php echo ($_SESSION["Gpaginaconcurso"]); ?>">P&aacute;gina do Concurso</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="colunaMeio">
                        <div id="tituloPrincipal"><?php echo $scTitulo ?></div>
                        <div class="conteudoColunaMeio">

                            <h2 align="center">Question&aacute;rio Socioecon&ocirc;mico</h2>
                            <form action="respostaQuestionario.php" method="post"><br></br>
<?php

$resultado = mysql_query("SELECT * FROM pergunta,anoquestionario WHERE anoquestionario.id = pergunta.anoquestionario_id AND anoquestionario.ano = YEAR(CURDATE())");
$i=0;

foreach ($_POST as $valor){
    $i++;
}

if($i <  mysql_num_rows($resultado)){
    echo "Faltam perguntas a responder".$i." ".mysql_num_rows($resultado);
    
    
    //header('Location: ../../index.php?sc=Questionario'); 
}else{
   
    
     $respostaInscrito->gravarEditarResposta($_POST, $id);
//     $respostaInscrito->gravarCookie($id);
  
     $_SESSION['id'] = $id;
       header("Location:../inscrito/mostrar.php" );
}
?>
