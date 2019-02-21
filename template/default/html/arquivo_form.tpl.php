<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="FrmIdArquivoTipo">Tipo: *</label>
				<select id="FrmIdArquivoTipo" name="FrmIdArquivoTipo" class="form-control" required><option value=""></option>{foreach from=$itensArquivoTipo item=item}<option value="{$item.id_arquivo_tipo}">{$item.titulo}</option>{/foreach}</select>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="FrmIdArquivoDisciplina">Disciplina: *</label>
				<select id="FrmIdArquivoDisciplina" name="FrmIdArquivoDisciplina" class="form-control" required><option value=""></option>{foreach from=$itensArquivoDisciplina item=item}<option value="{$item.id_arquivo_disciplina}">{$item.titulo}</option>{/foreach}</select>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmTitulo">Título: *</label>
				<input type="text" name="FrmTitulo" id="FrmTitulo" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmTexto" class="nobr">Comentário: </label>
				<textarea name="FrmTexto" id="FrmTexto" class="form-control" rows="3" ></textarea>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmTitulo">Arquivos anexo: *</label>
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