<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("localidade_edit.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Localidade: Edi&ccedil;&atilde;o </td>
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
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmUf">&nbsp;Uf: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<select name="FrmUf" class="frm" id="FrmUf"><option value="AC" <? if($frm_uf=="AC"){ print("selected=\"selected\"");} ?>>AC</option><option value="AL" <? if($frm_uf=="AL"){ print("selected=\"selected\"");} ?>>AL</option><option value="AM" <? if($frm_uf=="AM"){ print("selected=\"selected\"");} ?>>AM</option><option value="AP" <? if($frm_uf=="AP"){ print("selected=\"selected\"");} ?>>AP</option><option value="BA" <? if($frm_uf=="BA"){ print("selected=\"selected\"");} ?>>BA</option><option value="CE" <? if($frm_uf=="CE"){ print("selected=\"selected\"");} ?>>CE</option><option value="DF" <? if($frm_uf=="DF"){ print("selected=\"selected\"");} ?>>DF</option><option value="ES" <? if($frm_uf=="ES"){ print("selected=\"selected\"");} ?>>ES</option><option value="GO" <? if($frm_uf=="GO"){ print("selected=\"selected\"");} ?>>GO</option><option value="MA" <? if($frm_uf=="MA"){ print("selected=\"selected\"");} ?>>MA</option><option value="MG" <? if($frm_uf=="MG"){ print("selected=\"selected\"");} ?>>MG</option><option value="MS" <? if($frm_uf=="MS"){ print("selected=\"selected\"");} ?>>MS</option><option value="MT" <? if($frm_uf=="MT"){ print("selected=\"selected\"");} ?>>MT</option><option value="PA" <? if($frm_uf=="PA"){ print("selected=\"selected\"");} ?>>PA</option><option value="PB" <? if($frm_uf=="PB"){ print("selected=\"selected\"");} ?>>PB</option><option value="PE" <? if($frm_uf=="PE"){ print("selected=\"selected\"");} ?>>PE</option><option value="PI" <? if($frm_uf=="PI"){ print("selected=\"selected\"");} ?>>PI</option><option value="PR" <? if($frm_uf=="PR"){ print("selected=\"selected\"");} ?>>PR</option><option value="RJ" <? if($frm_uf=="RJ"){ print("selected=\"selected\"");} ?>>RJ</option><option value="RN" <? if($frm_uf=="RN"){ print("selected=\"selected\"");} ?>>RN</option><option value="RO" <? if($frm_uf=="RO"){ print("selected=\"selected\"");} ?>>RO</option><option value="RR" <? if($frm_uf=="RR"){ print("selected=\"selected\"");} ?>>RR</option><option value="RS" <? if($frm_uf=="RS"){ print("selected=\"selected\"");} ?>>RS</option><option value="SC" <? if($frm_uf=="SC"){ print("selected=\"selected\"");} ?>>SC</option><option value="SE" <? if($frm_uf=="SE"){ print("selected=\"selected\"");} ?>>SE</option><option value="SP" <? if($frm_uf=="SP"){ print("selected=\"selected\"");} ?>>SP</option><option value="TO" <? if($frm_uf=="TO"){ print("selected=\"selected\"");} ?>>TO</option></select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCidade">&nbsp;Cidade: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCidade" id="FrmCidade" class="frm" size="80" maxlength="200" value="<?=$frm_cidade?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCapital">&nbsp;Capital: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCapital" id="FrmCapital" class="frm" size="11" maxlength="11" value="<?=$frm_capital?>">
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
    <script language="javascript">document.getElementById("FrmUf").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			return vFrm.exec();
		}
        var a_fields = {
            'FrmUf':{'l':' Uf','t':'labelFrmUf','r':true},
            'FrmCidade':{'l':' Cidade','t':'labelFrmCidade','r':true},
            'FrmCapital':{'l':' Capital','t':'labelFrmCapital','r':true},
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