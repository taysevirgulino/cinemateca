{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/DT_bootstrap.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
{/block}

{block name=body_interna}

<div class="row" style="padding-bottom:20px;">
{if $Val->getIdUsuarioPerfil() != 1}

	<div class="col-md-2  col-md-offset-10">
		<a href="{$URL_PATH}documento-add" class="btn btn-sm btn-primary btn-block">
			<i class="fa fa-plus"></i> Adicionar Disciplina
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
				<div class="table-responsive">
					<table 
						id="listagem"
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
								<th data-filterable="true" data-sortable="true">Disciplina</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Data/Hora</th>
								<th data-filterable="false" data-sortable="false" style="text-align:center">A��es</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$Itens item=item}
							<tr>
								<td>
									{$item.titulo}
								</td>
								<td style="text-align:center">{$item.datahora|date_format:"%d.%m.%y %Hh%M"}</td>
								
                                <td style="text-align:center">
                                    <a href="{$URL_PATH}documento-edit-{$item.identificador}" title="Editar" class="btn btn-xs btn-warning ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                                    {if $Val->getIdUsuarioPerfil() != 1}
                                    <a href="{$URL_PATH}documento-del-{$item.identificador}" title="Excluir" data-title="{$item.nome}" class="btn btn-xs btn-primary ui-tooltip excluir" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
									{/if}
								</td>
							</tr>
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