<?php
function smarty_modifier_textbyhtml($string)
{
	return trim(html_entity_decode(stripslashes($string), ENT_QUOTES));
}
?>
