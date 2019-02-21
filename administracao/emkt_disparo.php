<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("emkt_disparo.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Newsletter: Configuração de Envio</td>
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
    <td>Preencha corretamente o formul&aacute;rio abaixo: </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdEmkt">&nbsp;Newsletter: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <?=$frm_emkt?>          </td>
        </tr>

      	<form action="emkt_disparo_testar.php?id=<?=$ID?>" method="post" name="frmTeste" id="frmTeste" onsubmit="return vFrmTeste.exec();">
        <tr>
          <td height="25" colspan="2" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmRemetenteEmail2">&nbsp;Teste antes de Enviar</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" id="labelFrmEmailTeste">&nbsp;Enviar E-mail Teste: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmailTeste" id="FrmEmailTeste" class="frm" size="60" maxlength="255">&nbsp;<input type="submit" name="btSubmitTeste" id="btSubmitTeste" class="frm_botao" value="Testar">
          </td>
        </tr>
        </form>
		<script language="javascript">
        <!--
            var a_fields = {
                'FrmEmailTeste':{'l':' E-mail para Teste','r':true,'f':'email'},
                'btSubmitTeste':{'l':'Testar'}
            },
            o_config = {
                'to_disable' : ['btSubmitTeste'],
                'alert' : 1
            }
            var vFrmTeste = new validator('frmTeste', a_fields, o_config);
        -->
        </script>

		<?
        	if(empty($objDisparo)){
		?>
      	<form action="emkt_disparo_agendar.php?id=<?=$ID?>" method="post" name="frmAgendar" id="frmAgendar" onsubmit="return _ValidarAgendar();">
        <tr>
          <td height="25" colspan="2" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmRemetenteEmail2">&nbsp;Agendar o Envio</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" id="labelFrmAgendamento">&nbsp;Data/Hora de Envio: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          <select name="FrmData" id="FrmData" class="frm">
            <?
            	for($i=0; $i < 30; $i++){
            		$data = System::SomarData(date("Y-m-d"), $i);
            		print('<option value="'.System::FormatarData($data, "Y-m-d").'">'.System::FormatarData($data, "d/m/Y").'</option>');
            	}
            ?>
          </select>&nbsp;
          <select name="FrmHora" id="FrmHora" class="frm">
            <?
            	for($i=0; $i < 24; $i++){
            		$hora = ((strlen($i) == 1) ? "0".$i : $i );
            		print('<option value="'.$hora.':00:00">'.$hora.':00</option>');
            		print('<option value="'.$hora.':30:00">'.$hora.':30</option>');
            	}
            ?>
          </select>&nbsp;Agora: <?=date("d/m/Y H:i:s");?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" id="labelFrmAgendamento">&nbsp;Listas: *</td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<!--<label><input name="FrmIdEmktLista0" type="checkbox" value="0" onclick="Selecao();" />&nbsp;<b>Todos e-mails</b></label><br /><br />-->
			<? 
				$VObjEmktLista = EmktListaManage::consultarEmktListaAttribute("", "", "", EmktListaAttribute::Nome());
				for($i=0; $i < count($VObjEmktLista); $i++){ 
			?>
            <label><input name="FrmIdEmktLista<?=($i+1)?>" id="FrmIdEmktLista<?=($i+1)?>" type="checkbox" value="<?=$VObjEmktLista[$i][0]?>" />&nbsp;<?=$VObjEmktLista[$i]["nome"]?> (<?=$VObjEmktLista[$i]["ContatosCount"]?>)</label><br />
            <? } ?>
            <input name="qtdListas" type="hidden" id="qtdListas" value="<?=count($VObjEmktLista)?>" />
			  <script language="javascript">
                function Selecao(){
                    var obj = document.getElementById("FrmIdEmktLista0");
                    var cont = <?=count($VObjEmktLista)?>;
                    
                    for(i=1; i <= cont; i++){
                        document.getElementById("FrmIdEmktLista"+i).checked = obj.checked;
                    }
                }
              </script>
		  </td>
        </tr>
        <tr>
          <td>* Campos obrigat&oacute;rios </td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="submit" name="btSubmitAgendar" id="btSubmitAgendar" class="frm_botao" value="Agendar Envio">
          </td>
        </tr>
        </form>
		<script language="javascript">
        <!--
           function _ValidarAgendar(){
		   		var contChecked = 0;
				for(i=0; i <= <?=count($VObjEmktLista)?>; i++){
					if(document.getElementById("FrmIdEmktLista"+i).checked){
						contChecked++;
					}
				}
				if(contChecked == 0){
					alert("- Selecione uma Lista;");
					return false;
				}
				return true;
		   }
        -->
        </script>
		<?
        	}else{
		?>
        <form action="emkt_disparo_remove.php?id=<?=$objDisparo["id_emkt_disparo"]?>" method="post" name="frm" id="frm" onsubmit="return confirm('Deseja realmente CANCELAR o Agendamento?');">
        <tr>
          <td height="25" colspan="2" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmRemetenteEmail2">&nbsp;Agendamento</td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" id="labelFrmAgendamento">&nbsp;Data/Hora de Envio: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=System::FormatarData($objDisparo["agendamento"]);?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" id="labelFrmAgendamento">&nbsp;Listas: </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
			<? 
				$VObjEmktLista = EmktListaManage::ListasByDisparo(intval($objDisparo["id_emkt_disparo"]));
				for($i=0; $i < count($VObjEmktLista); $i++){ 
					print $VObjEmktLista[$i]["nome"]."; ";
				}
			?>
		  </td>
        </tr>
        
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" id="labelFrmResultado">&nbsp;Resultado:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=$objDisparo["resultado"]?>          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" id="labelFrmStatus">&nbsp;Status:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?=EmktDisparoStatus::_Descricao($objDisparo["status"])?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td bgcolor="#CCCCCC" style="padding:3px 3px 3px 3px">
          	<input type="submit" name="btSubmit" id="btSubmit" class="frm_botao" value="Cancelar Agendamento" <?=$label_alerta_status?>></td>
        </tr>
        </form>
        <?
        	}
		?>
      </table>
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