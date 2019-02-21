{extends file="layout.tpl.php"}
{block name=head}

	<!-- Plugin CSS -->
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/morris/morris.css">
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/icheck/skins/minimal/green.css">
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/fileupload/bootstrap-fileupload.css">
	
	{block name=head_interna}{/block}
	
{/block}

{block name=footer}

	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}api.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/icheck/jquery.icheck.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/select2/select2.js"></script>  
  	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/parsley/dist/parsley.min.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/parsley/src/i18n/pt-br.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}libs/raphael-2.1.2.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/morris/morris.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/sparkline/jquery.sparkline.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/fullcalendar/lib/moment.min.js"></script>  
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/fullcalendar/fullcalendar.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/fullcalendar/pt-br.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/fileupload/bootstrap-fileupload.js"></script>
	
	{block name=footer_interna}{/block}
{/block}

{block name=body}

<div class="container">
	<div class="content">
		<div class="content-container">
			<div class="content-header">
				<h2 class="content-header-title" style="text-transform:uppercase">{$Titulo}</h2>
				<ol class="breadcrumb">
					{foreach from=$Navegacao item=Link key=key}
						{if $Link[1] != ""}<li><a href="{$Link[1]}" title="{$Link[0]}">{$Link[0]}</a></li>{else}<li class="active">{$Link[0]}</li>{/if}
					{/foreach}
				</ol>
			</div>
			<!-- /.content-header --> 
			{block name=body_interna}{/block}
		</div>
		<!-- /.content-container --> 
	</div>
	<!-- /.content --> 
</div>
<!-- /.container -->

{/block}