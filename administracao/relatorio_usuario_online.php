<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("relatorio_usuario_online.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo">Relat&oacute;rio de usu&aacute;rios Online </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td class="data_titulo"><?=date("Y/m/d H:i:s")?></td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td height="20">&nbsp;Visitantes OnLine nos &Uacute;ltimos 10 minutos </td>
        </tr>
      <tr>
        <td height="25" bgcolor="#F2F2F2" class="tabela_texto">&nbsp;<?=$valor?></td>
        </tr>
    </table></td>
  </tr>
</table>
<?
	require_once("layout_inf.php");
?>
