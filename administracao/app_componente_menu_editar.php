<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("app_componente_menu_editar.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<script language="javascript">
	function carregarImagem(){
		var obj1 = document.getElementById("txtImagem");
		var obj2 = document.getElementById("imagem");
		if( obj1.selectedIndex > 0){
			var valor = "<img src='menu/icones/" + obj1[obj1.selectedIndex].value + "' />";
			obj2.innerHTML = valor;
		}else{
			obj2.innerHTML = "";
		}
	}
</script>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo">Componente Menu: Edi&ccedil;&atilde;o </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td class="data_titulo"><?=date("Y/m/d H:i:s")?></td>
  </tr>
  <tr>
    <td height="15"><table width="97" border="0" align="right" cellpadding="0" cellspacing="2">
      <tr>
        <td width="22"><a href="app_componente_menu_cadastrar.php"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21"></td>
        <td width="82"><a href="app_componente_menu_listar.php"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0"></a></td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td height="15">
	<?
		if( ( ! empty($label_alerta_erro) ) || ( ! empty($label_alerta_concluido) ) ){
	?>
	<table width="100" border="0" align="right" cellpadding="0" cellspacing="2">
      <?
	  	if( ! empty($label_alerta_erro) ){
	  ?>
	  <tr>
        <td width="74" align="right" valign="bottom"><a href="#alerta"><span class="alerta_erro_aviso">Pend&ecirc;ncias</span></a></td>
        <td width="20"><img src="images/alerta_erro_mini.gif" width="20" height="20"></td>
      </tr>
	  <?
	  	}else
		if( ! empty($label_alerta_concluido) ){
	  ?>
      <tr>
        <td width="74" align="right" valign="bottom"><a href="#alerta"><span class="alerta_ok_aviso">Conclu&iacute;do</span></a></td>
        <td width="20"><img src="images/alerta_ok_mini.gif" width="20" height="20"></td>
      </tr>
	  <?
	  	}
	  ?>
    </table>
	<?
		} //if
	?>
	</td>
  </tr>
  <tr>
    <td>Preencha corretamente o formul&aacute;rio abaixo: </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form action="app_componente_menu_editar.php?id=<?=$ID_MENU?>" method="post" name="frm" id="frm">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="143" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Menu Pai :</td>
          <td width="398" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td>
			  <select name="sltMenuPai" class="frm" id="sltMenuPai">
                <option value="0" selected>Sem Pai</option>
				<?
					for($i=0; $i < count($acms); $i++){
				?>
                <option value="<?=$acms[$i]->getIdAppComponenteMenu()?>" <? if($acms[$i]->getIdAppComponenteMenu() == $frm["menupai"]){ print("selected"); }?>>[<?=$acms[$i]->getIdAppComponenteMenu()?>] - <?=$acms[$i]->getDescricao()?></option>
				<?
					}//for
				?>
              </select>
			 </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="143" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;URL:</td>
          <td width="398" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="txtUrl" type="text" class="frm" id="txtUrl" value="<?=$frm["url"]?>" size="50" maxlength="100">
                <br>
                <span class="frm_exemplo">Ex: index.php </span></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="143" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Descri&ccedil;&atilde;o: * </td>
          <td width="398" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="txtDescricao" type="text" class="frm" id="txtDescricao" value="<?=$frm["descricao"]?>" size="50" maxlength="100">
                <br>
                <span class="frm_exemplo">Ex: Principal </span></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="143" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Imagem:</td>
          <td width="398" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td width="83%">
			  <select name="txtImagem" class="frm" id="txtImagem" onchange="carregarImagem();">
                <option value="" selected>Selecione uma Imagem</option>
                <?
					for($i=0; $i < count($vimagens); $i++){
						if($frm["imagem"] == $vimagens[$i]){
							print("<option value=\"".$vimagens[$i]."\" selected>".$vimagens[$i]."</option>");
						}else{
							print("<option value=\"".$vimagens[$i]."\">".$vimagens[$i]."</option>");
						}
					}
				?>
              </select>			  
			  </td>
              <td width="17%" id="imagem" align="right"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="143" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Prioridade: * </td>
          <td width="398" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="txtPrioridade" type="text" class="frm" id="txtPrioridade" value="<?=$frm["prioridade"]?>" size="10" maxlength="10"> 
                <span class="frm_exemplo">Ex: 1</span> </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="143" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Tipo: * </td>
          <td width="398" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><select name="sltTipo" class="frm" id="sltTipo">
                <option value="0" selected>Filho</option>
                <option value="1">Pai</option>
              </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="143" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Status: *</td>
          <td width="398" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><select name="sltStatus" class="frm" id="sltStatus">
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>
                                          </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25">* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="btSubmit" type="submit" class="frm_botao" id="btSubmit" value="Alterar" <?=$label_alerta_status?>>
                <input name="Reset" type="reset" class="frm_botao" value="Limpar" <?=$label_alerta_status?>></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <?
  	if( ! empty($label_alerta_erro) ){
  ?>
  <tr>
    <td><table width="550" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <td colspan="2" class="alerta_erro_titulo"><a name="alerta"></a>Pend&ecirc;ncias:</td>
        </tr>
      <tr>
        <td width="29"><img src="images/alerta_erro.gif" width="62" height="62"></td>
        <td width="509" valign="top" class="alerta_erro_texto">
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
    </table></td>
  </tr>
  <?
  	}else
	if( ! empty($label_alerta_concluido) ){
  ?>
  <tr>
    <td><table width="550" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <td colspan="2" class="alerta_ok_titulo"><a name="alerta"></a>Conclu&iacute;do:</td>
        </tr>
      <tr>
        <td width="29"><img src="images/alerta_ok.gif" width="62" height="62"></td>
        <td width="509" valign="top" class="alerta_ok_texto">
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
    </table></td>
  </tr>
  <?
  	}
  ?>  
</table>
<script language="javascript">
	carregarImagem();
</script>
<?
	require_once("layout_inf.php");
?>
