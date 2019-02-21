<? 
	class MultimidiaManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarMultimidia( $tipo, $valor ){ 
			$value = array();
			$myObj = new Multimidia();
			if( $myObj->buscarMultimidia( $tipo, $valor ) ){
				$value[0] = $myObj->getIdMultimidia();	
				$value["id_multimidia"] = $myObj->getIdMultimidia();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getDescricao();	
				$value["descricao"] = $myObj->getDescricao();	
				$value[5] = $myObj->getArquivo();	
				$value["arquivo"] = $myObj->getArquivo();	
				$value[6] = $myObj->getEmbed();	
				$value["embed"] = $myObj->getEmbed();	
				$value[7] = $myObj->getWidth();	
				$value["width"] = $myObj->getWidth();	
				$value[8] = $myObj->getHeight();	
				$value["height"] = $myObj->getHeight();	
				$value[9] = $myObj->getDestaque();	
				$value["destaque"] = $myObj->getDestaque();	
				$value[10] = $myObj->getImagem();	
				$value["imagem"] = $myObj->getImagem();	
				$value[11] = $myObj->getTipo();	
				$value["tipo"] = $myObj->getTipo();	
				$value[12] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[13] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
				
				$value["Player"] = MultimidiaTipo::PlayerByMultimidia($myObj);
				$value["link"] = Url::Multimidia($myObj->getIdMultimidia(), $myObj->getIdentificador(), $myObj->getNome());
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarMultimidia( $tipo, $valor ){ 
			$value = array();
			$myObj = new Multimidia();
			$vmyObj = $myObj->consultarMultimidia( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdMultimidia();
				$value[$i]["id_multimidia"] = $vmyObj[$i]->getIdMultimidia();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getDescricao();
				$value[$i]["descricao"] = $vmyObj[$i]->getDescricao();
				$value[$i][5] = $vmyObj[$i]->getArquivo();
				$value[$i]["arquivo"] = $vmyObj[$i]->getArquivo();
				$value[$i][6] = $vmyObj[$i]->getEmbed();
				$value[$i]["embed"] = $vmyObj[$i]->getEmbed();
				$value[$i][7] = $vmyObj[$i]->getWidth();
				$value[$i]["width"] = $vmyObj[$i]->getWidth();
				$value[$i][8] = $vmyObj[$i]->getHeight();
				$value[$i]["height"] = $vmyObj[$i]->getHeight();
				$value[$i][9] = $vmyObj[$i]->getDestaque();
				$value[$i]["destaque"] = $vmyObj[$i]->getDestaque();
				$value[$i][10] = $vmyObj[$i]->getImagem();
				$value[$i]["imagem"] = $vmyObj[$i]->getImagem();
				$value[$i][11] = $vmyObj[$i]->getTipo();
				$value[$i]["tipo"] = $vmyObj[$i]->getTipo();
				$value[$i][12] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][13] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
				
				$value[$i]["link"] = Url::Multimidia($vmyObj[$i]->getIdMultimidia(), $vmyObj[$i]->getIdentificador(), $vmyObj[$i]->getNome());
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarMultimidiaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new Multimidia();
			if( $myObj->buscarMultimidiaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdMultimidia();	
				$value["id_multimidia"] = $myObj->getIdMultimidia();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getDescricao();	
				$value["descricao"] = $myObj->getDescricao();	
				$value[5] = $myObj->getArquivo();	
				$value["arquivo"] = $myObj->getArquivo();	
				$value[6] = $myObj->getEmbed();	
				$value["embed"] = $myObj->getEmbed();	
				$value[7] = $myObj->getWidth();	
				$value["width"] = $myObj->getWidth();	
				$value[8] = $myObj->getHeight();	
				$value["height"] = $myObj->getHeight();	
				$value[9] = $myObj->getDestaque();	
				$value["destaque"] = $myObj->getDestaque();	
				$value[10] = $myObj->getImagem();	
				$value["imagem"] = $myObj->getImagem();	
				$value[11] = $myObj->getTipo();	
				$value["tipo"] = $myObj->getTipo();	
				$value[12] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[13] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarMultimidiaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new Multimidia();
			$vmyObj = $myObj->consultarMultimidiaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdMultimidia();
				$value[$i]["id_multimidia"] = $vmyObj[$i]->getIdMultimidia();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getDescricao();
				$value[$i]["descricao"] = $vmyObj[$i]->getDescricao();
				$value[$i][5] = $vmyObj[$i]->getArquivo();
				$value[$i]["arquivo"] = $vmyObj[$i]->getArquivo();
				$value[$i][6] = $vmyObj[$i]->getEmbed();
				$value[$i]["embed"] = $vmyObj[$i]->getEmbed();
				$value[$i][7] = $vmyObj[$i]->getWidth();
				$value[$i]["width"] = $vmyObj[$i]->getWidth();
				$value[$i][8] = $vmyObj[$i]->getHeight();
				$value[$i]["height"] = $vmyObj[$i]->getHeight();
				$value[$i][9] = $vmyObj[$i]->getDestaque();
				$value[$i]["destaque"] = $vmyObj[$i]->getDestaque();
				$value[$i][10] = $vmyObj[$i]->getImagem();
				$value[$i]["imagem"] = $vmyObj[$i]->getImagem();
				$value[$i][11] = $vmyObj[$i]->getTipo();
				$value[$i]["tipo"] = $vmyObj[$i]->getTipo();
				$value[$i][12] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][13] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirMultimidia($myIdMultimidia, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myArquivo, $myEmbed, $myWidth, $myHeight, $myDestaque, $myImagem, $myTipo, $myDatahora, $myStatus){
			$myObj = new Multimidia();
			$myObj->setMultimidia($myIdMultimidia, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myArquivo, $myEmbed, $myWidth, $myHeight, $myDestaque, $myImagem, $myTipo, $myDatahora, $myStatus);
			return $myObj->inserirMultimidia();
		}

		public static function alterarMultimidia($myIdMultimidia, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myArquivo, $myEmbed, $myWidth, $myHeight, $myDestaque, $myImagem, $myTipo, $myDatahora, $myStatus){
			$myObj = new Multimidia();
			$myObj->setMultimidia($myIdMultimidia, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myArquivo, $myEmbed, $myWidth, $myHeight, $myDestaque, $myImagem, $myTipo, $myDatahora, $myStatus);
			return $myObj->alterarMultimidia();
		}

		public static function alterarAtributoIdentificador($myIdMultimidia, $myIdentificador){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setIdentificador($myIdentificador);
			return $myObj->alterarAtributoIdentificador();
		}

		public static function alterarAtributoIdeOrigem($myIdMultimidia, $myIdeOrigem){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setIdeOrigem($myIdeOrigem);
			return $myObj->alterarAtributoIdeOrigem();
		}

		public static function alterarAtributoNome($myIdMultimidia, $myNome){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoDescricao($myIdMultimidia, $myDescricao){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setDescricao($myDescricao);
			return $myObj->alterarAtributoDescricao();
		}

		public static function alterarAtributoArquivo($myIdMultimidia, $myArquivo){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setArquivo($myArquivo);
			return $myObj->alterarAtributoArquivo();
		}

		public static function alterarAtributoEmbed($myIdMultimidia, $myEmbed){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setEmbed($myEmbed);
			return $myObj->alterarAtributoEmbed();
		}

		public static function alterarAtributoWidth($myIdMultimidia, $myWidth){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setWidth($myWidth);
			return $myObj->alterarAtributoWidth();
		}

		public static function alterarAtributoHeight($myIdMultimidia, $myHeight){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setHeight($myHeight);
			return $myObj->alterarAtributoHeight();
		}

		public static function alterarAtributoDestaque($myIdMultimidia, $myDestaque){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setDestaque($myDestaque);
			return $myObj->alterarAtributoDestaque();
		}

		public static function alterarAtributoImagem($myIdMultimidia, $myImagem){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setImagem($myImagem);
			return $myObj->alterarAtributoImagem();
		}

		public static function alterarAtributoTipo($myIdMultimidia, $myTipo){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setTipo($myTipo);
			return $myObj->alterarAtributoTipo();
		}

		public static function alterarAtributoDatahora($myIdMultimidia, $myDatahora){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setDatahora($myDatahora);
			return $myObj->alterarAtributoDatahora();
		}

		public static function alterarAtributoStatus($myIdMultimidia, $myStatus){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirMultimidia($myIdMultimidia){
			$myObj = new Multimidia();
			$myObj->setIdMultimidia($myIdMultimidia);
			return $myObj->excluirMultimidia();
		}
		
		public static function ListarArquivos($dir = "../files/multimidia/"){
			
			$templates = array();
			$i=0;
			
		    if ($dh = opendir($dir)) {
		        while (($file = readdir($dh)) !== false) {
		        	if(eregi("(.)+((\.flv)|(\.wmv)|(\.mp3)|(\.wma))$", $file)){
		        		$templates[$i++] = trim($file);
		        	}
		        }
		        closedir($dh);
		    }
		    
		    //natcasesort($templates);
		    rsort($templates);
		    
			return $templates;
		}

		public static function MultimidiasByTipo( $Tipo ){
			$sql = "SELECT 
					  tb_multimidia.*
					FROM
					  tb_multimidia
					WHERE
					  tb_multimidia.`status` = 1 AND 
					  tb_multimidia.tipo IN ($Tipo)
					ORDER BY
					  tb_multimidia.datahora DESC";
			
			return MultimidiaManage::consultarMultimidia(3, $sql);
		}		
		
		public static function MultimidiasByTipoMais( $Tipo, $Limit=5, $NotIn=0 ){
			$sql = "SELECT 
					  tb_multimidia.*
					FROM
					  tb_multimidia
					WHERE
					  tb_multimidia.`status` = 1 AND 
					  tb_multimidia.tipo = $Tipo AND 
					  tb_multimidia.id_multimidia NOT IN($NotIn)
					ORDER BY
					  tb_multimidia.datahora DESC
					LIMIT $Limit";
			
			return MultimidiaManage::consultarMultimidia(3, $sql);
		}
		
		public static function DestaqueVideo( $IdeOrigem = "" ){
			$sql = "SELECT 
					  tb_multimidia.*
					FROM
					  tb_multimidia
					WHERE
					  ".((!empty($IdeOrigem)) ? "tb_multimidia.`ide_origem` = '$IdeOrigem' AND " : "" )."
					  tb_multimidia.tipo <> ".MultimidiaTipo::Audio()." AND 
					  tb_multimidia.`status` = 1 AND 
					  tb_multimidia.destaque = 1 
					ORDER BY
					  tb_multimidia.datahora DESC";
			
			return MultimidiaManage::buscarMultimidia(4, $sql);
		}
		
		public static function Videos( $Limit=5, $NotIn=0 ){
			$sql = "SELECT 
					  tb_multimidia.*
					FROM
					  tb_multimidia
					WHERE
					  tb_multimidia.`status` = 1 AND 
					  tb_multimidia.tipo <> ".MultimidiaTipo::Audio()." AND 
					  tb_multimidia.id_multimidia NOT IN($NotIn)
					ORDER BY
					  tb_multimidia.datahora DESC
					LIMIT $Limit";
			
			return MultimidiaManage::consultarMultimidia(3, $sql);
		}
		
		public static function DestaqueAudio( $IdeOrigem = "" ){
			$sql = "SELECT 
					  tb_multimidia.*
					FROM
					  tb_multimidia
					WHERE
					  ".((!empty($IdeOrigem)) ? "tb_multimidia.`ide_origem` = '$IdeOrigem' AND " : "" )."
					  tb_multimidia.tipo = ".MultimidiaTipo::Audio()." AND 
					  tb_multimidia.`status` = 1 AND 
					  tb_multimidia.destaque = 1 
					ORDER BY
					  tb_multimidia.datahora DESC";
			
			return MultimidiaManage::buscarMultimidia(4, $sql);
		}

	} 
?>