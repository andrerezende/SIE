<?php
session_start();
session_start("SELECAO");
session_start("QUESTIONARIO");

include_once ("../classes/DB.php");
include_once("../classes/Questionario.php");
include_once("../classes/Inscrito.php");
$banco = DB::getInstance();
$conexao = $banco->ConectarDB();
//Trecho que automatiza o encerramento do Período de Isento
$data_fim_isencao = $_SESSION["Gdataterminoisencao"];

//Trecho que automatiza o encerramento do Processo seletivo em vigência
$data_incio = $_SESSION["Gdatainicio"];
$data_fim = $_SESSION["Gdatatermino"];
$data_atual = $_SESSION["Gdatainicio"]; //strtotime("now");
$questionario = new Questionario();
if ($data_fim < $data_atual) {
    header("Location:../../index.php?sc=Inscricao");
}

$sql = "SELECT * FROM pergunta,anoquestionario WHERE anoquestionario.id = pergunta.anoquestionario_id AND anoquestionario.ano = YEAR(CURDATE())";
$resultado3 = mysql_query($sql, $conexao);

foreach ($_POST as $key => $valor) {
    $$key = addslashes(strtoupper($valor));
}
$id = $_SESSION['id'];
$cpf = null;
$inscrito = new Inscrito();
$_SESSION['idEditar'] = $id;
if ($id) {
    $objinscrito = $inscrito->SelectById($conexao, $id);
} elseif ($cpf) {
    $objinscrito = $inscrito->SelectByCpf($conexao, $cpf);
}
;
if (empty($objinscrito[0])) {
    $_SESSION['flashMensagem'] = 'CPF n&atilde;o encontrado na nossa base de dados.';
    header("Location:" . $_SERVER['HTTP_REFERER']);
    exit;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <link rel=”stylesheet”  type="text/css" href="../../estilo_selecao.css" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
        <script src="../../js/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>

        <style type="text/css">
            body {
                /* background-image: url(fundo1.jpg);
                background-repeat:repeat-x;
                background-color:#C9D7DA; */
                margin-top:0px;
                margin-left:0px;
                font-family:Verdana, Arial, Helvetica, sans-serif;
                font-size:11px;
                color:#535d3a;
            }
            .pergunta{
                color: #e32;
                content: '*';

            }

        </style>
    </head>
    <body>

        <div align='center'>
            <img src="../../imgs/topo2/topo_formulario.png" alt="Instituto Federal Baiano" />
            <div id="nome">
<?php
echo ($_SESSION["Gnomeprocessoseletivo"] . "<br />");
echo ("Edital N&#186; " . $_SESSION["Gedital"] . "/" . $_SESSION["Gano"]);
?>

            </div>


        </div>




        <div id="formularioInscricao" align="center">


            <h2 align="center" id="tituloPrincipal">Question&aacute;rio Socioecon&ocirc;mico</h2>
            <div class="voltar" style="margin-left: 0px; margin-top: 15px;">
                <?
if ($cpf) {
    $_SESSION["id"] = $questionario->getId($cpf);
} else {
    $_SESSION["id"] = $id;
}

?>
                <a href="../inscrito/mostrar.php">Voltar</a>
            </div>
            <form  name="questionario" action="../questionario/editarQuestionario.php" method="post"><br></br>
                <table>
<?php
//método editarPerguntas retorna as perguntas(label) e respostas(radio)
$questionario->editarResposta($id);
?>
                </table>
                <br/>


                <INPUT type="button" value="Salvar" id="Salvar" onclick="checkBox2();"/>

                <script type="application/javascript">

                    function checkBox2(){
                    bool = false;
                    var i=1;



                    while(i<<? echo mysql_num_rows($resultado3) + 1; ?>){
                    if($('.cinput'+i).is(':checked')==false){
                    $('#pergunta'+i).addClass("pergunta");
                    bool = false;
                    }else{

                    bool = true;
                    $('#pergunta'+i).removeClass("pergunta");

                    }

                    i++;
                    }


                    }


                    $("#Salvar").bind("click", function(){

                    if(!bool){

                    alert('Preencha todo o Formulario Socioeconomico!');
                    $('html, body').animate({scrollTop:0}, 'slow');

                    }else{
                    alert("Questionario preenchido com sucesso!");
                    document.questionario.submit();
                    }
                    });




                </script>





            </form>
        </div>
