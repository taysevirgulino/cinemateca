{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<script type="application/javascript">
		$(function(){
			$("#frm").submit(function(e) {
				var btn = $(this).find("#btSubmit");
				btn.button('loading');
			});	
			$('select').select2 ({
				allowClear: true,
				placeholder: "Selecionar..."
			});
		});
	</script>
{/block}

{block name=body_interna}

{include file="form_alert.tpl.php"}

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Responder Arquivo/Protocolo </h3>
	</div>
	<!-- /.portlet-header -->
	
	<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
	<div class="portlet-content">
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="FrmTexto">Comentário: *</label>
					<textarea name="FrmTexto" id="FrmTexto" class="form-control" rows="3" required></textarea>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-5">
				<label>Situação: *</label><br />
				<div class="btn-group" data-toggle="buttons">
					{foreach from=$itensStatus item=item key=key}
					<label class="btn btn-{$item[2]}">
						<input class="excluded" type="radio" name="FrmStatus" id="FrmStatus_{$item[0]}" value="{$item[0]}"> {$item[1]}
					</label>
					{/foreach}
				</div>
			</div>
			<div class="col-sm-7">
				<div class="form-group">
					<label for="FrmIdUsuarioResponsavel" class="nobr">Alocar Reponsável:</label>
					<select id="FrmIdUsuarioResponsavel" name="FrmIdUsuarioResponsavel" class="form-control"><option value=""></option>{foreach from=$itensUsuario item=item}<option value="{$item.id_usuario}">{$item.nome}</option>{/foreach}</select>
				</div>
			</div>
		</div>
		
		<h4 class="heading" style="margin-top:20px;">Novos anexos:</h4>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="FrmIdArquivoTipo" class="nobr">Tipo do arquivo:</label>
					<select id="FrmIdArquivoTipo" name="FrmIdArquivoTipo" class="form-control"><option value=""></option>{foreach from=$itensArquivoTipo item=item}<option value="{$item.id_arquivo_tipo}">{$item.titulo}</option>{/foreach}</select>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label for="FrmTitulo" class="nobr">Arquivos anexo:</label>
				</div>
			</div>
			{foreach from=$inputAnexos item=item}
			<div class="col-sm-12">
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="input-group">
						<div class="form-control"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
						<div class="input-group-btn"> 
							<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a> 
							<span class="btn btn-default btn-file"> 
								<span class="fileupload-new">Selecionar arquivo</span> 
								<span class="fileupload-exists">Alterar</span>
								<input type="file" name="FrmArquivoFile_{$item}" id="FrmArquivoFile_{$item}" class="excluded" value="">
							</span> 
						</div>
					</div>
				</div>
			</div>
			{/foreach}
		</div>
		
		<div class="row" style="margin-top:20px;">
			<div class="col-sm-4">
				<div class="form-group">
				  <button id="btSubmit" name="btSubmit" type="submit" class="btn btn-primary" data-loading-text="CARREGANDO...">SALVAR</button>
				  <button class="btn btn-default" type="button" onclick="javascript:history.go(-1);">cancelar</button>
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

{/block}