<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label for="FrmIdCurriculoArea">Área: *</label>
				<select id="FrmIdCurriculoArea" name="FrmIdCurriculoArea" class="form-control" required><option value=""></option>{foreach from=$itensCurriculoArea item=item}<option value="{$item.id_curriculo_area}">{$item.titulo}</option>{/foreach}</select>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label for="FrmIdCurriculoSegmento">Segmento: *</label>
				<select id="FrmIdCurriculoSegmento" name="FrmIdCurriculoSegmento" class="form-control" required><option value=""></option>{foreach from=$itensCurriculoSegmento item=item}<option value="{$item.id_curriculo_segmento}">{$item.titulo}</option>{/foreach}</select>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-5">
			<div class="form-group">
				<label for="FrmNome">Nome: *</label>
				<input type="text" name="FrmNome" id="FrmNome" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="form-group">
				<label for="FrmSobrenome">Sobrenome: *</label>
				<input type="text" name="FrmSobrenome" id="FrmSobrenome" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="form-group">
				<label for="FrmSexo">Sexo: *</label>
				<select name="FrmSexo" id="FrmSexo" class="form-control" required><option value="M">Masculino - M</option><option value="F">Feminino - F</option></select>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmDataNascimento">Data de Nascimento: *</label>
				<input type="text" name="FrmDataNascimento" id="FrmDataNascimento" class="form-control date" maxlength="10" value="" required>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmCpf" class="nobr">CPF:</label>
				<input type="text" name="FrmCpf" id="FrmCpf" class="form-control cpf" maxlength="32" value="">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmEstadoCivil">Estado Civil: </label>
				<select name="FrmEstadoCivil" id="FrmEstadoCivil" class="form-control" >
				  <option value="1">Solteiro(a)</option>
				  <option value="2">Casada(a)</option>
				  <option value="3">Vi&uacute;vo(a)</option>
				  <option value="4">Divorciado(a)</option>
				  <option value="5">Separado(a)</option>
				</select>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmTelefone">Telefone: </label>
				<input type="text" name="FrmTelefone" id="FrmTelefone" class="form-control telefone" maxlength="20" value="" required>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmTelefone2" class="nobr">Telefone alternativo: </label>
				<input type="text" name="FrmTelefone2" id="FrmTelefone2" class="form-control telefone" maxlength="20" value="" >
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmEmail" class="nobr">E-mail: </label>
				<input type="email" name="FrmEmail" id="FrmEmail" class="form-control email" maxlength="255" value="" >
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-5">
			<div class="form-group">
				<label for="FrmEndereco" class="nobr">Endereço: </label>
				<input type="text" name="FrmEndereco" id="FrmEndereco" class="form-control" maxlength="255" value="" >
			</div>
		</div>
		<div class="col-sm-5">
			<div class="form-group">
				<label for="FrmCidade" class="nobr">Cidade: </label>
				<input type="text" name="FrmCidade" id="FrmCidade" class="form-control" maxlength="255" value="" >
			</div>
		</div>
		<div class="col-sm-2">
			<div class="form-group">
				<label for="FrmEstado" class="nobr">Estado: </label>
				<select name="FrmEstado" class="form-control" id="FrmEstado" ><option value=""></option><option value="AC">AC</option><option value="AL">AL</option><option value="AM">AM</option><option value="AP">AP</option><option value="BA">BA</option><option value="CE">CE</option><option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option><option value="MA">MA</option><option value="MG">MG</option><option value="MS">MS</option><option value="MT">MT</option><option value="PA">PA</option><option value="PB">PB</option><option value="PE">PE</option><option value="PI">PI</option><option value="PR">PR</option><option value="RJ">RJ</option><option value="RN">RN</option><option value="RO">RO</option><option value="RR">RR</option><option value="RS">RS</option><option value="SC">SC</option><option value="SE">SE</option><option value="SP">SP</option><option value="TO">TO</option></select>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-6">
			<label for="FrmArquivoFile" id="labelFrmArquivoFile" class="nobr">Currículo anexo:</label>
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-group">
					<div class="form-control"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
					<div class="input-group-btn"> 
						<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a> 
						<span class="btn btn-default btn-file"> 
							<span class="fileupload-new">Selecionar arquivo</span> 
							<span class="fileupload-exists">Alterar</span>
							<input type="file" name="FrmArquivoFile" id="FrmArquivoFile" class="excluded" value="">
						</span> 
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group" id="divFrmImagem">
				<label class="select-input nobr">Imagem</label>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="fileupload-new thumbnail" style="width: 180px; height: 180px;"><img src="{$URL_PATH}images/curriculo/Anull.jpg" alt="Foto" /></div>
					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
					<div> <span class="btn btn-default btn-file"><span class="fileupload-new">Selecionar imagem</span><span class="fileupload-exists">Alterar</span>
						<input id="FrmImagemFile" name="FrmImagemFile" type="file" />
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