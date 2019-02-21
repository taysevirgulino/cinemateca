<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("noticia_view.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Notícia: Visualização </td>
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
        <td width="23"><a id="link_edit" href="<?=$link_edit?>" title="Clique para: Editar" alt="Clique para: Editar"><img src="images/botao/btn_edit_over.gif" width="22" height="21" border="0" title="Clique para: Editar" alt="Clique para: Editar"></a></td>
        <td width="12"><a id="link_remove" href="<?=$link_remove?>" onClick="javascript: return confirm('Deseja realmente EXCLUIR?');" title="Clique para: Excluir" alt="Clique para: Excluir"><img src="images/botao/btn_remove_over.gif" width="21" height="21" border="0" title="Clique para: Excluir" alt="Clique para: Excluir"></a></td>
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
    <td>Visualize as informações abaixo: </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
	<form action="" method="post" name="frm" id="frm">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
      	<tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:0px 3px 3px 0px; font-size:14px">Informações:</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Tipo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_tipo?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Status:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_status?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Click:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_click?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Compartilhamentos:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_shares?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Comentários:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_comments?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Data/Hora:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_datahora?> | <?=$frm_datahora_cadastro?> | <?=$frm_datahora_edicao?>
          </td>
        </tr>
        <tr style="display:none">
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Url (Endereço) Curta:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_url_curta?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Usuário: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	Cadastrou: <?=$frm_id_app_usuario_cadastro?> | Última edição: <?=$frm_id_app_usuario_edicao?>
          </td>
        </tr> 
        <tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:0px 3px 3px 0px; font-size:14px">Notícia:</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Chapéu:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_chapeu?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Título: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_titulo?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Resumo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_resumo?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Texto:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_texto?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Link:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_link?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Link Abrir:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_link_target?>
          </td>
        </tr>
        
        
        <tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:10px 3px 3px 0px; font-size:14px">Foto (interna):</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoArquivo">&nbsp;Arquivo: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<img id="imgFrmFotoArquivo" src="../images/noticia/A<?=$frm_foto_arquivo?>" />
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoCredito">&nbsp;Crédito:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_foto_credito?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoDescricao">&nbsp;Descrição:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$frm_foto_descricao?>
          </td>
        </tr>
        
        <tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:10px 3px 3px 0px; font-size:14px">Relação:</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdBloco1">&nbsp; TAG's: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<?php 
                foreach ($frm_tags as $value) {
                    print($value.", ");
                }
            ?>
          </td>
        </tr>           
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdBloco1">&nbsp; Relacionadas: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<?php 
                foreach ($frm_relacao as $value) {
                    print("- ".$value."<br />");
                }
            ?>
          </td>
        </tr>
        <tr>
          <td colspan="2" width="100%" bgcolor="#fff" class="frm_texto" style="padding:10px 3px 3px 0px; font-size:14px">Publicação:</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdEditoria">&nbsp;Editoria: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<?=$frm_id_editoria?>
          </td>
        </tr>   
		<tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdAreaPublicacao">&nbsp; Área de publicação: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<?=$frm_id_area_publicacao?>
          </td>
        </tr>
        
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFotoAreaPublicacao">&nbsp; Imagem para Área: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<img src="../images/noticia/<?=$frm_foto_area_publicacao?>" />
          </td>
        </tr>  
          
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="button" name="btVoltar" id="btVoltar" class="frm_botao" value="Voltar" onClick="javascript:window.open('<?=$link_list?>', '_parent')" <?=$label_alerta_status?>>
		  </td>
        </tr>
      </table>
    </form>
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