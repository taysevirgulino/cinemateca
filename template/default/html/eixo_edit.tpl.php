{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
	<script type="application/javascript">
		$(function(){
			//$("#FrmIdEixoCategoria").val( "{$obj->getIdEixoCategoria()}" );
			$("#FrmNome").val( "{$obj->getNome()}" );
			$('#FrmIdDisciplina').val(('{$obj->getIdDisciplina()}')); 
			$('#FrmIdDisciplina').trigger('change'); 
			$("#frm").submit(function(e) {
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
		<h3> <i class="fa fa-file-text-o"></i> Editar Eixo </h3>
	</div>
	<!-- /.portlet-header -->
	
	{include file="eixo_form.tpl.php"}
		
</div>
<!-- /.portlet -->

{/block}