<?php /* Smarty version Smarty-3.1.8, created on 2014-11-12 16:28:08
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticia.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:20867444115463735665bd34-47418506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41c5a805306d0e0afe58b8727370f314608d7ad9' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticia.tpl.php',
      1 => 1415820486,
      2 => 'file',
    ),
    '87929ccf4598edf30c6e68029a2fbe99c391aaee' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout_interna.tpl.php',
      1 => 1415739214,
      2 => 'file',
    ),
    'f2e793cfd4005e250d77b7e2a9cf0ec81752622a' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/layout.tpl.php',
      1 => 1415817529,
      2 => 'file',
    ),
    '87af7067e67f98cc7539601c573ff8b7de3d9271' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticia_relacionadas.tpl.php',
      1 => 1391433188,
      2 => 'file',
    ),
    '45f7745f41db8e2431e5ff979dcc5d15cc888369' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticia_imagem.tpl.php',
      1 => 1405621110,
      2 => 'file',
    ),
    '67e4f9559fdd23483bf8234f8e65f1b4761ddfc4' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_newsletter.tpl.php',
      1 => 1415714591,
      2 => 'file',
    ),
    '9c476ddf7ffe89d937870b49c7703d8073fa6339' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php',
      1 => 1391518138,
      2 => 'file',
    ),
    'd0c42f7e5f3c23e095f685123c426436e9d77ea3' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php',
      1 => 1355570956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20867444115463735665bd34-47418506',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_54637357435347_59452371',
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
    'LABEL_LEGENDA' => 0,
    'Banner' => 0,
    'Menu_Editorias' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54637357435347_59452371')) {function content_54637357435347_59452371($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_textbyhtml')) include '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.textbyhtml.php';
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
    
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
base.css?version=20140204"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
skeleton.css?version=20140212E"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
layout.css?version=20140814a"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
slides.css?version=20140814a"/>
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
jquery.flexslider-min.js"></script>
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
    
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
plugin.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
noticia.css"/>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/colorbox/colorbox/jquery.colorbox.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_SCRIPT']->value;?>
jquery/colorbox/example1/colorbox.css"/>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
administracao/script/form_validator/validator.js"></script>


</head>
<body>

<header>
	<div class="full-width bb1">
		<div class="container">
			<nav class="ten columns">
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
			</nav>
			<div class="six columns">
				<p class="bloco local_data">Augustinópolis - <?php echo $_smarty_tpl->tpl_vars['LABEL_LEGENDA']->value;?>
</p>
			</div>
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['Banner']->value['LocalTP01']!=''){?>
	<div class="full-width">
		<div class="container">
			<div class="publicidade_b add-top">
				<?php echo $_smarty_tpl->tpl_vars['Banner']->value['LocalTP01'];?>

				<span class="bloco right">Publicidade</span>
			</div>
		</div>            	
	</div>
	<?php }?>
	<div class="full-width">
		<div class="container">
			<section class="sixteen columns">
				<div class="eight columns alpha">
					<a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Principal'];?>
" class="logo add-top" title="<?php echo $_smarty_tpl->tpl_vars['OG']->value['title'];?>
">
						<h2 id="logo" class="half-bottom half-top">
							<img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
logo.png" alt="<?php echo $_smarty_tpl->tpl_vars['OG']->value['title'];?>
">
						</h2>
					</a>
				</div>
				<div class="eight omega columns">
					<div class="bloco">
						<ul class="ul_reset2 redes_container right">
							<?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['link_facebook']!=''){?><li><a class="redes face" href="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['link_facebook'];?>
" target="_blank" title="Facebook"></a></li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['link_youtube']!=''){?><li><a class="redes youtube" href="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['link_youtube'];?>
" target="_blank" title="Youtube"></a></li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['link_twitter']!=''){?><li><a class="redes twitter" href="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['link_twitter'];?>
" target="_blank" title="Twitter"></a></li><?php }?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['RSS'];?>
" target="_blank" title="RSS" class="redes rss"></a></li>
						</ul>
					</div>
					<div class="bloco">
						<form id="search" class="search" action="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Pesquisar'];?>
" name="search" method="get">
							<input id="q" class="input_busca relative" type="text" maxlength="100" value="" name="q" placeholder="Digite sua busca aqui...">
							<input id="find" type="submit" class="submit_busca relative" title="Pesquisar" value="Buscar" name="find">
						</form>
					</div>
				</div>
			</section>
		</div>            	
	</div>
	<div class="full-width bt">
		<div class="container">
			<section class="sixteen columns bb">
				<a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['Noticias'];?>
" title="Últimas notícias" class="editorias_btn relative"></a>
				<nav id="menu_h">
					<ul class="ul_reset2 header_menu2">
						<?php  $_smarty_tpl->tpl_vars['ItemMenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ItemMenu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Menu_Editorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['ItemMenu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['ItemMenu']->key => $_smarty_tpl->tpl_vars['ItemMenu']->value){
$_smarty_tpl->tpl_vars['ItemMenu']->_loop = true;
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration++;
 $_smarty_tpl->tpl_vars['ItemMenu']->last = $_smarty_tpl->tpl_vars['ItemMenu']->iteration === $_smarty_tpl->tpl_vars['ItemMenu']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ItemMenu']['last'] = $_smarty_tpl->tpl_vars['ItemMenu']->last;
?>
						<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['ItemMenu']['last']){?>last<?php }?>">
							<a itemprop="url" title="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
</a>
						</li>
						<?php } ?>
					</ul>
				</nav>
				<form id="responsive-nav" class="responsive-nav relative right remove-bottom" method="post" action="">
					<select class="chzn-select relative">
						<option value="Navegação">Navegação</option>
						<?php  $_smarty_tpl->tpl_vars['ItemMenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ItemMenu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Menu_Editorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['ItemMenu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['ItemMenu']->key => $_smarty_tpl->tpl_vars['ItemMenu']->value){
$_smarty_tpl->tpl_vars['ItemMenu']->_loop = true;
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration++;
 $_smarty_tpl->tpl_vars['ItemMenu']->last = $_smarty_tpl->tpl_vars['ItemMenu']->iteration === $_smarty_tpl->tpl_vars['ItemMenu']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ItemMenu']['last'] = $_smarty_tpl->tpl_vars['ItemMenu']->last;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
</option>
						<?php } ?>
					</select>
				</form>
			</section>
		</div>
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
				
	
	<div class="twelve columns alpha conteudo">
    	<h1 class="titulo"><?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getTitulo();?>
</h1>
    	<div class="twelve columns alpha omega mb">
        	<div class="nine columns alpha">
            	<span class="datahora"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['objNoticia']->value->getDatahora(),"%d/%m/%Y %Hh%M");?>
 <?php if ($_smarty_tpl->tpl_vars['objNoticia']->value->getDatahoraEdicao()!="0000-00-00 00:00:00"&&$_smarty_tpl->tpl_vars['objNoticia']->value->getDatahoraEdicao()!=''){?><b>| Atualizado em: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['objNoticia']->value->getDatahoraEdicao(),"%d/%m/%Y %Hh%M");?>
</b><?php }?></span>
            </div>
            <div class="three columns omega">
            	<div class="addthis_toolbox addthis_default_style" style="float:right" addthis:url="<?php echo $_smarty_tpl->tpl_vars['OG']->value['url'];?>
" addthis:title="<?php echo $_smarty_tpl->tpl_vars['OG']->value['title'];?>
" addthis:description="<?php echo $_smarty_tpl->tpl_vars['OG']->value['description'];?>
">
                    <a class="addthis_button_facebook"></a>
                    <a class="addthis_button_twitter"></a>
                    <a class="addthis_button_email"></a>
                    <a class="addthis_button_orkut"></a>
                    <a class="addthis_button_google"></a>
                </div>
                
                <script type="text/javascript">
                    var addthis_config = {
                        ui_language: "pt"
                    }
                    var addthis_share = {
                        templates: { twitter: '{{title}} {{url}}' }
                    }		
                </script>  
                <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4eea2aad4764c60a"></script>
                
            </div>
        </div>
        
        <div class="texto">
            <?php if ($_smarty_tpl->tpl_vars['foto_width']->value==0){?>
				<?php /*  Call merged included template "noticia_relacionadas.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("noticia_relacionadas.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c95a1a49_09872371($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "noticia_relacionadas.tpl.php" */?>
			<?php }elseif($_smarty_tpl->tpl_vars['foto_width']->value<700){?>
				<div class="bloco" style="width:<?php echo $_smarty_tpl->tpl_vars['foto_width']->value+10;?>
px; margin:0px 10px 10px 0px;">
					<?php /*  Call merged included template "noticia_imagem.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("noticia_imagem.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c9657509_27511532($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "noticia_imagem.tpl.php" */?>
					<?php /*  Call merged included template "noticia_relacionadas.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("noticia_relacionadas.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c95a1a49_09872371($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "noticia_relacionadas.tpl.php" */?>
				</div>
			<?php }else{ ?>
				<div class="bloco mb">
					<?php /*  Call merged included template "noticia_imagem.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("noticia_imagem.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c9657509_27511532($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "noticia_imagem.tpl.php" */?>
				</div>
				<?php /*  Call merged included template "noticia_relacionadas.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("noticia_relacionadas.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c95a1a49_09872371($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "noticia_relacionadas.tpl.php" */?>
			<?php }?>
			
            <?php echo $_smarty_tpl->tpl_vars['Texto']->value;?>

        </div>
        <?php if ($_smarty_tpl->tpl_vars['Tags']->value[0]['identificador']!=''){?>
        <div class="tags">
            <b>Leia sobre: </b>
            <?php  $_smarty_tpl->tpl_vars['Tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['Tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['Tag']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['Tag']->key => $_smarty_tpl->tpl_vars['Tag']->value){
$_smarty_tpl->tpl_vars['Tag']->_loop = true;
 $_smarty_tpl->tpl_vars['Tag']->iteration++;
 $_smarty_tpl->tpl_vars['Tag']->last = $_smarty_tpl->tpl_vars['Tag']->iteration === $_smarty_tpl->tpl_vars['Tag']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tags']['last'] = $_smarty_tpl->tpl_vars['Tag']->last;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['Tag']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['Tag']->value['nome'];?>
"><?php echo $_smarty_tpl->tpl_vars['Tag']->value['nome'];?>
</a><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['tags']['last']){?><?php }else{ ?>,&nbsp;<?php }?>
            <?php } ?>
        </div>
        <?php }?>  
		
		<div class="twelve columns alpha omega bdt mb mt">
			<a name="comentarios" id="comentarios"></a>
			
				<div id="disqus_thread"></div>
				<script type="text/javascript">
					/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
					var disqus_shortname = 'sal.brmallscombr'; // required: replace example with your forum shortname
					var disqus_url = '<?php echo $_smarty_tpl->tpl_vars['OG']->value['url'];?>
';
					
					/* * * DON'T EDIT BELOW THIS LINE * * */
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				<a href="http://disqus.com" class="dsq-brlink" style="display:none">comments powered by <span class="logo-disqus">Disqus</span></a>
			
		</div>  
		
    </div>
	
	<?php if (count($_smarty_tpl->tpl_vars['Mais']->value)>0){?>
	<div class="four columns omega mais_noticias">
		<div class="bl-resumo">
            <div class="bl-resumo-title">
                Últimas notícias
            </div>
        </div>
    	<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_smarty_tpl->tpl_vars['Key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Mais']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
 $_smarty_tpl->tpl_vars['Key']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
		<div class="element-item height2">
			<a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
" class="noticia relative">
				<?php if (!preg_match("/null/",$_smarty_tpl->tpl_vars['n']->value['foto_area_publicacao'])){?><img src="<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_area_publicacao'];?>
" width="220" height="110" alt="<?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
" /><?php }?>
				<div class="bloco texto_b">
					<span><?php echo $_smarty_tpl->tpl_vars['n']->value['chapeu'];?>
</span>
					<h4><?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
</h4>
				</div>
			</a>
		</div>
		<?php } ?>
    </div>
	<?php }?>
    

			</div>
		</div>
	</div>
	
	
	<script type="text/javascript">
	$(function () {
		$.scrollTo( '#<?php if ($_smarty_tpl->tpl_vars['scrollToId']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['scrollToId']->value;?>
<?php }else{ ?>body<?php }?>', 800 );
	});
	</script>
	
	
    

<footer class="full-width add-top">
	<div class="container">
		<section class="sixteen columns">
			<div class="back_setas bloco add-top add-bottom">
				<h3 class="editorias_footer relative"><a href="#" title="Editorias">Editorias</a></h3>
			</div>
			<nav class="bloco add-bottom half-top">
				<ul class="ul_reset2 ul_editorias_f">
					<?php  $_smarty_tpl->tpl_vars['ItemMenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ItemMenu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Menu_Editorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['ItemMenu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['ItemMenu']->key => $_smarty_tpl->tpl_vars['ItemMenu']->value){
$_smarty_tpl->tpl_vars['ItemMenu']->_loop = true;
 $_smarty_tpl->tpl_vars['ItemMenu']->iteration++;
 $_smarty_tpl->tpl_vars['ItemMenu']->last = $_smarty_tpl->tpl_vars['ItemMenu']->iteration === $_smarty_tpl->tpl_vars['ItemMenu']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ItemMenu']['last'] = $_smarty_tpl->tpl_vars['ItemMenu']->last;
?>
					<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['ItemMenu']['last']){?>last<?php }?>">
						<a itemprop="url" title="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['ItemMenu']->value['nome'];?>
</a>
					</li>
					<?php } ?>
				</ul>
			</nav>
		</section>
		<section class="sixteen columns add-top">
			<div class="eight columns alpha">
				<?php /*  Call merged included template "bloco_newsletter.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("bloco_newsletter.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c99d4927_07278968($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "bloco_newsletter.tpl.php" */?>
			</div>
			<div class="eight columns omega">
				<div class="redes_f bloco">
					<ul class="ul_reset2 redesf_container right">
						<?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['link_facebook']!=''){?><li><a class="redes face" href="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['link_facebook'];?>
" target="_blank" title="Facebook"></a></li><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['link_youtube']!=''){?><li><a class="redes youtube" href="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['link_youtube'];?>
" target="_blank" title="Youtube"></a></li><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['link_twitter']!=''){?><li><a class="redes twitter" href="<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['link_twitter'];?>
" target="_blank" title="Twitter"></a></li><?php }?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['Url']->value['RSS'];?>
" target="_blank" title="RSS" class="redes rss"></a></li>
					</ul>
					
					<p class="pf relative">Acompanhe-nos nas REDES SOCIAIS...</p>                                
				</div>
			</div>
		</section>
		<section class="sixteen columns bt2">
			<div class="five columns alpha">
				<p class="info"><?php $_template = new Smarty_Internal_Template('eval:'.smarty_modifier_textbyhtml($_smarty_tpl->tpl_vars['CONFIG']->value['rodape']), $_smarty_tpl->smarty, $_smarty_tpl);echo $_template->fetch(); ?></p>
			</div>
			<div class="nine columns">
				<nav>
					<ul class="ul_reset footer_menu">
						<?php  $_smarty_tpl->tpl_vars['ItemMenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ItemMenu']->_loop = false;
 $_smarty_tpl->tpl_vars['Key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Menu']->value['Bloco_1419029261']['Itens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
				</nav>
			</div>
			<div class="two columns omega">
				<a class="artemsite_logo" title="ArtemSite - Agência Digital, Criação de Sites em Palmas Tocantins" href="http://www.artemsite.com.br/" target="_blank"></a>
			</div>
		</section>
	</div>
</footer>

<div id="dialog-message" title=""></div>
<?php /*  Call merged included template "bloco_popup.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("bloco_popup.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c9b3e8c4_15890145($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "bloco_popup.tpl.php" */?>
<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20867444115463735665bd34-47418506');
content_5463b4c9bbfd44_45836597($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-12 16:28:09
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticia_relacionadas.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5463b4c95a1a49_09872371')) {function content_5463b4c95a1a49_09872371($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['Relacionadas']->value[0]['identificador']!=''){?>
<ul class="relacionadas">
	<li class="t">saiba mais</li>
	<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Relacionadas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
	<li>
		<a href="<?php echo $_smarty_tpl->tpl_vars['Item']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['Item']->value['titulo'];?>
">
			&raquo; <?php echo $_smarty_tpl->tpl_vars['Item']->value['titulo'];?>

		</a>
	</li>
	<?php } ?>
</ul>
<?php }?>  <?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-12 16:28:09
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticia_imagem.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5463b4c9657509_27511532')) {function content_5463b4c9657509_27511532($_smarty_tpl) {?><div class="destaque" style="width:<?php echo $_smarty_tpl->tpl_vars['foto_width']->value;?>
px; ">
    <div class="destaqueCredito">
        <?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getFotoCredito();?>

    </div>
    <div class="destaqueImagem">
        <a href="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
images/noticia/<?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getFotoArquivo();?>
" title="<?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getFotoDescricao();?>
" class="colorbox">
            <img src="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
images/noticia/A<?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getFotoArquivo();?>
" title="<?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getFotoDescricao();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getFotoDescricao();?>
" border="0" />
        </a>
		
		<script type="application/javascript">
		$(document).ready(function(){
			$(".colorbox").colorbox();
		});
		</script>
		
    </div>
    <div class="destaqueDescricao">
        <?php echo $_smarty_tpl->tpl_vars['objNoticia']->value->getFotoDescricao();?>

    </div>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-12 16:28:09
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_newsletter.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5463b4c99d4927_07278968')) {function content_5463b4c99d4927_07278968($_smarty_tpl) {?><form name="FrmNewsletter" id="FrmNewsletter" method="post" class="newsletter relative">
	<h4 class="tf bloco">Newsletter</h4>
	<p class="bloco pf">Receba em Primeira mão o que acontece no estado</p>
	<input id="FrmNewsletterNome" name="FrmNewsletterNome" type="hidden" value="" />
	<input id="FrmNewsletterEmail" class="input_news relative" type="text" maxlength="255" value="" name="FrmNewsletterEmail" placeholder="Cadastre seu e-mail">
	<input id="FrmNewsletterAdd" type="submit" class="submit_news relative" title="OK" value="OK" name="FrmNewsletterAdd">
</form>
<script type="application/javascript">
	$(function(){ Newsletter.Load(); });
</script><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-12 16:28:09
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5463b4c9b3e8c4_15890145')) {function content_5463b4c9b3e8c4_15890145($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['POPUP']->value!=''){?>
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
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-12 16:28:09
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_5463b4c9bbfd44_45836597')) {function content_5463b4c9bbfd44_45836597($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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