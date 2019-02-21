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
		<a href="{$URL_PATH}curriculo-list" class="btn btn-sm btn-default btn-block">
			<i class="fa fa-undo"></i> Voltar
		</a>
	</div>
</div>

<div class="row">
	<div class="col-md-9">
		<h3>Informações do Currículo</h3>
		<hr />
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> NOME:</strong> {$obj->getNome()} {$obj->getSobrenome()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> SEXO:</strong> {$obj->getSexo()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> NASCIMENTO:</strong> {$obj->getDataNascimento()|date_format:"%d/%m/%Y"}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> CPF:</strong> {$obj->getCpf()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Estado Civil:</strong> {$estado_civil}</div>
		</div>		
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Telefone(s):</strong> {$obj->getTelefone()} {$obj->getTelefone2()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> E-mail:</strong> {$obj->getEmail()} {$obj->getEmail2()}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Endereço:</strong> {$obj->getEndereco()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Cidade:</strong> {$obj->getCidade()}/{$obj->getEstado()}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-12" style="width:auto"><strong><i class="fa fa-clock-o"></i> Cadastro:</strong> {$obj->getDatahora()|date_format:"%d.%m.%y %Hh%M"}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Área:</strong> {$objCurriculoArea->getTitulo()}</div>
			<div class="col-md-6" style="width:auto"><strong><i class="fa fa-user"></i> Segmento:</strong> {$objCurriculoSegmento->getTitulo()}</div>
		</div>
		<div class="row" style="margin-top:15px;">
			{if $obj->getArquivo() != ""}
			<div class="col-md-12" style="margin-top:15px;">
				<a href="{$URL_PATH}files/curriculo/{$obj->getArquivo()}" target="_blank" title="Clique para baixar"><i class="icon-li fa fa-download"></i> {$obj->getArquivo()}</a>
			</div>
			{/if}
		</div>
	</div>
	<div class="col-md-3">
		<div class="thumbnail">
			<img alt="{$obj->getNome()} {$obj->getSobrenome()}e" src="{$URL_PATH}images/curriculo/A{if $obj->getImagem() != ''}{$obj->getImagem()}{else}null.jpg{/if}" />
		</div>
	</div>
</div>
{/block}