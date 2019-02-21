<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("app_usuario_grupo_list.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> App Usuário Grupo: Listagem </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td class="data_titulo"><?=date("d/m/Y H:i:s")?></td>
  </tr>
  <tr>
    <td height="15">
	<table width="97" border="0" align="right" cellpadding="0" cellspacing="2">
      <tr>
        <td width="22"><a href="app_usuario_grupo_add.php"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0" alt="Clique para: Cadastrar"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21" title="Clique para: Editar" alt="Clique para: Editar"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21" title="Clique para: Excluir" alt="Clique para: Excluir"></td>
        <td width="82"><a href="app_usuario_grupo_list.php"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0" alt="Clique para: Listar"></a></td>
      </tr>
    </table>	
	</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td>
	<form id="frm" name="frm" method="get" action="app_usuario_grupo_list.php">
      <table width="100%" border="0">
        <tr>
          <td colspan="4"><b>Formul&aacute;rio de Consulta:</b></td>
        </tr>
        <tr>
          <td height="1" colspan="4" bgcolor="#000000"></td>
        </tr>
        <tr>
          <td width="18%">Compara&ccedil;&atilde;o: </td>
          <td width="28%">Palavra Chave: </td>
          <td>Buscar em: </td>
          <td>Ordenar por: </td>
        </tr>
        <tr>
          <td>
          <select name="busca-comparacao" class="frm" id="busca-comparacao" style="width:130px;">
          	<?
          		foreach($Comparers as $Comparer){
          			print '<option value="'.$Comparer["value"].'" '.(($Comparer["value"]==$busca_comparacao) ? 'selected="selected"' : '').'>'.$Comparer["text"].'</option>';
          		}
          	?>
          </select>
          </td>
          <td><input name="chave" type="text" class="frm" id="chave" style="width:200px;" value="<?=$chave?>" size="30" maxlength="100" /></td>
          <td width="21%">
		  <select name="busca-campo" class="frm" id="busca-campo" style="width:140px;">
          	<?
          		foreach($Attributes as $Attribute){
          			print '<option value="'.$Attribute["value"].'" '.(($Attribute["value"]==$busca_campo) ? 'selected="selected"' : '').'>'.$Attribute["text"].'</option>';
          		}
          	?>
		  </select>
		  </td>
          <td width="33%" height="25" align="right">
          <select name="ordenacao-campo" class="frm" id="ordenacao-campo" style="width:140px;">
          	<?
          		foreach($Attributes as $Attribute){
          			print '<option value="'.$Attribute["value"].'" '.(($Attribute["value"]==$ordenacao_campo) ? 'selected="selected"' : '').'>'.$Attribute["text"].'</option>';
          		}
          	?>
          </select>
          <select name="ordenacao-ordem" class="frm" id="ordenacao-ordem">
          	<?
          		foreach($Orders as $Order){
          			print '<option value="'.$Order["value"].'" '.(($Order["value"]==$ordenacao_ordem) ? 'selected="selected"' : '').'>'.$Order["text"].'</option>';
          		}
          	?>
          </select>
          </td>
        </tr>
        <tr>
          <td colspan="4" align="right" height="25"><input name="pesquisar" type="submit" class="frm_botao" id="pesquisar" value="Pesquisar" />
            <input name="cancelar" type="button" class="frm_botao" id="cancelar" value="Cancelar" onclick="javascript:window.open('app_usuario_grupo_list.php', '_parent');" /></td>
        </tr>
		<tr>
		  <td colspan="4" height="1" bgcolor="#999999"></td>
		</tr>
      </table>
     </form>
    </td>
  </tr>
  <tr>
    <td height="30" align="right" class="paginacao_local"><?=$PG_LABEL?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td height="20" width="45%"> Nome</td>
        <td height="20" width="15%"> Sigla</td>
        <td height="20" width="20%"> Tipo</td>
        <td width="15%" height="20" bgcolor="#CCCCCC" align="center">Op&ccedil;&atilde;o</td>
      </tr>
      <?
       $cont=0;
      	for($i=$PG_INICIO, $j = 0; ( ($i < count($vobj)) && ($j < $PG_REG_POR_PAGINA) ); $i++, $j++){
			if(!$t){$t=true; $bgcolor="#F2F2F2";}else{$t=false; $bgcolor="#DADADA";} $cont++;
      ?>
      <tr>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i][2])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i][3])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=(($vobj[$i][4] == 1) ? "Usuário de Sistema" : "Usuário da Administração" )?></td>
        <td height="25" bgcolor="#CCCCCC" align="center"><a href="app_componente_permissao_menu.php?id=<?=$vobj[$i][0]?>"><img src="menu/icones/menubolt.gif" alt="Gerenciar Permiss&atilde;o: Menu" width="18" height="18" border="0" /></a>&nbsp;<a href="app_componente_permissao_pagina.php?id=<?=$vobj[$i][0]?>"><img src="menu/icones/file.gif" alt="Gerenciar Permiss&atilde;o: P&aacute;gina" width="18" height="18" border="0" /></a>&nbsp;<a href="app_usuario_grupo_view.php?id=<?=$vobj[$i][0]?>"><img src="images/botao/Search.gif" width="18" height="18" border="0" title="Visualizar | Código: <?=$vobj[$i][0]?>" /></a>&nbsp;<a href="app_usuario_grupo_edit.php?id=<?=$vobj[$i][0]?>"><img src="images/botao/Edit.gif" title="Editar | Código: <?=$vobj[$i][0]?>" width="18" height="18" border="0"></a><a href="app_usuario_grupo_remove.php?id=<?=$vobj[$i][0]?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir | Código: <?=$vobj[$i][0]?>" width="18" height="18" border="0"></a></td>
      </tr>
      <?
      	} 
		if($cont <= 0){
      ?>
	  <tr>
	  	<td colspan="4" style="height:30px; font-weight:bold; font-size:14px; text-align:center">Nenhum registro afetado!</td>
	  </tr>
	  <?
	  	}
	  ?>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="right" class="paginacao_local"><?=$PG_LABEL?></td>
  </tr>
</table>
<?
	require_once("layout_inf.php");
?>