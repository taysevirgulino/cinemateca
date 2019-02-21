<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("relatorio_usuario_acesso.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo">Relat&oacute;rio de Acessos Di&aacute;rios </td>
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
        <td width="443" height="20">&nbsp;Dia</td>
        <td width="81" height="20" align="center">Quantidade</td>
        <td width="67" align="center">%</td>
      </tr>
      <?
      	for ($i=0; $i < count($vobj); $i++){
      ?>
      <tr>
        <td bgcolor="#F2F2F2" class="tabela_texto">&nbsp;<?=$vobj[$i][0]?></td>
        <td height="25" align="center" bgcolor="#F2F2F2" class="tabela_texto"><?=$vobj[$i][1]?></td>
        <td height="25" align="center" bgcolor="#F2F2F2" class="tabela_texto"><?=$vobj[$i][2]?>%</td>
      </tr>
      <?
      	}
      ?>
    </table></td>
  </tr>
</table>
<?
	require_once("layout_inf.php");
?>
