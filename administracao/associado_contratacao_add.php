<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("associado_contratacao_add.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Associado Contratação: Cadastro </td>
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
        <td width="82"><a id="link_list" href="<?=$link_list?>" title="Clique para: Listar" alt="Clique para: Listar"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0" title="Clique para: Listar" alt="Clique para: Listar"></a></td>
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
	<form action="<?=$link_add?>" method="post" name="frm" id="frm" enctype="multipart/form-data" onsubmit="return _Validar();">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdAssociado">&nbsp;Associado: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdAssociado" class="frm" id="FrmIdAssociado" style="width:500px;">
    <? for($i=0; $i < count($VObjAssociado); $i++){ ?>
    <option value="<?=$VObjAssociado[$i]["id_associado"]?>" <? if($VObjAssociado[$i]["id_associado"] == $frm_id_associado){ print("selected"); }?>><?=$VObjAssociado[$i]["apelido"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdAssociadoPlano">&nbsp;Associado Plano: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdAssociadoPlano" class="frm" id="FrmIdAssociadoPlano" style="width:500px;">
    <? for($i=0; $i < count($VObjAssociadoPlano); $i++){ ?>
    <option value="<?=$VObjAssociadoPlano[$i]["id_associado_plano"]?>" <? if($VObjAssociadoPlano[$i]["id_associado_plano"] == $frm_id_associado_plano){ print("selected"); }?>><?=$VObjAssociadoPlano[$i]["titulo"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmValorBruto">&nbsp;Valor Bruto:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmValorBruto" id="FrmValorBruto" class="frm" size="9" maxlength="9" value="<?=$frm_valor_bruto?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmValorDesconto">&nbsp;Valor Desconto:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmValorDesconto" id="FrmValorDesconto" class="frm" size="9" maxlength="9" value="<?=$frm_valor_desconto?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmValorFinal">&nbsp;Valor Final:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmValorFinal" id="FrmValorFinal" class="frm" size="9" maxlength="9" value="<?=$frm_valor_final?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPagamentoRetorno">&nbsp;Pagamento Retorno:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?php $CKEditor = new CKEditor(); $CKEditor->returnOutput = true; $CKEditor->basePath="script/editorhtml/"; $CKEditor->config["height"] = 500; print $CKEditor->editor("FrmPagamentoRetorno", $frm_pagamento_retorno); ?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPagamentoDatahora">&nbsp;Pagamento Data/Hora:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPagamentoDatahora" id="FrmPagamentoDatahora" class="frm" size="19" maxlength="19" value="<?=$frm_pagamento_datahora?>">&nbsp;<input type="button" name="BTPagamentoDatahora" id="BTPagamentoDatahora" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmPagamentoDatahora", ifFormat:"%d/%m/%Y %H:%M:%S", showsTime:true, button:"BTPagamentoDatahora", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y H:i:s")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPagamentoValor">&nbsp;Pagamento Valor:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPagamentoValor" id="FrmPagamentoValor" class="frm" size="9" maxlength="9" value="<?=$frm_pagamento_valor?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPlanoDataInicial">&nbsp;Plano Data Inicial:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPlanoDataInicial" id="FrmPlanoDataInicial" class="frm" size="10" maxlength="10" value="<?=$frm_plano_data_inicial?>" onkeydown="fncFormataData('frm', 'FrmPlanoDataInicial')">&nbsp;<input type="button" name="BTPlanoDataInicial" id="BTPlanoDataInicial" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmPlanoDataInicial", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTPlanoDataInicial", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPlanoDataFinal">&nbsp;Plano Data Final:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPlanoDataFinal" id="FrmPlanoDataFinal" class="frm" size="10" maxlength="10" value="<?=$frm_plano_data_final?>" onkeydown="fncFormataData('frm', 'FrmPlanoDataFinal')">&nbsp;<input type="button" name="BTPlanoDataFinal" id="BTPlanoDataFinal" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmPlanoDataFinal", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTPlanoDataFinal", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmStatus">&nbsp;Status:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<label><input name="FrmStatus" type="radio" <? if($frm_status==1){ print('checked="checked"'); } ?> value="1" />Ativo</label>
          	<label><input name="FrmStatus" type="radio" <? if($frm_status==0){ print('checked="checked"'); } ?> value="0" />Inativo</label>
          </td>
        </tr>
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="submit" name="btSubmit" id="btSubmit" class="frm_botao" value="Cadastrar" <?=$label_alerta_status?>>
            <input type="reset"  name="btReset"    id="btReset"  class="frm_botao" value="Limpar" <?=$label_alerta_status?>>
		  </td>
        </tr>
      </table>
    </form>
    <script language="javascript">document.getElementById("FrmIdAssociado").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			var objFrmPagamentoRetorno = CKEDITOR.instances.FrmPagamentoRetorno;
			if(objFrmPagamentoRetorno != null){
				objFrmPagamentoRetorno.updateElement();
			}
			return vFrm.exec();
		}
        var a_fields = {
            'FrmIdAssociado':{'l':' Associado','t':'labelFrmIdAssociado','r':true},
            'FrmIdAssociadoPlano':{'l':' Associado Plano','t':'labelFrmIdAssociadoPlano','r':true},
            'FrmValorBruto':{'l':' Valor Bruto','t':'labelFrmValorBruto'},
            'FrmValorDesconto':{'l':' Valor Desconto','t':'labelFrmValorDesconto'},
            'FrmValorFinal':{'l':' Valor Final','t':'labelFrmValorFinal'},
            'FrmPagamentoRetorno':{'l':' Pagamento Retorno','t':'labelFrmPagamentoRetorno'},
            'FrmPagamentoDatahora':{'l':' Pagamento Data/Hora','t':'labelFrmPagamentoDatahora','f':'date'},
            'FrmPagamentoValor':{'l':' Pagamento Valor','t':'labelFrmPagamentoValor'},
            'FrmPlanoDataInicial':{'l':' Plano Data Inicial','t':'labelFrmPlanoDataInicial','f':'date'},
            'FrmPlanoDataFinal':{'l':' Plano Data Final','t':'labelFrmPlanoDataFinal','f':'date'},
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