<?php /* Smarty version Smarty-3.1.8, created on 2018-03-19 12:36:23
         compiled from "C:\www\brmalls\www\sal/template/default/html\lojista_cronograma.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:15275a85d1aa99bc20-24133687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0beff92cc2297773cf6a745d3e9c24fc992488a' => 
    array (
      0 => 'C:\\www\\brmalls\\www\\sal/template/default/html\\lojista_cronograma.tpl.php',
      1 => 1521473779,
      2 => 'file',
    ),
    'f78f22b0948c3a23986cc5de7db4dec252dcf9ab' => 
    array (
      0 => 'C:\\www\\brmalls\\www\\sal/template/default/html\\layout_interna.tpl.php',
      1 => 1519918041,
      2 => 'file',
    ),
    '0deec1fda066c4975aa7756d1c0bdb2c0e5972a3' => 
    array (
      0 => 'C:\\www\\brmalls\\www\\sal/template/default/html\\layout.tpl.php',
      1 => 1521062415,
      2 => 'file',
    ),
    'd107326079b8b9848ba89478db745f6ac39d6e44' => 
    array (
      0 => 'C:\\www\\brmalls\\www\\sal/template/default/html\\analytics.tpl.php',
      1 => 1519918045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15275a85d1aa99bc20-24133687',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5a85d1ab11ef04_02484835',
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
    'painelMenu' => 0,
    'filho' => 0,
    'SRC_SCRIPT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a85d1ab11ef04_02484835')) {function content_5a85d1ab11ef04_02484835($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\www\\brmalls\\www\\sal/template/_smarty/libs/plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\\www\\brmalls\\www\\sal/template/_smarty/libs/plugins\\modifier.date_format.php';
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
	
	
	<style type="text/css">
		.columns1 { width:3%; }
		.columns2 { width:57%; }
		.columns3 { width:1%; }
		.columns4 { width:10%; }
		.columns5 { width:20%; }
	</style>

	

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
						<li style="display: none;"> <a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Entrar_Empreendimento'];?>
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
				
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['painelMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<?php if (count($_smarty_tpl->tpl_vars['item']->value['itens'])>0){?>
						<li class="dropdown "> 
							<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['nome'];?>
" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class="<?php echo $_smarty_tpl->tpl_vars['item']->value['style'];?>
"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['nome'];?>
 <span class="caret"></span> </a>
							<ul class="dropdown-menu">
								<?php  $_smarty_tpl->tpl_vars['filho'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filho']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filho']->key => $_smarty_tpl->tpl_vars['filho']->value){
$_smarty_tpl->tpl_vars['filho']->_loop = true;
?>
								<li><a href="<?php echo $_smarty_tpl->tpl_vars['filho']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['filho']->value['target'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['filho']->value['nome'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['filho']->value['style'];?>
 nav-icon"></i> <?php echo $_smarty_tpl->tpl_vars['filho']->value['nome'];?>
</a></li>
								<?php } ?>
							</ul>
						</li>
					<?php }else{ ?>
						<li class=""><a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['item']->value['target'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['nome'];?>
"> <i class="<?php echo $_smarty_tpl->tpl_vars['item']->value['style'];?>
"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['nome'];?>
 </a> </li>
					<?php }?>
				<?php } ?>
				
				
				
				
				
				
				
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
			


<div class="row">
	<div class="col-md-8">
		<div class="portlet">
			<div class="portlet-header">
				<h3> <i class="fa fa-compass"></i> Andamento da Obra</h3>
			</div>
			<!-- /.portlet-header -->
			
			<div class="portlet-content">
				<div class="row">
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-primary">Vencido</span></div>
							<div class="progress-stat-value"><span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemVencido();?>
%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemVencido();?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemVencido();?>
%"> <span class="sr-only"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemVencido();?>
%</span> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-warning">Aberto</span></div>
							<div class="progress-stat-value"><span class="text-warning"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemAberto();?>
%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemAberto();?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemAberto();?>
%"> <span class="sr-only"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemAberto();?>
%</span> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-success">Concluído</span></div>
							<div class="progress-stat-value"><span class="text-success"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemConcluido();?>
%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemConcluido();?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemConcluido();?>
%"> <span class="sr-only"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemConcluido();?>
%</span> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="progress-stat">
							<div class="progress-stat-label"><span class="text-tertiary">Indefinido</span></div>
							<div class="progress-stat-value"><span class="text-tertiary"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemIndefinido();?>
%</span></div>
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-tertiary" role="progressbar" aria-valuenow="<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemIndefinido();?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemIndefinido();?>
%"> <span class="sr-only"><?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPorcentagemIndefinido();?>
%</span> </div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-<?php echo $_smarty_tpl->tpl_vars['objFarol']->value->getCor();?>
 btn-lg btn-block ui-tooltip" title="Farol está <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['objFarol']->value->getTitulo(), 'UTF-8');?>
" data-toggle="tooltip" data-placement="top"> <i class="fa fa-flag"></i> <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['objFarol']->value->getTitulo(), 'UTF-8');?>
</button>
					</div>
				</div>
			</div>
			<!-- /.portlet-content --> 
			
		</div>
		<!-- /.portlet -->
	</div>
	<?php if ($_smarty_tpl->tpl_vars['Val']->value->getIdUsuarioPerfil()!=1){?>

	<div class="col-md-4">
		<div class="portlet">
			<div class="portlet-header">
				<h3> <i class="fa fa-refresh"></i> Previsão de Conclusão </h3>
			</div>
			<!-- /.portlet-header -->	
			<form id="formPrevisao" name="formPrevisao" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
			<input type="hidden" name="FrmCronogramaIde" id="FrmCronogramaIde" value="<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getIdentificador();?>
" />
			<div class="portlet-content">
			
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="FrmPrevisaoInicio">Início: </label>
							<input type="text" name="FrmPrevisaoInicio" id="FrmPrevisaoInicio" class="form-control date" maxlength="10" value="" required="required" >
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="FrmPrevisaoFim">Fim: </label>
							<input type="text" name="FrmPrevisaoFim" id="FrmPrevisaoFim" class="form-control date" maxlength="10" value="" required="required" >
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group" style="margin-bottom:0px;">
						  <button id="formPrevisaoBtn" name="formPrevisaoBtn" type="submit" class="btn btn-primary">SALVAR</button>
						  <button class="btn btn-default" type="button" onclick="javascript:forms.formPrevisao.reset();">cancelar</button>
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
	</div>
</div>
<?php }?>

<div class="row">
	<div class="col-md-12">
		
		<h4 class="heading">CRONOGRAMA</h4>
		<div class="panel-group accordion" id="accordion">
				
			<?php  $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itensCronogramaTipo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->key => $_smarty_tpl->tpl_vars['tipo']->value){
$_smarty_tpl->tpl_vars['tipo']->_loop = true;
?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent=".accordion" href="#<?php echo $_smarty_tpl->tpl_vars['tipo']->value['identificador'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tipo']->value['titulo'];?>
 </a> </h4>
				</div>
				<div id="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['identificador'];?>
" class="panel-collapse collapse">
					<div class="panel-body">
					
						<div class="portlet-content">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-checkable" data-provide="datatable">
									<thead>
										<tr>
											<th class="columns1" style="text-align:center"><i class="fa fa-check-square-o"></i></th>
											<th class="columns2" data-filterable="true" data-sortable="true">Etapa</th>
											<th class="columns3" style="text-align:center" data-filterable="true" data-sortable="true">Situação</th>
											<th class="columns4" style="text-align:center" data-filterable="false" data-sortable="true">%</th>
											<?php if ($_smarty_tpl->tpl_vars['Val']->value->getIdUsuarioPerfil()!=1){?>

											<th class="columns5" style="text-align:center" data-filterable="false" data-sortable="false">Conclusão</th>
										<?php }?>
										</tr>
									</thead>
									<tbody>
										<?php  $_smarty_tpl->tpl_vars['etapa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['etapa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipo']->value['etapas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['etapa']->key => $_smarty_tpl->tpl_vars['etapa']->value){
$_smarty_tpl->tpl_vars['etapa']->_loop = true;
?>
										<tr>
											<td class="checkbox-column" style="text-align:center"><input id="status<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
" name="status<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
" type="checkbox" class="status" value="<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
" /></td>
											<td><?php echo $_smarty_tpl->tpl_vars['etapa']->value['titulo'];?>
</td>
											<td style="text-align:center" id="status_label<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
"><span class="btn btn-xs btn-tertiary"><i class="fa fa-times"></i> Indefinido</span></td>
											<td style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['etapa']->value['porcentagem'];?>
 %</td>
											<?php if ($_smarty_tpl->tpl_vars['Val']->value->getIdUsuarioPerfil()!=1){?>
											<td style="text-align:center">
												<div class="input-group date">
													<input id="data<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
" name="data<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
" class="form-control datas" type="text" data-id="<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
" value="">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
											</td>
											<?php }?>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive --> 
							
						</div>
						<!-- /.portlet-content --> 
					
					</div>
				</div>
			</div>
			<!-- /.panel-default -->
			<?php } ?>
			
		</div>
		<!-- /.accordion -->
		
	</div>
	<!-- /.col --> 
	
</div>
<!-- /.row -->


		</div>
		<!-- /.content-container --> 
	</div>
	<!-- /.content --> 
</div>
<!-- /.container -->



<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h4>SAL BRMALLS - SERVIÇO DE ATENDIMENTO AO LOJISTA</h4>
				<hr>
				<p>
					&copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 Todos os direitos reservados.
					<a href="https://www.crptecnologia.com.br/" target="_blank" style="position:relative; float:right" title="CRP Tecnologia">
						<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
crp.png" alt="CRP Tecnologia" />
					</a>
				</p>
			</div>
		</div>
	</div>
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
plugins/fullcalendar/lib/moment.min.js"></script>  
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/fullcalendar/fullcalendar.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/fullcalendar/pt-br.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/fileupload/bootstrap-fileupload.js"></script>
	
	
	<!-- Plugin JS --> 
	<script type="application/javascript">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itensLojistaEtapa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		$("#status_label<?php echo $_smarty_tpl->tpl_vars['item']->value['etapa']['identificador'];?>
").html('<?php echo $_smarty_tpl->tpl_vars['item']->value['status_label'];?>
');
		$("#status<?php echo $_smarty_tpl->tpl_vars['item']->value['etapa']['identificador'];?>
")<?php if ($_smarty_tpl->tpl_vars['item']->value['status']==1){?>.attr("checked", "checked")<?php }else{ ?>.removeAttr("checked")<?php }?>;
		$("#data<?php echo $_smarty_tpl->tpl_vars['item']->value['etapa']['identificador'];?>
").val("<?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>
");
		<?php } ?>
		$("#FrmPrevisaoInicio").val("<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPrevisaoInicio();?>
");
		$("#FrmPrevisaoFim").val("<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPrevisaoFim();?>
");
	</script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/datatables/DT_bootstrap.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/datepicker/bootstrap-datepicker.js"></script>
  	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/simplecolorpicker/jquery.simplecolorpicker.js"></script>
	<script type="application/javascript">
		$(function(){
			
			var $update = function($ide, $status, $data){
				API.lojistaEtapaUpdate(
					'<?php echo $_smarty_tpl->tpl_vars['objLojista']->value->getIdentificador();?>
', $ide, $status, $data, 
					function(rs){
						if( rs.sucess ){
							$.howl ({
								type: 'success'
								, title: 'Sucesso'
								, content: rs.msg
								, sticky: false
								, lifetime: 7500
								, iconCls: 'fa fa-check-square-o'
							});
						}else{
							$.howl ({
								type: 'danger'
								, title: 'Erro'
								, content: rs.msg
								, sticky: false
								, lifetime: 7500
								, iconCls: 'fa fa-ban'
							});
						}
					}, 
					function(error){
						$.howl ({
							type: 'danger'
							, title: 'Erro'
							, content: 'Não foi possível salvar, tente novamente'
							, sticky: false
							, lifetime: 7500
							, iconCls: 'fa fa-ban'
						});
					}
				);
			};
			
			$('input:checkbox').iCheck({
				checkboxClass: 'icheckbox_minimal-green',
				radioClass: 'iradio_minimal-green',
				inheritClass: true
			});
			$('input:checkbox').on('ifChecked ifUnchecked', function(event){
				var ide = $(this).val();
				var status = ((event.type == 'ifChecked') ? 1 : 0 );
				var data = $("#data"+ide).val();
				
				$update(ide, status, data);
			});
			$('input.datas').on('change', function(event){
				var ide = $(this).attr("data-id");
				var status = (($("#status"+ide).is(":checked")) ? 1 : 0 );
				var data = $(this).val();
				
				$update(ide, status, data);
			});
			
			$('.date').datepicker({
				format: "dd/mm/yyyy",
            	language: "pt-BR"
			}).on('changeDate', function(e){
				$(this).datepicker('hide');
			});
			
			$("#formPrevisao").submit(function(e) {
				
				var formData = $(this).serialize();
				API.lojistaCronogramaPrevisao(
					formData,
					function(rs){
						if( rs.sucess ){
							$.howl ({
								type: 'success'
								, title: 'Sucesso'
								, content: rs.msg
								, sticky: false
								, lifetime: 7500
								, iconCls: 'fa fa-check-square-o'
							});
						}else{
							$.howl ({
								type: 'danger'
								, title: 'Erro'
								, content: rs.msg
								, sticky: false
								, lifetime: 7500
								, iconCls: 'fa fa-ban'
							});
						}
					}, 
					function(error){
						$.howl ({
							type: 'danger'
							, title: 'Erro'
							, content: 'Não foi possível salvar, tente novamente'
							, sticky: false
							, lifetime: 7500
							, iconCls: 'fa fa-ban'
						});
					}
				);
				
				return false;
			});
		});
	</script>




<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '15275a85d1aa99bc20-24133687');
content_5aafd8f8717937_50516493($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>

</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2018-03-19 12:36:24
         compiled from "C:\www\brmalls\www\sal/template/default/html\analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5aafd8f8717937_50516493')) {function content_5aafd8f8717937_50516493($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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