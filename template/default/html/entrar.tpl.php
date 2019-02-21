{extends file="layout.tpl.php"}
{block name=head}
{/block}

{block name=bodyfull}
<body class="account-bg">

	<div class="account-wrapper">

		{if $error != null}
		<div class="alert alert-danger">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">X</a>
			{foreach from=$error item=Item}
				{$Item}<br />
			{/foreach}
		</div>
		{/if}
		
		<div class="account-body">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand navbar-brand-image" href="{$Url.Principal}"> <img src="{$SRC_IMAGE}logo.png" alt="{$SITE->getTitulo()}" width="200px" height="auto"> </a> 
				</div>			
			</div>
			<h4 class="account-body-title">Bem-vindo ao Cinemateca</h3>
			<h5 class="account-body-subtitle">Informe seus dados de acesso ao Sistema do Cinemateca</h5>
			<form class="form account-form parsley-form" method="POST" action="">
				<div class="form-group">
					<label for="FrmLogin" class="placeholder-hidden">Usuário</label>
					<input id="FrmLogin" name="FrmLogin" type="text" class="form-control" placeholder="Usuario" tabindex="1" data-required="true">
				</div>
				<!-- /.form-group -->
				
				<div class="form-group">
					<label for="FrmSenha" class="placeholder-hidden">Senha</label>
					<input id="FrmSenha" name="FrmSenha" type="password" class="form-control" placeholder="Senha" tabindex="2" data-required="true">
				</div>
				<!-- /.form-group -->
				
				<div class="form-group">
					<button id="btSubmit" name="btSubmit" type="submit" class="btn btn-primary btn-block btn-lg" tabindex="4"> Entrar &nbsp; <i class="fa fa-play-circle"></i> </button>
				</div>
				<!-- /.form-group -->
				
			</form>
		</div>
		<!-- /.account-body -->
		
	</div>
	<!-- /.account-wrapper --> 

	<script src="{$SRC_SCRIPT_TEMPLATE}libs/jquery-1.10.1.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}libs/jquery-ui-1.9.2.custom.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}libs/bootstrap.min.js"></script> 
  	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/parsley/parsley.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}target-admin.js"></script>
  
	{include file="analytics.tpl.php"}
</body>

{/block}