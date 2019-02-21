<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("emkt_list.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Newsletter: Listagem </td>
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
        <td width="22"><a id="link_add" href="<?=$link_add?>" title="Clique para: Cadastrar" alt="Clique para: Cadastrar"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0" alt="Clique para: Cadastrar"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21" title="Clique para: Editar" alt="Clique para: Editar"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21" title="Clique para: Excluir" alt="Clique para: Excluir"></td>
        <td width="82"><a id="link_list" href="<?=$link_list?>" title="Clique para: Listar" alt="Clique para: Listar"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0" alt="Clique para: Listar"></a></td>
      </tr>
    </table>	
	</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td>
	<form id="frm" name="frm" method="get" action="<?=$link_list?>">
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
          <td colspan="4" align="right" height="25">
            <input name="pesquisar" type="submit" class="frm_botao" id="pesquisar" value="Pesquisar" />
            <input name="cancelar" type="button" class="frm_botao" id="cancelar" value="Cancelar" onclick="javascript:window.open('<?=$link_list?>', '_parent');" />
            <input name="exportar" id="exportar" type="submit" class="frm_botao frm_botao_export" value="Exportar" />
          </td>
        </tr>
		<tr>
		  <td colspan="4" height="1" bgcolor="#999999"></td>
		</tr>
      </table>
     </form>
     <script language="javascript">document.getElementById("chave").focus();</script>
    </td>
  </tr>
  <tr>
    <td height="30" align="right" class="paginacao_local"><?=$PG_LABEL?></td>
  </tr>
  <form id="frmOperacao" name="frmOperacao" method="post" action="emkt_operation.php">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td height="20" width="50%" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=titulo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Título">Título</a></td>
        <td height="20" width="15%" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=datahora&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Data/Hora">Data/Hora</a></td>
        <td height="20" width="15%" align="center">Status</td>
        <td width="5%" align="center"><input type="checkbox" name="CheckBoxIdOperacaoAll" id="CheckBoxIdOperacaoAll" onclick="ListagemSelectCheks(this);" /></td>
        <td width="15%" height="20" bgcolor="#CCCCCC" align="center">Op&ccedil;&atilde;o</td>
      </tr>
      <?
      	$cont=0;
      	for($i=0; $i < count($vobj); $i++){
			if(!$t){$t=true; $bgcolor="#F2F2F2";}else{$t=false; $bgcolor="#DADADA";} $cont++;
      ?>
      <tr>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["titulo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarData($vobj[$i]["datahora"], "d/m/y [Hhi]");?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><?=EmktStatus::_DescricaoByStatus(EmktStatus::StatusByEmkt($vobj[$i]["id_emkt"]));?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><input type="checkbox" name="CheckBoxIdOperacao<?=$i?>" id="CheckBoxIdOperacao<?=$i?>" value="<?=$vobj[$i]["id_emkt"]?>" class="InputOperacao" /></td>
        <td bgcolor="<?=$bgcolor?>" align="center" style="padding:2px;"><a href="emkt_disparo.php?id=<?=$vobj[$i]["id_emkt"]?>"><img src="images/icones/email.gif" width="16" height="16" border="0" alt="Configurar Envio | Código: <?=$vobj[$i]["id_emkt"]?>" /></a>&nbsp;<a href="emkt_view.php?id=<?=$vobj[$i]["id_emkt"]?>"><img src="images/botao/Search.gif" width="18" height="18" border="0" title="Visualizar | Código: <?=$vobj[$i]["id_emkt"]?>" /></a>&nbsp;<a href="emkt_edit.php?id=<?=$vobj[$i]["id_emkt"]?>"><img src="images/botao/Edit.gif" title="Editar | Código: <?=$vobj[$i]["id_emkt"]?>" width="18" height="18" border="0"></a><a href="emkt_remove.php?id=<?=$vobj[$i]["id_emkt"]?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir | Código: <?=$vobj[$i]["id_emkt"]?>" width="18" height="18" border="0"></a></td>
      </tr>
      <?
      	} 
		if($cont <= 0){
      ?>
	  <tr>
	  	<td colspan="5" style="height:30px; font-weight:bold; font-size:14px; text-align:center">[Nenhum registro encontrado]</td>
	  </tr>
	  <?
	  	}
	  ?>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="right" class="paginacao_local"><?=$PG_LABEL?></td>
  </tr>
  <tr>
    <td height="30" align="right">
        <span>Quantidade de registros: <b><?=$vobjCount?></b> | </span>
        <span>Operação no(s) Selecionado(s):</span>
        <select name="OperacaoOpcao" id="OperacaoOpcao" class="frm">
            <option value="excluir">Excluir</option>
        </select>
        <input type="submit" name="OperacaoBotao" id="OperacaoBotao" value="Executar" class="frm_botao" onclick="return confirm('Deseja realmente executar esta Operação?');" />
        <input type="hidden" name="OperacaoCount" id="OperacaoCount" value="<?=$cont?>" />
    </td>
  </tr>
  </form>
</table>
<?
	require_once("layout_inf.php");
?>