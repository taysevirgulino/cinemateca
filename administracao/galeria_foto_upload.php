<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("galeria_foto_upload.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Galeria Foto: Cadastro </td>
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
        <td width="22"><img src="images/botao/btn_add_dim.gif" width="22" height="21" border="0" alt="Clique para: Cadastrar"></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21" title="Clique para: Editar" alt="Clique para: Editar"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21" title="Clique para: Excluir" alt="Clique para: Excluir"></td>
        <td width="82"><a id="link_list" href="<?=$link_list?>" title="Clique para: Listar" alt="Clique para: Listar"><img src="images/botao/btn_voltar_over.gif" width="22" height="21" border="0" alt="Clique para: Voltar"></a></td>
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
    <td height="10"></td>
  </tr>
  <tr>
    <td height="10" style="font-size:12px; font-weight:bold; color:#FF0000">�lbum: <?=$album_label?></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>  
  <tr>
    <td>Preencha corretamente o formul&aacute;rio abaixo: </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <? if(!$conteudoPadrao){ ?>
  <tr>
    <td>
	<form action="" method="post" name="frm" id="frm" enctype="multipart/form-data" onSubmit="return _Validar();">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td height="25" colspan="2" class="frm_texto">Informa��es para todas fotos (opcional):</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCredito">&nbsp;T�tulo/Cr�dito:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCredito" id="FrmCredito" class="frm" size="80" maxlength="255" value="<?=$frm_credito?>" style="width:98%">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDescricao">&nbsp;Descri��o:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDescricao" id="FrmDescricao" class="frm" size="80" maxlength="255" value="<?=$frm_descricao?>" style="width:98%">
          </td>
        </tr>
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="submit" name="btSubmit" id="btSubmit" class="frm_botao" value="Pr�ximo >" <?=$label_alerta_status?>>
		  </td>
        </tr>
      </table>
    </form>
	</td>
  </tr>
  <? }else{ ?>
  <tr>
    <td>
	<form action="galeria_foto_upload.php" method="post" name="frm" id="frm" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td height="25" colspan="2" class="frm_texto">1) Informa��es para todas fotos (opcional):</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCredito">&nbsp;T�tulo/Cr�dito:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_credito?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDescricao">&nbsp;Descri��o:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_descricao?>
          </td>
        </tr>
        <tr>
          <td height="25" colspan="2" class="frm_texto">2) Upload de Imagens: <span style="font-weight:normal">(formatos v�lidos: .jpg ou .gif)</span></td>
        </tr>
        <tr>
          <td height="25" colspan="2" bgcolor="#FFFFFF" class="frm_texto" align="center">
            <applet name="jumpLoaderApplet" code="jmaster.jumploader.app.JumpLoaderApplet.class" archive="plugins/jumploader/jumploader_z.jar" mayscript="" height="600" width="100%">
                <param name="ac_messagesZipUrl" value="plugins/jumploader/i18n/messages_pt-br.zip">
                <param name="uc_imageEditorEnabled" value="true">
                <param name="uc_uploadUrl" value="galeria_foto_upload_file.php?ida=<?=$IDA?>&credito=<?=urlencode(base64_encode($frm_credito))?>&descricao=<?=urlencode(base64_encode($frm_descricao))?>">
                <param name="uc_maxFileLength" value="15120000">
                <param name="ac_fireUploaderFileStatusChanged" value="true"/>
                <param name="uc_fileNamePattern" value="^.+\.(?i)((jpg)|(gif))$"/>
                <param name="vc_fileNamePattern" value="^.+\.(?i)((jpg)|(gif))$"/>
                <param name="vc_disableLocalFileSystem" value="false"/>
                <param name="vc_mainViewFileTreeViewVisible" value="true"/>
                <param name="vc_mainViewFileListViewVisible" value="true"/>
            </applet>        
          </td>
        </tr>
        <tr>
          <td height="25" colspan="2" bgcolor="#FFFFFF">
          	<span style="color:#FF0000;">
	            � necess�rio ter instalado o plugin do <strong>Java</strong>, caso n�o tenha, <a href="http://www.java.com/pt_BR/" target="_blank" style="color:#FF0000; text-decoration:underline;">clique aqui para instalar.</a>
            </span>
          </td>
        </tr>
      </table>
    </form>
	</td>
  </tr>
  <? } ?>
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