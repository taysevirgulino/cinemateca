<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("configuracao_list.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Configuração: Listagem </td>
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
        <td width="22"><a id="link_add" href="<?=$link_add?>?url=<?=$url;?>" title="Clique para: Cadastrar" alt="Clique para: Cadastrar"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0" alt="Clique para: Cadastrar"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21" title="Clique para: Editar" alt="Clique para: Editar"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21" title="Clique para: Excluir" alt="Clique para: Excluir"></td>
        <td width="82"><a id="link_list" href="<?=$link_list?>" title="Clique para: Listar" alt="Clique para: Listar"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0" title="Clique para: Listar" alt="Clique para: Listar"></a></td>
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
  <form id="frmOperacao" name="frmOperacao" method="post" action="configuracao_operation.php?back=<?=$link_back;?>">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=nome&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Nome">Nome</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=numero&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Número">Número</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=cargo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Cargo">Cargo</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=estado&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Estado">Estado</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=slogan&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Slogan">Slogan</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=partido&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Partido">Partido</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=coligacao&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Coligação">Coligação</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=cnpj&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Cnpj">Cnpj</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=email&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: E-mail">E-mail</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=telefone&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Telefone">Telefone</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=endereco_completo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Endereço Completo">Endereço Completo</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=rodape&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Rodape">Rodape</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=twitter_status&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Twitter Status">Twitter Status</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=twitter_username&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Twitter Username">Twitter Username</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=twitter_password&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Twitter Password">Twitter Password</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=twitter_rss_url&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Twitter Rss Url (Endereço)">Twitter Rss Url (Endereço)</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=link_twitter&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Link Twitter">Link Twitter</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=link_orkut&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Link Orkut">Link Orkut</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=link_youtube&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Link Youtube">Link Youtube</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=link_facebook&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Link Facebook">Link Facebook</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=link_flickr&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Link Flickr">Link Flickr</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=analytics_key&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Analytics Key">Analytics Key</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=template_topo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Template Topo">Template Topo</a></td>
        <td width="3%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=template_conteudo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Template Conteúdo">Template Conteúdo</a></td>
        <td width="5%" align="center"><input type="checkbox" name="CheckBoxIdOperacaoAll" id="CheckBoxIdOperacaoAll" onclick="ListagemSelectCheks(this);" /></td>
        <td width="15%" height="20" bgcolor="#CCCCCC" align="center">Op&ccedil;&atilde;o</td>
      </tr>
      <?
      	$cont=0;
      	for($i=0; $i < count($vobj); $i++){
			if(!$t){$t=true; $bgcolor="#F2F2F2";}else{$t=false; $bgcolor="#DADADA";} $cont++;
      ?>
      <tr>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["nome"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["numero"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["cargo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["estado"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["slogan"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["partido"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["coligacao"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["cnpj"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["email"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["telefone"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["endereco_completo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["rodape"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["twitter_status"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["twitter_username"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["twitter_password"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["twitter_rss_url"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["link_twitter"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["link_orkut"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["link_youtube"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["link_facebook"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["link_flickr"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["analytics_key"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["template_topo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["template_conteudo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><input type="checkbox" name="CheckBoxIdOperacao<?=$i?>" id="CheckBoxIdOperacao<?=$i?>" value="<?=$vobj[$i]["id_configuracao"]?>" class="InputOperacao" /></td>
        <td bgcolor="<?=$bgcolor?>" align="center"><a href="configuracao_view.php?id=<?=$vobj[$i]["id_configuracao"]?>&back=<?=$link_back;?>"><img src="images/botao/Search.gif" width="18" height="18" border="0" title="Visualizar | Código: <?=$vobj[$i]["id_configuracao"]?>" /></a>&nbsp;<a href="configuracao_edit.php?id=<?=$vobj[$i]["id_configuracao"]?>&back=<?=$link_back;?>"><img src="images/botao/Edit.gif" title="Editar | Código: <?=$vobj[$i]["id_configuracao"]?>" width="18" height="18" border="0"></a><a href="configuracao_remove.php?id=<?=$vobj[$i]["id_configuracao"]?>&back=<?=$link_back;?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir | Código: <?=$vobj[$i]["id_configuracao"]?>" width="18" height="18" border="0"></a></td>
      </tr>
      <?
      	} 
		if($cont <= 0){
      ?>
	  <tr>
	  	<td colspan="26" style="height:30px; font-weight:bold; font-size:14px; text-align:center">[Nenhum registro encontrado]</td>
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