<?php
	class Upload { 
		protected $myFile, $myName, $myType, $mySize, $myTmpName, $myError, $myCaminho;
		 
		public function __construct(){} 
		public function __destruct(){} 
		
		public function SendFile($file, $caminho, $type){
			$this->setFile( $file );
			
			if( $this->Validar($type) ){
				return $this->Save($caminho);	
			}else {
				return false;
			}
		}
		
		public function Save( $Caminho ){
			$this->setCaminho( $Caminho );
			return move_uploaded_file($this->getTmpName(), $Caminho.$this->getName());
		}
		
		public function Validar($type){
			//Word - application/msword
			//ZIP  - application/x-zip-compressed
			//GZIP - application/x-gzip-compressed
			//PDF  - application/pdf
			//EXEL - application/vnd.ms-excel
			//PowrPoint - application/vnd.ms-powerpoint
			//Texto - text/plain
			//Html  - text/html
			
			switch ($type){
				case 1:{ //Completo
					$validacao = "^(image\/(pjpeg|jpeg|png|gif|bmp))|".
								 "(application\/(msword|x-zip-compressed|x-gzip-compressed|pdf|vnd.ms-excel|vnd.ms-powerpoint))|".
								 "(text\/(plain|html))$";
				}break;
				case 2:{ //Imagens
					$validacao = "^(image\/(pjpeg|jpeg|png|gif|bmp))";
				}break;
				case 3:{
					return true;
				}break;
				case 4:{ //PDF
					$validacao = "^(application\/(pdf))";
				}break;
				default:{
					return false;
				}
			}
						 
			return eregi($validacao, $this->getType());
		}
		
		public function tratarNome( $str ){
			$str = strtolower($str);
			$str = eregi_replace(" ", "_", $str);
			$str = eregi_replace("[\^~%#@&*°×;><,=\$¬§÷´`]", "_", $str);
			$str = eregi_replace("[באדגÁÀÃÂ]", "a", $str);
			$str = eregi_replace("[יטךÉÈÊ]", "e", $str);
			$str = eregi_replace("[םלמÍÌÎ]", "i", $str);
			$str = eregi_replace("[ףעץפÓÒÕÔ]", "o", $str);
			$str = eregi_replace("[תשûÚÙÛ]", "u", $str);
			$str = eregi_replace("[חÇ]", "c", $str);
			
			$str = eregi_replace("[^a-z0-9\.]", "_", $str);
			$str = preg_replace("{(_)+}", "_", $str);
			
			return $str;
		}
		
		public function setFile( $file ){ 
			$this->myFile = $file; 
			$this->setName( $this->tratarNome( $file["name"] ) );
			$this->setType( $file["type"] );
			$this->setSize( $file["size"] );
			$this->setTmpName( $file["tmp_name"] );
			$this->setError( $file["error"] );
		} 
		public function getFile(){ return $this->myFile; } 

		public function setName( $value ){ $this->myName = $value; } 
		public function getName(){ return $this->myName; } 

		public function setType( $value ){ $this->myType = $value; } 
		public function getType(){ return $this->myType; } 

		public function setSize( $value ){ $this->mySize = $value; } 
		public function getSize(){ return $this->mySize; } 

		public function setTmpName( $value ){ $this->myTmpName = $value; } 
		public function getTmpName(){ return $this->myTmpName; } 

		public function setError( $value ){ $this->myError = $value; } 
		public function getError(){ return $this->myError; } 
		
		public function setCaminho( $value ){ $this->myCaminho = $value; } 
		public function getCaminho(){ return $this->myCaminho; } 
	} 
?>