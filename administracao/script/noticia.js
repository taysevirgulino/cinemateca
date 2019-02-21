function _Tipo(tipo){
	switch (tipo){
		case 1 : {
			$("#trTexto1").css("display", "table-row");
			$("#trTexto2").css("display", "table-row");
			$("#trLink1").css("display", "none");
		}break;
		case 2 : {
			$("#trTexto1").css("display", "none");
			$("#trTexto2").css("display", "none");
			$("#trLink1").css("display", "table-row");
		}break;
	}
}

var Tags = "";
var contTags = 0;
function _TagAdicionar(){
	var tag = document.getElementById("FrmTag");
	_TagAdicionarValue( tag.value );
	tag.value = "";
}
function _TagAdicionarValue( chave ){
	if(chave != "" && chave != null){
		Tags += '<label><input type="checkbox" checked="checked" name="tag[]" id="tag'+contTags+'" value="'+chave+'" />'+chave+'</label><br />';
		document.getElementById("Tags").innerHTML = Tags;
		contTags++
		document.getElementById("tagsCount").value = contTags;
	}
}

var Relacoes = "";
var contRelacoes = 0;
function _RelacaoAdicionar(){
	var obj = document.getElementById("FrmRelacao");
	_RelacaoAdicionarValue( obj.value );
	obj.value = "";
}
function _RelacaoAdicionarValue( chave ){
	if(chave != "" && chave != null){
		Relacoes += '<label><input type="checkbox" checked="checked" name="relacao[]" id="relacao'+contRelacoes+'" value="'+chave+'" />'+chave+'</label><br />';
		document.getElementById("Relacoes").innerHTML = Relacoes;
		contRelacoes++
		document.getElementById("relacoesCount").value = contRelacoes;
	}
}

function _Popup(url, campo) {
	var width = screen.availWidth;
	var height = screen.availHeight;
	$("#"+campo).val( "" );
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(url, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=0,width='+width+',height='+height);");
}
function _LoadImagem(file, campo){
	$("#"+campo).val( file );
	_LoadFotoArquivo();
	_LoadFotoAreaPublicacao();
}

function _LoadFotoArquivo(){
	var img = $("#FrmFotoArquivo").val();
	if(img != ""){
		day = new Date();
		id = day.getTime();
		$("#imgFrmFotoArquivo").attr("src", "../images/noticia/"+img+"?time="+id).show();
	}else{
		$("#imgFrmFotoArquivo").attr("src", "images/null.gif");
	}
}

function _LoadFotoAreaPublicacao(){
	var img = $("#FrmFotoAreaPublicacao").val();
	if(img != ""){
		day = new Date();
		id = day.getTime();
		$("#imgFrmFotoAreaPublicacao").attr("src", "../images/noticia/"+img+"?time="+id).show();
	}else{
		$("#imgFrmFotoAreaPublicacao").attr("src", "images/null.gif");
	}
}

function _FotoArquivoCrop(){
	var size = $("input[name=FrmFotoArquivoSize]:checked").val();
	if(size===undefined){
		alert("Selecione as dimensões da imagem");
		return;
	}
	size = size.split(";");
	var url = "plugins/imagecrop/index.php?module=noticia&width="+size[0]+"&height="+size[1]+"&prename=A&name="+$("#FrmFotoArquivoID").val()+"&input=FrmFotoArquivo";
	_Popup(url, "FrmFotoArquivo");
}

function _FotoAreaPublicacaoCrop(){
	var obj = $("input[name=FrmIdAreaPublicacao]:checked");
	if(obj===undefined){
		alert("Selecione uma área de publicação");
		$("#trFrmFotoAreaPublicacao").css("display", "none");
		return;
	}
	
	var img = $(obj).attr("img");
	if(img == "1"){
		var img_width = $(obj).attr("img_width");
		var img_height = $(obj).attr("img_height");
		var url = "plugins/imagecrop/index.php?module=noticia&width="+img_width+"&height="+img_height+"&prename=B&name="+$("#FrmFotoArquivoID").val()+"&input=FrmFotoAreaPublicacao";
		_Popup(url, "FrmFotoAreaPublicacao");
	}else{
		alert("Área selecionada não tem imagem");
		$("#trFrmFotoAreaPublicacao").css("display", "none");
		return;
	}
	
}

function _SelecionarArea(IdAreaPublicacao){
	var obj = $("#FrmIdAreaPublicacao_"+IdAreaPublicacao);
	var img = $(obj).attr("img");
	if(img == "1"){
		var img_width = $(obj).attr("img_width");
		var img_height = $(obj).attr("img_height");
		$("#spanFrmFotoAreaPublicacao").html( "Imagem "+img_width+"x"+img_height);
		$("#imgFrmFotoAreaPublicacao").attr("width", img_width).attr("height", img_height);
		$("#imgFrmFotoAreaPublicacao").attr("src", "images/null.gif");
		$("#trFrmFotoAreaPublicacao").css("display", "table-row");
		
		var foto = $("#FrmFotoAreaPublicacao").val();
		if(foto!=""){
			$("#imgFrmFotoAreaPublicacao").attr("src", "../images/noticia/"+foto);
		}
	}else{
		$("#trFrmFotoAreaPublicacao").css("display", "none");
		//$("#FrmFotoAreaPublicacao").val("");
	}
}

$(function() {
	$("#FrmTag").autocomplete("tag_autocomplete.php", {
		width: 800,
		selectFirst: false
	});
	
	$("#FrmRelacao").autocomplete("noticia_autocomplete.php", {
		width: 800,
		selectFirst: false
	});
	
	$(".accordion").accordion({ autoHeight: false });
	//$(".accordion").accordion("activate", $("#area_publicacao_bloco_2"));
	
	$("#FrmDatahora").mask("99/99/9999 99:99:99");
	
	$("input[name=FrmIdAreaPublicacao]").change(function(){
		_SelecionarArea( $(this).val() );
	});
	$("input[name=FrmFotoArquivoSize]").change(function(){
		var size = $(this).val();
		if(size===undefined){
			return;
		}
		size = size.split(";");
		$("#imgFrmFotoArquivo").attr("width", size[0]).attr("height", size[1]).show();
	});
});