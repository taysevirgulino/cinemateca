<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]--><head>
	<title>{$CONFIG.nome} {$TITLE}</title>
	<meta charset="ISO-8859-1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
	<link rel="stylesheet" href="{$SRC_CSS}font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
	<link rel="stylesheet" href="{$SRC_CSS}bootstrap.min.css">

	<!-- App CSS -->
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/select2/select2.css">
	<link rel="stylesheet" href="{$SRC_CSS}style.css">
	<link rel="stylesheet" href="{$SRC_CSS}custom.css">
	
	
	{block name=head}{/block}
</head>

{block name=bodyfull}
<body>

<div class="navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-cogs"></i> </button>
			<a class="navbar-brand navbar-brand-image" href="{$Url.Principal}"> <img src="{$SRC_IMAGE}logo.png" alt="{$SITE->getTitulo()}"> </a> </div>
		<!-- /.navbar-header -->
		
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown navbar-profile"> <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;"> <img src="{$URL_PATH}images/usuario/A{if $objUsuario->getImagem() != ""}{$objUsuario->getImagem()}{else}null.jpg{/if}" class="navbar-profile-avatar" alt=""> <span class="navbar-profile-label">{$objUsuario->getEmail()} &nbsp;</span> <i class="fa fa-caret-down"></i> </a>
					<ul class="dropdown-menu" role="menu">
						<li> <a href="{$Url.Usuario_Editar}"> <i class="fa fa-user"></i> &nbsp;&nbsp;Meu cadastro </a> </li>
						<li class="divider"></li>
						<li> <a href="{$URL_PATH}sair"> <i class="fa fa-sign-out"></i> &nbsp;&nbsp;Sair </a> </li>
					</ul>
				</li>
			</ul>
		</div>
		<!--/.navbar-collapse --> 
		
	</div>
	<!-- /.container --> 
	
</div>
<!-- /.navbar -->

<div class="mainbar">
	<div class="container">
		<button type="button" class="btn mainbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse"> <i class="fa fa-bars"></i> </button>
		<div class="mainbar-collapse collapse">
			<ul class="nav navbar-nav mainbar-nav">
				
				{foreach from=$painelMenu item=item}
					{if $item.itens|@count > 0}
						<li class="dropdown "> 
							<a href="{$item.url}" title="{$item.nome}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="{$item.style}"></i> {$item.nome} <span class="caret"></span> </a>
							<ul class="dropdown-menu">
								{foreach from=$item.itens item=filho}
								<li><a href="{$filho.url}" target="{$filho.target}" title="{$filho.nome}"><i class="{$filho.style} nav-icon"></i> {$filho.nome}</a></li>
								{/foreach}
							</ul>
						</li>
					{else}
						<li class=""><a href="{$item.url}" target="{$item.target}" title="{$item.nome}"> <i class="{$item.style}"></i> {$item.nome} </a> </li>
					{/if}
				{/foreach}
				
				
			</ul>
		</div>
		<!-- /.navbar-collapse --> 
		
	</div>
	<!-- /.container --> 
	
</div>
<!-- /.mainbar -->

{block name=body}{/block}

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h4>CINEMATECA</h4>
				<hr>
				<p>
					&copy; {$smarty.now|date_format:"%Y"} Todos os direitos reservados.
				</p>
			</div>
		</div>
	</div>
</footer>

<script src="{$SRC_SCRIPT_TEMPLATE}libs/jquery-1.10.1.min.js"></script> 
<script src="{$SRC_SCRIPT_TEMPLATE}libs/jquery-ui-1.9.2.custom.min.js"></script> 
<script src="{$SRC_SCRIPT_TEMPLATE}libs/bootstrap.min.js"></script> 
<script src="{$SRC_SCRIPT_TEMPLATE}plugins/purl/purl.js"></script> 
<script src="{$SRC_SCRIPT_TEMPLATE}plugins/magnific/jquery.magnific-popup.min.js"></script>
<script src="{$SRC_SCRIPT_TEMPLATE}plugins/howl/howl.js"></script>
<script src="{$SRC_SCRIPT_TEMPLATE}target-admin.js"></script>
<script src="{$SRC_SCRIPT}jquery/maskedinput/jquery.maskedinput.min.js"></script>
<script src="{$SRC_SCRIPT_TEMPLATE}script.js"></script>
<script src="{$SRC_SCRIPT_TEMPLATE}bootstrap-tagsinput.min.js"></script>


{block name=footer}{/block}


{include file="analytics.tpl.php"}
</body>
{/block}
</html>