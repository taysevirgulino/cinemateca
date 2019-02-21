<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmIdLojista">Lojista: *</label>
				<select id="FrmIdLojista" name="FrmIdLojista" class="form-control" required><option value=""></option>{foreach from=$itensLojista item=item}<option value="{$item.id_lojista}">{$item.nome}</option>{/foreach}</select>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<label for="FrmIdLojistaPessoaPerfil">Perfil: *</label>
				<select id="FrmIdLojistaPessoaPerfil" name="FrmIdLojistaPessoaPerfil" class="form-control" required><option value=""></option>{foreach from=$itensLojistaPessoaPerfil item=item}<option value="{$item.id_lojista_pessoa_perfil}">{$item.titulo}</option>{/foreach}</select>
			</div>
		</div>
		<div class="col-sm-5">
			<div class="form-group">
				<label for="FrmNome">Nome completo: *</label>
				<input type="text" name="FrmNome" id="FrmNome" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label for="FrmEmail">E-mail: *</label>
				<input type="email" name="FrmEmail" id="FrmEmail" class="form-control email" maxlength="255" value="" required>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<label for="FrmEmail2" class="nobr">E-mail alternativo: </label>
				<input type="email" name="FrmEmail2" id="FrmEmail2" class="form-control email" maxlength="255" value="" >
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<label for="FrmTelefone">Telefone: *</label>
				<input type="text" name="FrmTelefone" id="FrmTelefone" class="form-control telefone" maxlength="20" value="" required>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<label for="FrmTelefone2" class="nobr">Telefone alternativo: </label>
				<input type="text" name="FrmTelefone2" id="FrmTelefone2" class="form-control telefone" maxlength="20" value="" >
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmEndereco" class="nobr">Endereço: </label>
				<input type="text" name="FrmEndereco" id="FrmEndereco" class="form-control" maxlength="255" value="" >
			</div>
		</div>
		<div class="col-sm-3">
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
		<div class="col-sm-3">
			<div class="form-group">
				<label for="FrmCep" class="nobr">CEP: </label>
				<input type="text" name="FrmCep" id="FrmCep" class="form-control cep" maxlength="20" value="" >
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-8">
			<div class="form-group">
				<label for="FrmObservacoes" class="nobr">Observações: </label>
				<textarea name="FrmObservacoes" id="FrmObservacoes" class="form-control" rows="3" ></textarea>
			</div>
		</div>
		<div class="col-sm-4">
			<label class="nobr">Receber notificações por E-mail: </label>
			<div class="form-group">
				<label class="radio-inline"><input type="radio" name="FrmReceberEmail" class="excluded" value="1" checked="checked"> Sim</label>
				<label class="radio-inline"><input type="radio" name="FrmReceberEmail" class="excluded" value="2"> Não</label>
			</div>
		</div>
	</div>
	
	<div class="row" style="margin-top:20px; display: none;">
		<div class="col-md-12">
			<h4 class="heading">Autenticação no site</h4>
		</div>
		<div class="col-sm-2">
			<label class="nobr">Liberar acesso ao site? </label>
			<div class="form-group">
				<label class="radio-inline"><input type="radio" name="FrmUsuario" class="excluded" value="1"> Sim</label>
				<label class="radio-inline"><input type="radio" name="FrmUsuario" class="excluded" value="2" checked="checked"> Não</label>
			</div>
		</div>
		<div class="col-sm-5" id="divFrmLogin" style="visibility:hidden">
			<div class="form-group">
				<label for="FrmLogin">Login: *</label>
				<input type="senha" name="FrmLogin" id="FrmLogin" class="form-control" maxlength="255" value="">
			</div>
		</div>
		<div class="col-sm-5" id="divFrmSenha" style="visibility:hidden">
			<div class="form-group">
				<label for="FrmSenha">Senha: *</label>
				<input type="password" name="FrmSenha" id="FrmSenha" class="form-control" maxlength="255" value="">
			</div>
		</div>
	</div>
	
	<div class="row" style="margin-top:20px">
		<div class="col-sm-4">
			<div class="form-group">
			  <button id="btSubmit" name="btSubmit" type="submit" class="btn btn-primary">SALVAR</button>
			  <button class="btn btn-default" type="button" onclick="javascript:history.go(-1);">cancelar</button>
			</div>
		</div>
		<!-- /.col -->
		
	</div>
	<!-- /.row --> 
	
</div>
<!-- /.portlet-content --> 
</form>