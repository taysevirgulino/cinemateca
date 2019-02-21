<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("relatorio_usuario_acesso_dia.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo">Relat&oacute;rio de Acessos Di&aacute;rios: por Dia </td>
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
    <td height="15"><span style="font-weight: bold"><a href="relatorio_usuario_acesso_ano.php">Ano <img src="images/link.gif" border="0" /></a> / <a href="relatorio_usuario_acesso_mes.php?ano=<?=$ano?>">M&ecirc;s <img src="images/link.gif" border="0" /></a> / <a href="relatorio_usuario_acesso_dia.php?mes=<?=$data?>">Dia <img src="images/link.gif" border="0" /></a></span> </td>
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
        <td width="60%" height="20">&nbsp;Ano/M&ecirc;s/Dia</td>
        <td width="20%" height="20" align="center">Quantidade</td>
        <td width="20%" align="center">%</td>
      </tr>
      <?
      	for ($i=0; $i < count($vobj); $i++){
      ?>
      <tr>
        <td bgcolor="#F2F2F2" class="tabela_texto">&nbsp;<a href="relatorio_usuario_acesso_hora.php?dia=<?=$vobj[$i][0]?>" style="font-size:12px; font-weight:bold; color:#333" title="Visualizar relatório por Hora"><?=$vobj[$i][0]?> <img src="images/link.gif" border="0" /></a></td>
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
