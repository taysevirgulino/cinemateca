<? require_once("config.inc.php"); require_once("logon.inc.php"); require_once("index.inc.php"); ?>
<?
	require_once("layout_sup.php");
?>
<table width="950" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="25" class="texto_titulo">Painel de Controle</td>
  </tr>
  <tr>
    <td height="1" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
    <td class="data_titulo"><?=date("d/m/Y H:i:s")?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    	<div class="Index">
        	<h2>Aconteceu Hoje:</h2>
        	<?php 
        		for($i=0; $i < count($bloco); $i++){
        			print '<b>'.$bloco[$i][0].'</b> '.$bloco[$i][1].'<br />';
        		}
        	?>
        </div>
	    <ul class="Modulos">
			<li>
                <a href="usuario_list.php" title="Usuários">
                    <img src="images/modulos/new/ico_new_participacao_popular.jpg" border="0" />
                    <div>Usuários</div>
                </a>
            </li>
			<li>
                <a href="lojista_list.php" title="Lojistas">
                    <img src="images/modulos/new/ico_new_agenda_de_contatos.png" border="0" />
                    <div>Lojistas</div>
                </a>
            </li>
            <li>
                <a href="documento_list.php" title="Documentos">
                    <img src="images/modulos/new/ico_new_pagina.png" border="0" />
                    <div>Documentos</div>
                </a>
            </li>
            <li>
                <a href="banner_list.php" title="Banners">
                    <img src="images/modulos/new/ico_new_banner.png" border="0" />
                    <div>Banners</div>
                </a>
            </li>
          	<li>
                <a href="relatorio_usuario_acesso_ano.php" title="Acessos Diários">
                    <img src="images/modulos/new/ico_new_acessos_diarios.png" border="0" />
                    <div>Acessos Diários</div>
                </a>
            </li>
        </ul>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>  
</table>
<?
	require_once("layout_inf.php");
?>