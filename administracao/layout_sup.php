<? require_once("layout_sup.inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>[Administra&ccedil;&atilde;o]</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
    <? if(!$ShowTop){ ?> 
		<link href="style/style.colorbox.css" rel="stylesheet" type="text/css" />
	<? } ?>
    <?=$label_display_config?>
    <link rel="stylesheet" type="text/css" media="all" href="script/calendario/calendar-win2k-cold-1.css" title="win2k-cold-1" />
    <script type="text/javascript" src="script/calendario/calendar.js"></script>
    <script type="text/javascript" src="script/calendario/lang/calendar-pt.js"></script>
    <script type="text/javascript" src="script/calendario/calendar-setup.js"></script>
    
    <script type="text/javascript" src="script/default.js"></script>
    <script type="text/javascript" src="script/formatacao.js"></script>
    <script type="text/javascript" src="script/form_validator/validator.js"></script>
    <script type="text/javascript" src="script/AC_RunActiveContent.js"></script>

	<script type="text/javascript" src="script/jquery/jquery-1.8.3.min.js"></script>
	
    <script type="text/javascript" src="script/jquery/jquery-maskedinput/jquery.maskedinput-1.3.1.min.js"></script>
    
	<script type="text/javascript" src="script/jquery/colorbox/jquery.colorbox-min.js"></script>
	<script type="text/javascript" src="script/jquery/colorbox/i18n/jquery.colorbox-pt.js"></script>
    <link rel="stylesheet" type="text/css" href="script/jquery/colorbox/example1/colorbox.css"/>
	
    <link rel="stylesheet" type="text/css" href="script/jquery/jquery-qtip2/dist/jquery.qtip.min.css"/>
    <script type="text/javascript" src="script/jquery/jquery-qtip2/dist/jquery.qtip.min.js"></script>

    <link href="script/jquery/jquery-ui/css/smoothness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    <script type="text/javascript" src="script/jquery/jquery-ui/js/jquery-ui-1.10.0.custom.min.js"></script>
    
</head>

<body>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<table width="960" border="0" cellspacing="0" cellpadding="0">
      <? if($ShowTop){ ?>
      <!-- Cabecalho.Inicio() -->
	  <tr>
        <td>
		<table width="960" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                	<img src="images/logo.jpg" width="960" border="0" usemap="#Map" />
                    <map name="Map" id="Map">
                        <area shape="rect" coords="21,2,268,82" href="index.php" target="_parent" alt="Principal" />
                        <area shape="rect" coords="678,60,800,82" href="javascript:void(window.open('http://www.artemsite.com.br/call/livezilla.php','','width=590,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" alt="Suporte via Chat Online" />
                        <area shape="rect" coords="805,60,958,81" href="mailto:suporte@artemsite.com.br" alt="Enviar e-mail" />
                    </map>                    
                    </td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#f4f4f4"><?=$label_menu_display?></td>
          </tr>
          <tr>
            <td height="20" align="right" style="font-size:9px;">Seja bem-vindo <strong><?=$USER_NOME?></strong>&nbsp;<?=$SITE_INFO?></td>
          </tr>
          <tr>
            <td height="3"></td>
          </tr>
          <tr>
            <td height="5"></td>
          </tr>
        </table>
		</td>
      </tr>
	  <!-- Cabecalho.Fim() -->
      <? } ?>
	  <!-- Corpo.Inicio() -->
	  <tr>
        <td valign="top" style="width:960px;" id="pagecontent">