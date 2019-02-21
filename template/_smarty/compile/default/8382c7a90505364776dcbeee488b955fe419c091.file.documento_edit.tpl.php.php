<?php /* Smarty version Smarty-3.1.8, created on 2018-03-26 20:30:33
         compiled from "C:\www\Cinemateca/template/default/html\documento_edit.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:5575ab98299326316-59441679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8382c7a90505364776dcbeee488b955fe419c091' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\documento_edit.tpl.php',
      1 => 1521576260,
      2 => 'file',
    ),
    '2ba5d4a68e0176df2ddca77fb841ada2d65c1e08' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\layout_interna.tpl.php',
      1 => 1521576260,
      2 => 'file',
    ),
    '8f8ff8d9e00093690bcbff154effa6bb986da573' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\layout.tpl.php',
      1 => 1522104290,
      2 => 'file',
    ),
    'b54f8a278b757366cfadf804cb03cf6657196058' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\form_alert.tpl.php',
      1 => 1521576260,
      2 => 'file',
    ),
    'bd81ba579cdc8255523ab15fba2936448bf531f2' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\documento_form.tpl.php',
      1 => 1522106695,
      2 => 'file',
    ),
    '6352631e94f64a109c4ad5aa9d4aa845e7978b32' => 
    array (
      0 => 'C:\\www\\Cinemateca/template/default/html\\analytics.tpl.php',
      1 => 1521576260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5575ab98299326316-59441679',
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
    'URL_PATH' => 0,
    'objUsuario' => 0,
    'painelMenu' => 0,
    'item' => 0,
    'filho' => 0,
    'SRC_SCRIPT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5ab982997d6057_87416061',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab982997d6057_87416061')) {function content_5ab982997d6057_87416061($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\www\\Cinemateca/template/_smarty/libs/plugins\\modifier.date_format.php';
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
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown navbar-profile"> <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;"> <img src="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
images/usuario/A<?php if ($_smarty_tpl->tpl_vars['objUsuario']->value->getImagem()!=''){?><?php echo $_smarty_tpl->tpl_vars['objUsuario']->value->getImagem();?>
<?php }else{ ?>null.jpg<?php }?>" class="navbar-profile-avatar" alt=""> <span class="navbar-profile-label"><?php echo $_smarty_tpl->tpl_vars['objUsuario']->value->getEmail();?>
 &nbsp;</span> <i class="fa fa-caret-down"></i> </a>
					<ul class="dropdown-menu" role="menu">
						<li> <a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Usuario_Editar'];?>
"> <i class="fa fa-user"></i> &nbsp;&nbsp;Meu cadastro </a> </li>
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("form_alert.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '5575ab98299326316-59441679');
content_5ab982996364d1_89606954($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "form_alert.tpl.php" */?>

<div class="portlet">
	<div class="portlet-header">
		<h3> <i class="fa fa-file-text-o"></i> Editar Documento </h3>
	</div>
	<!-- /.portlet-header -->
	
	<?php /*  Call merged included template "documento_form.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("documento_form.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '5575ab98299326316-59441679');
content_5ab98299695947_11564569($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "documento_form.tpl.php" */?>
		
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
				<h4>CINEMATECA</h4>
				<hr>
				<p>
					&copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 Todos os direitos reservados.
					<!-- <a href="" target="_blank" style="position:relative; float:right" title="Tayse Virgulino Ribeiro">
						<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
tayse.png" alt="Tayse Virgulino Ribeiro" />
					</a> -->
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
	<script type="application/javascript">
		$(function(){
			$("#FrmTitulo").val( "<?php echo $_smarty_tpl->tpl_vars['obj']->value->getTitulo();?>
" );
			$("#labelFrmArquivoFile").html("Arquivo:").addClass("nobr");
			$("#frm").submit(function(e) {
				var btn = $(this).find("#btSubmit");
				btn.button('loading');
			});	
		});
	</script>




<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '5575ab98299326316-59441679');
content_5ab982997a7c99_88518033($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>

</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2018-03-26 20:30:33
         compiled from "C:\www\Cinemateca/template/default/html\form_alert.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5ab982996364d1_89606954')) {function content_5ab982996364d1_89606954($_smarty_tpl) {?><div class="row">
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
</div><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2018-03-26 20:30:33
         compiled from "C:\www\Cinemateca/template/default/html\documento_form.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5ab98299695947_11564569')) {function content_5ab98299695947_11564569($_smarty_tpl) {?><form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmTitulo">Título: *</label>
				<input type="text" name="FrmTitulo" id="FrmTitulo" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
	</div>
	
	<div class="row" style="display: none;">
		<div class="col-sm-12">
			<label for="FrmArquivoFile" id="labelFrmArquivoFile">Arquivo: *</label>
			<div class="fileupload fileupload-new" data-provides="fileupload" >
				<div class="input-group">
					<div class="form-control"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
					<div class="input-group-btn"> 
						<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a> 
						<span class="btn btn-default btn-file"> 
							<span class="fileupload-new">Selecionar arquivo</span> 
							<span class="fileupload-exists">Alterar</span>
							<input type="file" name="FrmArquivoFile" id="FrmArquivoFile" class="excluded" value="">
						</span> 
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row" style="margin-top:20px;">
		<div class="col-sm-4">
			<div class="form-group">
			  <button id="btSubmit" name="btSubmit" type="submit" class="btn btn-primary" data-loading-text="CARREGANDO...">SALVAR</button>
			  <button class="btn btn-default" type="button" onclick="javascript:history.go(-1);">cancelar</button>
			</div>
		</div>
		<!-- /.col -->
		
	</div>
	<!-- /.row --> 
	
</div>
<!-- /.portlet-content --> 
</form><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2018-03-26 20:30:33
         compiled from "C:\www\Cinemateca/template/default/html\analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5ab982997a7c99_88518033')) {function content_5ab982997a7c99_88518033($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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