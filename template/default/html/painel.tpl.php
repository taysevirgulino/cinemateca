{extends file="layout.tpl.php"}
{block name=head}

	<!-- Plugin CSS -->
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/morris/morris.css">
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/icheck/skins/minimal/blue.css">
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/select2/select2.css">
	<link rel="stylesheet" href="{$SRC_SCRIPT_TEMPLATE}plugins/fullcalendar/fullcalendar.css">

{/block}

{block name=footer}

	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/icheck/jquery.icheck.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/select2/select2.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}libs/raphael-2.1.2.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/morris/morris.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/sparkline/jquery.sparkline.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/nicescroll/jquery.nicescroll.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/fullcalendar/fullcalendar.min.js"></script> 
	
	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}demos/dashboard.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}demos/calendar.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}demos/charts/morris/area.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}demos/charts/morris/donut.js"></script>

{/block}

{block name=body}

{include file=$index_file}

{/block}