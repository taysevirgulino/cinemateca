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
		<a href="{$URL_PATH}curriculo-add" class="btn btn-sm btn-primary btn-block">
			<i class="fa fa-plus"></i> Novo Currículo
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
								<th data-filterable="true" data-sortable="true">Currículo</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Área</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Segmento</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Data</th>
								<th data-filterable="false" data-sortable="false" style="text-align:center">Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$Itens item=item}
							<tr>
								<td>
									<strong>{$item.nome} {$item.sobrenome}</strong><br />
									<span style="font-size:12px;">
										{$item.sexo}; {$item.estado_civil}; {$item.data_nascimento}<br />
										{$item.telefone} {$item.telefone2} {$item.email} 
									</span>
								</td>
								<td style="text-align:center">{$item.area.titulo}</td>
								<td style="text-align:center">{$item.segmento.titulo}</td>
								<td style="text-align:center">{$item.datahora}</td>
								<td style="text-align:center">
									<a href="{$URL_PATH}curriculo-view-{$item.identificador}" title="Abrir Currículo" class="btn btn-xs btn-info ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-search"></i> Abrir</a>
									<a href="{$URL_PATH}curriculo-edit-{$item.identificador}" title="Editar" class="btn btn-xs btn-warning ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
									<a href="{$URL_PATH}curriculo-del-{$item.identificador}" title="Excluir" data-title="{$item.nome}" class="btn btn-xs btn-primary ui-tooltip excluir" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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