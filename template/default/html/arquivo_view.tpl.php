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
		<a href="{$URL_PATH}arquivo-list-{$objLojista->getIdentificador()}" class="btn btn-sm btn-default btn-block">
			<i class="fa fa-undo"></i> Voltar
		</a>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<h3>Informações Arquivo/Protocolo #{$obj->getIdArquivo()}</h3>
		<hr />
		<div class="row">
			<div class="col-md-4"><strong><i class="fa fa-chevron-circle-right"></i> Lojista:</strong> {$objLojista->getNome()}</div>
			<div class="col-md-4"><strong><i class="fa fa-chevron-circle-right"></i> Tipo:</strong> {$objTipo->getTitulo()}</div>
			<div class="col-md-4"><strong><i class="fa fa-chevron-circle-right"></i> Disciplina:</strong> {$objDisciplina->getTitulo()}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Usuário (cadastro):</strong> {$objUsuario->getNome()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Responsável (responder):</strong> {$objUsuarioResponsavel->getNome()}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-4"><strong><i class="fa fa-clock-o"></i> Cadastro:</strong> {$obj->getDatahora()|date_format:"%d.%m.%y %Hh%M"}</div>
			<div class="col-md-4"><strong><i class="fa fa-clock-o"></i> Última resposta:</strong> {$obj->getDatahoraEdicao()|date_format:"%d.%m.%y %Hh%M"}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-8"><strong><i class="fa fa-list-alt"></i> Assunto:</strong> {$obj->getTitulo()}</div>
			<div class="col-md-3"><strong><i class="fa fa-list-alt"></i> Situação:</strong> {$status}</div>
		</div>
	</div>
	<div class="col-md-12" style="margin-top:40px;">
        <h3>Interações {if $user->getIdUsuarioPerfil() != 1} <a href="{$URL_PATH}arquivo-reply-{$obj->getIdentificador()}" class="btn btn-secondary pull-right"><i class="fa fa-comment"></i> &nbsp;Responder/Atualizar</a>{/if}</h3>
		<br />
		<div class="table-responsive">
			<table class="table table-striped" style="width:100%">
				<tbody>
					{foreach from=$itensArquivoHistorico item=item}
					<tr>
						<td style="width: 10%;">{$item.datahora}</td>
						<td style="width: 80%">
							<p><strong><i class="fa fa-user"></i> Usuário:</strong> {$item.usuario_nome} &nbsp;&nbsp; {$item.status_label}</p>
							<p>{$item.texto}</p>
							{if $item.anexos|@count > 0}
								<p>
									<u>{$item.tipo_titulo}:</u>
								</p>
								{foreach from=$item.anexos item=anexo}
								<p>
									<a href="{$URL_PATH}files/arquivo_anexo/{$anexo.arquivo}" target="_blank" title="Clique para baixar"><i class="icon-li fa fa-download"></i> {$anexo.arquivo}</a>
								</p>
								{/foreach}
							{/if}
						</td>
						<td style="width:10% !important;"><div class="thumbnail pull-right" style="width: 90px;"> <img src="{$URL_PATH}images/usuario/A{if $item.usuario_imagem != ""}{$item.usuario_imagem}{else}null.jpg{/if}" alt="{$item.usuario_nome}" /> </div></td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
	</div>
</div>
{/block}