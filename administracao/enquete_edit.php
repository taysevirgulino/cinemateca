<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("enquete_edit.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Enquete: Edi&ccedil;&atilde;o </td>
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
        <td width="22"><a href="<?=$link_add?>"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0" alt="Clique para: Cadastrar"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21" alt="Clique para: Editar"></td>
        <td width="12"><a href="<?=$link_remove?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/btn_remove_over.gif" width="21" height="21" border="0" alt="Clique para: Excluir"></a></td>
        <td width="82"><a href="<?=$link_list?>"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0" alt="Clique para: Listar"></a></td>
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
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPergunta">&nbsp;Pergunta: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <textarea name="FrmPergunta" id="FrmPergunta" cols="79" rows="3" class="frm"><?=$frm_pergunta?></textarea>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDataInicial">&nbsp;Data Inicial: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDataInicial" id="FrmDataInicial" class="frm" size="10" maxlength="10" value="<?=$frm_data_inicial?>" onkeydown="fncFormataData('frm', 'FrmDataInicial')">&nbsp;<input type="button" name="BTDataInicial" id="BTDataInicial" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmDataInicial", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTDataInicial", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDataFinal">&nbsp;Data Final: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDataFinal" id="FrmDataFinal" class="frm" size="10" maxlength="10" value="<?=$frm_data_final?>" onkeydown="fncFormataData('frm', 'FrmDataFinal')">&nbsp;<input type="button" name="BTDataFinal" id="BTDataFinal" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmDataFinal", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTDataFinal", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmResposta">&nbsp;Alternativa 1: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmResposta0" id="FrmResposta0" class="frm" size="80" maxlength="255" value="<?=$frm_resposta[0][0]?>">
            <input name="FrmIdAlternativa0" id="FrmIdAlternativa0" type="hidden" value="<?=$frm_resposta[0][1]?>" />
          </td>
        </tr>
		<? for($i=1; $i < $qtd_alternativa; $i++){ if($i == 0){$h=0;}else{$h=1;} ?>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmResposta<?=$i?>">&nbsp;Alternativa <?=$i+1?>: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmResposta<?=$i?>" id="FrmResposta<?=$i?>" class="frm" size="80" maxlength="255" value="<?=$frm_resposta[$i][0]?>">
            <input name="FrmIdAlternativa<?=$i?>" id="FrmIdAlternativa<?=$i?>" type="hidden" value="<?=$frm_resposta[$i][1]?>" />
            <a href="enquete_alternativa_priority.php?id=<?=$ID?>&idatual=<?=$frm_resposta[$i][1]?>&idalterar=<?=$frm_resposta[$i-$h][1]?>" onclick="javascript: return confirm('Deseja realmente Alterar a Prioridade?');"><img src="images/seta1.gif" width="15" height="15" border="0" alt="Alterar Prioridade | C�digo: <?=$frm_resposta[$i][1]?> por <?=$frm_resposta[$i-$h][1]?>" /></a>
          </td>
        </tr>
		<? } ?>
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
    <script language="javascript">document.getElementById("FrmPergunta").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			return vFrm.exec();
		}
        var a_fields = {
            'FrmPergunta':{'l':' Pergunta','t':'labelFrmPergunta','r':true},
            'FrmDataInicial':{'l':' Data Inicial','t':'labelFrmDataInicial','r':true,'f':'date'},
            'FrmDataFinal':{'l':' Data Final','t':'labelFrmDataFinal','r':true,'f':'date'},
			'FrmResposta0':{'l':' Alternativa 1','t':'labelFrmResposta','r':true},
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