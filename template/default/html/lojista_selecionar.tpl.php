{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
	<script type="application/javascript">
		$(function(){
			
			$("#frm").submit(function(e) {
				
				var page = $.url().param('page');
				if(page != undefined){
					window.open(page+"-"+$("#FrmIdLojista").val(), "_parent");
				}
				
				return false;
			});
				
		});
	</script>
{/block}

{block name=body_interna}

{include file="form_alert.tpl.php"}

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Escolha uma Loja </h3>
	</div>
	<!-- /.portlet-header -->
	
	<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
	<div class="portlet-content">
	
		<div class="row">
			<div class="col-sm-8">
				<div class="form-group">
					<label for="FrmIdLojista">Lojista: *</label>
					<select id="FrmIdLojista" name="FrmIdLojista" class="form-control" required><option value=""></option>{foreach from=$itensLojista item=item}{if $item->getStatus() != 0}<option value="{$item->getIdentificador()}">{$item->getNome()}</option>{/if}{/foreach}</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group" style="padding-top:20px;">
				  	<button id="btSubmit" name="btSubmit" type="submit" class="btn btn-success btn-lg btn-block">PRÓXIMO &raquo;</button>
				</div>
			</div>
		</div>
		
	</div>
	<!-- /.portlet-content --> 
	</form>
		
</div>
<!-- /.portlet -->

{/block}