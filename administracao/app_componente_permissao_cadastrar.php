<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("app_componente_permissao_cadastrar.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo">Permiss&atilde;o: Cadastro </td>
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
        <td width="22"><a href="app_componente_permissao_cadastrar.php"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21"></td>
        <td width="82"><a href="app_componente_permissao_cadastrar.php"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0"></a></td>
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
    <td><form action="app_componente_permissao_cadastrar.php?id=<?=$ID_TIPO?>" method="post" name="frm" id="frm">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="165" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Pessoa Tipo  : * </td>
          <td width="586" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td>
			  <select name="sltTipo" class="frm" id="sltTipo" onchange="MM_jumpMenu('parent',this,0)">
				<?
					for($i=0; $i < count($vpt); $i++){
				?>
                <option value="app_componente_permissao_cadastrar.php?id=<?=$vpt[$i]->getIdAppUsuarioGrupo()?>" <? if($vpt[$i]->getIdAppUsuarioGrupo() == $ID_TIPO){ print("selected"); }?>><?=$vpt[$i]->getNome()?></option>
				<?
					}//for
				?>
              </select>
			  </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="165" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Componente: * </td>
          <td width="586" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><select name="sltComponente" class="frm" id="sltComponente" style="width:390px;">
                <?
					$dbq = new dbQuery();
					$dbq->consultar($sqlm);
					
					//print("<option value=\"\" >[MENU] -----------------------------------------------------------------|</option>");
					print("<optgroup label=\"[MENU]\">");
					while ( $dbq->registro() ) {
						print("<option value=\"".$dbq->valor("id_app_componente")."\" >".$dbq->valor("value")."</option>");
					}
					print("</optgroup>");
					
					//print("<option value=\"\" >[PAGINA] ---------------------------------------------------------------|</option>");
					print("<optgroup label=\"[PAGINA]\">");
					$dbq->consultar($sqlp);
					while ( $dbq->registro() ) {
						print("<option value=\"".$dbq->valor("id_app_componente")."\" >".$dbq->valor("value")."</option>");
					}
					print("</optgroup>");
					
					//print("<option value=\"\" >[REGRA] ----------------------------------------------------------------|</option>");
					print("<optgroup label=\"[REGRA]\">");
					$dbq->consultar($sqlr);
					while ( $dbq->registro() ) {
						print("<option value=\"".$dbq->valor("id_app_componente")."\" >".$dbq->valor("value")."</option>");
					}
					print("</optgroup>");
					
					unset($dbq);
				?>
              </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="165" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Permiss&atilde;o: *</td>
          <td width="586" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><select name="sltPermissao" class="frm" id="sltPermissao">
                <option value="1" selected>Ler</option>
                <option value="2">Gravar</option>
                <option value="0">Sem</option>
                                          </select></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25">* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="btSubmit" type="submit" class="frm_botao" id="btSubmit" value="Cadastrar" <?=$label_alerta_status?>>
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
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td width="139">&nbsp;Componente Tipo </td>
        <td width="366" height="20">&nbsp;Componente</td>
        <td width="41" height="20" bgcolor="#CCCCCC" align="center">Op&ccedil;&atilde;o</td>
      </tr>
      <?
		$dbq = new dbQuery();
		$ac = new AppComponenteMenu();
		
		$dbq->consultar( $sqlpm );
      	$v = array();
		$i = 0;
		while ( $dbq->registro() ) {
			$v[$i]["id_app_componente"] = $dbq->valor("id_app_componente");
			$v[$i]["id_app_permissao"] = $dbq->valor("id_app_permissao");
			$v[$i]["id_pessoa_tipo"] = $dbq->valor("id_pessoa_tipo");
			$v[$i]["permissao"] = $dbq->valor("permissao");
			$v[$i]["value"] = $dbq->valor("value");
			$i++;
		}

		for($i=0; $i < count($v); $i++ ){
			$ac = new AppComponenteMenu();
			$descricao = $ac->montarFiliacao(intval( $v[$i]["id_app_componente"] ), "");
			
      ?>
      <tr>
        <td bgcolor="#F2F2F2" class="tabela_texto">MENU</td>
        <td bgcolor="#F2F2F2" class="tabela_texto"><?=$descricao?></td>
        <td height="25" bgcolor="#CCCCCC" align="center"><a href="app_componente_permissao_excluir.php?id=<?=$v[$i]["id_app_permissao"]?>&amp;t=<?=$ID_TIPO?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir" width="18" height="18" border="0"></a></td>
      </tr>
      <?
		}
	  ?>
	  <tr>
	  	<td colspan="3" height="5"></td>
	  </tr>
	  <?		
	  	unset($dbq);
		$dbq = new dbQuery();
		$dbq->consultar( $sqlpp );
      	while ( $dbq->registro() ) {
      ?>
      <tr>
        <td bgcolor="#F2F2F2" class="tabela_texto">PÁGINA</td>
        <td bgcolor="#F2F2F2" class="tabela_texto"><?=$dbq->valor("value")?></td>
        <td height="25" bgcolor="#CCCCCC" align="center"><a href="app_componente_permissao_excluir.php?id=<?=$dbq->valor("id_app_permissao")?>&amp;t=<?=$ID_TIPO?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir" width="18" height="18" border="0"></a></td>
      </tr>
      <?
      	}
	  ?>
	  <tr>
	  	<td colspan="3" height="5"></td>
	  </tr>
	  <?		
	  	unset($dbq);
		$dbq = new dbQuery();
		$dbq->consultar( $sqlpr );
      	while ( $dbq->registro() ) {
      ?>
      <tr>
        <td bgcolor="#F2F2F2" class="tabela_texto">REGRA</td>
        <td bgcolor="#F2F2F2" class="tabela_texto"><?="[".$dbq->valor("id_app_componente")."] ".$dbq->valor("value")?></td>
        <td height="25" bgcolor="#CCCCCC" align="center"><a href="app_componente_permissao_excluir.php?id=<?=$dbq->valor("id_app_permissao")?>&amp;t=<?=$ID_TIPO?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir" width="18" height="18" border="0"></a></td>
      </tr>
      <?
      	}
		unset($dbq);
      ?>
      </table></td>
  </tr>
</table>
<?
	require_once("layout_inf.php");
?>
