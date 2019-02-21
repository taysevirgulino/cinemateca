<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">

		<!-- <div class="col-sm-6">
			<div class="form-group">
				<label for="FrmIdEixoCategoria">Categoria do Eixo: </label>
				<select id="FrmIdEixoCategoria" name="FrmIdEixoCategoria" class="form-control" ><option value=""></option>{foreach from=$itensEixoCategoria item=item}<option value="{$item.id_eixo_categoria}">{$item.nome}</option>{/foreach}</select>
			</div>
		</div> -->

		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmNome">Nome do Eixo: </label>
				<input type="text" name="FrmNome" id="FrmNome" class="form-control" maxlength="255" value="" >
			</div>
		</div>

		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmIdDisciplina">Disciplina: </label>
				<select id="FrmIdDisciplina" name="FrmIdDisciplina" class="form-control selectpicker" multiple data-actions-box="true" ><option value=""></option>{foreach from=$itensDisciplina item=item}<option value="{$item.id_disciplina}">{$item.nome}</option>{/foreach}</select>
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