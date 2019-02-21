<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-8">
			<div class="form-group">
				<label for="FrmTitulo">Título: *</label>
				<input type="text" name="FrmTitulo" id="FrmTitulo" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label class="select-input">Imagem *</label>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="fileupload-new thumbnail" style="width: 180px; height: 180px;"><img src="{$URL_PATH}images/foto/Anull.jpg" alt="Foto" /></div>
					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
					<div> <span class="btn btn-default btn-file"><span class="fileupload-new">Selecionar imagem</span><span class="fileupload-exists">Alterar</span>
						<input id="FrmImagemFile" name="FrmImagemFile" type="file" required />
						</span> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a> </div>
				</div>
			</div>
		</div>
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