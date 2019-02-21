<?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 17:09:30
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/associar_senha.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:200126747754738f29550e09-26720649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc26d85232b3fac27579b132da124b1e4a0bb22a' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/associar_senha.tpl.php',
      1 => 1416859490,
      2 => 'file',
    ),
    '05b5adeabea6ac45c03f5f05c5a04833004946d9' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout_interna.tpl.php',
      1 => 1415739214,
      2 => 'file',
    ),
    '43d7ab2016cd56c8b0b62222d6d691103a9b2870' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout.tpl.php',
      1 => 1416436032,
      2 => 'file',
    ),
    '3e458b01b936f5c8b0dfab2cf77923728c85eeea' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/associar_passos.tpl.php',
      1 => 1416577510,
      2 => 'file',
    ),
    '16f0b85b82e97060c2faf591499f29881d34ac7c' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php',
      1 => 1391518138,
      2 => 'file',
    ),
    '3e86e1db14743d0258471d2e63bfcc9b8ac2666f' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php',
      1 => 1355570956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200126747754738f29550e09-26720649',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_54738f29e07088_05093607',
  'variables' => 
  array (
    'CONFIG' => 0,
    'TITLE' => 0,
    'OG' => 0,
    'SRC_IMAGE' => 0,
    'SITE' => 0,
    'Url' => 0,
    'URL_HOST' => 0,
    'SRC_CSS' => 0,
    'SRC_SCRIPT' => 0,
    'SRC_SCRIPT_TEMPLATE' => 0,
    'Menu' => 0,
    'ItemMenu' => 0,
    'Banner' => 0,
    'URL_PATH' => 0,
    'Conteudo1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54738f29e07088_05093607')) {function content_54738f29e07088_05093607($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_textbyhtml')) include '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.textbyhtml.php';
?><!DOCTYPE html>
    <!--[if lt IE 7 ]><html class="ie ie6" lang="pt-br"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="pt-br"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="pt-br"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="pt-br" xmlns:fb="http://ogp.me/ns/fb#"> <!--<![endif]-->
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['nome'];?>
 <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</title>
	<meta http-equiv="X-UA-Compatible" content="IE=5; IE=8; IE=9; IE=10;" >
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['OG']->value['title'];?>
" />
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
favicon.ico" type="image/x-icon"/>
	<link rel="alternate" type="application/rss+xml" title="<?php echo $_smarty_tpl->tpl_vars['SITE']->value->getTitulo();?>
 - Últimas notícias" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['RSS'];?>
" />
	<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['OG']->value['title'];?>
">
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['OG']->value['description'];?>
">
    <meta property="og:type" content="<?php echo $_smarty_tpl->tpl_vars['OG']->value['type'];?>
" />
    <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['OG']->value['title'];?>
" />
    <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['OG']->value['url'];?>
" />
    <meta property="og:image" content="<?php if ($_smarty_tpl->tpl_vars['OG']->value['image']!=''){?><?php echo $_smarty_tpl->tpl_vars['OG']->value['image'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['URL_HOST']->value;?>
<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
facebook.jpg<?php }?>" />
    <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['OG']->value['description'];?>
"/>
    <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['SITE']->value->getTitulo();?>
" />
    <meta name="Robots" content="INDEX,FOLLOW" />
    <meta name="language" content="pt-br" />
    <meta property="fb:app_id" content=""/>
    
    <!-- FONTS -->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
fonts/dax/stylesheet.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
fonts/awesome/css/font-awesome.min.css"/>
	
	<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
base.css?version=20140204"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
skeleton.css?version=20140212E"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
layout.css?version=20140814a"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/jquery-ui/css/redmond/jquery-ui-1.10.4.custom.min.css"/>
	
    <!-- SCRIPT -->
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/jquery-cookie/jquery.cookie.local.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/maskedinput/jquery.maskedinput.min.js"></script>
    
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
modernizr.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
jquery.cycle2.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
jquery.mousewheel.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
jquery.ui.totop.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
script.js?version=20140206"></script>
	<!--[if lt IE 9]>
		 <script src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
html5shiv-printshiv.js"></script>
	<![endif]-->
	
    <!-- BLOCK -->
        
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
interna.css?version=20140924"/>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/scrollTo/jquery.scrollTo-1.4.3.1-min.js"></script>
    
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/jquery-validation/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT_TEMPLATE']->value;?>
associar.js?version=20140728"></script>


</head>
<body>

<header class="full-width header">
	<div class="container">
		<section class="sixteen columns header_logo">
			<a class="logo" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Principal'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['nome'];?>
">
				<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
topo_logo.png" alt="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['nome'];?>
" />
			</a>
		</section>
		<section class="sixteen columns header_logo">
			<ul id="header_menu" class="ul_reset header_menu">
				<?php  $_smarty_tpl->tpl_vars['ItemMenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ItemMenu']->_loop = false;
 $_smarty_tpl->tpl_vars['Key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Menu']->value['Bloco_1391195627']['Itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['ItemMenu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['ItemMenu']->key => $_smarty_tpl->tpl_vars['ItemMenu']->value){
$_smarty_tpl->tpl_vars['ItemMenu']->_loop = true;
 $_smarty_tpl->tpl_vars['Key']->value = $_smarty_tpl->tpl_vars['ItemMenu']->key;
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration++;
 $_smarty_tpl->tpl_vars['ItemMenu']->last = $_smarty_tpl->tpl_vars['ItemMenu']->iteration === $_smarty_tpl->tpl_vars['ItemMenu']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ItemMenu']['last'] = $_smarty_tpl->tpl_vars['ItemMenu']->last;
?>
				<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['ItemMenu']['last']){?>last<?php }?>">
					<a itemprop="url" title="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['url'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['target'];?>
"><?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
</a>
				</li>
				<?php } ?>
			</ul>
			<ul class="ul_reset header_menu_drop">
				<li><i class="fa fa-bars"></i></li>
				<li>
					<select id="menu_dropbox">
						<?php  $_smarty_tpl->tpl_vars['ItemMenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ItemMenu']->_loop = false;
 $_smarty_tpl->tpl_vars['Key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Menu']->value['Bloco_1391195627']['Itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['ItemMenu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['ItemMenu']->key => $_smarty_tpl->tpl_vars['ItemMenu']->value){
$_smarty_tpl->tpl_vars['ItemMenu']->_loop = true;
 $_smarty_tpl->tpl_vars['Key']->value = $_smarty_tpl->tpl_vars['ItemMenu']->key;
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration++;
 $_smarty_tpl->tpl_vars['ItemMenu']->last = $_smarty_tpl->tpl_vars['ItemMenu']->iteration === $_smarty_tpl->tpl_vars['ItemMenu']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ItemMenu']['last'] = $_smarty_tpl->tpl_vars['ItemMenu']->last;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
</option>
						<?php } ?>
					</select>
				</li>
			</ul>
		</section>
		<section class="sixteen columns" style="overflow:visible">
			<div class="fullslyder">
				<div class="fullbn">
					<div class="cycle-slideshow"
						data-cycle-timeout="4000"
						data-cycle-prev="#fullbn_prev"
						data-cycle-next="#fullbn_next"
						data-cycle-slides="> div"
					>
						<?php if ($_smarty_tpl->tpl_vars['Banner']->value['LocalTP01']!=''){?><div class="bnTP"><?php echo $_smarty_tpl->tpl_vars['Banner']->value['LocalTP01'];?>
</div><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['Banner']->value['LocalTP02']!=''){?><div class="bnTP"><?php echo $_smarty_tpl->tpl_vars['Banner']->value['LocalTP02'];?>
</div><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['Banner']->value['LocalTP03']!=''){?><div class="bnTP"><?php echo $_smarty_tpl->tpl_vars['Banner']->value['LocalTP03'];?>
</div><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['Banner']->value['LocalTP04']!=''){?><div class="bnTP"><?php echo $_smarty_tpl->tpl_vars['Banner']->value['LocalTP04'];?>
</div><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['Banner']->value['LocalTP05']!=''){?><div class="bnTP"><?php echo $_smarty_tpl->tpl_vars['Banner']->value['LocalTP05'];?>
</div><?php }?>
					</div>
					<a id="fullbn_prev" class="fullbn_prev" href="#">
						<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
slyder_prev.png" alt="Anterior" />
					</a>
					<a id="fullbn_next" class="fullbn_next" href="#">
						<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
slyder_next.png" alt="Próximo" />
					</a>
				</div>
				<div class="fullbn_info">
					<a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
associe-se" title="Associe-se!">
						Associe-se!
					</a>
					<h2><?php echo smarty_modifier_textbyhtml($_smarty_tpl->tpl_vars['Conteudo1']->value->getLegenda());?>
</h2>
					<h4><?php echo smarty_modifier_textbyhtml($_smarty_tpl->tpl_vars['Conteudo1']->value->getTexto());?>
</h4>
				</div>
			</div>
		</section>
	</div>
</header>



	<section id="body" class="full-width body body_interna" style="min-height:500px;">
		<div class="container">
			<div class="sixteen columns interna_titulo">
				<div class="title">
					<h1><?php echo $_smarty_tpl->tpl_vars['Titulo']->value;?>
</h1>
				</div>
				<div class="nav">
					<?php  $_smarty_tpl->tpl_vars['Link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Link']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Navegacao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Link']->key => $_smarty_tpl->tpl_vars['Link']->value){
$_smarty_tpl->tpl_vars['Link']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['Link']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['Link']->value[1]!=''){?><a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value[1];?>
" title="<?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
</a><?php }else{ ?><span><?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
</span><?php }?>
					<?php } ?>
					<a class="voltar" href="<?php if ($_smarty_tpl->tpl_vars['Voltar']->value==''){?>javascript:history.go(-1);<?php }else{ ?>javascript:window.open('<?php echo $_smarty_tpl->tpl_vars['Voltar']->value;?>
', '_parent');<?php }?>" title="Voltar">&laquo; voltar</a>
				</div>
			</div>
			<div class="sixteen columns interna_conteudo">
				
	
	<?php /*  Call merged included template "associar_passos.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("associar_passos.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('passo'=>1), 0, '200126747754738f29550e09-26720649');
content_5473907aaa0dc3_76560714($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "associar_passos.tpl.php" */?>
	
    <div class="sixteen columns alpha omega">
	
        <div class="sixteen columns alpha omega form">
            <div class="formulario-error mt"<?php if ($_smarty_tpl->tpl_vars['error']->value!=null){?> style="display:block"<?php }?>>
                <span class="t"><?php if ($_smarty_tpl->tpl_vars['error']->value==null){?>Preencha os campos:<?php }else{ ?>Aviso:<?php }?></span>
                <ol>
                    <?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['error']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['Item']->value;?>
</li>
                    <?php } ?>
                </ol>
            </div>
            <div class="formulario-success mt"<?php if ($_smarty_tpl->tpl_vars['success']->value!=null){?> style="display:block"<?php }?>>
                <span class="t">Aviso:</span>
                <ol>
                    <?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['success']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
                    <li><?php echo $_smarty_tpl->tpl_vars['Item']->value;?>
</li>
                    <?php } ?>
                </ol>
            </div>
            <?php if (true){?>
            
            <form name="frm" id="frm" method="post" action="" enctype="multipart/form-data">
                <ul class="formulario">
					<li class="sixteen columns alpha omega sub">
						<h2>Informe seus dados para receber a senha por e-mail:</h2>
					</li>
					
                    <li class="four columns alpha">
                        <label>
                            <span class="obr">CPF: *</span><br />
							<input name="FrmCpf" id="FrmCpf" title="CPF" maxlength="255" type="text" class="frm cpf" required value="<?php echo $_smarty_tpl->tpl_vars['frm_cpf']->value;?>
" />
                        </label>
                    </li>
					
                    <li class="btn three columns omega" style="padding-top:25px;">
                      <input name="btSubmit" type="submit" class="frm-btn" id="btSubmit" value="PRÓXIMO &raquo;" />
                    </li>
                </ul>
            </form>
			
            <script language="javascript">
                $(document).ready(function() {
					var container = $('.formulario-error');
					var validator = $("#frm").validate({
						errorContainer: container,
						errorLabelContainer: $("ol", container),
						wrapper: 'li'
					});
				});    				
            </script>
            
            <?php }?>
        </div>
      
    </div>
    

			</div>
		</div>
	</div>
	
	
	<script type="text/javascript">
	$(function () {
		$.scrollTo( '#<?php if ($_smarty_tpl->tpl_vars['scrollToId']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['scrollToId']->value;?>
<?php }else{ ?>body<?php }?>', 800 );
	});
	</script>
	
	
    


<footer class="full-width footer">
	<div class="container">
		<section class="sixteen columns">
			<div class="sixteen columns alpha omega linha">
				<?php echo smarty_modifier_textbyhtml($_smarty_tpl->tpl_vars['CONFIG']->value['endereco_completo']);?>

			</div>
			<div class="fourteen columns alpha">
				<?php $_template = new Smarty_Internal_Template('eval:'.smarty_modifier_textbyhtml($_smarty_tpl->tpl_vars['CONFIG']->value['rodape']), $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->fetch(); ?>
			</div>
			<div class="two columns omega" style="text-align:center">
				<a href="http://www.artemsite.com.br" title="ArtemSite Agência Digital" target="">
					<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
artemsite.png" alt="ArtemSite Agência Digital" />
				</a>
			</div>
		</section>
	</div>
</footer>

<div id="dialog-message" title=""></div>
<?php /*  Call merged included template "bloco_popup.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("bloco_popup.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '200126747754738f29550e09-26720649');
content_5473907ac56f14_47424595($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "bloco_popup.tpl.php" */?>
<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '200126747754738f29550e09-26720649');
content_5473907acd3fe3_10338502($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 17:09:30
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/associar_passos.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5473907aaa0dc3_76560714')) {function content_5473907aaa0dc3_76560714($_smarty_tpl) {?><div class="sixteen columns alpha omega">
	<ul class="ul_reset ul_status mb">
		<li>
			<div class="five columns alpha half-bottom <?php if ($_smarty_tpl->tpl_vars['passo']->value==1){?>active<?php }?>">
				<h3 class="bloco">1° Passo - Identificação</h3>
			</div>
		</li>
		<li>
			<div class="six columns half-bottom <?php if ($_smarty_tpl->tpl_vars['passo']->value==2){?>active<?php }?>">
				<h3 class="bloco">2° Passo - Cadastro</h3>
			</div>
		</li>
		<li>
			<div class="five columns half-bottom omega <?php if ($_smarty_tpl->tpl_vars['passo']->value==3){?>active<?php }?>">
				<h3 class="bloco">3° Passo - Confirmação</h3>
			</div>
		</li>
	</ul>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 17:09:30
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5473907ac56f14_47424595')) {function content_5473907ac56f14_47424595($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['POPUP']->value!=''){?>
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
	var POPUP_TOP = 250; //CONFIGURAR DISTANCIA DO TOPO
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
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
popup.js"></script>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 17:09:30
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5473907acd3fe3_10338502')) {function content_5473907acd3fe3_10338502($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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