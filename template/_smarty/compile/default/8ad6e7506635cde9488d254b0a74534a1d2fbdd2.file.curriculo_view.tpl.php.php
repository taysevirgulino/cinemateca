<?php /* Smarty version Smarty-3.1.8, created on 2015-04-12 11:00:54
         compiled from "/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/curriculo_view.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:937426059552a7a42cce366-36507766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ad6e7506635cde9488d254b0a74534a1d2fbdd2' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/curriculo_view.tpl.php',
      1 => 1428847252,
      2 => 'file',
    ),
    'd1f4ef0bd7612e4e912f1f6c9141ef4b21095eb9' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout_interna.tpl.php',
      1 => 1428771828,
      2 => 'file',
    ),
    'e853ea05dda4366a981aec2d159d961d835a85aa' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout.tpl.php',
      1 => 1428843276,
      2 => 'file',
    ),
    '0f91e4160111febee7688c5a36e85929c692a9d9' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php',
      1 => 1355570956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '937426059552a7a42cce366-36507766',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_552a7a43812f18_27185416',
  'variables' => 
  array (
    'CONFIG' => 0,
    'TITLE' => 0,
    'SRC_CSS' => 0,
    'SRC_SCRIPT_TEMPLATE' => 0,
    'Url' => 0,
    'SRC_IMAGE' => 0,
    'SITE' => 0,
    'menuNotificacoes' => 0,
    'item' => 0,
    'menuMensagens' => 0,
    'URL_PATH' => 0,
    'objEmpreendimento' => 0,
    'objUsuario' => 0,
    'SRC_SCRIPT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552a7a43812f18_27185416')) {function content_552a7a43812f18_27185416($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]--><head>
	<title><?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['nome'];?>
 <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</title>
	<meta charset="ISO-8859-1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300,700">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/css/ui-lightness/jquery-ui-1.9.2.custom.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
bootstrap.min.css">
	
	<!-- App CSS -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/select2/select2.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
style.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
custom.css">
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	

	<!-- Plugin CSS -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/morris/morris.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/icheck/skins/minimal/green.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/fileupload/bootstrap-fileupload.css">
	
	
	

</head>


<body>

<div class="navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-cogs"></i> </button>
			<a class="navbar-brand navbar-brand-image" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Principal'];?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
logo.png" alt="<?php echo $_smarty_tpl->tpl_vars['SITE']->value->getTitulo();?>
"> </a> </div>
		<!-- /.navbar-header -->
		
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav noticebar navbar-left">
				<li class="dropdown" id="menuNotificacoes"> <a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Notificacoes'];?>
" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell"></i> <span class="navbar-visible-collapsed">&nbsp;Notificações&nbsp;</span> <?php if ($_smarty_tpl->tpl_vars['menuNotificacoes']->value['badge']>0){?><span class="badge"><?php echo $_smarty_tpl->tpl_vars['menuNotificacoes']->value['badge'];?>
</span><?php }?> </a>
					<ul class="dropdown-menu noticebar-menu" role="menu">
						<li class="nav-header">
							<div class="pull-left"> Notificações </div>
							<div class="pull-right"> </div>
						</li>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuNotificacoes']->value['itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
						<li>
							<a href="javascript:;" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_notificacao'];?>
" data-link="<?php if ($_smarty_tpl->tpl_vars['item']->value['link']!=''){?><?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['Url']->value['Notificacoes'];?>
?notificacao=<?php echo $_smarty_tpl->tpl_vars['item']->value['id_notificacao'];?>
<?php }?>" class="noticebar-item notificacao-click"> 
								<span class="noticebar-item-image"> <i class="<?php echo $_smarty_tpl->tpl_vars['item']->value['classIcon'];?>
"></i> </span> 
								<span class="noticebar-item-body"> 
									<strong class="noticebar-item-title"><?php echo $_smarty_tpl->tpl_vars['item']->value['titulo'];?>
</strong> 
									<span class="noticebar-item-text"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['descricao'],"50");?>
</span> 
									<span class="noticebar-item-time"><i class="fa fa-clock-o"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['data_short'];?>
</span> 
								</span> 
							</a> 
						</li>
						<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
						<li class="noticebar-empty">
							<h4 class="noticebar-empty-title">Sem novas notificações</h4>
							<p class="noticebar-empty-text">Verifique as notificações antigas através do link abaixo.</p>
						</li>
						<?php } ?>
						<li class="noticebar-menu-view-all"> <a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Notificacoes'];?>
">Ver todas notificações</a> </li>
					</ul>
				</li>
				<li class="dropdown"> <a href="./page-notifications.html" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope"></i> <span class="navbar-visible-collapsed">&nbsp;Mensagens&nbsp;</span> <?php if ($_smarty_tpl->tpl_vars['menuMensagens']->value['badge']>0){?><span class="badge"><?php echo $_smarty_tpl->tpl_vars['menuMensagens']->value['badge'];?>
</span><?php }?> </a>
					<ul class="dropdown-menu noticebar-menu" role="menu">
						<li class="nav-header">
							<div class="pull-left"> Mensagens </div>
							<div class="pull-right"> <a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
mensagem-add">Nova Mensagem</a> </div>
						</li>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menuMensagens']->value['itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
						<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
mensagem-view-<?php echo $_smarty_tpl->tpl_vars['item']->value['identificador'];?>
" class="noticebar-item"> 
								<span class="noticebar-item-image"> 
									<img src="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
images/usuario/A<?php if ($_smarty_tpl->tpl_vars['item']->value['usuario_imagem']!=''){?><?php echo $_smarty_tpl->tpl_vars['item']->value['usuario_imagem'];?>
<?php }else{ ?>null.jpg<?php }?>" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['usuario_nome'];?>
" style="width: 50px" />
								</span> 
								<span class="noticebar-item-body"> 
									<strong class="noticebar-item-title">Nova Mensagem</strong> 
									<span class="noticebar-item-text"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['item']->value['titulo'],"50");?>
</span> 
									<span class="noticebar-item-time"><i class="fa fa-clock-o"></i> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['datahora'],"%d.%m.%y %Hh%M");?>
</span> 
								</span> 
							</a> 
						</li>
						<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
						<li class="noticebar-empty">
							<h4 class="noticebar-empty-title">Sem novas mensagens</h4>
							<p class="noticebar-empty-text">Verifique as mensagens antigas através do link abaixo.</p>
						</li>
						<?php } ?>
						<li class="noticebar-menu-view-all"> <a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
mensagem-list">Ver todas notificações</a> </li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li> <a href="javascript:;"><?php echo $_smarty_tpl->tpl_vars['objEmpreendimento']->value->getTitulo();?>
 <i class="fa fa-check-square-o"></i></a> </li>
				<li class="dropdown navbar-profile"> <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;"> <img src="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
images/usuario/A<?php if ($_smarty_tpl->tpl_vars['objUsuario']->value->getImagem()!=''){?><?php echo $_smarty_tpl->tpl_vars['objUsuario']->value->getImagem();?>
<?php }else{ ?>null.jpg<?php }?>" class="navbar-profile-avatar" alt=""> <span class="navbar-profile-label"><?php echo $_smarty_tpl->tpl_vars['objUsuario']->value->getEmail();?>
 &nbsp;</span> <i class="fa fa-caret-down"></i> </a>
					<ul class="dropdown-menu" role="menu">
						<li> <a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Usuario_Editar'];?>
"> <i class="fa fa-user"></i> &nbsp;&nbsp;Meu cadastro </a> </li>
						<li> <a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Entrar_Empreendimento'];?>
"> <i class="fa fa-cogs"></i> &nbsp;&nbsp;Escolher empreendimento</a> </li>
						<li class="divider"></li>
						<li> <a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
sair"> <i class="fa fa-sign-out"></i> &nbsp;&nbsp;Sair </a> </li>
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
				<li class=""> <a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Principal'];?>
"> <i class="fa fa-dashboard"></i> Painel </a> </li>
				
				<li class="dropdown "> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-shopping-cart"></i> Lojistas <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
lojista-list"><i class="fa fa-cogs nav-icon"></i> Gerenciar</a></li>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
lojista-pessoa-list"><i class="fa fa-users nav-icon"></i> Contatos</a></li>
					</ul>
				</li>
				
				<li class="dropdown "> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-check-square-o"></i> Fases <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
lojista-selecionar?page=lojista-cronograma"><i class="fa fa-cogs nav-icon"></i> Gerenciar</a></li>
					</ul>
				</li>
				
				<li class="dropdown "> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-file-text"></i> Arquivos <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
lojista-selecionar?page=arquivo-list"><i class="fa fa-cogs nav-icon"></i> Protocolos</a></li>
					</ul>
				</li>
				
				<li class="dropdown "> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-camera-retro"></i> Fotogr&aacute;fico <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
lojista-selecionar?page=foto-list"><i class="fa fa-cogs nav-icon"></i> Fotografias</a></li>
					</ul>
				</li>
				
				<li class="dropdown "> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-download"></i> Documentos <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
documento-list"><i class="fa fa-cogs nav-icon"></i> Gerenciar</a></li>
					</ul>
				</li>
				
				<li class="dropdown "> 
					<a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-comments-o"></i> Mensagens <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
mensagem-list"><i class="fa fa-cogs nav-icon"></i> Mensagens</a></li>
					</ul>
				</li>
				
				<li class="dropdown "> 
					<a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-users"></i> RH <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
curriculo-list"><i class="fa fa-cogs nav-icon"></i> Currículos</a></li>
					</ul>
				</li>
				
				<li class="dropdown "> 
					<a href="#about" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="fa fa-bar-chart"></i> Relat&oacute;rios <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="./ui-buttons.html"><i class="fa fa-user nav-icon"></i> Buttons</a></li>
						<li class="dropdown-submenu"> <a tabindex="-1" href="#"> <i class="fa fa-bar-chart-o"></i> &nbsp;&nbsp;Charts & Graphs </a>
							<ul class="dropdown-menu">
								<li> <a href="./ui-chart-flot.html"> <i class="fa fa-bar-chart-o"></i> &nbsp;&nbsp;jQuery Flot </a> </li>
							</ul>
						</li>
					</ul>
				</li>
				
				
			</ul>
		</div>
		<!-- /.navbar-collapse --> 
		
	</div>
	<!-- /.container --> 
	
</div>
<!-- /.mainbar -->



<div class="container">
	<div class="content">
		<div class="content-container">
			<div class="content-header">
				<h2 class="content-header-title" style="text-transform:uppercase"><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h2>
				<ol class="breadcrumb">
					<?php  $_smarty_tpl->tpl_vars['Link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Link']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Navegacao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Link']->key => $_smarty_tpl->tpl_vars['Link']->value){
$_smarty_tpl->tpl_vars['Link']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['Link']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['Link']->value[1]!=''){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value[1];?>
" title="<?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
</a></li><?php }else{ ?><li class="active"><?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
</li><?php }?>
					<?php } ?>
				</ol>
			</div>
			<!-- /.content-header --> 
			

<div class="row" style="padding-bottom:20px;">
	<div class="col-md-2  col-md-offset-10">
		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
curriculo-list" class="btn btn-sm btn-default btn-block">
			<i class="fa fa-undo"></i> Voltar
		</a>
	</div>
</div>

<div class="row">
	<div class="col-md-9">
		<h3>Informações do Currículo</h3>
		<hr />
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> NOME:</strong> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->getSobrenome();?>
</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> SEXO:</strong> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getSexo();?>
</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> NASCIMENTO:</strong> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->getDataNascimento(),"%d/%m/%Y");?>
</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> CPF:</strong> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getCpf();?>
</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Estado Civil:</strong> <?php echo $_smarty_tpl->tpl_vars['estado_civil']->value;?>
</div>
		</div>		
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Telefone(s):</strong> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getTelefone();?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->getTelefone2();?>
</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> E-mail:</strong> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getEmail();?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->getEmail2();?>
</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Endereço:</strong> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getEndereco();?>
</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Cidade:</strong> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getCidade();?>
/<?php echo $_smarty_tpl->tpl_vars['obj']->value->getEstado();?>
</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-12" style="width:auto"><strong><i class="fa fa-clock-o"></i> Cadastro:</strong> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->getDatahora(),"%d.%m.%y %Hh%M");?>
</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Área:</strong> <?php echo $_smarty_tpl->tpl_vars['objCurriculoArea']->value->getTitulo();?>
</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Segmento:</strong> <?php echo $_smarty_tpl->tpl_vars['objCurriculoSegmento']->value->getTitulo();?>
</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->getArquivo()!=''){?>
			<div class="col-md-12" style="margin-top:15px;">
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
files/curriculo/<?php echo $_smarty_tpl->tpl_vars['obj']->value->getArquivo();?>
" target="_blank" title="Clique para baixar"><i class="icon-li fa fa-download"></i> <?php echo $_smarty_tpl->tpl_vars['obj']->value->getArquivo();?>
</a>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="col-md-3">
		<div class="thumbnail">
			<img alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->getSobrenome();?>
e" src="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
images/curriculo/A<?php if ($_smarty_tpl->tpl_vars['obj']->value->getImagem()!=''){?><?php echo $_smarty_tpl->tpl_vars['obj']->value->getImagem();?>
<?php }else{ ?>null.jpg<?php }?>" />
		</div>
	</div>
</div>

		</div>
		<!-- /.content-container --> 
	</div>
	<!-- /.content --> 
</div>
<!-- /.container -->



<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<h4>About Theme</h4>
				<br>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				<hr>
				<p>&copy; 2014 Jumpstart Themes.</p>
			</div>
			<!-- /.col -->
			
			<div class="col-sm-3">
				<h4>Support</h4>
				<br>
				<ul class="icons-list">
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Frequently Asked Questions</a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Ask a Question</a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Video Tutorial</a>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Feedback</a> </li>
				</ul>
			</div>
			<!-- /.col -->
			
			<div class="col-sm-3">
				<h4>Legal</h4>
				<br>
				<ul class="icons-list">
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">License</a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Terms of Use</a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Privacy Policy</a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Security</a> </li>
				</ul>
			</div>
			<!-- /.col -->
			
			<div class="col-sm-3">
				<h4>Settings</h4>
				<br>
				<ul class="icons-list">
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Consectetur adipisicing</a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Eiusmod tempor </a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Fugiat nulla pariatur</a> </li>
					<li> <i class="fa fa-angle-double-right icon-li"></i> <a href="javascript:;">Officia deserunt</a> </li>
				</ul>
			</div>
			<!-- /.col --> 
			
		</div>
		<!-- /.row --> 
		
	</div>
	<!-- /.container --> 
	
</footer>

<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/jquery-1.10.1.min.js"></script> 
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/jquery-ui-1.9.2.custom.min.js"></script> 
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/bootstrap.min.js"></script> 
<!--[if lt IE 9]>
  <script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/excanvas.compiled.js"></script>
  <![endif]--> 
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/purl/purl.js"></script> 
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/magnific/jquery.magnific-popup.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/howl/howl.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
target-admin.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
script.js"></script>



	<!-- Plugin JS --> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
api.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/icheck/jquery.icheck.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/select2/select2.js"></script>  
  	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/parsley/dist/parsley.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/parsley/src/i18n/pt-br.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/raphael-2.1.2.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/morris/morris.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/sparkline/jquery.sparkline.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/nicescroll/jquery.nicescroll.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/fullcalendar/fullcalendar.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/fileupload/bootstrap-fileupload.js"></script>
	
	
	<!-- Plugin JS --> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/datatables/DT_bootstrap.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
form.js"></script>




<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '937426059552a7a42cce366-36507766');
content_552a7a97071d28_29728867($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>

</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2015-04-12 11:00:55
         compiled from "/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_552a7a97071d28_29728867')) {function content_552a7a97071d28_29728867($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key'];?>
']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<?php }?><?php }} ?>