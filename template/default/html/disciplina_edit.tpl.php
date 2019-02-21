{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
	<script type="application/javascript">
		$(function(){
			//console.log('{$obj->getSemestre()}');
			$('#FrmSemestre').val(('{$obj->getSemestre()}')); 
			$('#FrmSemestre').trigger('change'); 

			$("#FrmNome").val( "{$obj->getNome()}" );

			//console.log('{$obj->getConteudo()}');
			$("#FrmConteudo").val("{$obj->getConteudo()}");
			$("#FrmConteudo").tagsinput();

			$("#frm").submit(function(e) {
				var btn = $(this).find("#btSubmit");
				btn.button('loading');
			});	

			$(document).ready(function() {
			  $(window).keydown(function(event){
			    if(event.keyCode == 13) {
			      event.preventDefault();
			      return false;
			    }
			  });
			});
		});
		
	</script>
{/block}

{block name=body_interna}

{include file="form_alert.tpl.php"}

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Editar Disciplina </h3>
	</div>
	
	{include file="disciplina_form.tpl.php"}
		
</div>
<!-- /.portlet -->

{/block}