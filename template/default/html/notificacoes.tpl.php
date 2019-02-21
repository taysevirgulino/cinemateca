{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}{/block}

{block name=body_interna}

<ul class="icons-list notifications-list">
	{foreach from=$Itens item=item}
	<li> 
		<i class="icon-li {$item.classIcon}"></i> 
		<strong>{$item.titulo}</strong>: {$item.descricao} - <i>{$item.data_short}</i>
		(<a href="{if $item.link != ""}{$item.link}{else}{$Url.Notificacoes}?notificacao={$item.id_notificacao}{/if}">ver <i class="fa fa-external-link"></i></a>)
	</li>
	{/foreach}
</ul>

{/block}