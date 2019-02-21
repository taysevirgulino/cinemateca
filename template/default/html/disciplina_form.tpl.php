<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded" >
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="FrmSemestre">Semestre: *</label>
				<select name="FrmSemestre" id="FrmSemestre" class="form-control" required>
					<option value="0">Selecione um semestre</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="FrmNome">Nome: *</label>
				<input type="text" name="FrmNome" id="FrmNome" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmConteudo">Conteúdo: *</label>
				<!-- <textarea name="FrmConteudo" id="FrmConteudo" class="form-control" rows="5"></textarea> -->
				<input name="FrmConteudo" id="FrmConteudo" type="text" value="" data-role="tagsinput" placeholder="Add tags de Conteúdo" />
			</div>
		</div>
	</div>
	
	<div class="row mt20">
		<div class="col-sm-4">
			<div class="form-group">
			  <button id="btSubmit" name="btSubmit" type="submit" class="btn btn-primary" data-loading-text="CARREGANDO...">Salvar</button>
			  <button class="btn btn-default" type="button" onclick="javascript:history.go(-1);">Cancelar</button>
			</div>
		</div>
		<!-- /.col -->
		
	</div>
	<!-- /.row --> 
	
</div>
<!-- /.portlet-content --> 
</form>
