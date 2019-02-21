{extends file="layout_interna.tpl.php"}
{block name=head_interna}
	<style type="text/css">
		.columns1 { width:3%; }
		.columns2 { width:57%; }
		.columns3 { width:1%; }
		.columns4 { width:10%; }
		.columns5 { width:20%; }
	</style>
{/block}
{block name=footer_interna}
	<!-- Plugin JS --> 
	<script type="application/javascript">
		{foreach from=$itensLojistaEtapa item=item}
		$("#status_label{$item.etapa.identificador}").html('{$item.status_label}');
		$("#status{$item.etapa.identificador}"){if $item.status == 1}.attr("checked", "checked"){else}.removeAttr("checked"){/if};
		$("#data{$item.etapa.identificador}").val("{$item.data}");
		{/foreach}
		$("#FrmPrevisaoInicio").val("{$objCronograma->getPrevisaoInicio()}");
		$("#FrmPrevisaoFim").val("{$objCronograma->getPrevisaoFim()}");
	</script>
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/DT_bootstrap.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datepicker/bootstrap-datepicker.js"></script>
  	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/simplecolorpicker/jquery.simplecolorpicker.js"></script>
	<script type="application/javascript">
		$(function(){
			
			var $update = function($ide, $status, $data){
				API.lojistaEtapaUpdate(
					'{$objLojista->getIdentificador()}', $ide, $status, $data, 
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
					}, 
					function(error){
						$.howl ({
							type: 'danger'
							, title: 'Erro'
							, content: 'Não foi possível salvar, tente novamente'
							, sticky: false
							, lifetime: 7500
							, iconCls: 'fa fa-ban'
						});
					}
				);
			};
			
			$('input:checkbox').iCheck({
				checkboxClass: 'icheckbox_minimal-green',
				radioClass: 'iradio_minimal-green',
				inheritClass: true
			});
			$('input:checkbox').on('ifChecked ifUnchecked', function(event){
				var ide = $(this).val();
				var status = ((event.type == 'ifChecked') ? 1 : 0 );
				var data = $("#data"+ide).val();
				
				$update(ide, status, data);
			});
			$('input.datas').on('change', function(event){
				var ide = $(this).attr("data-id");
				var status = (($("#status"+ide).is(":checked")) ? 1 : 0 );
				var data = $(this).val();
				
				$update(ide, status, data);
			});
			
			$('.date').datepicker({
				format: "dd/mm/yyyy",
            	language: "pt-BR"
			}).on('changeDate', function(e){
				$(this).datepicker('hide');
			});
			
			$("#formPrevisao").submit(function(e) {
				
				var formData = $(this).serialize();
				API.lojistaCronogramaPrevisao(
					formData,
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
					}, 
					function(error){
						$.howl ({
							type: 'danger'
							, title: 'Erro'
							, content: 'Não foi possível salvar, tente novamente'
							, sticky: false
							, lifetime: 7500
							, iconCls: 'fa fa-ban'
						});
					}
				);
				
				return false;
			});
		});
	</script>
{/block}

{block name=body_interna}


<div class="row">
	<div class="col-md-8">
		<div class="portlet">
			<div class="portlet-header">
				<h3> <i class="fa fa-compass"></i> Andamento da Obra</h3>
			</div>
			<!-- /.portlet-header -->
			
			<div class="portlet-content">
				<div class="row">
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-primary">Vencido</span></div>
							<div class="progress-stat-value"><span class="text-primary">{$objCronograma->getPorcentagemVencido()}%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="{$objCronograma->getPorcentagemVencido()}" aria-valuemin="0" aria-valuemax="100" style="width: {$objCronograma->getPorcentagemVencido()}%"> <span class="sr-only">{$objCronograma->getPorcentagemVencido()}%</span> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-warning">Aberto</span></div>
							<div class="progress-stat-value"><span class="text-warning">{$objCronograma->getPorcentagemAberto()}%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{$objCronograma->getPorcentagemAberto()}" aria-valuemin="0" aria-valuemax="100" style="width: {$objCronograma->getPorcentagemAberto()}%"> <span class="sr-only">{$objCronograma->getPorcentagemAberto()}%</span> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-success">Concluído</span></div>
							<div class="progress-stat-value"><span class="text-success">{$objCronograma->getPorcentagemConcluido()}%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{$objCronograma->getPorcentagemConcluido()}" aria-valuemin="0" aria-valuemax="100" style="width: {$objCronograma->getPorcentagemConcluido()}%"> <span class="sr-only">{$objCronograma->getPorcentagemConcluido()}%</span> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-tertiary">Indefinido</span></div>
							<div class="progress-stat-value"><span class="text-tertiary">{$objCronograma->getPorcentagemIndefinido()}%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-tertiary" role="progressbar" aria-valuenow="{$objCronograma->getPorcentagemIndefinido()}" aria-valuemin="0" aria-valuemax="100" style="width: {$objCronograma->getPorcentagemIndefinido()}%"> <span class="sr-only">{$objCronograma->getPorcentagemIndefinido()}%</span> </div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-{$objFarol->getCor()} btn-lg btn-block ui-tooltip" title="Farol está {$objFarol->getTitulo()|upper}" data-toggle="tooltip" data-placement="top"> <i class="fa fa-flag"></i> {$objFarol->getTitulo()|upper}</button>
					</div>
				</div>
			</div>
			<!-- /.portlet-content --> 
			
		</div>
		<!-- /.portlet -->
	</div>
	{if $Val->getIdUsuarioPerfil() != 1}

	<div class="col-md-4">
		<div class="portlet">
			<div class="portlet-header">
				<h3> <i class="fa fa-refresh"></i> Previsão de Conclusão </h3>
			</div>
			<!-- /.portlet-header -->	
			<form id="formPrevisao" name="formPrevisao" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
			<input type="hidden" name="FrmCronogramaIde" id="FrmCronogramaIde" value="{$objCronograma->getIdentificador()}" />
			<div class="portlet-content">
			
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="FrmPrevisaoInicio">Início: </label>
							<input type="text" name="FrmPrevisaoInicio" id="FrmPrevisaoInicio" class="form-control date" maxlength="10" value="" required="required" >
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="FrmPrevisaoFim">Fim: </label>
							<input type="text" name="FrmPrevisaoFim" id="FrmPrevisaoFim" class="form-control date" maxlength="10" value="" required="required" >
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group" style="margin-bottom:0px;">
						  <button id="formPrevisaoBtn" name="formPrevisaoBtn" type="submit" class="btn btn-primary">SALVAR</button>
						  <button class="btn btn-default" type="button" onclick="javascript:forms.formPrevisao.reset();">cancelar</button>
						</div>
					</div>
					<!-- /.col -->
					
				</div>
				<!-- /.row --> 
				
			</div>
			<!-- /.portlet-content --> 
			</form>
		</div>
		<!-- /.portlet -->
	</div>
</div>
{/if}

<div class="row">
	<div class="col-md-12">
		
		<h4 class="heading">CRONOGRAMA</h4>
		<div class="panel-group accordion" id="accordion">
				
			{foreach from=$itensCronogramaTipo item=tipo}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent=".accordion" href="#{$tipo.identificador}"> {$tipo.titulo} </a> </h4>
				</div>
				<div id="{$tipo.identificador}" class="panel-collapse collapse">
					<div class="panel-body">
					
						<div class="portlet-content">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-checkable" data-provide="datatable">
									<thead>
										<tr>
											<th class="columns1" style="text-align:center"><i class="fa fa-check-square-o"></i></th>
											<th class="columns2" data-filterable="true" data-sortable="true">Etapa</th>
											<th class="columns3" style="text-align:center" data-filterable="true" data-sortable="true">Situação</th>
											<th class="columns4" style="text-align:center" data-filterable="false" data-sortable="true">%</th>
											{if $Val->getIdUsuarioPerfil() != 1}

											<th class="columns5" style="text-align:center" data-filterable="false" data-sortable="false">Conclusão</th>
										{/if}
										</tr>
									</thead>
									<tbody>
										{foreach from=$tipo.etapas item=etapa}
										<tr>
											<td class="checkbox-column" style="text-align:center"><input id="status{$etapa.identificador}" name="status{$etapa.identificador}" type="checkbox" class="status" value="{$etapa.identificador}" /></td>
											<td>{$etapa.titulo}</td>
											<td style="text-align:center" id="status_label{$etapa.identificador}"><span class="btn btn-xs btn-tertiary"><i class="fa fa-times"></i> Indefinido</span></td>
											<td style="text-align:center">{$etapa.porcentagem} %</td>
											{if $Val->getIdUsuarioPerfil() != 1}
											<td style="text-align:center">
												<div class="input-group date">
													<input id="data{$etapa.identificador}" name="data{$etapa.identificador}" class="form-control datas" type="text" data-id="{$etapa.identificador}" value="">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
											</td>
											{/if}
										</tr>
										{/foreach}
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive --> 
							
						</div>
						<!-- /.portlet-content --> 
					
					</div>
				</div>
			</div>
			<!-- /.panel-default -->
			{/foreach}
			
		</div>
		<!-- /.accordion -->
		
	</div>
	<!-- /.col --> 
	
</div>
<!-- /.row -->

{/block}