<?php require_once 'index.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Arquivo</title>
	
	<link href="pekeUpload/css/themes/bootstrap/css/bootstrap.min.css" rel="stylesheet">   
	<link href="pekeUpload/css/custom.css" rel="stylesheet">   
	<script type="text/javascript" src="pekeUpload/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="pekeUpload/js/pekeUpload.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){ 
	
		var $error = function( msg ){
			$(".container-fluid").hide();
			$("#error_container").each(function(index, element) {
				$(this).find(".label").html(msg);
				$(this).show();
			});
		};
		
		var $concluir = function( arquivo ){
			$(".container-fluid").hide();
			$("#passo2").each(function(index, element) {
				$(this).find("#result_arquivo").val(arquivo);
				$(this).show();
				
				$transferir = function(){
					if(window.opener != null)
					{
						window.opener._LoadArquivo(arquivo, '<?=$_input?>');
						window.close();
					}else{
						alert("Cópia do nome do arquivo não funcionou automaticamente, copie e cole o nome do arquivo no formulário!");
					}
				}
				
				$(this).find("#result_concluir").click(function(e) {
					$transferir();
				});
				
				$transferir();
			});
		}
	
		$("#FrmArquivoFile").pekeUpload({
			btnText: "Selecionar Arquivo",
			invalidExtError: "Tipo de arquivo invalido",
			maxSize: 0,
      		sizeError: "Arquivo muito grande",
      		url: "upload.php",
			theme:'bootstrap',
			multi:false, 
			allowedExtensions:"avi|bmp|csv|cdr|psd|doc|docx|fla|flv|gif|gz|gzip|jpeg|jpg|mid|mov|mp3|mp4|mpc|mpeg|mpg|ods|odt|pdf|png|ppt|pptx|pxd|qt|ram|rar|rm|rmi|rmvb|rtf|sdc|sitd|swf|sxc|sxw|tar|tgz|tif|tiff|txt|vsd|wav|wma|wmv|xls|xlsx|zip", 
			onFileError:function(file,error){
				var result = error.split(';');
				if( result[0] == '1'){
					$concluir(result[1]);
				}else{
					$error(result[1]);
				}
			},
			data: "<?=$_module?>"
		});
	});
	</script>
  
</head>

<body>
</body>

	<div class="container-fluid" id="error_container" style="display:none">
        <div class="row-fluid">
            <div class="span12">
                <h3>Opz, alguns contratempos...</h3>
                <span class="label label-important"><?=$error?></span>
            </div>
        </div>
    </div>
	
	<div class="container-fluid" id="passo1">
		<div class="row-fluid">
			<div class="span12">
				<h3>1/2 - Enviar Arquivo</h3>
				<form name="photo" enctype="multipart/form-data" action="<?php echo $_url;?>" method="post" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="image">Selecione o Arquivo:</label>
						<div class="controls">
							<input type="file" name="FrmArquivoFile" id="FrmArquivoFile" size="200" /> 
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="container-fluid" id="passo2" style="display:none">
        <div class="row-fluid">
            <div class="span12">
                <h3>2/2 - Copiar nome Arquivo</h3>
                <p>
                	<span class="label label-warning">Caso não selecione automaticamente, copie e cole o nome da imagem abaixo:</span>
                </p>
                <form name="recorte" enctype="multipart/form-data" action="<?php echo $_url;?>" method="post" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="image">Nome do Arquivo:</label>
                        <div class="controls">
                            <input type="text" id="result_arquivo" value="<?=$frm_imagem?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="button" id="result_concluir" name="concluir" value="Concluir" class="btn btn-large btn-success" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
</html>