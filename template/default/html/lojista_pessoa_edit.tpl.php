{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script type="application/javascript">
		$(function(){
			$("#FrmIdLojista").val( "{$obj->getIdLojista()}" ).trigger("change");
			$("#FrmIdLojistaPessoaPerfil").val( "{$obj->getIdLojistaPessoaPerfil()}" ).trigger("change");
			$("#FrmNome").val( "{$obj->getNome()}" );
			$("#FrmEmail").val( "{$obj->getEmail()}" );
			$("#FrmEmail2").val( "{$obj->getEmail2()}" );
			$("#FrmTelefone").val( "{$obj->getTelefone()}" );
			$("#FrmTelefone2").val( "{$obj->getTelefone2()}" );
			$("#FrmEndereco").val( "{$obj->getEndereco()}" );
			$("#FrmCidade").val( "{$obj->getCidade()}" );
			$("#FrmEstado").val( "{$obj->getEstado()}" ).trigger("change");
			$("#FrmCep").val( "{$obj->getCep()}" );
			$("#FrmObservacoes").val( "{$obj->getObservacoes()}" );
			$("input[name='FrmReceberEmail']").each(function(index, element) {
				if( $(this).val() == "{$obj->getReceberEmail()}"){
					$(this).attr("checked", "checked");
				}
			});
			$("#divFrmSenha").each(function(index, element) {
				$(this).find("label").html("Senha: (informe caso queira alterar)");
			});
			
			$("#frm").submit(function(e) {
				var possuiLogin = parseInt( $("input[name='FrmUsuario']:checked").val() || 2);
				if(possuiLogin == 1){
					var login = $("#FrmLogin").val() || "";
					var msg = "";
					if( login.length <= 0 ){
						msg += "Preencha o Login;\n";
					}
					if( msg.length > 0){
						alert(msg);
						return false;
					}
				}
				
				var btn = $(this).find("#btSubmit");
				btn.button('loading');
			});
		});
	</script>
	{if $objUsuarioPessoa != null}
	<script type="application/javascript">
		$(function(){
			var possuiAcesso = (({if $objUsuarioPessoa->getStatus()==1}true{else}false{/if}) ? 1 : 2 );
			$("input[name='FrmUsuario']").each(function(index, element) {
				if( $(this).val() == possuiAcesso){
					$(this).attr("checked", "checked");
				}
			});
			$("#FrmLogin").val( "{$objUsuarioPessoa->getLogin()}" );
			$("#divFrmLogin").css("visibility", "visible");
			$("#divFrmSenha").css("visibility", "visible");
		});
	</script>
	{/if}
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
{/block}

{block name=body_interna}

{include file="form_alert.tpl.php"}

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Editar </h3>
	</div>
	<!-- /.portlet-header -->
	
	{include file="lojista_pessoa_form.tpl.php"}
		
</div>
<!-- /.portlet -->

{/block}