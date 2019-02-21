<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("editoria_add.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Editoria: Cadastro </td>
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
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdEditoriaPai">&nbsp;Editoria: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			  <select name="FrmIdEditoriaPai" class="frm" id="FrmIdEditoriaPai" style="width:500px;">
              	<option value="0" selected="selected">[Sem Editoria]</option>
				<? for($i=0; $i < count($VObjEditoria); $i++){ ?>
                <option value="<?=$VObjEditoria[$i][1]?>" <? if($VObjEditoria[$i][1] == $frm_id_editoria_pai){ print("selected"); }?>><?=$VObjEditoria[$i][0]?></option>
                <? } ?>
              </select>  
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmNome">&nbsp;Nome: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmNome" id="FrmNome" class="frm" size="80" maxlength="255" value="<?=$frm_nome?>"><br />
            <span class="frm_exemplo">(nome da editoria ou coluna)</span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmLegenda">&nbsp;Legenda:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmLegenda" id="FrmLegenda" class="frm" size="80" maxlength="255" value="<?=$frm_legenda?>"><br />
            <span class="frm_exemplo">(nome do autor ou editoria)</span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDescricao">&nbsp;Descrição:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDescricao" id="FrmDescricao" class="frm" size="80" maxlength="255" value="<?=$frm_descricao?>"><br />
            <span class="frm_exemplo">(resumo sobre editoria/coluna)</span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmImagem">&nbsp;Imagem: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="file" name="FrmImagemFile" id="FrmImagemFile" class="frm" size="60" maxlength="255" value=""><br />
            <span class="frm_exemplo">(imagem de rosto do colunista ou editoria)</span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmImagemPagina">&nbsp;Imagem Página:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="file" name="FrmImagemPaginaFile" id="FrmImagemPaginaFile" class="frm" size="60" maxlength="255" value=""><br />
            <span class="frm_exemplo">(imagem da página da editoria/coluna)</span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmBlog">&nbsp;Estrutura de Blog?  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
            <label><input name="FrmBlog" type="radio" <? if($frm_blog==1){ print('checked="checked"'); } ?> value="1" />Sim</label>
          	<label><input name="FrmBlog" type="radio" <? if($frm_blog==0){ print('checked="checked"'); } ?> value="0" />Não</label>
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
    <script language="javascript">document.getElementById("FrmIdEditoriaPai").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			return vFrm.exec();
		}
        var a_fields = {
            'FrmIdEditoriaPai':{'l':' Editoria','t':'labelFrmIdEditoriaPai','r':true},
            'FrmNome':{'l':' Nome','t':'labelFrmNome','r':true},
            'FrmLegenda':{'l':' Legenda','t':'labelFrmLegenda'},
            'FrmDescricao':{'l':' Descrição','t':'labelFrmDescricao'},
            'FrmImagemFile':{'l':' Imagem','t':'labelFrmImagem'},
            'FrmImagemPaginaFile':{'l':' Imagem Página','t':'labelFrmImagemPagina'},
            'FrmBlog':{'l':' Blog','t':'labelFrmBlog'},
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