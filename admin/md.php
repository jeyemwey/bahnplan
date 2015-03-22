<?php
//p function
function p(&$var, $else = '') {
	$var = (isset($var) && $var) ? $var : $else;
	return $var;
}

include "../inc/classes/Parsedown.class.php";

$md = new Parsedown();

header('Content-Type: application/json');
echo json_encode(["text" =>$md->text(p($_REQUEST['text']))]);