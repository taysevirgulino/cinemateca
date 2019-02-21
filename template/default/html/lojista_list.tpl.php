{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/DT_bootstrap.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/tableCheckable/jquery.tableCheckable.js"></script>
{/block}

{block name=body_interna}

<div class="row">
	<div class="col-md-12">
		<div class="portlet">
			<div class="portlet-header">
				<h3> <i class="fa fa-shopping-cart"></i> Listagem de Lojistas </h3>
			</div>
			<!-- /.portlet-header -->
			
			<div class="portlet-content">
				<div class="table-responsive">
					<table 
						class="table table-striped table-bordered table-hover table-highlight" 
						data-provide="datatable" 
						data-display-rows="10"
						data-info="true"
						data-search="true"
						data-length-change="true"
						data-paginate="true"
					  >
						<thead>
							<tr>
								<th data-filterable="true" data-sortable="true" data-direction="asc">Lojista</th>
								<th data-filterable="true" data-sortable="true">LUC</th>
								<th data-filterable="true" data-sortable="true">Segmento</th>
								<th data-filterable="true" data-sortable="true">Responsável</th>
								<th data-filterable="true" data-sortable="true">Farol</th>
								<th data-filterable="false" data-sortable="false" style="text-align:center">Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$Itens item=item}
							{if $item.status != 0}
							<tr>
								<td>{$item.nome}</td>
								<td>{$item.numero}</td>
								<td>{$item.segmento_titulo}</td>
								<td>{$item.responsavel}</td>
								<td style="text-align:center"><span class="label label-{$item.farol.cor}">{$item.farol.titulo}</span></td>
								<td style="text-align:center">
									<a href="{$URL_PATH}lojista-cronograma-{$item.identificador}" title="Cronograma" class="btn btn-xs btn-info ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-calendar"></i></a>
									<a href="{$URL_PATH}lojista-pessoa-list-{$item.identificador}" title="Pessoas/Contatos" class="btn btn-xs btn-warning ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-users"></i></a>
									<a href="{$URL_PATH}lojista-edit-{$item.identificador}" title="Editar" class="btn btn-xs btn-primary ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
								</td>
							</tr>
							{/if}
							{/foreach}
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive --> 
				
			</div>
			<!-- /.portlet-content --> 
			
		</div>
		<!-- /.portlet --> 
		
	</div>
	<!-- /.col --> 
	
</div>
<!-- /.row -->

{/block}