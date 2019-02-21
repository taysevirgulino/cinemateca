<div class="row">
	<div class="col-sm-12">
		{if $error != null}
		<div class="alert alert-danger">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			{foreach from=$error item=Item}
				<i class="fa fa-exclamation-triangle"></i> {$Item}<br />
			{/foreach}
		</div>
		{/if}
		{if $success != null}
		<div class="alert alert-success">
			<a aria-hidden="true" href="#" data-dismiss="alert" class="close">×</a>
			{foreach from=$success item=Item}
				<i class="fa fa-check"></i> {$Item}<br />
			{/foreach}
		</div>
		{/if}
	</div>
</div>