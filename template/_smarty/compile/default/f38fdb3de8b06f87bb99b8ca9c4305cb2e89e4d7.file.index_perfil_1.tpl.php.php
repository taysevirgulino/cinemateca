<?php /* Smarty version Smarty-3.1.8, created on 2015-04-14 11:36:50
         compiled from "/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/index_perfil_1.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:340718295552acc9075bb99-92798467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f38fdb3de8b06f87bb99b8ca9c4305cb2e89e4d7' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/index_perfil_1.tpl.php',
      1 => 1428927111,
      2 => 'file',
    ),
    'd1f4ef0bd7612e4e912f1f6c9141ef4b21095eb9' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout_interna.tpl.php',
      1 => 1428874821,
      2 => 'file',
    ),
    'e853ea05dda4366a981aec2d159d961d835a85aa' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout.tpl.php',
      1 => 1428965257,
      2 => 'file',
    ),
    'd603b95a1e38fda527124237229ebc672c7c7cfd' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php',
      1 => 1428926650,
      2 => 'file',
    ),
    '0f91e4160111febee7688c5a36e85929c692a9d9' => 
    array (
      0 => '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php',
      1 => 1355570956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '340718295552acc9075bb99-92798467',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_552acc914846e9_32392327',
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
<?php if ($_valid && !is_callable('content_552acc914846e9_32392327')) {function content_552acc914846e9_32392327($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_textbyhtml')) include '/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.textbyhtml.php';
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
		.columns1 { width:60% !important; }
		.columns2 { width:20% !important; }
		.columns3 { width:20% !important; }
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
			

<?php if ($_smarty_tpl->tpl_vars['objConteudo1']->value->getLegenda()!=''){?>
<div class="row">
	<div class="col-md-12">
		<div class="well">
			<h4><?php echo $_smarty_tpl->tpl_vars['objConteudo1']->value->getLegenda();?>
</h4>
			<?php echo smarty_modifier_textbyhtml($_smarty_tpl->tpl_vars['objConteudo1']->value->getTexto());?>

		</div>
	</div>
</div>
<?php }?>

<div class="row">
	<div class="col-md-12">
		<h4 class="heading"><?php echo $_smarty_tpl->tpl_vars['objLojista']->value->getNome();?>
</h4>
	</div>
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
	<div class="col-md-4">
		<div class="portlet">
			<div class="portlet-header">
				<h3> <i class="fa fa-refresh"></i> Previsão de Conclusão </h3>
			</div>
			<!-- /.portlet-header -->	
			<form id="formPrevisao" name="formPrevisao" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
			<input type="hidden" name="FrmCronogramaIde" id="FrmCronogramaIde" value="<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getIdentificador();?>
" />
			<div class="portlet-content" style="height:152px">
			
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="FrmPrevisaoInicio">Início: </label>
							<input type="text" name="FrmPrevisaoInicio" id="FrmPrevisaoInicio" class="form-control date" maxlength="10" value="" required="required" disabled >
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="FrmPrevisaoFim">Fim: </label>
							<input type="text" name="FrmPrevisaoFim" id="FrmPrevisaoFim" class="form-control date" maxlength="10" value="" required="required" disabled >
						</div>
					</div>
				</div>
				
			</div>
			<!-- /.portlet-content --> 
			</form>
		</div>
		<!-- /.portlet -->
	</div>
</div>

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
											<th class="columns1" data-filterable="false" data-sortable="false">Etapa</th>
											<th class="columns2" style="text-align:center" data-filterable="false" data-sortable="false">Situação</th>
											<th class="columns3" style="text-align:center" data-filterable="false" data-sortable="false">Conclusão</th>
										</tr>
									</thead>
									<tbody>
										<?php  $_smarty_tpl->tpl_vars['etapa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['etapa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tipo']->value['etapas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['etapa']->key => $_smarty_tpl->tpl_vars['etapa']->value){
$_smarty_tpl->tpl_vars['etapa']->_loop = true;
?>
										<tr>
											<td><?php echo $_smarty_tpl->tpl_vars['etapa']->value['titulo'];?>
</td>
											<td style="text-align:center" id="status<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
"><span class="btn btn-xs btn-tertiary"><i class="fa fa-times"></i> Indefinido</span></td>
											<td style="text-align:center" id="data<?php echo $_smarty_tpl->tpl_vars['etapa']->value['identificador'];?>
">----</td>
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
					<a href="http://www.artemsite.com.br" target="_blank" style="position:relative; float:right" title="Desenvolvido por ArtemSite Agência Digital">
						<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
artemsite.png" alt="ArtemSite Agência Digital" />
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
			
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itensLojistaEtapa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			$("#status<?php echo $_smarty_tpl->tpl_vars['item']->value['etapa']['identificador'];?>
").html('<?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
');
			$("#data<?php echo $_smarty_tpl->tpl_vars['item']->value['etapa']['identificador'];?>
").html('<i class="fa fa-calendar"></i> <?php echo $_smarty_tpl->tpl_vars['item']->value['data'];?>
');
			<?php } ?>
			$("#FrmPrevisaoInicio").val("<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPrevisaoInicio();?>
");
			$("#FrmPrevisaoFim").val("<?php echo $_smarty_tpl->tpl_vars['objCronograma']->value->getPrevisaoFim();?>
");
			
		});
	</script>
	
	<?php /*  Call merged included template "bloco_popup.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("bloco_popup.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '340718295552acc9075bb99-92798467');
content_552d260300c894_68126503($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "bloco_popup.tpl.php" */?>




<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '340718295552acc9075bb99-92798467');
content_552d2603095952_09289878($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>

</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2015-04-14 11:36:51
         compiled from "/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_552d260300c894_68126503')) {function content_552d260300c894_68126503($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['POPUP']->value!=''){?>
<div style="position: absolute; width: 0; height: 0; z-index: 999999; left: 0; top: 0; visibility: visible; display:none;" id="MAX_POPUP">
  <table cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td align="right" style="padding: 2px"><a style="color:#0000ff" onclick="MAX_simplepop_POPUP('close'); return false;" href="javascript:;"><img width="65" height="12" border="0" alt="Fechar" src="http://click.idivulgue.com.br/www/images/layerstyles/simple/close1.gif"></a></td>
      </tr>
      <tr>
        <td align="center"><table border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td id="MAX_POPUP_TD" width="0" valign="middle" height="0" align="center" style="padding: 0px">
                	<?php echo $_smarty_tpl->tpl_vars['POPUP']->value['src'];?>

                </td>
              </tr>
            </tbody>
          </table></td>
      </tr>
    </tbody>
  </table>
</div>
<script type="application/javascript">
	var POPUP_TOP = 150; //CONFIGURAR DISTANCIA DO TOPO
	var POPUP_TIME = <?php echo $_smarty_tpl->tpl_vars['POPUP']->value['tempo'];?>
*1000;
	var POPUP_WIDTH = <?php echo $_smarty_tpl->tpl_vars['POPUP']->value['width'];?>
;
	var POPUP_HEIGHT = <?php echo $_smarty_tpl->tpl_vars['POPUP']->value['height'];?>
;
	var POPUP_WIDTH_DIV = POPUP_WIDTH + 2;
	var POPUP_HEIGHT_DIV = POPUP_HEIGHT + 13;
	var POPUP_LEFT = parseInt((screen.width - POPUP_WIDTH_DIV) / 2);
	var POPUP_TOP_DIV = POPUP_TOP + 228;
	$("#MAX_POPUP").css("width", POPUP_WIDTH_DIV).css("height", POPUP_HEIGHT_DIV).css("top", POPUP_TOP).css("left", POPUP_LEFT).css("display", "block");
	$("#MAX_POPUP_TD").attr("width", POPUP_WIDTH).attr("height", POPUP_HEIGHT);
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
popup.js"></script>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2015-04-14 11:36:51
         compiled from "/Cloud/Sites/brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_552d2603095952_09289878')) {function content_552d2603095952_09289878($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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