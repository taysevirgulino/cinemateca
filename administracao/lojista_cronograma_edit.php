<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("lojista_cronograma_edit.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Lojista Cronograma: Edi&ccedil;&atilde;o </td>
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
        <td width="12"><a id="link_remove" href="<?=$link_remove?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');" title="Clique para: Excluir" alt="Clique para: Excluir"><img src="images/botao/btn_remove_over.gif" width="21" height="21" border="0" title="Clique para: Excluir" alt="Clique para: Excluir"></a></td>
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
	<form action="<?=$link_edit?>" method="post" name="frm" id="frm" enctype="multipart/form-data" onsubmit="return _Validar();">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdLojista">&nbsp;Lojista: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdLojista" class="frm" id="FrmIdLojista" style="width:500px;">
    <? for($i=0; $i < count($VObjLojista); $i++){ ?>
    <option value="<?=$VObjLojista[$i]["id_lojista"]?>" <? if($VObjLojista[$i]["id_lojista"] == $frm_id_lojista){ print("selected"); }?>><?=$VObjLojista[$i]["nome"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdCronogramaFarol">&nbsp;Cronograma Farol: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdCronogramaFarol" class="frm" id="FrmIdCronogramaFarol" style="width:500px;">
    <? for($i=0; $i < count($VObjCronogramaFarol); $i++){ ?>
    <option value="<?=$VObjCronogramaFarol[$i]["id_cronograma_farol"]?>" <? if($VObjCronogramaFarol[$i]["id_cronograma_farol"] == $frm_id_cronograma_farol){ print("selected"); }?>><?=$VObjCronogramaFarol[$i]["titulo"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPorcentagemIndefinido">&nbsp;Porcentagem Indefinido:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPorcentagemIndefinido" id="FrmPorcentagemIndefinido" class="frm" size="9" maxlength="9" value="<?=$frm_porcentagem_indefinido?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPorcentagemAberto">&nbsp;Porcentagem Aberto:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPorcentagemAberto" id="FrmPorcentagemAberto" class="frm" size="9" maxlength="9" value="<?=$frm_porcentagem_aberto?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPorcentagemVencido">&nbsp;Porcentagem Vencido:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPorcentagemVencido" id="FrmPorcentagemVencido" class="frm" size="9" maxlength="9" value="<?=$frm_porcentagem_vencido?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPorcentagemConcluido">&nbsp;Porcentagem Concluido:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPorcentagemConcluido" id="FrmPorcentagemConcluido" class="frm" size="9" maxlength="9" value="<?=$frm_porcentagem_concluido?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPrevisaoInicio">&nbsp;Previsão Inicio:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPrevisaoInicio" id="FrmPrevisaoInicio" class="frm" size="10" maxlength="10" value="<?=$frm_previsao_inicio?>">&nbsp;<input type="button" name="BTPrevisaoInicio" id="BTPrevisaoInicio" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmPrevisaoInicio", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTPrevisaoInicio", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPrevisaoFim">&nbsp;Previsão Fim:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPrevisaoFim" id="FrmPrevisaoFim" class="frm" size="10" maxlength="10" value="<?=$frm_previsao_fim?>">&nbsp;<input type="button" name="BTPrevisaoFim" id="BTPrevisaoFim" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmPrevisaoFim", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTPrevisaoFim", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
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
    <script language="javascript">document.getElementById("FrmIdLojista").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			return vFrm.exec();
		}
        var a_fields = {
            'FrmIdLojista':{'l':' Lojista','t':'labelFrmIdLojista','r':true},
            'FrmIdCronogramaFarol':{'l':' Cronograma Farol','t':'labelFrmIdCronogramaFarol','r':true},
            'FrmPorcentagemIndefinido':{'l':' Porcentagem Indefinido','t':'labelFrmPorcentagemIndefinido'},
            'FrmPorcentagemAberto':{'l':' Porcentagem Aberto','t':'labelFrmPorcentagemAberto'},
            'FrmPorcentagemVencido':{'l':' Porcentagem Vencido','t':'labelFrmPorcentagemVencido'},
            'FrmPorcentagemConcluido':{'l':' Porcentagem Concluido','t':'labelFrmPorcentagemConcluido'},
            'FrmPrevisaoInicio':{'l':' Previsão Inicio','t':'labelFrmPrevisaoInicio','f':'date'},
            'FrmPrevisaoFim':{'l':' Previsão Fim','t':'labelFrmPrevisaoFim','f':'date'},
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