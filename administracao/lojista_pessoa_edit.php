<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("lojista_pessoa_edit.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Lojista Pessoa: Edi&ccedil;&atilde;o </td>
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
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdLojistaPessoaPerfil">&nbsp;Lojista Pessoa Perfil: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdLojistaPessoaPerfil" class="frm" id="FrmIdLojistaPessoaPerfil" style="width:500px;">
    <? for($i=0; $i < count($VObjLojistaPessoaPerfil); $i++){ ?>
    <option value="<?=$VObjLojistaPessoaPerfil[$i]["id_lojista_pessoa_perfil"]?>" <? if($VObjLojistaPessoaPerfil[$i]["id_lojista_pessoa_perfil"] == $frm_id_lojista_pessoa_perfil){ print("selected"); }?>><?=$VObjLojistaPessoaPerfil[$i]["titulo"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdUsuario">&nbsp;Usuário: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdUsuario" class="frm" id="FrmIdUsuario" style="width:500px;">
    <? for($i=0; $i < count($VObjUsuario); $i++){ ?>
    <option value="<?=$VObjUsuario[$i]["id_usuario"]?>" <? if($VObjUsuario[$i]["id_usuario"] == $frm_id_usuario){ print("selected"); }?>><?=$VObjUsuario[$i]["nome"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmNome">&nbsp;Nome: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmNome" id="FrmNome" class="frm" size="80" maxlength="255" value="<?=$frm_nome?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmail">&nbsp;E-mail: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmail" id="FrmEmail" class="frm" size="80" maxlength="255" value="<?=$frm_email?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmail2">&nbsp;E-mail2:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmail2" id="FrmEmail2" class="frm" size="80" maxlength="255" value="<?=$frm_email2?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTelefone">&nbsp;Telefone: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTelefone" id="FrmTelefone" class="frm" size="20" maxlength="20" value="<?=$frm_telefone?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTelefone2">&nbsp;Telefone2:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTelefone2" id="FrmTelefone2" class="frm" size="20" maxlength="20" value="<?=$frm_telefone2?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEndereco">&nbsp;Endereço:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEndereco" id="FrmEndereco" class="frm" size="80" maxlength="255" value="<?=$frm_endereco?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCidade">&nbsp;Cidade:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCidade" id="FrmCidade" class="frm" size="80" maxlength="255" value="<?=$frm_cidade?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEstado">&nbsp;Estado:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<select name="FrmEstado" class="frm" id="FrmEstado"><option value="AC" <? if($frm_estado=="AC"){ print("selected=\"selected\"");} ?>>AC</option><option value="AL" <? if($frm_estado=="AL"){ print("selected=\"selected\"");} ?>>AL</option><option value="AM" <? if($frm_estado=="AM"){ print("selected=\"selected\"");} ?>>AM</option><option value="AP" <? if($frm_estado=="AP"){ print("selected=\"selected\"");} ?>>AP</option><option value="BA" <? if($frm_estado=="BA"){ print("selected=\"selected\"");} ?>>BA</option><option value="CE" <? if($frm_estado=="CE"){ print("selected=\"selected\"");} ?>>CE</option><option value="DF" <? if($frm_estado=="DF"){ print("selected=\"selected\"");} ?>>DF</option><option value="ES" <? if($frm_estado=="ES"){ print("selected=\"selected\"");} ?>>ES</option><option value="GO" <? if($frm_estado=="GO"){ print("selected=\"selected\"");} ?>>GO</option><option value="MA" <? if($frm_estado=="MA"){ print("selected=\"selected\"");} ?>>MA</option><option value="MG" <? if($frm_estado=="MG"){ print("selected=\"selected\"");} ?>>MG</option><option value="MS" <? if($frm_estado=="MS"){ print("selected=\"selected\"");} ?>>MS</option><option value="MT" <? if($frm_estado=="MT"){ print("selected=\"selected\"");} ?>>MT</option><option value="PA" <? if($frm_estado=="PA"){ print("selected=\"selected\"");} ?>>PA</option><option value="PB" <? if($frm_estado=="PB"){ print("selected=\"selected\"");} ?>>PB</option><option value="PE" <? if($frm_estado=="PE"){ print("selected=\"selected\"");} ?>>PE</option><option value="PI" <? if($frm_estado=="PI"){ print("selected=\"selected\"");} ?>>PI</option><option value="PR" <? if($frm_estado=="PR"){ print("selected=\"selected\"");} ?>>PR</option><option value="RJ" <? if($frm_estado=="RJ"){ print("selected=\"selected\"");} ?>>RJ</option><option value="RN" <? if($frm_estado=="RN"){ print("selected=\"selected\"");} ?>>RN</option><option value="RO" <? if($frm_estado=="RO"){ print("selected=\"selected\"");} ?>>RO</option><option value="RR" <? if($frm_estado=="RR"){ print("selected=\"selected\"");} ?>>RR</option><option value="RS" <? if($frm_estado=="RS"){ print("selected=\"selected\"");} ?>>RS</option><option value="SC" <? if($frm_estado=="SC"){ print("selected=\"selected\"");} ?>>SC</option><option value="SE" <? if($frm_estado=="SE"){ print("selected=\"selected\"");} ?>>SE</option><option value="SP" <? if($frm_estado=="SP"){ print("selected=\"selected\"");} ?>>SP</option><option value="TO" <? if($frm_estado=="TO"){ print("selected=\"selected\"");} ?>>TO</option></select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCep">&nbsp;Cep:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCep" id="FrmCep" class="frm" size="20" maxlength="20" value="<?=$frm_cep?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmObservacoes">&nbsp;Observações:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?php $CKEditor = new CKEditor(); $CKEditor->returnOutput = true; $CKEditor->basePath="script/editorhtml/"; $CKEditor->config["height"] = 500; print $CKEditor->editor("FrmObservacoes", $frm_observacoes); ?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmReceberEmail">&nbsp;Receber E-mail:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmReceberEmail" id="FrmReceberEmail" class="frm" size="11" maxlength="11" value="<?=$frm_receber_email?>">
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
			var objFrmObservacoes = CKEDITOR.instances.FrmObservacoes;
			if(objFrmObservacoes != null){
				objFrmObservacoes.updateElement();
			}
			return vFrm.exec();
		}
        var a_fields = {
            'FrmIdLojista':{'l':' Lojista','t':'labelFrmIdLojista','r':true},
            'FrmIdLojistaPessoaPerfil':{'l':' Lojista Pessoa Perfil','t':'labelFrmIdLojistaPessoaPerfil','r':true},
            'FrmIdUsuario':{'l':' Usuário','t':'labelFrmIdUsuario','r':true},
            'FrmNome':{'l':' Nome','t':'labelFrmNome','r':true},
            'FrmEmail':{'l':' E-mail','t':'labelFrmEmail','r':true,'f':'email'},
            'FrmEmail2':{'l':' E-mail2','t':'labelFrmEmail2','f':'email'},
            'FrmTelefone':{'l':' Telefone','t':'labelFrmTelefone','r':true},
            'FrmTelefone2':{'l':' Telefone2','t':'labelFrmTelefone2'},
            'FrmEndereco':{'l':' Endereço','t':'labelFrmEndereco'},
            'FrmCidade':{'l':' Cidade','t':'labelFrmCidade'},
            'FrmEstado':{'l':' Estado','t':'labelFrmEstado'},
            'FrmCep':{'l':' Cep','t':'labelFrmCep','f':'unsigned','mn': 8},
            'FrmObservacoes':{'l':' Observações','t':'labelFrmObservacoes'},
            'FrmReceberEmail':{'l':' Receber E-mail','t':'labelFrmReceberEmail','f':'email'},
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