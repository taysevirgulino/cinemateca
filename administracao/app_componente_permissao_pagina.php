<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("app_componente_permissao_pagina.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Permiss&atilde;o: P&aacute;gina </td>
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
        <td width="82"><a href="app_usuario_grupo_list.php"><img src="images/botao/btn_voltar_over.gif" width="22" height="21" border="0" alt="Clique para: Listar"></a></td>
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
	<form action="app_componente_permissao_pagina.php?id=<?=$ID?>" method="post" name="frm" id="frm" enctype="multipart/form-data">
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; Grupo: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$label_grupo?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto">&nbsp; P�ginas: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          <input type="checkbox" name="Todos" id="Todos" value="" onclick="Selecao();" /><span  style="font-weight:normal;">Marcar/Desmarcar Todos</span> | 
          <input type="checkbox" name="InverterTodos" id="InverterTodos" value="" onclick="Inverter();" /><span  style="font-weight:normal;">Inverter Todos</span><br /><br />
          <?
				$ct = AppComponentePaginaManage::consultarAppComponentePagina(2, "ORDER BY url");
				$cont = 0;
				for($j=0; $j < count($ct); $j++){
					$checked = "";
					for($h=0; $h < count($vobj); $h++){
						if($vobj[$h] == $ct[$j]["id_app_componente_pagina"]){
							$checked = 'checked="checked"';
						}
					}
					print('<input type="checkbox" onmouseover="Mudar(this);" id="rb'.$cont.'" name="rb'.$cont.'" value="'.$ct[$j]["id_app_componente_pagina"].'" '.$checked.' /><span  style="font-weight:normal;">'.$ct[$j]["url"].'</span><br />');
					$cont++;
				}
				print('<input name="qtd" type="hidden" id="qtd" value="'.$cont.'" />');
		  ?>
          <script language="javascript">
		  	function Mudar(obj){
				obj.checked = !obj.checked;
			}
		  	function Selecao(){
				var obj = document.getElementById("Todos");
				var cont = <?=$cont?>;
				
				for(i=0; i < cont; i++){
					document.getElementById("rb"+i).checked = obj.checked;
				}
			}
		  	function Inverter(){
				var cont = <?=$cont?>;
				
				for(i=0; i < cont; i++){
					var obj = document.getElementById("rb"+i);
					obj.checked = !obj.checked;
				}
			}
		  </script>
          </td>
        </tr>        
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px"><input type="submit" name="btSubmit" id="btSubmit" class="frm_botao" value="Salvar" <?=$label_alerta_status?> /></td>
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