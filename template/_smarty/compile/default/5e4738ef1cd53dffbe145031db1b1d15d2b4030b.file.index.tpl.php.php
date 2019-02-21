<?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 19:32:11
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/index.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:364815972546c911812e392-68475898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e4738ef1cd53dffbe145031db1b1d15d2b4030b' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/index.tpl.php',
      1 => 1416434607,
      2 => 'file',
    ),
    '43d7ab2016cd56c8b0b62222d6d691103a9b2870' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout.tpl.php',
      1 => 1416868313,
      2 => 'file',
    ),
    '28581b6eb6a6f1d78d9faa95c53bcb283437ca64' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_newsletter.tpl.php',
      1 => 1416430522,
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
  'nocache_hash' => '364815972546c911812e392-68475898',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_546c9118487b81_35805727',
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
<?php if ($_valid && !is_callable('content_546c9118487b81_35805727')) {function content_546c9118487b81_35805727($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_textbyhtml')) include '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.textbyhtml.php';
if (!is_callable('smarty_function_cycle')) include '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/function.cycle.php';
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
jquery/jquery-ui/css/south-street/jquery-ui-1.10.4.custom.min.css"/>
	
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



<section class="full-width add-top index-linha">
	<div class="container">
		<section class="sixteen columns">
			<?php  $_smarty_tpl->tpl_vars['pagina'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pagina']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Institucional']->value['Paginas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pagina']->key => $_smarty_tpl->tpl_vars['pagina']->value){
$_smarty_tpl->tpl_vars['pagina']->_loop = true;
?>
			<div class="four columns <?php echo smarty_function_cycle(array('values'=>'alpha,,,omega'),$_smarty_tpl);?>
 index-institucional">
				<h2><?php echo $_smarty_tpl->tpl_vars['pagina']->value['titulo'];?>
</h2>
				<span><?php echo $_smarty_tpl->tpl_vars['pagina']->value['resumo'];?>
</span>
			</div>
			<?php } ?>
		</section>
	</div>
</section>

<section class="full-width add-top">
	<div class="container">
		<section class="sixteen columns">
			<div class="eight columns alpha">
				<div class="box-title">
					Notícias
				</div>
				<ul class="ul_reset ul_noticias">
				<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_smarty_tpl->tpl_vars['Key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['N']->value['A1392385809']['Noticias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
 $_smarty_tpl->tpl_vars['Key']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
					<li class="eight columns alpha omega destaque1">
						<a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_area_publicacao'];?>
" />
							<div>
								<h2><?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
</h2>
							</div>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="one columns">
				&nbsp;
			</div>
			<div class="seven columns omega index-video">
				<div class="box-title">
					Vídeos
				</div>
				<iframe src="<?php echo $_smarty_tpl->tpl_vars['Video']->value['link_youtube'];?>
"></iframe>
				<a href="<?php echo $_smarty_tpl->tpl_vars['Video']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['Video']->value['titulo'];?>
">
					<?php echo $_smarty_tpl->tpl_vars['Video']->value['titulo'];?>

				</a>
			</div>
		</section>
	</div>
</section>

<?php /*  Call merged included template "bloco_newsletter.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("bloco_newsletter.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '364815972546c911812e392-68475898');
content_5473b1eba7bd38_36641212($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "bloco_newsletter.tpl.php" */?>

<section class="full-width add-top">
	<div class="container">
		<section class="sixteen columns">
			<div class="eight columns alpha">
				<div class="box-title">
					Facebook
				</div>
				<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAJEE-Tocantins%2F101669143258765&amp;width=460&amp;height=300&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=392253767462901" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:300px;" allowTransparency="true"></iframe>
			</div>
			<div class="eight columns omega">
				<div class="box-title">
					Twitter
				</div>
				<a class="twitter-timeline" href="https://twitter.com/sal.brmalls" data-widget-id="535176796124499968">Tweets de @sal.brmalls</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</section>
	</div>
</section>




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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("bloco_popup.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '364815972546c911812e392-68475898');
content_5473b1ebae52e4_31976889($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "bloco_popup.tpl.php" */?>
<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '364815972546c911812e392-68475898');
content_5473b1ebb5ddf7_68767981($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 19:32:11
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_newsletter.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5473b1eba7bd38_36641212')) {function content_5473b1eba7bd38_36641212($_smarty_tpl) {?><form name="FrmNewsletter" id="FrmNewsletter" method="post">
	
<section class="full-width add-top">
	<div class="container">
		<section class="sixteen columns newsletter">
			<div class="six columns alpha info">
				<h2>RECEBA NOSSOS <span>INFORMATIVOS!</span></h2>
				<h4>Preencha os dados abaixo para receber as novidades da AJEE.</h4>
			</div>
			<div class="four columns">
				<input id="FrmNewsletterNome" name="FrmNewsletterNome" class="input" type="text" value="" placeholder="NOME" />
			</div>
			<div class="four columns">
				<input id="FrmNewsletterEmail" name="FrmNewsletterEmail" class="input" type="text" value="" placeholder="E-MAIL" />
			</div>
			<div class="two columns omega">
				<input id="FrmNewsletterAdd" type="submit" class="button" title="OK" value="ENVIAR" name="FrmNewsletterAdd">
			</div>
		</section>
	</div>
</section>	

</form>
<script type="application/javascript">
	$(function(){ Newsletter.Load(); });
</script><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 19:32:11
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5473b1ebae52e4_31976889')) {function content_5473b1ebae52e4_31976889($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['POPUP']->value!=''){?>
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
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-24 19:32:11
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5473b1ebb5ddf7_68767981')) {function content_5473b1ebb5ddf7_68767981($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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