<?php

include_once ("../classes/DB.php");

$banco = DB::getInstance();
$conexao = $banco->ConectarDB();
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */
for ($i = 1; $i < 10; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $sql = "Insert into resposta(pergunta_id,descricao) values(".$i.", 'Resposta 0".$j." P".$i."')";
        mysql_query($sql) or die( mysql_error());
        
    }
}
?>
