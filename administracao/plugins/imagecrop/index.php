<?php
/*
* Copyright (c) 2008 http://www.webmotionuk.com / http://www.webmotionuk.co.uk
* "PHP & Jquery image upload & crop"
* Date: 2008-11-21
* Ver 1.2
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
* ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
* IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, 
* PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
* INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, 
* STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF 
* THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
*/

error_reporting (E_ALL ^ E_NOTICE);
session_start(); //Do not remove this

#########################################################################################################
# CONSTANTS																								#
# You can alter the options below																		#
#########################################################################################################

$_SESSION["imagemcrop_module"] = $_module = ((!empty($_GET["module"])) ? $_GET["module"] : $_SESSION["imagemcrop_module"] );
$_SESSION["imagemcrop_width"] = $_width = ((!empty($_GET["width"])) ? $_GET["width"] : $_SESSION["imagemcrop_width"] );
$_SESSION["imagemcrop_height"] = $_height = ((!empty($_GET["height"])) ? $_GET["height"] : $_SESSION["imagemcrop_height"] );
$_SESSION["imagemcrop_prename"] = $_prename = ((!empty($_GET["prename"])) ? $_GET["prename"] : $_SESSION["imagemcrop_prename"] );
$_SESSION["imagemcrop_name"] = $_name = ((!empty($_GET["name"])) ? $_GET["name"] : $_SESSION["imagemcrop_name"] );
$_SESSION["imagemcrop_input"] = $_input = ((!empty($_GET["input"])) ? $_GET["input"] : $_SESSION["imagemcrop_input"] );
$_url = sprintf("%s?module=%s&width=%s&height=%s&prename=%s&name=%s&input=%s", $_SERVER['PHP_SELF'], $_module, $_width, $_height, $_prename, $_name, $_input);

$upload_dir = "../../../images/".$_module.""; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
$large_image_prefix = ""; 			// The prefix name to large image
$thumb_image_prefix = $_prename;			// The prefix name to the thumb image
$large_image_name = $large_image_prefix.$_name;     // New name of the large image (append the timestamp to the filename)
$thumb_image_name = $thumb_image_prefix.$_name;     // New name of the thumbnail image (append the timestamp to the filename)
$max_file = "3"; 							// Maximum file size in MB
$max_width = "940";							// Max width allowed for the large image
$thumb_width = $_width;						// Width of thumbnail image
$thumb_height = $_height;						// Height of thumbnail image
// Only one of these image types should be allowed for upload
$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
$allowed_image_ext = array_unique($allowed_image_types); // do not change this
$image_ext = "";	// initialise variable, do not change this.
foreach ($allowed_image_ext as $mime_type => $ext) {
    $image_ext.= strtoupper($ext)." ";
}

if(!empty($_GET["file"])){
	$_SESSION['user_file_ext'] = ".".strtolower(substr($_GET["file"], strrpos($_GET["file"], '.') + 1));
	$_thumb_image_location = $upload_path.$thumb_image_name.$_SESSION['user_file_ext'];
	if (file_exists($_thumb_image_location)) {
		unlink($_thumb_image_location);
	}
}

##########################################################################################################
# IMAGE FUNCTIONS																						 #
# You do not need to alter these functions																 #
##########################################################################################################
function resizeImage($image,$width,$height,$scale) {
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$image); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$image,100); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$image);  
			break;
    }
	
	chmod($image, 0777);
	return $image;
}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,100); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}

//Image Locations
$large_image_location = $upload_path.$large_image_name.$_SESSION['user_file_ext'];
$thumb_image_location = $upload_path.$thumb_image_name.$_SESSION['user_file_ext'];

//Create the upload directory with the right permissions if it doesn't exist
if(!is_dir($upload_dir)){
	mkdir($upload_dir, 0777);
	chmod($upload_dir, 0777);
}

$_file_exists = null;
foreach($allowed_image_ext as $_ext){
	$fntemp = $large_image_location.".".$_ext;
	if(file_exists($fntemp)){
		$_file_exists = array(
			"name" => $large_image_name.".".$_ext,
			"location" => $fntemp
		);
	}
}

//Check to see if any images with the same name already exist
if (file_exists($large_image_location)){
	if(file_exists($thumb_image_location)){
		$thumb_photo_exists = "<img src=\"".$upload_path.$thumb_image_name.$_SESSION['user_file_ext']."?version=".uniqid(rand(), true)."\" alt=\"Thumbnail Image\"/>";
	}else{
		$thumb_photo_exists = "";
	}
   	$large_photo_exists = "<img src=\"".$upload_path.$large_image_name.$_SESSION['user_file_ext']."?version=".uniqid(rand(), true)."\" alt=\"Large Image\"/>";
} else {
   	$large_photo_exists = "";
	$thumb_photo_exists = "";
}

if (isset($_POST["upload"])) { 
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$userfile_type = $_FILES['image']['type'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
	
	//Only process if the file is a JPG, PNG or GIF and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		
		foreach ($allowed_image_types as $mime_type => $ext) {
			//loop through the specified image types and if they match the extension then break out
			//everything is ok so go and check file size
			if($file_ext==$ext && $userfile_type==$mime_type){
				$error = "";
				break;
			}else{
				$error = "Only <strong>".$image_ext."</strong> images accepted for upload<br />";
			}
		}
		//check if the file size is above the allowed limit
		if ($userfile_size > ($max_file*1048576)) {
			$error.= "Images must be under ".$max_file."MB in size";
		}
		
	}else{
		$error= "Select an image for upload";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
			//this file could now has an unknown file extension (we hope it's one of the ones set above!)
			$large_image_location = $large_image_location.((!empty($_SESSION['user_file_ext'])) ? "" : ".".$file_ext );
			$thumb_image_location = $thumb_image_location.((!empty($_SESSION['user_file_ext'])) ? "" : ".".$file_ext );
			
			//put the file ext in the session so we know what file to look for once its uploaded
			$_SESSION['user_file_ext']=".".$file_ext;
			
			move_uploaded_file($userfile_tmp, $large_image_location);
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			//Delete the thumbnail file so the user can create a new one
			if (file_exists($thumb_image_location)) {
				unlink($thumb_image_location);
			}
		}
		//Refresh the page to show the new uploaded image
		header("location:".$_url);
		exit();
	}
}

if (isset($_POST["upload_thumbnail"]) && strlen($large_photo_exists)>0) {
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	//Reload the page again to view the thumbnail
	header("location:".$_url);
	exit();
}


if ($_GET['a']=="delete" && strlen($_GET['t'])>0){
//get the file locations 
	$large_image_location = $upload_path.$large_image_prefix.$_GET['t'];
	$thumb_image_location = $upload_path.$thumb_image_prefix.$_GET['t'];
	if (file_exists($large_image_location)) {
		unlink($large_image_location);
	}
	if (file_exists($thumb_image_location)) {
		unlink($thumb_image_location);
	}
	header("location:".$_url);
	exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Imagem</title>
	<script type="text/javascript" src="js/jquery-pack.js"></script>
	<script type="text/javascript" src="js/jquery.imgareaselect.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

	<?php
    //Only display the javacript if an image has been uploaded
    if(strlen($large_photo_exists)>0){
        $current_large_image_width = getWidth($large_image_location);
        $current_large_image_height = getHeight($large_image_location);?>
    <script type="text/javascript">
    function preview(img, selection) { 
        var scaleX = <?php echo $thumb_width;?> / selection.width; 
        var scaleY = <?php echo $thumb_height;?> / selection.height; 
        
        $('#thumbnail + div > img').css({ 
            width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
            height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
            marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
            marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
        });
        $('#x1').val(selection.x1);
        $('#y1').val(selection.y1);
        $('#x2').val(selection.x2);
        $('#y2').val(selection.y2);
        $('#w').val(selection.width);
        $('#h').val(selection.height);
    } 
    
    $(document).ready(function () { 
        $('#save_thumb').click(function() {
            var x1 = $('#x1').val();
            var y1 = $('#y1').val();
            var x2 = $('#x2').val();
            var y2 = $('#y2').val();
            var w = $('#w').val();
            var h = $('#h').val();
            if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
                alert("You must make a selection first");
                return false;
            }else{
                return true;
            }
        });
    }); 
    
    $(window).load(function () { 
        $('#thumbnail').imgAreaSelect({ aspectRatio: '1:<?php echo $thumb_height/$thumb_width;?>', onSelectChange: preview }); 
    });
    
    </script>
    <?php }?>

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
    
    <?php 
		if(strlen($large_photo_exists)>0 && strlen($thumb_photo_exists)>0){ 
			$file_export = $thumb_image_name.$_SESSION['user_file_ext'];
			$_SESSION["imagemcrop_name"] = "";
			$_SESSION['user_file_ext'] = "";
	?>
	<div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3>3/3 - Copiar nome Imagem</h3>
                <p>
                	<span class="label label-warning">Caso não selecione automaticamente, copie e cole o nome da imagem abaixo:</span>
                </p>
                <form name="recorte" enctype="multipart/form-data" action="<?php echo $_url;?>" method="post" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="image">Nome da Imagem:</label>
                        <div class="controls">
                            <input type="text" value="<?=$file_export?>" />
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
					window.opener._LoadImagem('<?=utf8_decode($file_export)?>', '<?=$_input?>');
					window.close();
				}else{
					alert("Cópia do nome da imagem não funcionou automaticamente, copie e cole o nome da imagem no formulário!");
				}
			}
     		_Transferir();
        </script>
    </div>
	<?php }else{ ?>
    
    	<?php if(strlen($large_photo_exists)>0){ ?>
        	<div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <h3>2/3 - Recortar Imagem</h3>
                       	<img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext']."?version=".uniqid(rand(), true);?>" style="float: left; margin:0px 10px 10px 0px" id="thumbnail" alt="Imagem para recorte" />
                        <div style="border:3px solid #FF0000; float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
                            <img src="<?php echo $upload_path.$large_image_name.$_SESSION['user_file_ext']."?version=".uniqid(rand(), true);?>" style="position: relative;" alt="Pré-visualização imagem recortada" />
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <form name="thumbnail" action="<?php echo $_url;?>" method="post" class="form-actions">
                            <input type="hidden" name="x1" value="" id="x1" />
                            <input type="hidden" name="y1" value="" id="y1" />
                            <input type="hidden" name="x2" value="" id="x2" />
                            <input type="hidden" name="y2" value="" id="y2" />
                            <input type="hidden" name="w" value="" id="w" />
                            <input type="hidden" name="h" value="" id="h" />
                            <input type="submit" name="upload_thumbnail" value="Salvar imagem recortada" id="save_thumb" class="btn btn-large btn-danger" />
                        </form>
                    </div>
            	</div>
        	</div>
		<?php 	}else{ ?>
        
        	<div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <h3>1/3 - Enviar Imagem</h3>
                        <form name="photo" enctype="multipart/form-data" action="<?php echo $_url;?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="image">Selecione a Imagem:</label>
                                <div class="controls">
                                    <input type="file" name="image" size="20" /> 
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
                <? if(is_array($_file_exists)){ ?>
                <div class="row-fluid" style="border-top:1px solid #CCC; padding-top:15px;">
                    <div class="span12">
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label" for="image" style="font-weight:bold;">Imagem anterior:</label>
                                <div class="controls">
                                	<a href="<?php echo $_url;?>&file=<?=$_file_exists["name"]?>" class="btn btn-success">Utilizar imagem abaixo</a>
                                </div>
                            </div>
                        </form>
                        <p>
                        	<img src="<?=$_file_exists["location"]."?version=".uniqid(rand(), true)?>" alt="Imagem anterior" />
                        </p>
                    </div>
                </div>
                <? } ?>
            </div>
        
        <?php 	} ?>
    
    <?php 	} ?>

</body>
</html>