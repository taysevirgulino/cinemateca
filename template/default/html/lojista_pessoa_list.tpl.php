{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/DT_bootstrap.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
	<script type="application/javascript">
		var $senhaLojista = function($ide, $callback){
			API.lojistaPessoaSenha(
				$ide, 
				function(rs){
					if( rs.sucess ){
						$.howl ({
							type: 'success'
							, title: 'Sucesso'
							, content: rs.msg
							, sticky: false
							, lifetime: 7500
							, iconCls: 'fa fa-check-square-o'
						});
					}else{
						$.howl ({
							type: 'danger'
							, title: 'Erro'
							, content: rs.msg
							, sticky: false
							, lifetime: 7500
							, iconCls: 'fa fa-ban'
						});
					}
					$callback();
				}, 
				function(error){
					$.howl ({
						type: 'danger'
						, title: 'Erro'
						, content: 'Erro na conexão, tente novamente'
						, sticky: false
						, lifetime: 7500
						, iconCls: 'fa fa-ban'
					});
					$callback();
				}
			);
		};
		
		function enviarSenha(ide){
			if( window.confirm("Deseja realmente enviar e-mail com os dados de acesso?") ){
				$ico = $("#linkSenha_"+ide).find("i");
				$($ico).addClass("fa-spin");
				$senhaLojista( ide, function(){
					$($ico).removeClass("fa-spin");	
				});
			}
			return false;
		}
	</script>
{/block}

{block name=body_interna}

<div class="row" style="padding-bottom:20px;">
	<div class="col-md-2  col-md-offset-10">
		<a href="{$URL_PATH}lojista-pessoa-add" class="btn btn-sm btn-primary btn-block">
			<i class="fa fa-plus"></i> Novo Contato
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
								<th data-filterable="true" data-sortable="true" data-direction="asc">Pessoa</th>
								<th data-filterable="true" data-sortable="true">Perfil</th>
								<th data-filterable="true" data-sortable="true">Lojista</th>
								<th data-filterable="false" data-sortable="false" style="text-align:center">Ações</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$Itens item=item}
							<tr>
								<td>
									<strong>{$item.nome}</strong><br />
									{$item.telefone} {$item.email}
								</td>
								<td>{$item.perfil_titulo}</td>
								<td>{$item.lojista_nome}</td>
								<td style="text-align:center">
									<a id="linkSenha_{$item.identificador}" href="javascript:void(enviarSenha('{$item.identificador}'));" title="Enviar dados de acesso" class="btn btn-xs btn-info ui-tooltip btn-senha" data-toggle="tooltip" data-placement="top"><i class="fa fa-unlock-alt"></i></a>
									<a href="{$URL_PATH}lojista-pessoa-edit-{$item.identificador}" title="Editar" class="btn btn-xs btn-warning ui-tooltip" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
									<a href="{$URL_PATH}lojista-pessoa-del-{$item.identificador}" title="Excluir" data-title="{$item.nome}" class="btn btn-xs btn-primary ui-tooltip excluir" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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