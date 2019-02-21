<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("relatorio_banner_acesso.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BANNER: <?=$obj["descricao"]?></title>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
body {
	margin-left: 0px;
	margin-top: 10px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {font-weight: bold; font-size: 18px; font-family: Arial, Helvetica, sans-serif;}
.style3 {
	font-size: 14px;
	font-weight: bold;
}
.style4 {font-size: 10px}
.style6 {font-size: 12px; font-weight: bold; }
.style7 {font-size: 16px}
.style9 {color: #FF0000}
-->
</style></head>

<body>
<table width="610" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td width="399" class="style2"></td>
    <td width="202" class="style2">
	<form id="form1" name="form1" method="post" action="relatorio_banner_acesso.php?id=<?=$ID?>">
      Per&iacute;odo:<br />
      <input name="di" type="text" id="di" value="<?=$frm_di?>" size="8" maxlength="10" />
         &agrave;    
         <input name="df" type="text" id="df" value="<?=$frm_df?>" size="8" maxlength="10" />
         <input name="btSubmit" type="submit" id="btSubmit" value="OK" />
    </form>    </td>
  </tr>
  <tr>
    <td colspan="2" class="style2 style9"><?=$ERRO?>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="style2">RELAT&Oacute;RIO DE CLICK'S EM BANNER'S </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><strong>BANNER:</strong> <?=$obj["descricao"]?> </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
	<?
		print BannerTipo::Src("../files/publicidade/".$obj["arquivo"], $obj["width"], $obj["height"]);
	?>
	</div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><span class="style3">LISTA DE ACESSOS: </span></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="600" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td width="289" class="style6"><span class="style6">DATA</span></td>
        <td width="302" class="style6">QTD CLICK'S </td>
      </tr>
      <?
	  	foreach($vobj as $rs){
	  ?>
      <tr>
        <td><span class="style7"><?=System::FormatarData($rs["data"], "d/m/Y")?></span></td>
        <td class="style7"><?=$rs["clicks"]?></td>
      </tr>
	  <?
	  	}
	  ?>	  
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><span class="style3">TOTAL:</span> <span class="style7"><?=$QTD_TOTAL?></span> </div></td>
  </tr>
  
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="right"><span class="style4"><?=date("d/m/Y H:i:s")?></span> </div></td>
  </tr>
</table>
</body>
</html>
