{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
{/block}

{block name=body_interna}

	{include file="form_alert.tpl.php"}

	{if $index_file != ""}
		{include file=$index_file}
	{/if}

{/block}