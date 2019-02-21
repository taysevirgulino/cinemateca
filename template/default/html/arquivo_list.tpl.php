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
	<div class="col-md-3  col-md-offset-9">
		<a href="{$URL_PATH}arquivo-add-{$objLojista->getIdentificador()}" class="btn btn-sm btn-primary btn-block">
			<i class="fa fa-plus"></i> Novo Arquivo/Protocolo
		</a>
	</div>
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
								<th data-filterable="true" data-sortable="true">Arquivo/Protocolo</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Tipo</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Atualização</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Situação</th>
								<th data-filterable="false" data-sortable="false" style="text-align:center">Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$Itens item=item}
							<tr>
								<td>
									<span style="font-size:12px; font-style:italic">#{$item.id_arquivo}: {$item.disciplina_titulo}</span><br />
									<strong>{$item.titulo}</strong>
								</td>
								<td style="text-align:center">{$item.tipo_titulo}</td>
								<td style="text-align:center">{$item.datahora}</td>
								<td style="text-align:center">{$item.status_label}</td>
                                <td style="text-align:center">
                                    <a href="{$URL_PATH}arquivo-view-{$item.identificador}" title="Abrir Protocolo" class="btn btn-xs btn-info ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-search"></i> Abrir</a>
                                    {if $user->getIdUsuarioPerfil() != 1}
                                    <a href="{$URL_PATH}arquivo_remove.php?id={$item.id_arquivo}&identificador={$objLojista->identificador}" title="Abrir Protocolo" class="btn btn-xs btn-danger ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-close"></i> Excluir</a>
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