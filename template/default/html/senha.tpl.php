{extends file="layout.tpl.php"}
{block name=head}

	<!-- Plugin CSS -->

{/block}

{block name=bodyfull}
<body class="account-bg">

	<div class="navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-cogs"></i> </button>
				<a class="navbar-brand navbar-brand-image" href="{$Url.Principal}"> <img src="{$SRC_IMAGE}logo.png" alt="{$SITE->getTitulo()}"> </a> </div>
			<!-- /.navbar-header -->
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="{$URL_PATH}entrar"> <i class="fa fa-angle-double-left"></i> &nbsp;voltar </a> </li>
				</ul>
			</div>
			<!--/.navbar-collapse --> 
			
		</div>
		<!-- /.container --> 
		
	</div>
	<!-- /.navbar -->
	
	<hr class="account-header-divider">
	<div class="account-wrapper">
		<div class="account-logo"> <img src="{$SRC_IMAGE}logo-login.png" alt="{$SITE->getTitulo()}"> </div>
		
		{if $error != null}
		<div class="alert alert-danger">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			{foreach from=$error item=Item}
				{$Item}<br />
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
		
		{if $success == null}
		<div class="account-body">
			<h3 class="account-body-title">Lembrar senha</h3>
			<h5 class="account-body-subtitle">Informe seus dados de acesso</h5>
			<form class="form account-form parsley-form" method="POST" action="">
			
				<div class="form-group">
					<label for="FrmLogin" class="placeholder-hidden">Usuário</label>
					<input id="FrmLogin" name="FrmLogin" type="text" class="form-control" placeholder="Usuário ou e-mail" tabindex="1" data-required="true">
				</div>
				<!-- /.form-group -->
				
				<div class="form-group">
					<button id="btSubmit" name="btSubmit" type="submit" class="btn btn-secondary btn-block btn-lg" tabindex="2">
						Enviar senha &nbsp; <i class="fa fa-paper-plane"></i>
					</button>
				</div> <!-- /.form-group -->
				
				<div class="form-group">
					<a href="{$URL_PATH}entrar"><i class="fa fa-angle-double-left"></i> &nbsp;Voltar para login</a>
				</div> <!-- /.form-group -->
				
			</form>
		</div>
		<!-- /.account-body -->
		{/if}
		
	</div>
	<!-- /.account-wrapper --> 

	<script src="{$SRC_SCRIPT_TEMPLATE}libs/jquery-1.10.1.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}libs/jquery-ui-1.9.2.custom.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}libs/bootstrap.min.js"></script> 
  	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/parsley/parsley.js"></script>
	<!--[if lt IE 9]>
	  <script src="{$SRC_SCRIPT_TEMPLATE}libs/excanvas.compiled.js"></script>
	  <![endif]--> 
	<!-- App JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}target-admin.js"></script>
  
	{include file="analytics.tpl.php"}
</body>

{/block}