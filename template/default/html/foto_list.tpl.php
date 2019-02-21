{extends file="layout_interna.tpl.php"}
{block name=head_interna}
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/magnific/magnific-popup.css">
{/block}
{block name=footer_interna}
	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/DT_bootstrap.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/magnific/jquery.magnific-popup.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
{/block}

{block name=body_interna}

<div class="row" style="padding-bottom:20px;">
{if $Val->getIdUsuarioPerfil() != 1}
	<div class="col-md-2  col-md-offset-10">
		<a href="{$URL_PATH}foto-add-{$objLojista->getIdentificador()}" class="btn btn-sm btn-primary btn-block">
			<i class="fa fa-plus"></i> Nova Fotografia
		</a>
	</div>
	{/if}
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<div class="portlet-header">
				<h3> <i class="fa fa-list-ul"></i> Listagem </h3>
			</div>
			<!-- /.portlet-header -->
			
			<div class="portlet-content">
				
				<div class="row" id="listagem">
				
					{foreach from=$Itens item=item}
					<div class="col-md-3 col-sm-6">
						<div class="thumbnail">
							<div class="thumbnail-view"> <a href="{$URL_PATH}images/foto/{$item.imagem}" class="thumbnail-view-hover ui-lightbox"></a> <img src="{$URL_PATH}images/foto/A{$item.imagem}" style="width: 100%" alt="{$item.titulo}" /> </div>
                            <div class="caption">
                                <p>{$item.titulo}</p>
                                {if $Val->getIdUsuarioPerfil() != 1}
                                <p><a href="{$URL_PATH}foto-del-{$item.identificador}" class="btn btn-primary btn-sm btn-sm excluir" data-toggle="tooltip" data-placement="top" title="Exluir fotografia" data-title="{$item.titulo}"><i class="fa fa-trash"></i> excluir</a>
								{/if}
								</div>
							<div class="thumbnail-footer">
								<div class="pull-left"></div>
								<div class="pull-right"><i class="fa fa-clock-o"></i> {$item.datahora|date_format:"%d.%m.%y %Hh%M"}</div>
							</div>
						</div>
					</div>
					{/foreach}
					
				</div>
				
			</div>
			<!-- /.portlet-content --> 
			
		</div>
		<!-- /.portlet --> 
		
	</div>
	<!-- /.col --> 
	
</div>
<!-- /.row -->

{/block}