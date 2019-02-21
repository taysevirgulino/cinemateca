{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	{if $error != null || $success != null}
	<script type="application/javascript">
		$(function(){
			$("#a-alerts-tab").trigger("click");
		});
	</script>
	{/if}
{/block}

{block name=body_interna}

<div class="row">
	<div class="col-md-3 col-sm-4">
		<ul id="myTab" class="nav nav-pills nav-stacked">
			<li class="active"> <a href="#profile-tab" data-toggle="tab"> <i class="fa fa-user"></i> &nbsp;&nbsp;Editar cadastro </a> </li>
			<li> <a href="#password-tab" data-toggle="tab"> <i class="fa fa-lock"></i> &nbsp;&nbsp;Alterar senha </a> </li>
			<li style="display:none"> <a id="a-alerts-tab" href="#alerts-tab" data-toggle="tab"> <i class="fa fa-lock"></i></a> </li>
		</ul>
		<br>
	</div>
	<!-- /.col -->
	
	<div class="col-md-9 col-sm-8">
		<div class="tab-content stacked-content">
			<div class="tab-pane fade in" id="alerts-tab">
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
			<div class="tab-pane fade in active" id="profile-tab">
				<h3 class="">Atualizar cadastro</h3>
				<p>Preencha o formulário abaixo caso queira atualizar o seu cadastro.</p>
				<hr />
				<br />
				<form action="{$Url.Usuario_Editar}?cadastro" class="form-horizontal parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate>
					<div class="form-group">
						<label class="col-md-3">Imagem</label>
						<div class="col-md-7">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 180px; height: 180px;"><img src="{$URL_PATH}images/usuario/A{if $objUsuario->getImagem() != ""}{$objUsuario->getImagem()}{else}null.jpg{/if}" alt="Sua foto" /></div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
								<div> <span class="btn btn-default btn-file"><span class="fileupload-new">Selecionar imagem</span><span class="fileupload-exists">Alterar</span>
									<input id="FrmImagemFile" name="FrmImagemFile" type="file" />
									</span> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a> </div>
							</div>
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
					<div class="form-group">
						<label class="col-md-3">Login</label>
						<div class="col-md-7">
							<input type="text" name="FrmLogin" id="FrmLogin" value="{$objUsuario->getLogin()}" class="form-control" disabled />
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
					<div class="form-group">
						<label class="col-md-3">Nome completo *</label>
						<div class="col-md-7">
							<input type="text" name="FrmNome" id="FrmNome" value="{$objUsuario->getNome()}" class="form-control" required />
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
					<div class="form-group">
						<label class="col-md-3">E-mail *</label>
						<div class="col-md-7">
							<input type="email" name="FrmEmail" id="FrmEmail" value="{$objUsuario->getEmail()}" class="form-control" required />
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
					<br />
					<div class="form-group">
						<div class="col-md-7 col-md-push-3">
							<button type="submit" class="btn btn-primary">Salvar alterações</button>
							&nbsp;
							<button type="reset" class="btn btn-default">Cancelar</button>
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
				</form>
			</div>
			<!-- /.tab-pane -->
			
			<div class="tab-pane fade" id="password-tab">
				<h3 class="">Alterar senha</h3>
				<p>Preencha o formulário abaixo caso queira atualizar o seu cadastro.</p>
				<br />
				<form action="{$Url.Usuario_Editar}?senha" class="form-horizontal parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate>
					<div class="form-group">
						<label class="col-md-3">Senha atual *</label>
						<div class="col-md-7">
							<input type="password" name="FrmSenhaAtual" id="FrmSenhaAtual" value="" class="form-control" required />
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
					<hr />
					<div class="form-group">
						<label class="col-md-3">Nova senha *</label>
						<div class="col-md-7">
							<input type="password" name="FrmSenha" id="FrmSenha" value="" class="form-control" required />
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
					<div class="form-group">
						<label class="col-md-3">Confirmar senha *</label>
						<div class="col-md-7">
							<input type="password" name="FrmSenhaConfirmacao" id="FrmSenhaConfirmacao" value="" class="form-control" required data-parsley-equalto="#FrmSenha" />
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group --> 
					
					<br />
					<div class="form-group">
						<div class="col-md-7 col-md-push-3">
							<button type="submit" class="btn btn-primary">Salvar alterações</button>
							&nbsp;
							<button type="reset" class="btn btn-default">Cancelar</button>
						</div>
						<!-- /.col --> 
						
					</div>
					<!-- /.form-group -->
					
				</form>
			</div>
			<!-- /.tab-pane -->
		</div>
		<!-- /.tab-content --> 
		
	</div>
	<!-- /.col --> 
	
</div>
<!-- /.row --> 

{/block}