<?php /* Smarty version Smarty-3.1.8, created on 2015-04-23 07:44:08
         compiled from "/home/brmalls/public_html/sal/template/default/html/senha.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:469130095538ccf867bcf8-78287019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '346bb48fdf742c14040902938e1f59e5ec512294' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/senha.tpl.php',
      1 => 1429714438,
      2 => 'file',
    ),
    '449c15d06838a6ee46fde8a11b91888adac81a3f' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/layout.tpl.php',
      1 => 1429714435,
      2 => 'file',
    ),
    '9b15f037a15919d2a2402a136431ccc0c345e980' => 
    array (
      0 => '/home/brmalls/public_html/sal/template/default/html/analytics.tpl.php',
      1 => 1429714431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '469130095538ccf867bcf8-78287019',
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
  'unifunc' => 'content_5538ccf8800310_01808579',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5538ccf8800310_01808579')) {function content_5538ccf8800310_01808579($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/brmalls/public_html/sal/template/_smarty/libs/plugins/modifier.truncate.php';
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


</head>


<body class="account-bg">

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
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
entrar"> <i class="fa fa-angle-double-left"></i> &nbsp;voltar </a> </li>
				</ul>
			</div>
			<!--/.navbar-collapse --> 
			
		</div>
		<!-- /.container --> 
		
	</div>
	<!-- /.navbar -->
	
	<hr class="account-header-divider">
	<div class="account-wrapper">
		<div class="account-logo"> <img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
logo-login.png" alt="<?php echo $_smarty_tpl->tpl_vars['SITE']->value->getTitulo();?>
"> </div>
		
		<?php if ($_smarty_tpl->tpl_vars['error']->value!=null){?>
		<div class="alert alert-danger">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['error']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['Item']->value;?>
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
		
		<?php if ($_smarty_tpl->tpl_vars['success']->value==null){?>
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
					<a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
entrar"><i class="fa fa-angle-double-left"></i> &nbsp;Voltar para login</a>
				</div> <!-- /.form-group -->
				
			</form>
		</div>
		<!-- /.account-body -->
		<?php }?>
		
	</div>
	<!-- /.account-wrapper --> 

	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/jquery-1.10.1.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/jquery-ui-1.9.2.custom.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/bootstrap.min.js"></script> 
  	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/parsley/parsley.js"></script>
	<!--[if lt IE 9]>
	  <script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/excanvas.compiled.js"></script>
	  <![endif]--> 
	<!-- App JS --> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
target-admin.js"></script>
  
	<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '469130095538ccf867bcf8-78287019');
content_5538ccf87bb811_83524537($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>


</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2015-04-23 07:44:08
         compiled from "/home/brmalls/public_html/sal/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5538ccf87bb811_83524537')) {function content_5538ccf87bb811_83524537($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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