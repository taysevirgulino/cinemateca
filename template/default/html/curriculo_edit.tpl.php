{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script type="application/javascript">
		$(function(){
			$("#FrmIdCurriculoArea").val( "{$obj->getIdCurriculoArea()}" );
			$("#FrmIdCurriculoSegmento").val( "{$obj->getIdCurriculoSegmento()}" );
			$("#FrmNome").val( "{$obj->getNome()}" );
			$("#FrmSobrenome").val( "{$obj->getSobrenome()}" );
			$("#FrmSexo").val( "{$obj->getSexo()}" );
			$("#FrmDataNascimento").val( "{$obj->getDataNascimento()|date_format:'%d.%m.%Y'}" );
			$("#FrmCpf").val( "{$obj->getCpf()}" );
			$("#FrmEstadoCivil").val( "{$obj->getEstadoCivil()}" );
			$("#FrmTelefone").val( "{$obj->getTelefone()}" );
			$("#FrmTelefone2").val( "{$obj->getTelefone2()}" );
			$("#FrmEmail").val( "{$obj->getEmail()}" );
			$("#FrmEndereco").val( "{$obj->getEndereco()}" );
			$("#FrmCidade").val( "{$obj->getCidade()}" );
			$("#FrmEstado").val( "{$obj->getEstado()}" );
			$("#divFrmImagem img").attr("src", "{$URL_PATH}images/curriculo/A{if $obj->getImagem() != ''}{$obj->getImagem()}{else}null.jpg{/if}" );
		
			$("#frm").submit(function(e) {
				var btn = $(this).find("#btSubmit");
				btn.button('loading');
			});	
		});
	</script>
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
{/block}

{block name=body_interna}

{include file="form_alert.tpl.php"}

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Editar Currículo </h3>
	</div>
	<!-- /.portlet-header -->
	
	{include file="curriculo_form.tpl.php"}
		
</div>
<!-- /.portlet -->

{/block}