<? 
	class Imagem { 
		public $myImagemFile, $myImagemWidth, $myImagemHeight, $myImagemType, $myImagemTypes, $myImagemTemp, $myError;
		 
		public function __construct(){
			if ( ! function_exists("imagecreate") ){ die("Error: GD Library is not available."); }
			$this->setImagemTypes(Array(1 => 'GIF', 2 => 'JPG', 3 => 'PNG', 4 => 'SWF', 5 => 'PSD', 6 => 'BMP', 7 => 'TIFF', 8 => 'TIFF', 9 => 'JPC', 10 => 'JP2', 11 => 'JPX', 12 => 'JB2', 13 => 'SWC', 14 => 'IFF', 15 => 'WBMP', 16 => 'XBM'));
		} 
		public function __destruct(){} 
		 
		public function carregarImagem( $Imagem ){
			$this->setImagemFile( $Imagem );
			return $this->criarImagem();
		}
		
		public function carregarInformacoesImagem(){
			list($this->myImagemWidth,$this->myImagemHeight, $Type, $Attr) = getimagesize( $this->myImagemFile );
			$this->myImagemType = $this->myImagemTypes[$Type];
		}
		
		public function criarImagem(){
			
			$this->carregarInformacoesImagem();
			
			switch ($this->myImagemType){
				case "GIF" : { $this->myImagemTemp = imagecreatefromgif( $this->myImagemFile ); }; break;
				case "JPG" : { $this->myImagemTemp = imagecreatefromjpeg( $this->myImagemFile ); }; break;
				case "PNG" : { $this->myImagemTemp = imagecreatefrompng( $this->myImagemFile ); }; break;
				default: { die("Erro ao criar imagem..."); }; break;
			}
			
			return true;
		}
		
		public function salvarImagemByPorcentagem($TamanhoMaximo, $NameNewFile=null){
			$fator_calculo = ($this->getImagemHeight() > $this->getImagemWidth()) ? $this->getImagemHeight(): $this->getImagemWidth();
			
			$porcentagem = (($TamanhoMaximo*100)/$fator_calculo);
			
			$Height = intval((($this->getImagemHeight()*$porcentagem)/100));
			$Width = intval((($this->getImagemWidth()*$porcentagem)/100));
			
			$this->salvarImagem($Width, $Height, $NameNewFile);
		}
				
		public function salvarImagemByPorcentagemWidth($Width, $NameNewFile=null){
			
			if($Width == $this->getImagemWidth()){
				return $this->salvarImagem($this->getImagemWidth(), $this->getImagemHeight(), $NameNewFile);
			}
			
			$P = (($this->getImagemHeight()*100)/$this->getImagemWidth());
			$Height = intval(($Width*$P)/100);

			$this->salvarImagem($Width, $Height, $NameNewFile);
		}
		
		public function salvarImagemByPorcentagemHeight($Height, $NameNewFile=null){

			if($Height == $this->getImagemHeight()){
				return $this->salvarImagem($this->getImagemWidth(), $this->getImagemHeight(), $NameNewFile);
			}
			
			$P = (($this->getImagemWidth()*100)/$this->getImagemHeight());
			
			$Width = intval(($Height*$P)/100);

			$this->salvarImagem($Width, $Height, $NameNewFile);
		}		
		
		public function salvarImagemByCorte($Width, $Height, $NameNewFile=null){
			
			$src_image = $this->myImagemTemp; 
			$dst_image = null;
			
			$LW = $Width;						//LOCAL WIDTH
			$LH = $Height;						//LOCAL HEIGHT
			$IW = $this->getImagemWidth();		//IMAGEM WIDTH
			$IH = $this->getImagemHeight();		//IMAGEM HEIGHT
			
			$NIW = false; //NAO PRECISA AMPLIAR WIDTH
			$AIW = false; //AMPLIAR WIDTH
			$DIW = false; //PODE DIMINUIR WIDTH
			$NIH = false; //NAO PRECISA AMPLIAR HEIGHT
			$AIH = false; //AMPLIAR HEIGHT
			$DIH = false; //PODE DIMINUIR HIGHT
			
			if($LW == $IW){
				$NIW = true;
			}elseif($LW > $IW){
				$AIW = true;
			}elseif($LW < $IW){
				$DIW = true;
			}				
			if($LH == $IH){
				$NIH = true;
			}elseif($LH > $IH){
				$AIH = true;
			}elseif($LH < $IH){
				$DIH = true;
			}			
			
			if($NIW && $NIH){ //imagem original
				
				return $this->salvarImagem($LW, $LH, $NameNewFile);
				
			}else
			if(($NIW && $AIH) || ($DIW && $AIH)){ //amplia com fator H, corta w 
				
				$porcentagem = (($LH/$IH) * 100);
				$w_ampliada = round(($porcentagem/100)*$IW);
				$h_ampliada = round(($porcentagem/100)*$IH);
				
				$image_ampliada = imagecreatetruecolor($w_ampliada, $h_ampliada);
				imagecopyresampled ( $image_ampliada, $src_image, 0, 0, 0, 0, $w_ampliada, $h_ampliada, $this->myImagemWidth, $this->myImagemHeight);

				$x_ampliada = round(($LW-$w_ampliada)/2)*(-1);
				$y_ampliada = 0;
				
				$dst_image = imagecreatetruecolor($LW, $LH);
				imagecopy ( $dst_image, $image_ampliada, 0, 0, $x_ampliada, $y_ampliada, $w_ampliada, $h_ampliada);
				
				imagedestroy( $image_ampliada );
				
			}else
			if($NIW && $DIH){ //topo/centraliza y, corta h

				$x_ampliada = round(($IW-$LW)/2)*(-1);
				$y_ampliada = 0;
				
				$dst_image = imagecreatetruecolor($LW, $LH);
				imagecopy ( $dst_image, $src_image, 0, 0, $x_ampliada, $y_ampliada, $IW, $IH);
				
			}else
			if(($AIW && $NIH) || ($AIW && $DIH)) { //amplia com fator W, corta h
				
				$porcentagem = (($LW/$IW) * 100);
				$w_ampliada = round(($porcentagem/100)*$IW);
				$h_ampliada = round(($porcentagem/100)*$IH);

				$image_ampliada = imagecreatetruecolor($w_ampliada, $h_ampliada);
				imagecopyresampled ( $image_ampliada, $src_image, 0, 0, 0, 0, $w_ampliada, $h_ampliada, $this->myImagemWidth, $this->myImagemHeight);

				$x_ampliada = round(($LW-$w_ampliada)/2)*(-1);
				$y_ampliada = 0;
				
				$dst_image = imagecreatetruecolor($LW, $LH);
				imagecopy ( $dst_image, $image_ampliada, 0, 0, $x_ampliada, $y_ampliada, $w_ampliada, $h_ampliada);
				
				imagedestroy( $image_ampliada );
			}else
			if( ($AIW && $AIH) || ($DIW && $DIH) ){ //ampliar conforme necessidade do menor, cortar maior - se forem iguais, amplia e nao corta
													//diminuir conforme necessidade do menor, cortar maior - se forem iguais, diminui e nao corta
				
				$w_porcentagem = (($LW/$IW) * 100);
				$h_porcentagem = (($LH/$IH) * 100);
				$porcentagem = 0;
				if($w_porcentagem > $h_porcentagem){
					$porcentagem = $w_porcentagem;
				}else{
					$porcentagem = $h_porcentagem;
				}
				$w_ampliada = round(($porcentagem/100)*$IW);
				$h_ampliada = round(($porcentagem/100)*$IH);
				
				$image_ampliada = imagecreatetruecolor($w_ampliada, $h_ampliada);
				imagecopyresampled ( $image_ampliada, $src_image, 0, 0, 0, 0, $w_ampliada, $h_ampliada, $this->myImagemWidth, $this->myImagemHeight);
				
				$x_ampliada = round(($LW-$w_ampliada)/2)*(-1);
				$y_ampliada = 0;
				
				$dst_image = imagecreatetruecolor($LW, $LH);
				imagecopy ( $dst_image, $image_ampliada, 0, 0, $x_ampliada, $y_ampliada, $w_ampliada, $h_ampliada);
				
				imagedestroy( $image_ampliada );
				
			}else
			if($DIW && $NIH){ //centraliza x, corta w

				$x_ampliada = round(($LW-$IW)/2)*(-1);
				$y_ampliada = 0;
				
				$dst_image = imagecreatetruecolor($LW, $LH);
				imagecopy ( $dst_image, $src_image, 0, 0, $x_ampliada, $y_ampliada, $IW, $IH);
				
			}else{
				return $this->salvarImagemByCorte2($Width, $Height, $NameNewFile);
			}
			
			switch ($this->myImagemType){
				case "GIF" : { 
						if(!empty($NameNewFile)){ 
							imagegif($dst_image, $NameNewFile); 
						}else{ 
							header("Content-type: image/gif"); 
							imagegif($dst_image); 
						} 
				}; break;
				case "JPG" : { 
						if(!empty($NameNewFile)){ 
							imagejpeg($dst_image, $NameNewFile); 
						}else{ 
							header("Content-type: image/jpg"); 
							imagejpeg($dst_image); 
						} 
				}; break;
				case "PNG" : { 
						if(!empty($NameNewFile)){ 
							imagepng($dst_image, $NameNewFile); 
						}else{ 
							header("Content-type: image/png"); 
							imagepng($dst_image); 
						} 
				}; break;
				default: { die("Erro ao salvar imagem..."); }; break;
			}
			
			imagedestroy( $dst_image );

			return true;		
		}
		
		public function salvarImagemByCorte2($Width, $Height, $NameNewFile=null){
					
			$dst_image = null;
			$src_image = $this->myImagemTemp; 
			$src_w = $this->getImagemWidth();
			$src_h = $this->getImagemHeight();
			$dst_w = $Width;
			$dst_h = $Height; 
		
			if( ($src_h == $dst_h) && ($src_w == $dst_w)){
				return $this->salvarImagem($Width, $Height, $NameNewFile);
			}
			
			$fator_src = ($src_h < $src_w) ? $src_h : $src_w;
			$fator_dst = ($dst_h > $dst_w) ? $dst_h : $dst_w;
			
			$ampliacao = ceil(($fator_src*100)/$fator_dst);
			
			$dst_w_temp = ceil(($dst_w*$ampliacao)/100);
			$dst_h_temp = ceil(($dst_h*$ampliacao)/100);
			
			$dst_x_temp = ceil(($src_w-$dst_w_temp)/2)*(-1);
			//$dst_x_temp = 0;
			//$dst_y_temp = intval(($src_h-$dst_h_temp)/2)*(-1);
			$dst_y_temp = 0;
			
			$dst_image_temp = imagecreatetruecolor($dst_w_temp, $dst_h_temp);
			imagecopy ( $dst_image_temp, $src_image, $dst_x_temp, $dst_y_temp, 0, 0, $src_w, $src_h);
		
			$dst_image = imagecreatetruecolor($dst_w, $dst_h);
			imagecopyresampled ( $dst_image, $dst_image_temp, 0, 0, 0, 0, $dst_w, $dst_h, $dst_w_temp, $dst_h_temp);
			
			switch ($this->myImagemType){
				case "GIF" : { 
						if(!empty($NameNewFile)){ 
							imagegif($dst_image, $NameNewFile); 
						}else{ 
							header("Content-type: image/gif"); 
							imagegif($dst_image); 
						} 
				}; break;
				case "JPG" : { 
						if(!empty($NameNewFile)){ 
							imagejpeg($dst_image, $NameNewFile); 
						}else{ 
							header("Content-type: image/jpg"); 
							imagejpeg($dst_image); 
						} 
				}; break;
				case "PNG" : { 
						if(!empty($NameNewFile)){ 
							imagepng($dst_image, $NameNewFile); 
						}else{ 
							header("Content-type: image/png"); 
							imagepng($dst_image); 
						} 
				}; break;
				default: { die("Erro ao salvar imagem..."); }; break;
			}
			
			imagedestroy( $dst_image_temp );
			imagedestroy( $dst_image );

			return true;		
		}
		
		public function salvarImagem($Width, $Height, $NameNewFile=null){
			
			$NewFile = imagecreatetruecolor($Width, $Height);
			imagecopyresampled ( $NewFile, $this->myImagemTemp, 0, 0, 0, 0, $Width, $Height, $this->myImagemWidth, $this->myImagemHeight);
			
			switch ($this->myImagemType){
				case "GIF" : { 
						if(!empty($NameNewFile)){ 
							imagegif($NewFile, $NameNewFile); 
						}else{ 
							header("Content-type: image/gif"); 
							imagegif($NewFile); 
						} 
				}; break;
				case "JPG" : { 
						if(!empty($NameNewFile)){ 
							imagejpeg($NewFile, $NameNewFile, 100); 
						}else{ 
							header("Content-type: image/jpg"); 
							imagejpeg($NewFile); 
						} 
				}; break;
				case "PNG" : { 
						if(!empty($NameNewFile)){ 
							imagepng($NewFile, $NameNewFile, 100); 
						}else{ 
							header("Content-type: image/png"); 
							imagepng($NewFile); 
						} 
				}; break;
				default: { die("Erro ao salvar imagem..."); }; break;
			}
			
			imagedestroy( $NewFile );
			
			return true;
		}
		
		public function setImagemFile( $value ){ $this->myImagemFile = $value; } 
		public function getImagemFile(){ return $this->myImagemFile; } 

		public function setImagemWidth( $value ){ $this->myImagemWidth = $value; } 
		public function getImagemWidth(){ return $this->myImagemWidth; } 

		public function setImagemHeight( $value ){ $this->myImagemHeight = $value; } 
		public function getImagemHeight(){ return $this->myImagemHeight; } 

		public function setImagemType( $value ){ $this->myImagemType = $value; } 
		public function getImagemType(){ return $this->myImagemType; } 

		public function setImagemTypes( $value ){ $this->myImagemTypes = $value; } 
		public function getImagemTypes(){ return $this->myImagemTypes; } 

		public function setImagemTemp( $value ){ $this->myImagemTemp = $value; } 
		public function getImagemTemp(){ return $this->myImagemTemp; } 

		public function setError( $value ){ $this->myError = $value; } 
		public function getError(){ return $this->myError; } 

	} 
?>