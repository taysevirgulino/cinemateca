<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("banner_edit.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Banner: Edi&ccedil;&atilde;o </td>
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
    <td>Preencha corretamente o formul&aacute;rio abaixo: </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
	<form action="<?=$link_edit?>" method="post" name="frm" id="frm" enctype="multipart/form-data" onsubmit="return _Validar();">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdBannerLocal">&nbsp;Local: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdBannerLocal" class="frm" id="FrmIdBannerLocal" style="width:500px;">
    <option value="" selected="selected">Selecione Abaixo...</option>
    <? for($i=0; $i < count($VObjBannerLocal); $i++){ ?>
    <option value="<?=$VObjBannerLocal[$i]["id_banner_local"]?>" <? if($VObjBannerLocal[$i]["id_banner_local"] == $frm_id_banner_local){ print("selected"); }?>><?=$VObjBannerLocal[$i]["nome"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDescricao">&nbsp;Descrição: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDescricao" id="FrmDescricao" class="frm" size="80" maxlength="200" value="<?=$frm_descricao?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmUrl">&nbsp;Url (Endereço): * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmUrl" id="FrmUrl" class="frm" size="80" maxlength="255" value="<?=$frm_url?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTarget">&nbsp;Abrir: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<select name="FrmTarget" class="frm" id="FrmTarget"><option value="_parent" <? if($frm_target == '_parent'){print('selected="selected"');}?>>Mesma P&aacute;gina</option><option value="_blank" <? if($frm_target == '_blank'){print('selected="selected"');}?>>Nova P&aacute;gina</option></select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmWidth">&nbsp;Largura (Width): * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmWidth" id="FrmWidth" class="frm" size="11" maxlength="11" value="<?=$frm_width?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmHeight">&nbsp;Altura (Height): * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmHeight" id="FrmHeight" class="frm" size="11" maxlength="11" value="<?=$frm_height?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPeriodoStatus">&nbsp;Período Status:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<label><input name="FrmPeriodoStatus" type="radio" <? if($frm_periodo_status==1){ print('checked="checked"'); } ?> value="1" />Ativo</label><label><input name="FrmPeriodoStatus" type="radio" <? if($frm_periodo_status==0){ print('checked="checked"'); } ?> value="0" />Inativo</label>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPeriodoInicial">&nbsp;Período Inicial:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPeriodoInicial" id="FrmPeriodoInicial" class="frm" size="10" maxlength="10" value="<?=$frm_periodo_inicial?>" onkeydown="fncFormataData('frm', 'FrmPeriodoInicial')">&nbsp;<input type="button" name="BTPeriodoInicial" id="BTPeriodoInicial" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmPeriodoInicial", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTPeriodoInicial", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPeriodoFinal">&nbsp;Período Final:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPeriodoFinal" id="FrmPeriodoFinal" class="frm" size="10" maxlength="10" value="<?=$frm_periodo_final?>" onkeydown="fncFormataData('frm', 'FrmPeriodoFinal')">&nbsp;<input type="button" name="BTPeriodoFinal" id="BTPeriodoFinal" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmPeriodoFinal", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTPeriodoFinal", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmArquivo">&nbsp;Arquivo: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="file" name="FrmArquivoFile" id="FrmArquivoFile" class="frm" size="60" maxlength="255" value="">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmArquivo">&nbsp;Arquivo Antigo: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=BannerTipo::Src("../files/publicidade/".$frm_arquivo, $frm_width, $frm_height);?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmStatus">&nbsp;Status:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<label><input name="FrmStatus" type="radio" <? if($frm_status==1){ print('checked="checked"'); } ?> value="1" />Ativo</label><label><input name="FrmStatus" type="radio" <? if($frm_status==0){ print('checked="checked"'); } ?> value="0" />Inativo</label>
          </td>
        </tr>
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="submit" name="btSubmit" id="btSubmit" class="frm_botao" value="Salvar" <?=$label_alerta_status?>>
           <input type="button" name="btCancelar" id="btCancelar" class="frm_botao" value="Cancelar/Voltar" onclick="javascript:window.open('<?=$link_list?>', '_parent')" <?=$label_alerta_status?>>
		  </td>
        </tr>
      </table>
    </form>
    <script language="javascript">document.getElementById("FrmIdBannerLocal").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			return vFrm.exec();
		}
        var a_fields = {
            'FrmIdBannerLocal':{'l':' Local','t':'labelFrmIdBannerLocal','r':true},
            'FrmDescricao':{'l':' Descrição','t':'labelFrmDescricao','r':true},
            'FrmUrl':{'l':' Url (Endereço)','t':'labelFrmUrl','r':true},
            'FrmTarget':{'l':' Abrir','t':'labelFrmTarget','r':true},
            'FrmWidth':{'l':' Largura (Width)','t':'labelFrmWidth','r':true},
            'FrmHeight':{'l':' Altura (Height)','t':'labelFrmHeight','r':true},
            'FrmPeriodoStatus':{'l':' Período Status','t':'labelFrmPeriodoStatus'},
            'FrmPeriodoInicial':{'l':' Período Inicial','t':'labelFrmPeriodoInicial','f':'date'},
            'FrmPeriodoFinal':{'l':' Período Final','t':'labelFrmPeriodoFinal','f':'date'},
            'FrmArquivoFile':{'l':' Arquivo','t':'labelFrmArquivo','f':'banner'},
            'FrmStatus':{'l':' Status','t':'labelFrmStatus'},
			'btSubmit':{'l':'Cadastrar'}
        },
        o_config = {
            'to_disable' : ['Submit', 'Reset'],
            'alert' : 1
        }
        var vFrm = new validator('frm', a_fields, o_config);
    -->
    </script>
	</td>
  </tr>
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