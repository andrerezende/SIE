<?php
session_start("SELECAO");
session_start("QUESTIONARIO");
session_start();

//Atribuiçãoo da página parametrizada responsável pelo edição e impressão do cadastro do candidato 
$pagina_editar = $_SESSION["Gpaginaeditar"];
$pagina_impressao = $_SESSION["Gpaginaimpressao"];

//Parametrização para evitar após o término da inscrição que exista alteração de dados
$data_fim = $_SESSION["Gdatatermino"];
$data_atual = strtotime("now");
?>
<script>function msgQuestionario(endereco){
    if(endereco == "../questionario/questionario.php"){
        alert("Por favor. Preencha o questionario socioeconomico"); 
    }
             
          
          
}
</script>
<?php
//session_start();
require_once("../classes/DB.php");
require_once("../classes/Inscrito.php");
require_once("../classes/Campus.php");
require_once("../classes/Localprova.php");
require_once("../classes/Questionario.php");
$questionario = new Questionario();


$cpf = addslashes($_POST['cpf']);
$senha = addslashes($_POST['pwd']);
$mensagem = addslashes($_POST['mensagem']);


/* Acesso ao banco de dados */
$banco = DB::getInstance();
$conexao = $banco->ConectarDB();




//$inscrito = new Inscrito(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null); //36
$inscrito = new Inscrito();


if ($_POST['cpf'] != null) {

    $id = $questionario->getId($_POST['cpf']);
    $_SESSION['id'] = $id;
    
} else if ($cpf) {

    $id = $questionario->getId($cpf);
    $_SESSION['id'] = $id;
    
} else {
    $id = $_SESSION['id'];

    
}

if (!$cpf) {
    $objinscrito = $inscrito->SelectById($conexao, $id);
} else {
    $objinscrito = $inscrito->SelectByPrimaryKey($conexao, $cpf, $senha);
}


if (empty($objinscrito[0])) {


    $_SESSION['flashMensagem'] = 'Inscri&ccedil;&atilde;o n&atilde;o cadastrada na base de dados ou CPF e Senha n&atilde;o conferem.';
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
$paginaQuestionario = array("pagina_editar" => $pagina_editar, "pagina_impressao" => $pagina_impressao, "boleto" => "../boleto/boleto_bb.php", "questionario" => "../questionario/questionario_editar.php");

//var_dump($paginaQuestionario["pagina_editar"]);exit;
if ($questionario->verificaQuestionario2($id) == false) {

    $paginaQuestionario = array("pagina_editar" => $pagina_editar, "pagina_impressao" => "../questionario/questionario.php", "boleto" => "../questionario/questionario.php", "questionario" => "../questionario/questionario.php");
    $_SESSION['id'] = $id;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title> <?php echo ($_SESSION["Gnomeprocessoseletivo"]); ?> </title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <link href="../../estilo_selecao.css" rel="stylesheet" type="text/css" />
    </head>



    <body >
        <div align="center">
            <img src="../../imgs/topo2/topo_formulario.png" alt="Instituto Federal Baiano" />
            <div id="topoFormTexto">
<?php echo ($_SESSION["Gnomeprocessoseletivo"]); ?>
            </div>
            <p>
                <div id="tituloPrincipal" align="center" style="width: 820px">Op&ccedil;&otilde;es do Inscrito</div>
                <div class="conteudoColunaMeio" style="width: 820px; line-height: 25px">
<?php if (isset($mensagem) && ($mensagem == "0")) { ?>
                        <div aligne='center'>Ficha de Inscri&ccedil;&atilde;o preenchida com  sucesso. N&uacute;mero do CPF (<b><?php echo ($cpf); ?></b>) <br />
                        </div>
                    <?php } ?>
                    <?php if ($data_fim >= $data_atual) { ?>
                        <div align="center">

                            <form id="frmeditar" name="frmeditar" action="<?php echo($paginaQuestionario["pagina_editar"]) ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo($id); ?>" />
                                <a href="#" onclick="msgQuestionario('<?php echo($paginaQuestionario['pagina_editar']) ?>'); document.forms['frmeditar'].submit(); ">Editar Inscri&ccedil;&atilde;o</a>
                            </form>
                        </div>
<?php } ?>                    
                    <div align="center">
                        <form id="frmimpressao" name="frmimpressao" action="<?php echo($paginaQuestionario["pagina_impressao"]) ?>" method="post">
                            <input type="hidden" name="cpf" value="<?php echo($cpf); ?>" />
                            <a href="#" onclick="document.forms['frmimpressao'].submit();msgQuestionario('<?php echo($paginaQuestionario["pagina_impressao"]) ?>');">Imprimir Ficha de Inscri&ccedil;&atilde;o</a>
                        </form>
                    </div>
                    <div align="center">
                        <form id="frmboleto" name="frmboleto" action="<? echo($paginaQuestionario["boleto"]); ?>" method="post">
                            <input type="hidden" name="id" value="<? echo($id); ?>" />
                            <a href="#" onclick="document.forms['frmboleto'].submit();msgQuestionario('<?php echo($paginaQuestionario["pagina_impressao"]) ?>');">Imprimir Boleto para Pagamento</a>
                        </form>
                    </div>



                    <div align="center">
                        <form id="questionario" name="questionario" action="<? echo $paginaQuestionario["questionario"]; ?>" method="post">
                            <input type="hidden" name="id" value="<? echo($id); ?>" />
                            <a href="#" onclick="document.forms['questionario'].submit();">Question&aacute;rio Socioecon&ocirc;mico</a>
                        </form>
                    </div>


                </div>
        </div>
        
        <div align="center">
            <br />
            <a href="../../fechar_sistema.php" >Sair</a>
        </div>
    </body>
</html>
