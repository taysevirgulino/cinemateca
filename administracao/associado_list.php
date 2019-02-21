<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("associado_list.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" class="texto_titulo"> Associado: Listagem </td>
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
        <td width="22"><a id="link_add" href="<?=$link_add?>?url=<?=$url;?>" title="Clique para: Cadastrar" alt="Clique para: Cadastrar"><img src="images/botao/btn_add_over.gif" width="22" height="21" border="0" alt="Clique para: Cadastrar"></a></td>
        <td width="23"><img src="images/botao/btn_edit_dim.gif" width="22" height="21" title="Clique para: Editar" alt="Clique para: Editar"></td>
        <td width="12"><img src="images/botao/btn_remove_dim.gif" width="21" height="21" title="Clique para: Excluir" alt="Clique para: Excluir"></td>
        <td width="82"><a id="link_list" href="<?=$link_list?>" title="Clique para: Listar" alt="Clique para: Listar"><img src="images/botao/btn_copy_norm.gif" width="22" height="21" border="0" title="Clique para: Listar" alt="Clique para: Listar"></a></td>
      </tr>
    </table>	
	</td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td>
	<form id="frm" name="frm" method="get" action="<?=$link_list?>">
      <table width="100%" border="0">
        <tr>
          <td colspan="4"><b>Formul&aacute;rio de Consulta:</b></td>
        </tr>
        <tr>
          <td height="1" colspan="4" bgcolor="#000000"></td>
        </tr>
        <tr>
          <td width="18%">Compara&ccedil;&atilde;o: </td>
          <td width="28%">Palavra Chave: </td>
          <td>Buscar em: </td>
          <td>Ordenar por: </td>
        </tr>
        <tr>
          <td>
          <select name="busca-comparacao" class="frm" id="busca-comparacao" style="width:130px;">
          	<?
          		foreach($Comparers as $Comparer){
          			print '<option value="'.$Comparer["value"].'" '.(($Comparer["value"]==$busca_comparacao) ? 'selected="selected"' : '').'>'.$Comparer["text"].'</option>';
          		}
          	?>
          </select>
          </td>
          <td><input name="chave" type="text" class="frm" id="chave" style="width:200px;" value="<?=$chave?>" size="30" maxlength="100" /></td>
          <td width="21%">
		  <select name="busca-campo" class="frm" id="busca-campo" style="width:140px;">
          	<?
          		foreach($Attributes as $Attribute){
          			print '<option value="'.$Attribute["value"].'" '.(($Attribute["value"]==$busca_campo) ? 'selected="selected"' : '').'>'.$Attribute["text"].'</option>';
          		}
          	?>
		  </select>
		  </td>
          <td width="33%" height="25" align="right">
          <select name="ordenacao-campo" class="frm" id="ordenacao-campo" style="width:140px;">
          	<?
          		foreach($Attributes as $Attribute){
          			print '<option value="'.$Attribute["value"].'" '.(($Attribute["value"]==$ordenacao_campo) ? 'selected="selected"' : '').'>'.$Attribute["text"].'</option>';
          		}
          	?>
          </select>
          <select name="ordenacao-ordem" class="frm" id="ordenacao-ordem">
          	<?
          		foreach($Orders as $Order){
          			print '<option value="'.$Order["value"].'" '.(($Order["value"]==$ordenacao_ordem) ? 'selected="selected"' : '').'>'.$Order["text"].'</option>';
          		}
          	?>
          </select>
          </td>
        </tr>
        <tr>
          <td colspan="4" align="right" height="25">
            <input name="pesquisar" type="submit" class="frm_botao" id="pesquisar" value="Pesquisar" />
            <input name="cancelar" type="button" class="frm_botao" id="cancelar" value="Cancelar" onclick="javascript:window.open('<?=$link_list?>', '_parent');" />
            <input name="exportar" id="exportar" type="submit" class="frm_botao frm_botao_export" value="Exportar" />
          </td>
        </tr>
		<tr>
		  <td colspan="4" height="1" bgcolor="#999999"></td>
		</tr>
      </table>
     </form>
     <script language="javascript">document.getElementById("chave").focus();</script>
    </td>
  </tr>
  <tr>
    <td height="30" align="right" class="paginacao_local"><?=$PG_LABEL?></td>
  </tr>
  <form id="frmOperacao" name="frmOperacao" method="post" action="associado_operation.php?back=<?=$link_back;?>">
  <tr>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="0" class="table_list">
      <tr bgcolor="#CCCCCC" class="tabela_titulo">
        <td width="1%" height="20"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=id_associado_perfil&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Associado Perfil">Associado Perfil</a></td>
        <td width="1%" height="20"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=id_associado_plano&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Associado Plano">Associado Plano</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=apelido&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Apelido">Apelido</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=nome&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Nome">Nome</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=cpf&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Cpf">Cpf</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=sexo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Sexo">Sexo</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=data_nascimento&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Data Nascimento">Data Nascimento</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=estado_civil&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Estado Civil">Estado Civil</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=rg&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Rg">Rg</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=formacao&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Formação">Formação</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=descricao&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Descrição">Descrição</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=endereco&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Endereço">Endereço</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=numero&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Número">Número</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=complemento&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Complemento">Complemento</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=bairro&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Bairro">Bairro</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=cep&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Cep">Cep</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=telefone_fixo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Telefone Fixo">Telefone Fixo</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=telefone_celular&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Telefone Celular">Telefone Celular</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=telefone_comercial&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Telefone Comercial">Telefone Comercial</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=redes&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Redes">Redes</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=imagem&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Imagem">Imagem</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=email&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: E-mail">E-mail</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=senha&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Senha">Senha</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_nome&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Nome">Empresa Nome</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_ramo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Ramo">Empresa Ramo</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_cnpj&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Cnpj">Empresa Cnpj</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_natureza&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Natureza">Empresa Natureza</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_cargo&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Cargo">Empresa Cargo</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_email&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa E-mail">Empresa E-mail</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_site&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Site">Empresa Site</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_telefone1&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Telefone1">Empresa Telefone1</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_telefone2&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Telefone2">Empresa Telefone2</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_telefone3&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Telefone3">Empresa Telefone3</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_endereco&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Endereço">Empresa Endereço</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_cep&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Cep">Empresa Cep</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=empresa_imagem&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Empresa Imagem">Empresa Imagem</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=contratacao_id&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Contratação Id">Contratação Id</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=contratacao_data_inicial&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Contratação Data Inicial">Contratação Data Inicial</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=contratacao_data_final&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Contratação Data Final">Contratação Data Final</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=newsletter&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Newsletter">Newsletter</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=datahora_cadastro&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Data/Hora Cadastro">Data/Hora Cadastro</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=datahora_edicao&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Data/Hora Edição">Data/Hora Edição</a></td>
        <td width="1%" height="20" align="left"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=datahora_login&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Data/Hora Login">Data/Hora Login</a></td>
        <td width="1%" height="20" align="center"><a href="<?="?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=status&ordenacao-ordem=$ordenacao_ordem_inverso&pg=$PG"?>" title="Ordernar por: Status">Status</a></td>
        <td width="5%" align="center"><input type="checkbox" name="CheckBoxIdOperacaoAll" id="CheckBoxIdOperacaoAll" onclick="ListagemSelectCheks(this);" /></td>
        <td width="15%" height="20" bgcolor="#CCCCCC" align="center">Op&ccedil;&atilde;o</td>
      </tr>
      <?
      	$cont=0;
      	for($i=0; $i < count($vobj); $i++){
			if(!$t){$t=true; $bgcolor="#F2F2F2";}else{$t=false; $bgcolor="#DADADA";} $cont++;
      ?>
      <tr>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?	$value = AssociadoPerfilManage::buscarAssociadoPerfil(1, $vobj[$i]["id_associado_perfil"]);	print $value["titulo"]; ?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["id_localidade"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?	$value = AssociadoPlanoManage::buscarAssociadoPlano(1, $vobj[$i]["id_associado_plano"]);	print $value["titulo"]; ?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["apelido"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["nome"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["cpf"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["sexo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarData($vobj[$i]["data_nascimento"], "d/m/y");?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["estado_civil"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["rg"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["formacao"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["descricao"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["endereco"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["numero"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["complemento"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["bairro"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["cep"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["telefone_fixo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["telefone_celular"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["telefone_comercial"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["redes"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["imagem"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["email"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["senha"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_nome"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_ramo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_cnpj"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_natureza"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_cargo"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_email"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_site"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_telefone1"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_telefone2"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_telefone3"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_endereco"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_cep"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["empresa_imagem"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["contratacao_id"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarData($vobj[$i]["contratacao_data_inicial"], "d/m/y");?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarData($vobj[$i]["contratacao_data_final"], "d/m/y");?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarStringList($vobj[$i]["newsletter"])?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarData($vobj[$i]["datahora_cadastro"], "d/m/y [Hhi]");?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarData($vobj[$i]["datahora_edicao"], "d/m/y [Hhi]");?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="left"><?=System::FormatarData($vobj[$i]["datahora_login"], "d/m/y [Hhi]");?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><?=(($vobj[$i]["status"]==1) ? '<img src="images/icones/s1.gif" title="Ativo" class="status" />' : '<img src="images/icones/s0.gif" title="Inativo" class="status" />')?></td>
        <td bgcolor="<?=$bgcolor?>" class="tabela_texto" align="center"><input type="checkbox" name="CheckBoxIdOperacao<?=$i?>" id="CheckBoxIdOperacao<?=$i?>" value="<?=$vobj[$i]["id_associado"]?>" class="InputOperacao" /></td>
        <td bgcolor="<?=$bgcolor?>" align="center"><a href="associado_view.php?id=<?=$vobj[$i]["id_associado"]?>&back=<?=$link_back;?>"><img src="images/botao/Search.gif" width="18" height="18" border="0" title="Visualizar | Código: <?=$vobj[$i]["id_associado"]?>" /></a>&nbsp;<a href="associado_edit.php?id=<?=$vobj[$i]["id_associado"]?>&back=<?=$link_back;?>"><img src="images/botao/Edit.gif" title="Editar | Código: <?=$vobj[$i]["id_associado"]?>" width="18" height="18" border="0"></a><a href="associado_remove.php?id=<?=$vobj[$i]["id_associado"]?>&back=<?=$link_back;?>" onclick="javascript: return confirm('Deseja realmente EXCLUIR?');"><img src="images/botao/Delete.gif" title="Excluir | Código: <?=$vobj[$i]["id_associado"]?>" width="18" height="18" border="0"></a></td>
      </tr>
      <?
      	} 
		if($cont <= 0){
      ?>
	  <tr>
	  	<td colspan="47" style="height:30px; font-weight:bold; font-size:14px; text-align:center">[Nenhum registro encontrado]</td>
	  </tr>
	  <?
	  	}
	  ?>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="right" class="paginacao_local"><?=$PG_LABEL?></td>
  </tr>
  <tr>
    <td height="30" align="right">
        <span>Quantidade de registros: <b><?=$vobjCount?></b> | </span>
        <span>Operação no(s) Selecionado(s):</span>
        <select name="OperacaoOpcao" id="OperacaoOpcao" class="frm">
            <option value="excluir">Excluir</option>
            <option value="status">Inverter Status</option>
        </select>
        <input type="submit" name="OperacaoBotao" id="OperacaoBotao" value="Executar" class="frm_botao" onclick="return confirm('Deseja realmente executar esta Operação?');" />
        <input type="hidden" name="OperacaoCount" id="OperacaoCount" value="<?=$cont?>" />
    </td>
  </tr>
  </form>
</table>
<?
	require_once("layout_inf.php");
?>