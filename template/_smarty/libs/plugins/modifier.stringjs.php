<?php
function smarty_modifier_stringjs($string)
{
	$string = preg_replace("/[\\n\\r]+/", "", $string);
	
	return $string;
}
?>