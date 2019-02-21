{extends file="layout_interna.tpl.php"}
{block name=head_interna}{/block}
{block name=footer_interna}
	<!-- Plugin JS --> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/jquery.dataTables.min.js"></script> 
	<script src="{$SRC_SCRIPT_TEMPLATE}plugins/datatables/DT_bootstrap.js"></script>
	<script src="{$SRC_SCRIPT_TEMPLATE}form.js"></script>
{/block}

{block name=body_interna}

<div class="row" style="padding-bottom:20px;">
	<div class="col-md-2  col-md-offset-10">
		<a href="{$URL_PATH}mensagem-list" class="btn btn-sm btn-default btn-block">
			<i class="fa fa-undo"></i> Voltar
		</a>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h3>Informações Mensagem #{$obj->getIdMensagem()}</h3>
		<hr />
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Remetente:</strong> {$objUsuarioRemetente->getNome()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Destinatário:</strong> {$objUsuarioDestinatario->getNome()}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-4" style="width:auto"><strong><i class="fa fa-clock-o"></i> Cadastro:</strong> {$obj->getDatahora()|date_format:"%d.%m.%y %Hh%M"}</div>
			<div class="col-md-4" style="width:auto"><strong><i class="fa fa-clock-o"></i> Última resposta:</strong> {$obj->getDatahoraEdicao()|date_format:"%d.%m.%y %Hh%M"}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-8" style="width:auto"><strong><i class="fa fa-list-alt"></i> Assunto:</strong> {$obj->getTitulo()}</div>
			<div class="col-md-3" style="width:auto"><strong><i class="fa fa-list-alt"></i> Situação:</strong> {$status.span}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-12">
				<hr />
				{$obj->getTexto()}
			</div>
			{if $obj->getArquivo() != ""}
			<div class="col-md-12" style="margin-top:15px;">
				<a href="{$URL_PATH}files/mensagem/{$obj->getArquivo()}" target="_blank" title="Clique para baixar"><i class="icon-li fa fa-download"></i> {$obj->getArquivo()}</a>
			</div>
			{/if}
		</div>
	</div>
	<div class="col-md-12" style="margin-top:40px;">
		<h3>Interações <a href="{$URL_PATH}mensagem-reply-{$obj->getIdentificador()}" class="btn btn-secondary pull-right"><i class="fa fa-comment"></i> &nbsp;Responder/Atualizar</a></h3>
		<br />
		<div class="table-responsive">
			<table class="table table-striped" style="width:100%">
				<tbody>
					{foreach from=$itensMensagemHistorico item=item}
					<tr>
						<td style="width: 10%;">{$item.datahora}</td>
						<td style="width: 80%">
							<p><strong><i class="fa fa-user"></i> Usuário:</strong> {$item.nome} ({$item.email})</p>
							<p>{$item.texto}</p>
							{if $item.arquivo != "arquivo"}
								<p>
									<u>ANEXO:</u>
								</p>
								<p>
									<a href="{$URL_PATH}files/mensagem/{$item.arquivo}" target="_blank" title="Clique para baixar"><i class="icon-li fa fa-download"></i> {$item.arquivo}</a>
								</p>
							{/if}
						</td>
						<td style="width:10% !important;"><div class="thumbnail pull-right" style="width: 90px;"> <img src="{$URL_PATH}images/usuario/A{if $item.imagem != ""}{$item.imagem}{else}null.jpg{/if}" alt="{$item.nome}" /> </div></td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
	</div>
</div>
{/block}