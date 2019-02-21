<form id="frm" name="frm" action="" class="parsley-form" enctype="multipart/form-data" method="post" data-parsley-validate data-parsley-excluded="input.excluded">
<div class="portlet-content">

	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmDestinatario">Destinatário(s): *</label>
				<select id="FrmDestinatario" name="FrmDestinatario[]" class="form-control" required multiple>
					<option value=""></option>
					{if $itensEmpreendimento|@count > 0}
					<optgroup label="Todos do Empreendimento">
						{foreach from=$itensEmpreendimento item=item}<option value="{$item.identificador}">Empreendimento: {$item.titulo}</option>{/foreach}
					</optgroup>
					{/if}
					{if $itensSegmento|@count > 0}
					<optgroup label="Todos do Segmento">
						{foreach from=$itensSegmento item=item}<option value="{$item.identificador}">Segmento: {$item.titulo}</option>{/foreach}
					</optgroup>
					{/if}
					{if $itensLojista|@count > 0}
					<optgroup label="Todos do Loja">
						{foreach from=$itensLojista item=item}{if $item.nome != ""}<option value="{$item.identificador}">Lojista: {$item.nome}</option>{/if}{/foreach}
					</optgroup>
					{/if}
					{if $itensUsuario|@count > 0}
					<optgroup label="Usuário">
						{foreach from=$itensUsuario item=item}<option value="{$item.identificador}">{$item.nome}</option>{/foreach}
					</optgroup>
					{/if}
				</select>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmTitulo">Assunto: *</label>
				<input type="text" name="FrmTitulo" id="FrmTitulo" class="form-control" maxlength="255" value="" required>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="FrmTexto">Mensagem: *</label>
				<textarea name="FrmTexto" id="FrmTexto" class="form-control" rows="3" required></textarea>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<label for="FrmArquivoFile" class="nobr">Arquivo anexo:</label>
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-group">
					<div class="form-control"> <i class="fa fa-file fileupload-exists"></i> <span class="fileupload-preview"></span> </div>
					<div class="input-group-btn"> 
						<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a> 
						<span class="btn btn-default btn-file"> 
							<span class="fileupload-new">Selecionar arquivo</span> 
							<span class="fileupload-exists">Alterar</span>
							<input type="file" name="FrmArquivoFile" id="FrmArquivoFile" class="excluded" value="">
						</span> 
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row" style="margin-top:20px;">
		<div class="col-sm-4">
			<div class="form-group">
			  <button id="btSubmit" name="btSubmit" type="submit" class="btn btn-primary" data-loading-text="CARREGANDO...">SALVAR</button>
			  <button class="btn btn-default" type="button" onclick="javascript:history.go(-1);">cancelar</button>
			</div>
		</div>
		<!-- /.col -->
		
	</div>
	<!-- /.row --> 
	
</div>
<!-- /.portlet-content --> 
</form>