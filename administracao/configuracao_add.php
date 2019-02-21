<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("configuracao_add.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Configuração: Cadastro </td>
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
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmNome">&nbsp;Nome: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmNome" id="FrmNome" class="frm" size="80" maxlength="255" value="<?=$frm_nome?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmNumero">&nbsp;Número: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmNumero" id="FrmNumero" class="frm" size="10" maxlength="10" value="<?=$frm_numero?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCargo">&nbsp;Cargo: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCargo" id="FrmCargo" class="frm" size="80" maxlength="100" value="<?=$frm_cargo?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEstado">&nbsp;Estado: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<select name="FrmEstado" class="frm" id="FrmEstado"><option value="AC" <? if($frm_estado=="AC"){ print("selected=\"selected\"");} ?>>AC</option><option value="AL" <? if($frm_estado=="AL"){ print("selected=\"selected\"");} ?>>AL</option><option value="AM" <? if($frm_estado=="AM"){ print("selected=\"selected\"");} ?>>AM</option><option value="AP" <? if($frm_estado=="AP"){ print("selected=\"selected\"");} ?>>AP</option><option value="BA" <? if($frm_estado=="BA"){ print("selected=\"selected\"");} ?>>BA</option><option value="CE" <? if($frm_estado=="CE"){ print("selected=\"selected\"");} ?>>CE</option><option value="DF" <? if($frm_estado=="DF"){ print("selected=\"selected\"");} ?>>DF</option><option value="ES" <? if($frm_estado=="ES"){ print("selected=\"selected\"");} ?>>ES</option><option value="GO" <? if($frm_estado=="GO"){ print("selected=\"selected\"");} ?>>GO</option><option value="MA" <? if($frm_estado=="MA"){ print("selected=\"selected\"");} ?>>MA</option><option value="MG" <? if($frm_estado=="MG"){ print("selected=\"selected\"");} ?>>MG</option><option value="MS" <? if($frm_estado=="MS"){ print("selected=\"selected\"");} ?>>MS</option><option value="MT" <? if($frm_estado=="MT"){ print("selected=\"selected\"");} ?>>MT</option><option value="PA" <? if($frm_estado=="PA"){ print("selected=\"selected\"");} ?>>PA</option><option value="PB" <? if($frm_estado=="PB"){ print("selected=\"selected\"");} ?>>PB</option><option value="PE" <? if($frm_estado=="PE"){ print("selected=\"selected\"");} ?>>PE</option><option value="PI" <? if($frm_estado=="PI"){ print("selected=\"selected\"");} ?>>PI</option><option value="PR" <? if($frm_estado=="PR"){ print("selected=\"selected\"");} ?>>PR</option><option value="RJ" <? if($frm_estado=="RJ"){ print("selected=\"selected\"");} ?>>RJ</option><option value="RN" <? if($frm_estado=="RN"){ print("selected=\"selected\"");} ?>>RN</option><option value="RO" <? if($frm_estado=="RO"){ print("selected=\"selected\"");} ?>>RO</option><option value="RR" <? if($frm_estado=="RR"){ print("selected=\"selected\"");} ?>>RR</option><option value="RS" <? if($frm_estado=="RS"){ print("selected=\"selected\"");} ?>>RS</option><option value="SC" <? if($frm_estado=="SC"){ print("selected=\"selected\"");} ?>>SC</option><option value="SE" <? if($frm_estado=="SE"){ print("selected=\"selected\"");} ?>>SE</option><option value="SP" <? if($frm_estado=="SP"){ print("selected=\"selected\"");} ?>>SP</option><option value="TO" <? if($frm_estado=="TO"){ print("selected=\"selected\"");} ?>>TO</option></select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmSlogan">&nbsp;Slogan: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmSlogan" id="FrmSlogan" class="frm" size="80" maxlength="255" value="<?=$frm_slogan?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmPartido">&nbsp;Partido: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmPartido" id="FrmPartido" class="frm" size="20" maxlength="20" value="<?=$frm_partido?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmColigacao">&nbsp;Coligação: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmColigacao" id="FrmColigacao" class="frm" size="80" maxlength="255" value="<?=$frm_coligacao?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCnpj">&nbsp;Cnpj: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCnpj" id="FrmCnpj" class="frm" size="20" maxlength="20" value="<?=$frm_cnpj?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmail">&nbsp;E-mail: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmail" id="FrmEmail" class="frm" size="80" maxlength="255" value="<?=$frm_email?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTelefone">&nbsp;Telefone:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTelefone" id="FrmTelefone" class="frm" size="80" maxlength="100" value="<?=$frm_telefone?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEnderecoCompleto">&nbsp;Endereço Completo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEnderecoCompleto" id="FrmEnderecoCompleto" class="frm" size="80" maxlength="255" value="<?=$frm_endereco_completo?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmRodape">&nbsp;Rodape:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?php $CKEditor = new CKEditor(); $CKEditor->returnOutput = true; $CKEditor->basePath="script/editorhtml/"; $CKEditor->config["height"] = 500; print $CKEditor->editor("FrmRodape", $frm_rodape); ?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTwitterStatus">&nbsp;Twitter Status:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<label><input name="FrmTwitterStatus" type="radio" <? if($frm_status==1){ print('checked="checked"'); } ?> value="1" />Ativo</label>
          	<label><input name="FrmTwitterStatus" type="radio" <? if($frm_status==0){ print('checked="checked"'); } ?> value="0" />Inativo</label>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTwitterUsername">&nbsp;Twitter Username:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTwitterUsername" id="FrmTwitterUsername" class="frm" size="80" maxlength="100" value="<?=$frm_twitter_username?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTwitterPassword">&nbsp;Twitter Password:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTwitterPassword" id="FrmTwitterPassword" class="frm" size="80" maxlength="100" value="<?=$frm_twitter_password?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTwitterRssUrl">&nbsp;Twitter Rss Url (Endereço):  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTwitterRssUrl" id="FrmTwitterRssUrl" class="frm" size="80" maxlength="255" value="<?=$frm_twitter_rss_url?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmLinkTwitter">&nbsp;Link Twitter:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmLinkTwitter" id="FrmLinkTwitter" class="frm" size="80" maxlength="255" value="<?=$frm_link_twitter?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmLinkOrkut">&nbsp;Link Orkut:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmLinkOrkut" id="FrmLinkOrkut" class="frm" size="80" maxlength="255" value="<?=$frm_link_orkut?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmLinkYoutube">&nbsp;Link Youtube:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmLinkYoutube" id="FrmLinkYoutube" class="frm" size="80" maxlength="255" value="<?=$frm_link_youtube?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmLinkFacebook">&nbsp;Link Facebook:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmLinkFacebook" id="FrmLinkFacebook" class="frm" size="80" maxlength="255" value="<?=$frm_link_facebook?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmLinkFlickr">&nbsp;Link Flickr:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmLinkFlickr" id="FrmLinkFlickr" class="frm" size="80" maxlength="255" value="<?=$frm_link_flickr?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmAnalyticsKey">&nbsp;Analytics Key:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmAnalyticsKey" id="FrmAnalyticsKey" class="frm" size="20" maxlength="20" value="<?=$frm_analytics_key?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTemplateTopo">&nbsp;Template Topo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTemplateTopo" id="FrmTemplateTopo" class="frm" size="20" maxlength="20" value="<?=$frm_template_topo?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTemplateConteudo">&nbsp;Template Conteúdo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTemplateConteudo" id="FrmTemplateConteudo" class="frm" size="20" maxlength="20" value="<?=$frm_template_conteudo?>">
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
    <script language="javascript">document.getElementById("FrmNome").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			var objFrmRodape = CKEDITOR.instances.FrmRodape;
			if(objFrmRodape != null){
				objFrmRodape.updateElement();
			}
			return vFrm.exec();
		}
        var a_fields = {
            'FrmNome':{'l':' Nome','t':'labelFrmNome','r':true},
            'FrmNumero':{'l':' Número','t':'labelFrmNumero','r':true},
            'FrmCargo':{'l':' Cargo','t':'labelFrmCargo','r':true},
            'FrmEstado':{'l':' Estado','t':'labelFrmEstado','r':true},
            'FrmSlogan':{'l':' Slogan','t':'labelFrmSlogan','r':true},
            'FrmPartido':{'l':' Partido','t':'labelFrmPartido','r':true},
            'FrmColigacao':{'l':' Coligação','t':'labelFrmColigacao','r':true},
            'FrmCnpj':{'l':' Cnpj','t':'labelFrmCnpj','r':true,'f':'cnpj'},
            'FrmEmail':{'l':' E-mail','t':'labelFrmEmail','r':true,'f':'email'},
            'FrmTelefone':{'l':' Telefone','t':'labelFrmTelefone'},
            'FrmEnderecoCompleto':{'l':' Endereço Completo','t':'labelFrmEnderecoCompleto'},
            'FrmRodape':{'l':' Rodape','t':'labelFrmRodape'},
            'FrmTwitterStatus':{'l':' Twitter Status','t':'labelFrmTwitterStatus'},
            'FrmTwitterUsername':{'l':' Twitter Username','t':'labelFrmTwitterUsername'},
            'FrmTwitterPassword':{'l':' Twitter Password','t':'labelFrmTwitterPassword'},
            'FrmTwitterRssUrl':{'l':' Twitter Rss Url (Endereço)','t':'labelFrmTwitterRssUrl'},
            'FrmLinkTwitter':{'l':' Link Twitter','t':'labelFrmLinkTwitter'},
            'FrmLinkOrkut':{'l':' Link Orkut','t':'labelFrmLinkOrkut'},
            'FrmLinkYoutube':{'l':' Link Youtube','t':'labelFrmLinkYoutube'},
            'FrmLinkFacebook':{'l':' Link Facebook','t':'labelFrmLinkFacebook'},
            'FrmLinkFlickr':{'l':' Link Flickr','t':'labelFrmLinkFlickr'},
            'FrmAnalyticsKey':{'l':' Analytics Key','t':'labelFrmAnalyticsKey'},
            'FrmTemplateTopo':{'l':' Template Topo','t':'labelFrmTemplateTopo'},
            'FrmTemplateConteudo':{'l':' Template Conteúdo','t':'labelFrmTemplateConteudo'},
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