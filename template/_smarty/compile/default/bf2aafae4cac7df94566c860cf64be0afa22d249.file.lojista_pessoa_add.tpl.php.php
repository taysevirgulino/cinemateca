<?php /* Smarty version Smarty-3.1.8, created on 2015-06-01 17:54:05
         compiled from "/home/brmalls/public_html/sal/template/default/html/lojista_pessoa_add.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:1679161346556cc66d08c659-93348209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf2aafae4cac7df94566c860cf64be0afa22d249' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/lojista_pessoa_add.tpl.php',
      1 => 1429714436,
      2 => 'file',
    ),
    '6f314140f72126b2007a02c1d059d91f30e4d872' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/layout_interna.tpl.php',
      1 => 1429714436,
      2 => 'file',
    ),
    '449c15d06838a6ee46fde8a11b91888adac81a3f' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/layout.tpl.php',
      1 => 1429714435,
      2 => 'file',
    ),
    '1f6f0b8728f71cd23cebf68d22062bebd562e26f' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/form_alert.tpl.php',
      1 => 1429714433,
      2 => 'file',
    ),
    'ead08707c70429d23f33ef3db7cda7945e7b417a' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/lojista_pessoa_form.tpl.php',
      1 => 1429714437,
      2 => 'file',
    ),
    '9b15f037a15919d2a2402a136431ccc0c345e980' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/analytics.tpl.php',
      1 => 1429714431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1679161346556cc66d08c659-93348209',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_556cc66d36d6f2_03522274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556cc66d36d6f2_03522274')) {function content_556cc66d36d6f2_03522274($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/brmalls/public_html/sal/template/_smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/brmalls/public_html/sal/template/_smarty/libs/plugins/modifier.date_format.php';
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
			

<?php /*  Call merged included template "form_alert.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("form_alert.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1679161346556cc66d08c659-93348209');
content_556cc66d282099_70120992($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "form_alert.tpl.php" */?>

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Novo Contato </h3>
	</div>
	<!-- /.portlet-header -->
	
	<?php /*  Call merged included template "lojista_pessoa_form.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("lojista_pessoa_form.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1679161346556cc66d08c659-93348209');
content_556cc66d2b0173_76840963($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "lojista_pessoa_form.tpl.php" */?>
		
</div>
<!-- /.portlet -->


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
	
	
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
form.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
lojista_pessoa_form.js"></script>
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




<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1679161346556cc66d08c659-93348209');
content_556cc66d356aa8_56381499($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>

</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2015-06-01 17:54:05
         compiled from "/home/brmalls/public_html/sal/template/default/html/form_alert.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_556cc66d282099_70120992')) {function content_556cc66d282099_70120992($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<?php if ($_smarty_tpl->tpl_vars['error']->value!=null){?>
		<div class="alert alert-danger">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['error']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
				<i class="fa fa-exclamation-triangle"></i> <?php echo $_smarty_tpl->tpl_vars['Item']->value;?>
<br />
			<?php } ?>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['success']->value!=null){?>
		<div class="alert alert-success">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['success']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
				<i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['Item']->value;?>
<br />
			<?php } ?>
		</div>
		<?php }?>
	</div>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2015-06-01 17:54:05
         compiled from "/home/brmalls/public_html/sal/template/default/html/lojista_pessoa_form.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_556cc66d2b0173_76840963')) {function content_556cc66d2b0173_76840963($_smarty_tpl) {?><form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<label for="FrmIdLojista">Lojista: *</label>
				<select id="FrmIdLojista" name="FrmIdLojista" class="form-control" required><option value=""></option><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itensLojista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_lojista'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nome'];?>
</option><?php } ?></select>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<label for="FrmIdLojistaPessoaPerfil">Perfil: *</label>
				<select id="FrmIdLojistaPessoaPerfil" name="FrmIdLojistaPessoaPerfil" class="form-control" required><option value=""></option><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['itensLojistaPessoaPerfil']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_lojista_pessoa_perfil'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['titulo'];?>
</option><?php } ?></select>
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
	
	<div class="row" style="margin-top:20px">
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
</form><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2015-06-01 17:54:05
         compiled from "/home/brmalls/public_html/sal/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_556cc66d356aa8_56381499')) {function content_556cc66d356aa8_56381499($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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