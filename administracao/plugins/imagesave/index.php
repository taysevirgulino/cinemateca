<?php require_once 'index.inc.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Imagem</title>
	<script type="text/javascript" src="js/jquery-pack.js"></script>
	<script type="text/javascript" src="js/jquery.imgareaselect.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
</body>

	<?php if(strlen($error)>0){ ?>
	<div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3>Opz, alguns contratempos...</h3>
                <span class="label label-important"><?=$error?></span>
            </div>
        </div>
    </div>
	<?php } ?>
	
	<?php if(strlen($frm_imagem)<=0){ ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<h3>1/2 - Enviar Imagem</h3>
				<form name="photo" enctype="multipart/form-data" action="<?php echo $_url;?>" method="post" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="image">Selecione a Imagem:</label>
						<div class="controls">
							<input type="file" name="FrmImagemFile" id="FrmImagemFile" size="200" /> 
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<input type="submit" name="upload" value="Enviar para Servidor" class="btn btn-large btn-primary" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php }else{ ?>
	<div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3>2/2 - Copiar nome Imagem</h3>
                <p>
                	<span class="label label-warning">Caso não selecione automaticamente, copie e cole o nome da imagem abaixo:</span>
                </p>
                <form name="recorte" enctype="multipart/form-data" action="<?php echo $_url;?>" method="post" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="image">Nome da Imagem:</label>
                        <div class="controls">
                            <input type="text" value="<?=$frm_imagem?>" />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="button" name="concluir" value="Concluir" class="btn btn-large btn-success" onClick="javascript:_Transferir();" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="application/javascript">
			function _Transferir(){
				if(window.opener != null)
				{
					window.opener._LoadImagem('<?=utf8_decode($frm_imagem)?>', '<?=$_input?>');
					window.close();
				}else{
					alert("Cópia do nome da imagem não funcionou automaticamente, copie e cole o nome da imagem no formulário!");
				}
			}
     		_Transferir();
        </script>
    </div>
	<?php } ?>
	
</html>