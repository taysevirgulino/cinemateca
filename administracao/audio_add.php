<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("audio_add.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<script language="javascript" src="script/audio.js"></script>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Áudio: Cadastro </td>
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
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21" alt="Clique para: Excluir"></td>
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
	<form action="<?=$link_add?>" method="post" name="frm" id="frm" enctype="multipart/form-data" onsubmit="return _Validar();">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdAudioCategoria">&nbsp;Categoria: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdAudioCategoria" class="frm" id="FrmIdAudioCategoria" style="width:500px;">
				<? for($i=0; $i < count($VObjAudioCategoria); $i++){ ?>
				<option value="<?=$VObjAudioCategoria[$i]["id_audio_categoria"]?>" <? if($VObjAudioCategoria[$i]["id_audio_categoria"] == $frm_id_audio_categoria){ print("selected"); }?>><?=$VObjAudioCategoria[$i]["nome"]?></option>
				<? } ?>
			  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTitulo">&nbsp;Título: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTitulo" id="FrmTitulo" class="frm" size="80" maxlength="255" value="<?=$frm_titulo?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDescricao">&nbsp;Descrição:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?php $CKEditor = new CKEditor(); $CKEditor->returnOutput = true; $CKEditor->basePath="script/editorhtml/"; $CKEditor->config["height"] = 200; print $CKEditor->editor("FrmDescricao", $frm_descricao); ?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmArquivo">&nbsp;Arquivo: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <select name="FrmArquivo" class="frm" id="FrmArquivo" style="width:400px;">
	            <option value="" selected="selected">[Embed]</option>
				<? for($i=0; $i < count($VObjFile); $i++){ ?>
                <option value="<?=$VObjFile[$i]?>" <? if($VObjFile[$i] == $frm_arquivo){ print("selected"); }?>><?=$VObjFile[$i]?></option>
                <? } ?>
            </select>
            <a href="multimidia_upload.php" title="Enviar outro Arquivo">[Enviar novo Arquivo]</a>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmbed">&nbsp;Embed:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<textarea name="FrmEmbed" id="FrmEmbed" cols="40" rows="5" class="frm" style="width:98%;" onKeyUp="FilterEmbed();"><?=$frm_embed?></textarea><br />
            <span class="frm_exemplo">Incorporar áudios outros sites.</span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmWidth">&nbsp;Largura (Width): *  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmWidth" id="FrmWidth" class="frm" size="11" maxlength="11" value="<?=$frm_width?>" onKeyUp="OnSizeChanged('Width',this.value);"> <span class="frm_exemplo">Largura padrão: 240x20</span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmHeight">&nbsp;Altura (Height): *  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmHeight" id="FrmHeight" class="frm" size="11" maxlength="11" value="<?=$frm_height?>" onKeyUp="OnSizeChanged('Height',this.value);">
			<label><input checked="checked" type="checkbox" id="btnLockSizes" class="BtnLocked" onMouseOver="this.className = (bLockRatio ? 'BtnLocked' : 'BtnUnlocked' ) + ' BtnOver';"
                onmouseout="this.className = (bLockRatio ? 'BtnLocked' : 'BtnUnlocked' );" title="Lock Sizes"
                onclick="SwitchLock(this);" />
                Manter proporção</label>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmImagem">&nbsp;Imagem:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="file" name="FrmImagemFile" id="FrmImagemFile" class="frm" size="60" maxlength="255" value="">
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
    <script language="javascript">document.getElementById("FrmIdAudioCategoria").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			var objFrmDescricao = CKEDITOR.instances.FrmDescricao;
			if(objFrmDescricao != null){
				objFrmDescricao.updateElement();
			}

			if(!vFrm.exec()){ return false; }
			
			var objVideo = document.getElementById("FrmArquivo");
			var objEmbed = document.getElementById("FrmEmbed");
			if( (objVideo.value == "") && (objEmbed.value == "") ){
				alert("- Selecione um Arquivo ou preencha um Embed;");
				objVideo.focus();
				return false;
			}

			return true;
		}
        var a_fields = {
            'FrmIdAudioCategoria':{'l':' Categoria','t':'labelFrmIdAudioCategoria','r':true},
            'FrmTitulo':{'l':' Título','t':'labelFrmTitulo','r':true},
            'FrmDescricao':{'l':' Descrição','t':'labelFrmDescricao'},
            'FrmArquivo':{'l':' Arquivo','t':'labelFrmArquivo'},
            'FrmEmbed':{'l':' Embed','t':'labelFrmEmbed'},
            'FrmWidth':{'l':' Largura (Width)','t':'labelFrmWidth','r':true},
            'FrmHeight':{'l':' Altura (Height)','t':'labelFrmHeight','r':true},
            'FrmImagemFile':{'l':' Imagem','t':'labelFrmImagem','f':'image'},
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