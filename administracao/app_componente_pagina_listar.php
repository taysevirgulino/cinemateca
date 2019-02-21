<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("app_componente_pagina_listar.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo">Componente P&aacute;gina: Listagem </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td class="data_titulo"><?=date("Y/m/d H:i:s")?></td>
  </tr>
  <tr>
    <td height="15"><table width="97" border="0" align="right" cellpadding="0" cellspacing="2">
      <tr>
        <td width="22"><a href="app_componente_pagina_cadastrar.php"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21"></td>
        <td width="82"><a href="app_componente_pagina_listar.php"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0"></a></td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td width="31">&nbsp;ID</td>
        <td width="246" height="20">&nbsp;URL</td>
        <td width="177" height="20">&nbsp;Descri&ccedil;&atilde;o</td>
        <td width="53" height="20">&nbsp;Ident.</td>
        <td width="43" height="20" bgcolor="#CCCCCC" align="center">Op&ccedil;&atilde;o</td>
      </tr>
      <?
      	for ($i=0; $i < count($vobj); $i++){
      ?>
      <tr>
        <td bgcolor="#F2F2F2" class="tabela_texto"><?=$vobj[$i]->getIdAppComponentePagina()?></td>
        <td bgcolor="#F2F2F2" class="tabela_texto"><?=$vobj[$i]->getUrl()?></td>
        <td bgcolor="#F2F2F2" class="tabela_texto"><?=$vobj[$i]->getDescricao()?></td>
        <td bgcolor="#F2F2F2" class="tabela_texto"><a href="#" title="<?=$vobj[$i]->getIdentificador()?>"><?=substr($vobj[$i]->getIdentificador(), 0, 5)?></a></td>
        <td height="25" bgcolor="#CCCCCC" align="center"><a href="app_componente_pagina_editar.php?id=<?=$vobj[$i]->getIdAppComponentePagina()?>"><img src="images/botao/Edit.gif" title="Editar" width="18" height="18" border="0"></a><a href="app_componente_pagina_excluir.php?id=<?=$vobj[$i]->getIdAppComponentePagina()?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir" width="18" height="18" border="0"></a></td>
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
