<?php
ini_set('display_errors', 0);

include_once '../classes/DB.php';
include_once '../classes/PHPExcel/PHPExcel.php';
include_once '../classes/PHPExcel/PHPExcel/Writer/Excel5.php';

$banco = DB::getInstance();
$conexao = $banco->ConectarDB();

function removeAcentos($str, $enc = "ISO-8859-1") {
	$acentos = array(
		'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
		'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
		'C' => '/&Ccedil;/',
		'c' => '/&ccedil;/',
		'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
		'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
		'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
		'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
		'N' => '/&Ntilde;/',
		'n' => '/&ntilde;/',
		'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
		'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
		'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
		'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
		'Y' => '/&Yacute;/',
		'y' => '/&yacute;|&yuml;/',
		'a.' => '/&ordf;/',
		'o.' => '/&ordm;/',
	);
	return preg_replace($acentos, array_keys($acentos), htmlentities($str, ENT_NOQUOTES, $enc));
}
function setCabecalho($objPHPExcel, $colunas) {
	foreach ($colunas as $coluna => $valor) {
		$objPHPExcel->getActiveSheet()->SetCellValue($coluna.'1', $valor);
		$objPHPExcel->getActiveSheet()->getColumnDimension($coluna)->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getStyle($coluna.'1')->getFont()->setBold(true);
	}
}

//inicio da construção das consultas

$sql = <<<SQL
SELECT
        campus.id AS campus_id,            
        (mediapor1 + mediapor2 + mediapor3 +mediamat1+mediamat2 + mediamat3)/6 as media,
        inscrito.nome AS nome,
        inscrito.numinscricao AS inscricao,
        inscrito.cpf AS inscrito_cpf,
        inscrito.telefone AS tel_res,
        inscrito.celular AS tel_cel,
        inscrito.email AS email,

SQL;

if ($_POST['tipocota'] == 'AC') {
    //AMPLA CONCORRÊNCIA
    $sql .= <<<SQL
    'AC' as tipo,
    campus.nome AS campus_nome,
    curso.nome AS curso_nome
    FROM inscrito
                INNER JOIN campus ON campus.id = inscrito.campus
                INNER JOIN curso ON curso.cod_curso = inscrito.curso   
    WHERE
        vaga_especial = 'NAO' AND
        vaga_rede_publica = 'NAO'
    ORDER BY 
        campus.id, curso.cod_curso, media desc 
SQL;
}elseif($_POST['tipocota'] == 'RP'){
    //REDE PÚBLICA
    $sql .= <<<SQL
    'RP' as tipo,
    campus.nome AS campus_nome,
    curso.nome AS curso_nome
    FROM inscrito
                INNER JOIN campus ON campus.id = inscrito.campus
                INNER JOIN curso ON curso.cod_curso = inscrito.curso   
    WHERE
        vaga_especial = 'NAO' AND
        vaga_rede_publica = 'SIM'
    ORDER BY 
        campus.id, curso.cod_curso, media desc 
SQL;
}elseif($_POST['tipocota'] == 'NE'){
    //NECESSIDADES ESPECIAIS
    $sql .= <<<SQL
    'NE' as tipo,
    campus.nome AS campus_nome,
    curso.nome AS curso_nome
    FROM inscrito
                INNER JOIN campus ON campus.id = inscrito.campus
                INNER JOIN curso ON curso.cod_curso = inscrito.curso   
    WHERE
        vaga_especial = 'SIM' AND
        vaga_rede_publica = 'NAO'
    ORDER BY 
        campus.id, curso.cod_curso, media desc 
SQL;
}        

//var_dump ($sql);
//exit;

$objPHPExcel = new PHPExcel();
$query = $banco->ExecutaQueryGenerica($sql);
$numResults = mysql_num_rows($query);
$linha = 2;
$campus_nome = null;
$curso_nome  = null;         
$colunas     = array(
	'A' => 'MEDIA',
	'B' => 'NOME',
	'C' => 'INSCRIÇÃO',
	'D' => 'CPF',
	'E' => 'TEL.RES',
	'F' => 'TEL.CEL',
	'G' => 'EMAIL',
	'H' => 'TIPO',
	'I' => 'CAMPUS',
	'J' => 'CURSO',
);

while ($row = mysql_fetch_assoc($query)) {
	$val = array_values($row);
//	  echo('Campus: '.$val[0]);
//        echo('</br>');
          if ($campus_nome != $val[9]) {		
                $curso_nome  = null;    
                if ($curso_nome !=$val[10]){
//                    echo('createSheet----------------------');
//                    echo('</br>');
//                    echo('Aba: '.$val[0].'-'.$val[1]);
//                    echo('</br>');                 
//                    echo('Candidato: '.$val[3].' Nota:'.$val[10]);
//                    echo('</br>');
                    $aba = $val[9].'-'.$val[10];
                    $objPHPExcel->createSheet();
                    $objPHPExcel->setActiveSheetIndex($objPHPExcel->getActiveSheetIndex() + 1);
                    $objPHPExcel->getActiveSheet()->setTitle($aba);
                    setCabecalho($objPHPExcel, $colunas);
                    $linha = 2;
                    $col = 1;
                    foreach ($colunas as $coluna => $valor) {
                            if ($val[$col] == null) {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, '---');
                            } else {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, utf8_encode($val[$col]));
                            }
                            $col++;
                    }
                    $linha++;                    
                                        
                 }
                 else {
//                    echo('Candidato: '.$val[3].' Nota:'.$val[10]);
//                    echo('</br>');
                    $col = 1;
                    foreach ($colunas as $coluna => $valor) {
                            if ($val[$col] == null) {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, '---');
                            } else {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, utf8_encode($val[$col]));
                            }
                            $col++;
                    }
                    $linha++;                    
                     
                }
	}
        else{
                if ($curso_nome !=$val[10]){
//                    echo('createSheet----------------------');
//                    echo('</br>');
//                    echo('Aba: '.$val[0].'-'.$val[1]);
//                    echo('</br>');                 
//                    echo('Candidato: '.$val[3].' Nota:'.$val[10]);
//                    echo('</br>');                    
                    $aba = $val[9].'-'.$val[10];
                    $objPHPExcel->createSheet();
                    $objPHPExcel->setActiveSheetIndex($objPHPExcel->getActiveSheetIndex() + 1);
                    $objPHPExcel->getActiveSheet()->setTitle($aba);                    
                    setCabecalho($objPHPExcel, $colunas);                                        
                    $linha = 2;
                    $col = 1;
                    foreach ($colunas as $coluna => $valor) {
                            if ($val[$col] == null) {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, '---');
                            } else {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, utf8_encode($val[$col]));
                            }
                            $col++;
                    }
                    $linha++;                    
                 }
                 else {
//                   echo('Candidato: '.$val[3].' Nota:'.$val[10]);
//                   echo('</br>');
//                    $linha = 2;
                    $col = 1;
                    foreach ($colunas as $coluna => $valor) {
                            if ($val[$col] == null) {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, '---');
                            } else {
                                    $objPHPExcel->getActiveSheet()->SetCellValue($coluna.$linha, utf8_encode($val[$col]));
                            }
                            $col++;
                    }
                    $linha++;                    
                     
                }
        }
       $campus_nome = $val[9];
       $curso_nome  = $val[10];
}

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="relatorio_completo.xls"');
header('Cache-Control: max-age=0');

$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
