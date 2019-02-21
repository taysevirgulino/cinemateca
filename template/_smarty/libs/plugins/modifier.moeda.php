<?php
function smarty_modifier_moeda($string,$decimal=2)
{
	$str = number_format($string, 2, ',', '.');
	
	if($decimal == 0){
		$str = preg_replace("/,[0-9]{2}$/", "", $str);
	}
	
	return $str;
}
?>
