<? require_once("config.inc.php"); require_once("logon.inc.php");  require_once("login.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="950" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="25" class="texto_titulo">Acesso Interno</td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td class="data_titulo"><?=date("d/m/Y H:i:s")?></td>
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
    <td><span style="font-weight: bold">Esta &aacute;rea destina-se a usu&aacute;rios registrados no sistema. </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Preencha corretamente o formul&aacute;rio abaixo: </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form action="login.php" method="post" name="frm" id="frm">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="157" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Login: * </td>
          <td width="594" bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="txtLogin" type="text" class="frm" id="txtLogin" value="<?=$frm[login]?>" size="15" maxlength="20"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp;Senha: * </td>
          <td bgcolor="#F2F2F2"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="txtSenha" type="password" class="frm" id="txtSenha" size="15" maxlength="15"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25">* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC"><table width="100%"  border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><input name="btSubmit" type="submit" class="frm_botao" id="btSubmit" value="Entrar" <?=$label_alerta_status?>>
                <input name="Reset" type="reset" class="frm_botao" value="Limpar" <?=$label_alerta_status?>></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form>
    <script language="javascript">document.getElementById("txtLogin").focus();</script>
    </td>
  </tr>
  <?
  	if( ! empty($label_alerta_erro) ){
  ?>
  <tr>
    <td><table width="550" border="0" cellspacing="4" cellpadding="0">
      <tr>
        <td colspan="2" class="alerta_erro_titulo">Pend&ecirc;ncias:</td>
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
<?
	require_once("layout_inf.php");
?>
