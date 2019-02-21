{extends file="layout_interna.tpl.php"}
{block name=head_interna}
	<style type="text/css">
		.columns1 { width:60% !important; }
		.columns2 { width:20% !important; }
		.columns3 { width:20% !important; }
	</style>
{/block}
{block name=footer_interna}
	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/DT_bootstrap.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datepicker/bootstrap-datepicker.js"></script>
  	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/simplecolorpicker/jquery.simplecolorpicker.js"></script>
	<script type="application/javascript">
		$(function(){
			
			{foreach from=$itensLojistaEtapa item=item}
			$("#status{$item.etapa.identificador}").html('{$item.status}');
			$("#data{$item.etapa.identificador}").html('<i class="fa fa-calendar"></i> {$item.data}');
			{/foreach}
			$("#FrmPrevisaoInicio").val("{$objCronograma->getPrevisaoInicio()}");
			$("#FrmPrevisaoFim").val("{$objCronograma->getPrevisaoFim()}");
			
		});
	</script>
	
	{include file="bloco_popup.tpl.php"}
{/block}

{block name=body_interna}

{if $objConteudo1->getLegenda() != ""}
<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h4>{$objConteudo1->getLegenda()}</h4>
			{$objConteudo1->getTexto()|textbyhtml}
		</div>
	</div>
</div>
{/if}

<div class="row">
	<div class="col-md-12">
		<h4 class="heading">{$objLojista->getNome()}</h4>
	</div>
</div>
<!-- /.row -->

{/block}