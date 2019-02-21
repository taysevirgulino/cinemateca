{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}lojista_pessoa_form.js"></script>
	<script type="application/javascript">
		$(function(){
			$("#frm").submit(function(e) {
				var possuiLogin = parseInt( $("input[name='FrmUsuario']:checked").val() || 2);
				if(possuiLogin == 1){
					var login = $("#FrmLogin").val() || "";
					var senha = $("#FrmSenha").val() || "";
					var msg = "";
					if( login.length <= 0 ){
						msg += "Preencha o Login;\n";
					}
					if( senha.length <= 0 ){
						msg += "Preencha a Senha;\n";
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
{/block}

{block name=body_interna}

{include file="form_alert.tpl.php"}

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Novo Contato </h3>
	</div>
	<!-- /.portlet-header -->
	
	{include file="lojista_pessoa_form.tpl.php"}
		
</div>
<!-- /.portlet -->

{/block}