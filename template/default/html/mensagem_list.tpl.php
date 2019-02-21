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
	<div class="col-md-2  col-md-offset-10">
		<a href="{$URL_PATH}mensagem-add" class="btn btn-sm btn-primary btn-block">
			<i class="fa fa-plus"></i> Novo Mensagem
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
								<th data-filterable="true" data-sortable="true">Mensagem</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Atualização</th>
								<th style="text-align:center" data-filterable="true" data-sortable="true">Situação</th>
								<th data-filterable="false" data-sortable="false" style="text-align:center">Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$Itens item=item}
							<tr>
								<td>
									<strong>{$item.titulo}</strong><br />
									<span style="font-size:12px; font-style:italic"><u>{$item.nome}</u> para <u>{$item.destinatario_nome}</u></span>
								</td>
								<td style="text-align:center">{$item.datahora}</td>
								<td style="text-align:center">{$item.status.span}</td>
								<td style="text-align:center">
									<a href="{$URL_PATH}mensagem-view-{$item.identificador}" title="Abrir Mensagem" class="btn btn-xs btn-info ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-search"></i> Abrir</a>
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