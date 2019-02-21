<?php /* Smarty version Smarty-3.1.8, created on 2014-11-19 19:36:37
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticias.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:133623940546d17682b7b17-22168849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '218d0fd470656f0b51695e7e525481e6677921fd' => 
    array (
      0 => '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/noticias.tpl.php',
      1 => 1415802892,
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
  'nocache_hash' => '133623940546d17682b7b17-22168849',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_546d1768cfb0f1_36504107',
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
<?php if ($_valid && !is_callable('content_546d1768cfb0f1_36504107')) {function content_546d1768cfb0f1_36504107($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_textbyhtml')) include '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.textbyhtml.php';
if (!is_callable('smarty_modifier_date_format')) include '/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/_smarty/libs/plugins/modifier.date_format.php';
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
    
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['SRC_CSS']->value;?>
noticias.css"/>


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
				
	
<?php if ($_smarty_tpl->tpl_vars['IsBlog']->value){?>

    <?php if ($_smarty_tpl->tpl_vars['Noticias_Count']->value>0){?>
        <ul class="ul_reset ul_blog_posts">
            <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Noticias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
            <li>
                <h2><?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
</h2>
                <h3><?php if ($_smarty_tpl->tpl_vars['n']->value['chapeu']!=''){?><?php echo $_smarty_tpl->tpl_vars['n']->value['chapeu'];?>
 - <?php }?><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['n']->value['datahora'],"%d.%m.%y %Hh%M");?>
</span></h3>
                <div class="texto">
                    <?php if ($_smarty_tpl->tpl_vars['n']->value['foto_arquivo_width']>0){?>
                    <div class="imagem" style="width:<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_arquivo_width'];?>
px; height:<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_arquivo_height'];?>
px; <?php if ($_smarty_tpl->tpl_vars['n']->value['foto_arquivo_width']<=690){?>margin:0px 10px 10px 0px;<?php }else{ ?>margin:0px 0px 10px 0px;<?php }?>">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['URL_PATH']->value;?>
images/noticia/A<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_arquivo_file'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_descricao'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_descricao'];?>
" border="0" />
                    </div>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['n']->value['texto'];?>

                </div>
                <div class="sixteen columns alpha omega mt mb">
                    <!--<div class="grid_2 alpha" style="width:100px">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
#comentarios" title="Comentar" style="font-weight:bold; text-decoration:none;">
                            <?php echo $_smarty_tpl->tpl_vars['n']->value['comments'];?>
 comentário(s)
                        </a>
                    </div>-->
                    <div class="one columns" style="width:62px">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
#comentarios" title="Comentar">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
coment_icon_alpha.gif" border="0" />
                        </a>
                    </div>
                    <div class="one columns omega">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
" title="Link para Notícia">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['SRC_IMAGE']->value;?>
permalink_icon_alpha.gif" border="0" />
                        </a>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        <div class="sixteen columns alpha omega mt mb paginacao">
            <?php echo $_smarty_tpl->tpl_vars['PG_LABEL']->value;?>

        </div>
    <?php }else{ ?>
        <div class="sixteen columns alpha omega mt mb nenhum">
            &raquo; Nenhuma notícia localizada com os critérios utilizados.
        </div>
    <?php }?>

<?php }else{ ?>

    <?php if ($_smarty_tpl->tpl_vars['Noticias_Count']->value>0){?>
        <div class="sixteen columns alpha omega">
            <span class="veja_mais right"><?php echo $_smarty_tpl->tpl_vars['Noticias_Count']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['Noticias_Count']->value==1){?>notícia<?php }else{ ?>notícias<?php }?></span>
        </div>
        <ul class="ul_reset ul_noticias">
            <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Noticias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
            <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
">
                    <?php if (!preg_match("/null/",$_smarty_tpl->tpl_vars['n']->value['foto_area_publicacao'])){?><img src="<?php echo $_smarty_tpl->tpl_vars['n']->value['foto_area_publicacao'];?>
" width="220" /><?php }?>
                    <h6><?php if ($_smarty_tpl->tpl_vars['n']->value['chapeu']!=''){?><?php echo $_smarty_tpl->tpl_vars['n']->value['chapeu'];?>
 - <?php }?><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['n']->value['datahora'],"%d.%m.%y %Hh%M");?>
</span></h6>
                    <p><?php echo $_smarty_tpl->tpl_vars['n']->value['titulo'];?>
</p>
                </a>
            </li>
            <?php } ?>
        </ul>
        <div class="sixteen columns alpha omega mt mb paginacao">
            <?php echo $_smarty_tpl->tpl_vars['PG_LABEL']->value;?>

        </div>
    <?php }else{ ?>
        <div class="sixteen columns alpha omega mt mb nenhum">
            &raquo; Nenhuma notícia localizada com os critérios utilizados.
        </div>
    <?php }?>
    
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("bloco_popup.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '133623940546d17682b7b17-22168849');
content_546d1b7616cef2_69724651($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "bloco_popup.tpl.php" */?>
<?php /*  Call merged included template "analytics.tpl.php" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("analytics.tpl.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '133623940546d17682b7b17-22168849');
content_546d1b761e3140_42490407($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "analytics.tpl.php" */?>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-19 19:36:38
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/bloco_popup.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_546d1b7616cef2_69724651')) {function content_546d1b7616cef2_69724651($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['POPUP']->value!=''){?>
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
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.8, created on 2014-11-19 19:36:38
         compiled from "/Cloud/Sites/sal.brmalls.com.br/sal.brmalls.com.br/www/template/default/html/analytics.tpl.php" */ ?>
<?php if ($_valid && !is_callable('content_546d1b761e3140_42490407')) {function content_546d1b761e3140_42490407($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['CONFIG']->value['analytics_key']!=''){?>

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