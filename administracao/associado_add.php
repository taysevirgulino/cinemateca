<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("associado_add.inc.php"); require_once("script/editorhtml/ckeditor.php");?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Associado: Cadastro </td>
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
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdAssociadoPerfil">&nbsp;Associado Perfil: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdAssociadoPerfil" class="frm" id="FrmIdAssociadoPerfil" style="width:500px;">
    <? for($i=0; $i < count($VObjAssociadoPerfil); $i++){ ?>
    <option value="<?=$VObjAssociadoPerfil[$i]["id_associado_perfil"]?>" <? if($VObjAssociadoPerfil[$i]["id_associado_perfil"] == $frm_id_associado_perfil){ print("selected"); }?>><?=$VObjAssociadoPerfil[$i]["titulo"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdLocalidade">&nbsp;Id Localidade: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdAssociadoPerfil" class="frm" id="FrmIdAssociadoPerfil" style="width:500px;">
    <? for($i=0; $i < count($VObjAssociadoPerfil); $i++){ ?>
    <option value="<?=$VObjAssociadoPerfil[$i]["id_associado_perfil"]?>" <? if($VObjAssociadoPerfil[$i]["id_associado_perfil"] == $frm_id_associado_perfil){ print("selected"); }?>><?=$VObjAssociadoPerfil[$i]["titulo"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmIdAssociadoPlano">&nbsp;Associado Plano: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	  <select name="FrmIdAssociadoPlano" class="frm" id="FrmIdAssociadoPlano" style="width:500px;">
    <? for($i=0; $i < count($VObjAssociadoPlano); $i++){ ?>
    <option value="<?=$VObjAssociadoPlano[$i]["id_associado_plano"]?>" <? if($VObjAssociadoPlano[$i]["id_associado_plano"] == $frm_id_associado_plano){ print("selected"); }?>><?=$VObjAssociadoPlano[$i]["titulo"]?></option>
    <? } ?>
  </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmApelido">&nbsp;Apelido: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmApelido" id="FrmApelido" class="frm" size="80" maxlength="255" value="<?=$frm_apelido?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmNome">&nbsp;Nome: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmNome" id="FrmNome" class="frm" size="80" maxlength="255" value="<?=$frm_nome?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCpf">&nbsp;Cpf: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCpf" id="FrmCpf" class="frm" size="20" maxlength="20" value="<?=$frm_cpf?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmSexo">&nbsp;Sexo: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<select name="FrmSexo" id="FrmSexo" class="frm" ><option value="M" <? if($frm_sexo=="M"){ print("selected=\"selected\"");} ?>>Masculino - M</option><option value="F" <? if($frm_sexo=="F"){ print("selected=\"selected\"");} ?>>Feminino - F</option></select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDataNascimento">&nbsp;Data Nascimento: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDataNascimento" id="FrmDataNascimento" class="frm" size="10" maxlength="10" value="<?=$frm_data_nascimento?>" onkeydown="fncFormataData('frm', 'FrmDataNascimento')">&nbsp;<input type="button" name="BTDataNascimento" id="BTDataNascimento" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmDataNascimento", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTDataNascimento", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEstadoCivil">&nbsp;Estado Civil:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<select name="FrmEstadoCivil" id="FrmEstadoCivil" class="frm" >
						              <option value="1" <? if($frm_estado_civil=="1"){ print("selected=\"selected\"");} ?>>Solteiro(a)</option>
						              <option value="2" <? if($frm_estado_civil=="2"){ print("selected=\"selected\"");} ?>>Casada(a)</option>
						              <option value="3" <? if($frm_estado_civil=="3"){ print("selected=\"selected\"");} ?>>Vi&uacute;vo(a)</option>
						              <option value="4" <? if($frm_estado_civil=="4"){ print("selected=\"selected\"");} ?>>Divorciado(a)</option>
						              <option value="5" <? if($frm_estado_civil=="5"){ print("selected=\"selected\"");} ?>>Separado(a)</option>
						            </select>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmRg">&nbsp;Rg:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmRg" id="FrmRg" class="frm" size="50" maxlength="50" value="<?=$frm_rg?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmFormacao">&nbsp;Formação:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmFormacao" id="FrmFormacao" class="frm" size="80" maxlength="255" value="<?=$frm_formacao?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDescricao">&nbsp;Descrição:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<?php $CKEditor = new CKEditor(); $CKEditor->returnOutput = true; $CKEditor->basePath="script/editorhtml/"; $CKEditor->config["height"] = 500; print $CKEditor->editor("FrmDescricao", $frm_descricao); ?>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEndereco">&nbsp;Endereço:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEndereco" id="FrmEndereco" class="frm" size="80" maxlength="255" value="<?=$frm_endereco?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmNumero">&nbsp;Número:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmNumero" id="FrmNumero" class="frm" size="20" maxlength="20" value="<?=$frm_numero?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmComplemento">&nbsp;Complemento:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmComplemento" id="FrmComplemento" class="frm" size="80" maxlength="255" value="<?=$frm_complemento?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmBairro">&nbsp;Bairro:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmBairro" id="FrmBairro" class="frm" size="80" maxlength="255" value="<?=$frm_bairro?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmCep">&nbsp;Cep:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmCep" id="FrmCep" class="frm" size="20" maxlength="20" value="<?=$frm_cep?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTelefoneFixo">&nbsp;Telefone Fixo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTelefoneFixo" id="FrmTelefoneFixo" class="frm" size="20" maxlength="20" value="<?=$frm_telefone_fixo?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTelefoneCelular">&nbsp;Telefone Celular:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTelefoneCelular" id="FrmTelefoneCelular" class="frm" size="20" maxlength="20" value="<?=$frm_telefone_celular?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmTelefoneComercial">&nbsp;Telefone Comercial:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmTelefoneComercial" id="FrmTelefoneComercial" class="frm" size="20" maxlength="20" value="<?=$frm_telefone_comercial?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmRedes">&nbsp;Redes:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmRedes" id="FrmRedes" class="frm" size="80" maxlength="255" value="<?=$frm_redes?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmImagem">&nbsp;Imagem:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="file" name="FrmImagemFile" id="FrmImagemFile" class="frm" size="60" maxlength="255" value="">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmail">&nbsp;E-mail: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmail" id="FrmEmail" class="frm" size="80" maxlength="255" value="<?=$frm_email?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmSenha">&nbsp;Senha: * </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmSenha" id="FrmSenha" class="frm" size="80" maxlength="255" value="<?=$frm_senha?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaNome">&nbsp;Empresa Nome:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaNome" id="FrmEmpresaNome" class="frm" size="80" maxlength="255" value="<?=$frm_empresa_nome?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaRamo">&nbsp;Empresa Ramo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaRamo" id="FrmEmpresaRamo" class="frm" size="80" maxlength="255" value="<?=$frm_empresa_ramo?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaCnpj">&nbsp;Empresa Cnpj:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaCnpj" id="FrmEmpresaCnpj" class="frm" size="20" maxlength="20" value="<?=$frm_empresa_cnpj?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaNatureza">&nbsp;Empresa Natureza:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaNatureza" id="FrmEmpresaNatureza" class="frm" size="11" maxlength="11" value="<?=$frm_empresa_natureza?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaCargo">&nbsp;Empresa Cargo:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaCargo" id="FrmEmpresaCargo" class="frm" size="80" maxlength="255" value="<?=$frm_empresa_cargo?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaEmail">&nbsp;Empresa E-mail:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaEmail" id="FrmEmpresaEmail" class="frm" size="80" maxlength="255" value="<?=$frm_empresa_email?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaSite">&nbsp;Empresa Site:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaSite" id="FrmEmpresaSite" class="frm" size="80" maxlength="255" value="<?=$frm_empresa_site?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaTelefone1">&nbsp;Empresa Telefone1:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaTelefone1" id="FrmEmpresaTelefone1" class="frm" size="20" maxlength="20" value="<?=$frm_empresa_telefone1?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaTelefone2">&nbsp;Empresa Telefone2:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaTelefone2" id="FrmEmpresaTelefone2" class="frm" size="20" maxlength="20" value="<?=$frm_empresa_telefone2?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaTelefone3">&nbsp;Empresa Telefone3:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaTelefone3" id="FrmEmpresaTelefone3" class="frm" size="20" maxlength="20" value="<?=$frm_empresa_telefone3?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaEndereco">&nbsp;Empresa Endereço:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaEndereco" id="FrmEmpresaEndereco" class="frm" size="80" maxlength="255" value="<?=$frm_empresa_endereco?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaCep">&nbsp;Empresa Cep:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmEmpresaCep" id="FrmEmpresaCep" class="frm" size="20" maxlength="20" value="<?=$frm_empresa_cep?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmEmpresaImagem">&nbsp;Empresa Imagem:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="file" name="FrmEmpresaImagemFile" id="FrmEmpresaImagemFile" class="frm" size="60" maxlength="255" value="">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmContratacaoId">&nbsp;Contratação Id:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmContratacaoId" id="FrmContratacaoId" class="frm" size="20" maxlength="20" value="<?=$frm_contratacao_id?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmContratacaoDataInicial">&nbsp;Contratação Data Inicial:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmContratacaoDataInicial" id="FrmContratacaoDataInicial" class="frm" size="10" maxlength="10" value="<?=$frm_contratacao_data_inicial?>" onkeydown="fncFormataData('frm', 'FrmContratacaoDataInicial')">&nbsp;<input type="button" name="BTContratacaoDataInicial" id="BTContratacaoDataInicial" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmContratacaoDataInicial", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTContratacaoDataInicial", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmContratacaoDataFinal">&nbsp;Contratação Data Final:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmContratacaoDataFinal" id="FrmContratacaoDataFinal" class="frm" size="10" maxlength="10" value="<?=$frm_contratacao_data_final?>" onkeydown="fncFormataData('frm', 'FrmContratacaoDataFinal')">&nbsp;<input type="button" name="BTContratacaoDataFinal" id="BTContratacaoDataFinal" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmContratacaoDataFinal", ifFormat:"%d/%m/%Y", showsTime:true, button:"BTContratacaoDataFinal", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmNewsletter">&nbsp;Newsletter:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmNewsletter" id="FrmNewsletter" class="frm" size="11" maxlength="11" value="<?=$frm_newsletter?>">
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDatahoraCadastro">&nbsp;Data/Hora Cadastro:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDatahoraCadastro" id="FrmDatahoraCadastro" class="frm" size="19" maxlength="19" value="<?=$frm_datahora_cadastro?>">&nbsp;<input type="button" name="BTDatahoraCadastro" id="BTDatahoraCadastro" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmDatahoraCadastro", ifFormat:"%d/%m/%Y %H:%M:%S", showsTime:true, button:"BTDatahoraCadastro", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y H:i:s")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDatahoraEdicao">&nbsp;Data/Hora Edição:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDatahoraEdicao" id="FrmDatahoraEdicao" class="frm" size="19" maxlength="19" value="<?=$frm_datahora_edicao?>">&nbsp;<input type="button" name="BTDatahoraEdicao" id="BTDatahoraEdicao" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmDatahoraEdicao", ifFormat:"%d/%m/%Y %H:%M:%S", showsTime:true, button:"BTDatahoraEdicao", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y H:i:s")?></span>
          </td>
        </tr>
        <tr>
          <td width="25%" height="25" bgcolor="#CCCCCC" class="frm_texto" id="labelFrmDatahoraLogin">&nbsp;Data/Hora Login:  </td>
          <td width="75%" bgcolor="#F2F2F2" style="padding:3px 3px 3px 3px">
          	<input type="text" name="FrmDatahoraLogin" id="FrmDatahoraLogin" class="frm" size="19" maxlength="19" value="<?=$frm_datahora_login?>">&nbsp;<input type="button" name="BTDatahoraLogin" id="BTDatahoraLogin" class="frm" value="..." ><script type="text/javascript"> Calendar.setup({ inputField:"FrmDatahoraLogin", ifFormat:"%d/%m/%Y %H:%M:%S", showsTime:true, button:"BTDatahoraLogin", singleClick:true, step:1 }); </script>&nbsp;<span class="frm_exemplo">Ex: <?=date("d/m/Y H:i:s")?></span>
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
    <script language="javascript">document.getElementById("FrmIdAssociadoPerfil").focus();</script>
	<script language="javascript">
    <!--
		function _Validar(){
			var objFrmDescricao = CKEDITOR.instances.FrmDescricao;
			if(objFrmDescricao != null){
				objFrmDescricao.updateElement();
			}
			return vFrm.exec();
		}
        var a_fields = {
            'FrmIdAssociadoPerfil':{'l':' Associado Perfil','t':'labelFrmIdAssociadoPerfil','r':true},
            'FrmIdLocalidade':{'l':'','t':'labelFrmIdLocalidade','r':true},
            'FrmIdAssociadoPlano':{'l':' Associado Plano','t':'labelFrmIdAssociadoPlano','r':true},
            'FrmApelido':{'l':' Apelido','t':'labelFrmApelido','r':true},
            'FrmNome':{'l':' Nome','t':'labelFrmNome','r':true},
            'FrmCpf':{'l':' Cpf','t':'labelFrmCpf','r':true,'f':'cpf'},
            'FrmSexo':{'l':' Sexo','t':'labelFrmSexo','r':true},
            'FrmDataNascimento':{'l':' Data Nascimento','t':'labelFrmDataNascimento','r':true,'f':'date'},
            'FrmEstadoCivil':{'l':' Estado Civil','t':'labelFrmEstadoCivil'},
            'FrmRg':{'l':' Rg','t':'labelFrmRg'},
            'FrmFormacao':{'l':' Formação','t':'labelFrmFormacao'},
            'FrmDescricao':{'l':' Descrição','t':'labelFrmDescricao'},
            'FrmEndereco':{'l':' Endereço','t':'labelFrmEndereco'},
            'FrmNumero':{'l':' Número','t':'labelFrmNumero'},
            'FrmComplemento':{'l':' Complemento','t':'labelFrmComplemento'},
            'FrmBairro':{'l':' Bairro','t':'labelFrmBairro'},
            'FrmCep':{'l':' Cep','t':'labelFrmCep','f':'unsigned','mn': 8},
            'FrmTelefoneFixo':{'l':' Telefone Fixo','t':'labelFrmTelefoneFixo'},
            'FrmTelefoneCelular':{'l':' Telefone Celular','t':'labelFrmTelefoneCelular'},
            'FrmTelefoneComercial':{'l':' Telefone Comercial','t':'labelFrmTelefoneComercial'},
            'FrmRedes':{'l':' Redes','t':'labelFrmRedes'},
            'FrmImagemFile':{'l':' Imagem','t':'labelFrmImagem'},
            'FrmEmail':{'l':' E-mail','t':'labelFrmEmail','r':true,'f':'email'},
            'FrmSenha':{'l':' Senha','t':'labelFrmSenha','r':true},
            'FrmEmpresaNome':{'l':' Empresa Nome','t':'labelFrmEmpresaNome'},
            'FrmEmpresaRamo':{'l':' Empresa Ramo','t':'labelFrmEmpresaRamo'},
            'FrmEmpresaCnpj':{'l':' Empresa Cnpj','t':'labelFrmEmpresaCnpj','f':'cnpj'},
            'FrmEmpresaNatureza':{'l':' Empresa Natureza','t':'labelFrmEmpresaNatureza'},
            'FrmEmpresaCargo':{'l':' Empresa Cargo','t':'labelFrmEmpresaCargo'},
            'FrmEmpresaEmail':{'l':' Empresa E-mail','t':'labelFrmEmpresaEmail','f':'email'},
            'FrmEmpresaSite':{'l':' Empresa Site','t':'labelFrmEmpresaSite'},
            'FrmEmpresaTelefone1':{'l':' Empresa Telefone1','t':'labelFrmEmpresaTelefone1'},
            'FrmEmpresaTelefone2':{'l':' Empresa Telefone2','t':'labelFrmEmpresaTelefone2'},
            'FrmEmpresaTelefone3':{'l':' Empresa Telefone3','t':'labelFrmEmpresaTelefone3'},
            'FrmEmpresaEndereco':{'l':' Empresa Endereço','t':'labelFrmEmpresaEndereco'},
            'FrmEmpresaCep':{'l':' Empresa Cep','t':'labelFrmEmpresaCep','f':'unsigned','mn': 8},
            'FrmEmpresaImagemFile':{'l':' Empresa Imagem','t':'labelFrmEmpresaImagem'},
            'FrmContratacaoId':{'l':' Contratação Id','t':'labelFrmContratacaoId'},
            'FrmContratacaoDataInicial':{'l':' Contratação Data Inicial','t':'labelFrmContratacaoDataInicial','f':'date'},
            'FrmContratacaoDataFinal':{'l':' Contratação Data Final','t':'labelFrmContratacaoDataFinal','f':'date'},
            'FrmNewsletter':{'l':' Newsletter','t':'labelFrmNewsletter'},
            'FrmDatahoraCadastro':{'l':' Data/Hora Cadastro','t':'labelFrmDatahoraCadastro','f':'date'},
            'FrmDatahoraEdicao':{'l':' Data/Hora Edição','t':'labelFrmDatahoraEdicao','f':'date'},
            'FrmDatahoraLogin':{'l':' Data/Hora Login','t':'labelFrmDatahoraLogin','f':'date'},
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