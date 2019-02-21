{extends file="layout.tpl.php"}
{block name=head}

	<!-- Plugin CSS -->
  	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/select2/select2.css">

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
					<li> <a href="javascript:history.go(-1)"> <i class="fa fa-angle-double-left"></i> &nbsp;voltar </a> </li>
				</ul>
			</div>
			<!--/.navbar-collapse --> 
			
		</div>
		<!-- /.container --> 
		
	</div>
	<!-- /.navbar -->
	
	<hr class="account-header-divider">
	<div class="account-wrapper">
		
		{if $error != null}
		<div class="alert alert-danger">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			{foreach from=$error item=Item}
				{$Item}<br />
			{/foreach}
		</div>
		{/if}
		
		<div class="account-body">
			<h3 class="account-body-title">Olá {$objUsuario->getNome()}</h3>
			<form class="form account-form parsley-form" method="POST" action="">
				<div class="form-group">
					<label for="validateSelect">Selecione o Projeto:</label>
					<select name="FrmIdEmpreendimento" id="FrmIdEmpreendimento" class="form-control select2-input" data-required="true">
						{foreach from=$empreendimentos item=item}
						<option value="{$item.id_empreendimento}">{$item.titulo}</option>
						{/foreach}
					</select>
				</div>
				<!-- /.form-group -->
								
				<div class="form-group">
					<button id="btSubmit" name="btSubmit" type="submit" class="btn btn-success btn-block btn-lg" tabindex="4"> Escolher &nbsp; <i class="fa fa-check-square-o"></i> </button>
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
  	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/select2/select2.js"></script>
	<!--[if lt IE 9]>
	  <script src="{$SRC_SCRIPT_TEMPLATE}libs/excanvas.compiled.js"></script>
	  <![endif]--> 
	<!-- App JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}target-admin.js"></script>
  
	{include file="analytics.tpl.php"}
</body>

{/block}