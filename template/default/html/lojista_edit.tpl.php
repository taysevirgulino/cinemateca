{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}

	<script type="application/javascript">
		$(function(){
			$("#FrmFraquia").val('{$objLojista->getFraquia()}');	
		});
	</script>
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}lojista_pessoa_form.js"></script>
	<script type="application/javascript">
		$(function(){
			$("#frm").submit(function(e) {
				var possuiLogin = parseInt( $("input[name='FrmUsuario']:checked").val() || 2);
				if(possuiLogin == 1){
					var login = $("#FrmLogin").val() || "";
					var senha = $("#FrmSenha").val() || "";
					var msg = "";
					if( login.length <= 0 ){
						msg += "Preencha o Login;\n";
					}
					if( senha.length <= 0 ){
						msg += "Preencha a Senha;\n";
					}
					if( msg.length > 0){
						alert(msg);
						return false;
					}
				}
				
				var btn = $(this).find("#btSubmit");
				btn.button('loading');
			});	
		});
	</script>
{/block}

{block name=body_interna}

<div class="row">
	<div class="col-sm-12">
		{if $error != null}
		<div class="alert alert-danger">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			{foreach from=$error item=Item}
				<i class="fa fa-exclamation-triangle"></i> {$Item}<br />
			{/foreach}
		</div>
		{/if}
		{if $success != null}
		<div class="alert alert-success">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			{foreach from=$success item=Item}
				<i class="fa fa-check"></i> {$Item}<br />
			{/foreach}
		</div>
		{/if}
	</div>
</div>

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-tasks"></i> Editar Lojista </h3>
	</div>
	<!-- /.portlet-header -->
	
	<form action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
	<div class="portlet-content">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="FrmNome">Nome *</label>
					<input type="text" name="FrmNome" id="FrmNome" value="{$objLojista->getNome()}" class="form-control" maxlength="255" required />
				</div>
				<div class="form-group">
					<label for="FrmObservacoes">Observações</label>
					<input type="text" name="FrmObservacoes" id="textarea-input" value="{$objLojista->getObservacoes()}" class="form-control">
				</div>
				<div class="form-group">
					<label for="FrmEmail">Email</label>
					<input type="text" name="FrmEmail" id="textarea-input" value="{$objLojista->getEmail()}" class="form-control">
				</div>
			</div>
			<!-- /.col -->
			
			<div class="col-sm-4">
				<div class="form-group">
					<label for="FrmResponsavel">Responsável </label>
					<input type="text" name="FrmResponsavel" id="FrmResponsavel" value="{$objLojista->getResponsavel()}" class="form-control" maxlength="255" />
				</div>
				<div class="form-group">
					<label for="validateSelect">Franquia *</label>
					<select name="FrmFraquia" id="FrmFraquia" class="form-control select2-input" required>
						<option value=""></option>
						<option value="1">Sim</option>
						<option value="2">Não</option>
					</select>
				</div>
			</div>
			<!-- /.col -->
			
			<div class="col-sm-4 col-md-3 col-md-offset-1">
				<div class="form-group">
					<label class="select-input">Imagem</label>
					<div class="fileupload fileupload-new" data-provides="fileupload">
						<div class="fileupload-new thumbnail" style="width: 180px; height: 180px;"><img src="{$URL_PATH}images/lojista/A{if $objLojista->getImagem() != ""}{$objLojista->getImagem()}{else}null.jpg{/if}" alt="Foto" /></div>
						<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
						<div> <span class="btn btn-default btn-file"><span class="fileupload-new">Selecionar imagem</span><span class="fileupload-exists">Alterar</span>
							<input id="FrmImagemFile" name="FrmImagemFile" type="file" />
							</span> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a> </div>
					</div>
				</div>
				<!-- /.form-group -->
			</div>
			<!-- /.col --> 

			<div class="row" style="margin-top:20px; margin-left: 0%;">
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


		
		
		<div class="row">
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
	
</div>
<!-- /.portlet -->

{/block}