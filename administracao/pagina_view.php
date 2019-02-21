<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("pagina_view.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Página: Visualização </td>
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
        <td width="23"><a id="link_edit" href="<?=$link_edit?>" title="Clique para: Editar" alt="Clique para: Editar"><img src="images/botao/btn_edit_over.gif" width="22" height="21" border="0" alt="Clique para: Editar"></a></td>
        <td width="12"><a id="link_remove" href="<?=$link_remove?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');" title="Clique para: Excluir" alt="Clique para: Excluir"><img src="images/botao/btn_remove_over.gif" width="21" height="21" border="0" alt="Clique para: Excluir"></a></td>
        <td width="82"><a id="link_list" href="<?=$link_list?>" title="Clique para: Listar" alt="Clique para: Listar"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0" alt="Clique para: Listar"></a></td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td height="15">
	<? if( ( ! empty($label_alerta_erro) ) || ( ! empty($label_alerta_concluido) ) ){ ?>
	<table width="100" border="0" align="right" cellpadding="0" cellspacing="2">
      <? if( ! empty($label_alerta_erro) ){ ?>
	  <tr>
        <td width="74" align="right" valign="bottom"><a href="#alerta"><span class="alerta_erro_aviso">Pend&ecirc;ncias</span></a></td>
        <td width="20"><img src="images/alerta_erro_mini.gif" width="20" height="20"></td>
      </tr>
	  <? }else if( ! empty($label_alerta_concluido) ){  ?>
      <tr>
        <td width="74" align="right" valign="bottom"><a href="#alerta"><span class="alerta_ok_aviso">Conclu&iacute;do</span></a></td>
        <td width="20"><img src="images/alerta_ok_mini.gif" width="20" height="20"></td>
      </tr>
	  <? } ?>
    </table>
	<? } ?>
	</td>
  </tr>
  <tr>
    <td>Visualize as informações abaixo: </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
	<form action="" method="post" name="frm" id="frm">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr<? if(empty($frm_pagina)){ ?> style="display:none"<? } ?>>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Sub-página de: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <a href="pagina_view.php?id=<?=$frm_id_pagina_pai?>&back=<?=$link_back;?>" title="Visualizar: <?=$frm_pagina?>" style="color:#00F; text-decoration:underline;"><?=$frm_pagina?></a>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Slug: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_slug?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Título: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_titulo?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Resumo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_resumo?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Texto: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_texto?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Imagem listagem:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<? if(!empty($frm_imagem)){ ?><img src="../images/pagina/<?=$frm_imagem?>" /><? } ?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFilhosExibir">&nbsp; Exibir sub-páginas?  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <?=$frm_filhos_exibir?>
          </td>
        </tr>
        <tr id="cpFrmFilhosTitulo" style="display:none">
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFilhosTitulo">&nbsp; Título para sub-páginas:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_filhos_titulo?>
          </td>
        </tr>        
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Data/Hora:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_datahora?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Prioridade:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_prioridade?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Status:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_status?>
          </td>
        </tr>
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="button" name="btVoltar" id="btVoltar" class="frm_botao" value="Voltar" onClick="javascript:window.open('<?=$link_list?>', '_parent')" <?=$label_alerta_status?>>
		  </td>
        </tr>
      </table>
    </form>
	</td>
  </tr>
  <tr>
    <td height="25"></td>
  </tr>
  <tr>
    <td height="25" class="texto_titulo"> Sub-página: Listagem </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td height="15">
	<table width="97" border="0" align="right" cellpadding="0" cellspacing="2">
      <tr>
        <td width="22"><a href="<?=$link_add?>&idp=<?=$ID?>"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0" alt="Clique para: Cadastrar Sub-página"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21" title="Clique para: Editar" alt="Clique para: Editar"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21" title="Clique para: Excluir" alt="Clique para: Excluir"></td>
        <td width="82"><img src="images/botao/btn_copy_dim.gif" width="22" height="21" border="0" alt="Clique para: Listar"></td>
      </tr>
    </table>	
	</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td height="30" align="right" class="paginacao_local"><?=$PG_LABEL?></td>
  </tr>
  <form id="frmOperacao" name="frmOperacao" method="post" action="pagina_operation.php?back=<?=$link_back;?>">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td width="52%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=titulo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Título">Título</a></td>
        <td width="15%" height="20" align="center">Sub-páginas</td>
        <td width="10%" height="20" align="center"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=status&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Status">Status</a></td>
        <td width="5%" align="center"><input type="checkbox" name="CheckBoxIdOperacaoAll" id="CheckBoxIdOperacaoAll" onclick="ListagemSelectCheks(this);" /></td>
        <td width="18%" height="20" bgcolor="#CCCCCC" align="center">Op&ccedil;&atilde;o</td>
      </tr>
      <?
      	$cont=0;
      	for($i=0; $i < count($vobj); $i++){
			if(!$t){$t=true; $bgcolor="#F2F2F2";}else{$t=false; $bgcolor="#DADADA";} $cont++;
			if($i == 0){$h=0;}else{$h=1;}
      ?>
      <tr>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["titulo"])?><br><span style="font-size:8px !important; font-style:italic;">(link: <?=$vobj[$i]["slug"]?>)</span></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><?=PaginaManage::FilhosCount($vobj[$i]["id_pagina"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><?=(($vobj[$i]["status"]==1) ? '<img src="images/icones/s1.gif" title="Ativo" class="status" />' : '<img src="images/icones/s0.gif" title="Inativo" class="status" />')?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><input type="checkbox" name="CheckBoxIdOperacao<?=$i?>" id="CheckBoxIdOperacao<?=$i?>" value="<?=$vobj[$i]["id_pagina"]?>" class="InputOperacao" /></td>
        <td bgcolor="<?=$bgcolor?>" align="center" style="padding:2px;"><a href="pagina_add.php?idp=<?=$vobj[$i]["id_pagina"]?>&back=<?=$link_back;?>"><img src="images/botao/btn_add_over.gif" height="18" border="0" alt="Adicionar Sub-página | Código: <?=$vobj[$i]["id_pagina"]?>" /></a>&nbsp;<a href="<?=Url::Pagina($vobj[$i]["id_pagina"], $vobj[$i]["identificador"], $vobj[$i]["slug"]);?>" target="_blank"><img src="images/icones/world_link.gif" border="0" title="Visualizar no Site | Código: <?=$vobj[$i]["id_pagina"]?>" /></a>&nbsp;<a href="pagina_priority.php?idatual=<?=$vobj[$i]["id_pagina"]?>&idalterar=<?=$vobj[$i-$h]["id_pagina"]?>&back=<?=$link_back;?>" onclick="javascript: return confirm('Deseja realmente Alterar a Prioridade?');"><img src="images/seta1.gif" width="15" height="15" border="0" alt="Alterar Prioridade | Código: <?=$vobj[$i]["id_pagina"]?> por <?=$vobj[$i-$h]["id_pagina"]?>" /></a>&nbsp;<a href="pagina_view.php?id=<?=$vobj[$i]["id_pagina"]?>&back=<?=$link_back;?>"><img src="images/botao/Search.gif" width="18" height="18" border="0" title="Visualizar | Código: <?=$vobj[$i]["id_pagina"]?>" /></a>&nbsp;<a href="pagina_edit.php?id=<?=$vobj[$i]["id_pagina"]?>&back=<?=$link_back;?>"><img src="images/botao/Edit.gif" title="Editar | Código: <?=$vobj[$i]["id_pagina"]?>" width="18" height="18" border="0"></a><a href="pagina_remove.php?id=<?=$vobj[$i]["id_pagina"]?>&back=<?=$link_back;?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir | Código: <?=$vobj[$i]["id_pagina"]?>" width="18" height="18" border="0"></a></td>
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
            <option value="prioridade">Inverter Prioridade</option>
            <option value="status">Inverter Status</option>
        </select>
        <input type="submit" name="OperacaoBotao" id="OperacaoBotao" value="Executar" class="frm_botao" onclick="return confirm('Deseja realmente executar esta Operação?');" />
        <input type="hidden" name="OperacaoCount" id="OperacaoCount" value="<?=$cont?>" />
    </td>
  </tr>
  </form>
  
  <? if( ! empty($label_alerta_erro) ){ ?>
  <tr>
    <td>
	<table width="100%" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <td colspan="2" class="alerta_erro_titulo"><a name="alerta"></a>Pend&ecirc;ncias:</td>
      </tr>
      <tr>
        <td width="10%"><img src="images/alerta_erro.gif" width="62" height="62"></td>
        <td width="90%" valign="top" class="alerta_erro_texto">
		<ol>
          <?
		  	$lae = explode("#", $label_alerta_erro);
		  	for($i=0; $i < count($lae); $i++ ){
				if(!empty($lae[$i])){ print "<li>".$lae[$i]."; </li><br>"; }
			}
		  ?>
        </ol>
		</td>
      </tr>
    </table>
	</td>
  </tr>
  <? }else if( ! empty($label_alerta_concluido) ){ ?>
  <tr>
    <td>
	<table width="100%" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <td colspan="2" class="alerta_ok_titulo"><a name="alerta"></a>Conclu&iacute;do:</td>
      </tr>
      <tr>
        <td width="10%"><img src="images/alerta_ok.gif" width="62" height="62"></td>
        <td width="90%" valign="top" class="alerta_ok_texto">
		<ul>
          <?
		  	$lac = explode("#", $label_alerta_concluido);
		  	for($i=0; $i < count($lac); $i++ ){
				if(!empty($lac[$i])){ print "<li>".$lac[$i]."; </li><br>"; }
			}
		  ?>
        </ul>
		</td>
      </tr>
    </table>
	</td>
  </tr>
  <? } ?>  
</table>
<?
	require_once("layout_inf.php");
?>