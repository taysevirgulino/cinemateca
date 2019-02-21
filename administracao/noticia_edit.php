<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("noticia_edit.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<script type='text/javascript' src='script/jquery/jquery-autocomplete/lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='script/jquery/jquery-autocomplete/lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='script/jquery/jquery-autocomplete/lib/thickbox-compressed.js'></script>
<script type='text/javascript' src='script/jquery/jquery-autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="script/jquery/jquery-autocomplete/jquery.autocomplete.css" />
<script type="text/javascript" src="script/noticia.js"></script>

<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Notícia: Edi&ccedil;&atilde;o </td>
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
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:0px 3px 3px 0px; font-size:14px">Notícia:</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmChapeu">&nbsp;Chapéu:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmChapeu" id="FrmChapeu" class="frm" size="40" maxlength="40" value="<?=$frm_chapeu?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTitulo">&nbsp;Título: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTitulo" id="FrmTitulo" class="frm" size="80" maxlength="255" value="<?=$frm_titulo?>" style="width:98%" onblur="">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmResumo">&nbsp;Resumo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<textarea name="FrmResumo" id="FrmResumo" rows="4" class="frm" style="width:98%"><?=$frm_resumo?></textarea>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTipo">&nbsp;Tipo: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<label><input name="FrmTipo" type="radio" <? if($frm_tipo==NoticiaTipo::Noticia()){ print('checked="checked"'); } ?> value="<?=NoticiaTipo::Noticia()?>" onClick="javascript:_Tipo(<?=NoticiaTipo::Noticia()?>);" />Notícia</label>
          	<label><input name="FrmTipo" type="radio" <? if($frm_tipo==NoticiaTipo::LinkExterno()){ print('checked="checked"'); } ?> value="<?=NoticiaTipo::LinkExterno()?>" onClick="javascript:_Tipo(<?=NoticiaTipo::LinkExterno()?>);" />Link Externo</label>
          </td>
        </tr>
        <tr id="trTexto1">
          <td colspan="2" width="100%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTexto">&nbsp;Texto: * </td>
        </tr>
        <tr id="trTexto2">
          <td colspan="2" width="100%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px;">
          	<?php $CKEditor = new CKEditor(); $CKEditor->returnOutput = true; $CKEditor->basePath="script/editorhtml/"; $CKEditor->config["width"] = 945; $CKEditor->config["height"] = 500; print $CKEditor->editor("FrmTexto", $frm_texto); ?>
          </td>
        </tr>
        <tr id="trLink1" style="display:none">
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmLink">&nbsp;Link: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmLink" id="FrmLink" class="frm" size="80" maxlength="255" value="<?=$frm_link?>" style="width:470px;">
          	<label><input name="FrmLinkTarget" type="radio" <? if($frm_link_target=="_parent"){ print('checked="checked"'); } ?> value="_parent" />Mesma Página</label>
            <label><input name="FrmLinkTarget" type="radio" <? if($frm_link_target=="_blank"){ print('checked="checked"'); } ?> value="_blank" />Nova Página</label>
            <br /><span class="frm_exemplo">Informe link com http://</span>
          </td>
        </tr>
        
        <tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:10px 3px 3px 0px; font-size:14px">Foto (interna):</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoArquivo">&nbsp;Arquivo: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="hidden" name="FrmFotoArquivoID" id="FrmFotoArquivoID" value="<?=$frm_foto_arquivo_crop["id"]?>" />
          	<? foreach($frm_foto_arquivo_crop["inputs"] as $input){ ?>
            <div style="position:relative; float:left; width:100%; margin-bottom:5px;">
            	<label><input type="radio" name="FrmFotoArquivoSize" value="<?=$input["width"]?>;<?=$input["height"]?>" /><?=$input["label"]?></label><br />
            </div>
            <? } ?>
            <div style="position:relative; float:left; width:100%; margin-bottom:5px;">
                <img id="imgFrmFotoArquivo" src="images/null.gif" style="display:none" />
            </div>
            <input type="text" name="FrmFotoArquivo" id="FrmFotoArquivo" class="frm" style="width:80%;" maxlength="255" value="<?=((!empty($frm_foto_arquivo)) ? "A$frm_foto_arquivo" : "" )?>">
            <input type="button" name="btnFrmFotoArquivo" id="btnFrmFotoArquivo" class="frm_botao" value="Buscar" onclick="_FotoArquivoCrop();">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoCredito">&nbsp;Crédito:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmFotoCredito" id="FrmFotoCredito" class="frm" size="60" maxlength="255" style="width:89%" value="<?=$frm_foto_credito?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoDescricao">&nbsp;Descrição:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmFotoDescricao" id="FrmFotoDescricao" class="frm" size="60" maxlength="255" style="width:89%" value="<?=$frm_foto_descricao?>">
          </td>
        </tr>
        
        <tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:10px 3px 3px 0px; font-size:14px">Relação:</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdBloco1">&nbsp; TAG's: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <input type="text" name="FrmTag" id="FrmTag" class="frm"  size="40" maxlength="254" onkeypress="javascript:if(event.keyCode==13){_TagAdicionar(); return false;}" style="width:60%;" />&nbsp;<input type="button" name="btAdicionar" id="btAdicionar" class="frm_botao" value="Adicionar" onclick="_TagAdicionar();">
            <div id="Tags" style="width:99%; padding-top:10px;"></div>
            <input name="tagsCount" id="tagsCount" type="hidden" value="0" />
          </td>
        </tr>            
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdBloco1">&nbsp; Relacionadas: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <input type="text" name="FrmRelacao" id="FrmRelacao" class="frm"  size="40" maxlength="254" onkeypress="javascript:if(event.keyCode==13){_RelacaoAdicionar(); return false;}" style="width:60%;" />&nbsp;<input type="button" name="btAdicionarRelacao" id="btAdicionarRelacao" class="frm_botao" value="Adicionar" onclick="_RelacaoAdicionar();">
            <div id="Relacoes" style="width:99%; padding-top:10px;"></div>
            <input name="relacoesCount" id="relacoesCount" type="hidden" value="0" />
          </td>
        </tr> 
        <tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:10px 3px 3px 0px; font-size:14px">Publicação:</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdEditoria">&nbsp;Editoria: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<? foreach ($VObjEditoria as $Coluna) { ?>
	            <div style="position:relative; float:left; width:340px; margin-right:10px;">
                	<? foreach ($Coluna as $Editoria){ ?>
	                <label><input type="radio" name="FrmIdEditoria" value="<?=$Editoria["id_editoria"]?>" id="FrmIdEditoria_<?=$Editoria["id_editoria"]?>" <? if($Editoria["id_editoria"] == $frm_id_editoria){ print('checked="checked"'); }?> /><?=$Editoria["nome"]?></label><br />
                    <? } ?>
                </div>
            <? } ?>
          </td>
        </tr>   
		<tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdAreaPublicacao">&nbsp; Área de publicação: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<div class="accordion">
            	<? foreach ($VObjAreaPublicacao as $Bloco) { ?>
                <h3 id="area_publicacao_bloco_<?=$Bloco["id_area_publicacao_bloco"]?>"><a id="bloco<?=$Bloco["id_area_publicacao_bloco"]?>" href="#<?=$Bloco["id_area_publicacao_bloco"]?>"><?=$Bloco["titulo"]." [".$Bloco["legenda"]."] ".(($Bloco["status"]==0) ? " (inativo)" : "" )?></a></h3>
                <div>
                	<? foreach ($Bloco["Areas"] as $Coluna) { ?>
                        <div style="position:relative; float:left; width:320px; margin-right:5px;">
                            <? foreach ($Coluna as $Area){ ?>
                            <label style="font-size:10px;"><input img="<?=$Area["img"]?>" img_width="<?=$Area["img_width"]?>" img_height="<?=$Area["img_height"]?>" type="radio" name="FrmIdAreaPublicacao" value="<?=$Area["id_area_publicacao"]?>" id="FrmIdAreaPublicacao_<?=$Area["id_area_publicacao"]?>" <? if($Area["id_area_publicacao"] == $frm_id_area_publicacao){ print('checked="checked"'); }?> /><?=$Area["nome"]?> <?=(($Area["img"]==1) ? sprintf("[img: %sx%s]", $Area["img_width"], $Area["img_height"]) : "" )?></label><br />
                            <? } ?>
                        </div>
                    <? } ?>
                </div>
                <? } ?>
            </div>
          </td>
        </tr>
        
        <tr id="trFrmFotoAreaPublicacao" style="display:none">
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoAreaPublicacao">&nbsp; Imagem para Área: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <div style="position:relative; float:left; width:100%; margin-bottom:5px;">
            	<span id="spanFrmFotoAreaPublicacao"></span><br />
                <img id="imgFrmFotoAreaPublicacao" src="images/null.gif" width="0" height="0" />
            </div>
            <input type="text" name="FrmFotoAreaPublicacao" id="FrmFotoAreaPublicacao" class="frm" style="width:80%;" maxlength="255" value="<?=$frm_foto_area_publicacao?>">
            <input type="button" name="btnFrmFotoAreaPublicacao" id="btnFrmFotoAreaPublicacao" class="frm_botao" value="Buscar" onclick="_FotoAreaPublicacaoCrop();">
          </td>
        </tr>
        
         <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDatahora">&nbsp;Data/Hora: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDatahora" id="FrmDatahora" class="frm" size="25" maxlength="19" value="<?=$frm_datahora?>">&nbsp;<input type="button" name="BTDatahora" id="BTDatahora" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmDatahora", ifFormat:"%d/%m/%Y %H:%M:%S", showsTime:true, button:"BTDatahora", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y H:i:s")?></span>
          </td>
        </tr>

        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmStatus">&nbsp;Status: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <?
            	for($i=0; $i < count($VObjStatus); $i++){
					print '<label><input name="FrmStatus" type="radio" value="'.$VObjStatus[$i][0].'" '.(($frm_status==$VObjStatus[$i][0]) ? 'checked="checked"' : '').' />'.$VObjStatus[$i][1].'</label> ';
				}
			?>
          </td>
        </tr>
        
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="submit" name="btSubmit2" id="btSubmit2" class="frm_botao" value="Salvar e Editar" <?=$label_alerta_status?>>&nbsp;&nbsp;
          	<input type="submit" name="btSubmit" id="btSubmit" class="frm_botao" value="Salvar" <?=$label_alerta_status?>>&nbsp;
            ou <a href="<?=$link_list?>">cancelar</a>
		  </td>
        </tr>
      </table>
    </form>
	<script language="javascript">
    <!--
		$(function(){
			_Tipo(<?=$frm_tipo?>);
			_SelecionarArea(<?=$frm_id_area_publicacao?>);
			_LoadFotoArquivo();
			
			<?php 
				foreach ($frm_tags as $value) {
					print("_TagAdicionarValue('".$value."');\n");
				}
				foreach ($frm_relacao as $value) {
					print("_RelacaoAdicionarValue('".$value."');\n");
				}
				for($i=0; $i < count($VObjAreaPublicacao); $i++){
					if($VObjAreaPublicacao[$i]["id_area_publicacao_bloco"] == $frm_id_area_publicacao_bloco){
						print('$(".accordion").accordion({ active: '.$i.' });');
					}
				}
			?>
			
		});
		function _Validar(){
			var objFrmTexto = CKEDITOR.instances.FrmTexto;
			if(objFrmTexto != null){
				objFrmTexto.updateElement();
			}
			return vFrm.exec();
		}
        var a_fields = {
            'FrmTitulo':{'l':' Título','t':'labelFrmTitulo','r':true},
            'FrmResumo':{'l':' Resumo','t':'labelFrmResumo'},
            'FrmTexto':{'l':' Texto','t':'labelFrmTexto'},
            'FrmTipo':{'l':' Tipo','t':'labelFrmTipo','r':true},
            'FrmIdEditoria':{'l':' Editoria','t':'labelFrmIdEditoria','r':true},
            'FrmIdAreaPublicacao':{'l':' Área Publicação','t':'labelFrmIdAreaPublicacao','r':true},
            'FrmDatahora':{'l':' Data/Hora','t':'labelFrmDatahora','r':true},
            'FrmStatus':{'l':' Status','t':'labelFrmStatus','r':true},
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