<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: index.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
