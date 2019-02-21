<?php /* Smarty version Smarty-3.1.8, created on 2018-06-05 20:10:49
         compiled from "C:\www\Cinemateca/template/default/html\entrar_empreendimento.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:267035ab9529aa05a43-95400324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '719b2ac24c5ef64520742fae2f54d7bdce6cb1c9' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\entrar_empreendimento.tpl.php',
      1 => 1525624511,
      2 => 'file',
    ),
    '8f8ff8d9e00093690bcbff154effa6bb986da573' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\layout.tpl.php',
      1 => 1528158084,
      2 => 'file',
    ),
    '6352631e94f64a109c4ad5aa9d4aa845e7978b32' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\analytics.tpl.php',
      1 => 1521576260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267035ab9529aa05a43-95400324',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5ab9529b0219c6_28321844',
  'variables' => 
  array (
    'CONFIG' => 0,
    'TITLE' => 0,
    'SRC_CSS' => 0,
    'SRC_SCRIPT_TEMPLATE' => 0,
    'Url' => 0,
    'SRC_IMAGE' => 0,
    'SITE' => 0,
    'URL_PATH' => 0,
    'objUsuario' => 0,
    'painelMenu' => 0,
    'item' => 0,
    'filho' => 0,
    'SRC_SCRIPT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab9529b0219c6_28321844')) {function content_5ab9529b0219c6_28321844($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\www\\Cinemateca/template/_smarty/libs/plugins\\modifier.date_format.php';
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
	
	
	

	<!-- Plugin CSS -->
  	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/select2/select2.css">


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
		
		<div class="account-body">
			<h3 class="account-body-title">Olá <?php echo $_smarty_tpl->tpl_vars['objUsuario']->value->getNome();?>
</h3>
			<form class="form account-form parsley-form" method="POST" action="">
				<div class="form-group">
					<label for="validateSelect">Selecione o Projeto:</label>
					<select name="FrmIdEmpreendimento" id="FrmIdEmpreendimento" class="form-control select2-input" data-required="true">
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['empreendimentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_empreendimento'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['titulo'];?>
</option>
						<?php } ?>
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

	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/jquery-1.10.1.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/jquery-ui-1.9.2.custom.min.js"></script> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/bootstrap.min.js"></script> 
  	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/parsley/parsley.js"></script>
  	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
plugins/select2/select2.js"></script>
	<!--[if lt IE 9]>
	  <script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
libs/excanvas.compiled.js"></script>
	  <![endif]--> 
	<!-- App JS --> 
	<script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
target-admin.js"></script>
  
	<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '267035ab9529aa05a43-95400324');
content_5b1718798f9034_65888043($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>


</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2018-06-05 20:10:49
         compiled from "C:\www\Cinemateca/template/default/html\analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5b1718798f9034_65888043')) {function content_5b1718798f9034_65888043($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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