<? 
	class ArtigoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarArtigo( $tipo, $valor ){ 
			$value = array();
			$myObj = new Artigo();
			if( $myObj->buscarArtigo( $tipo, $valor ) ){
				$value[0] = $myObj->getIdArtigo();	
				$value["id_artigo"] = $myObj->getIdArtigo();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getIdArtigoArticulista();	
				$value["id_artigo_articulista"] = $myObj->getIdArtigoArticulista();	
				$value[4] = $myObj->getTitulo();	
				$value["titulo"] = $myObj->getTitulo();	
				$value[5] = $myObj->getResumo();	
				$value["resumo"] = $myObj->getResumo();	
				$value[6] = $myObj->getTexto();	
				$value["texto"] = $myObj->getTexto();	
				$value[7] = $myObj->getArquivoAnexo();	
				$value["arquivo_anexo"] = $myObj->getArquivoAnexo();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[9] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarArtigo( $tipo, $valor ){ 
			$value = array();
			$myObj = new Artigo();
			$vmyObj = $myObj->consultarArtigo( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdArtigo();
				$value[$i]["id_artigo"] = $vmyObj[$i]->getIdArtigo();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i]["id_artigo_articulista"] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i][4] = $vmyObj[$i]->getTitulo();
				$value[$i]["titulo"] = $vmyObj[$i]->getTitulo();
				$value[$i][5] = $vmyObj[$i]->getResumo();
				$value[$i]["resumo"] = $vmyObj[$i]->getResumo();
				$value[$i][6] = $vmyObj[$i]->getTexto();
				$value[$i]["texto"] = $vmyObj[$i]->getTexto();
				$value[$i][7] = $vmyObj[$i]->getArquivoAnexo();
				$value[$i]["arquivo_anexo"] = $vmyObj[$i]->getArquivoAnexo();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][9] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
				
				$value[$i]["link"] = Url::Artigo($vmyObj[$i]->getIdArtigo(), $vmyObj[$i]->getIdentificador(), $vmyObj[$i]->getTitulo());
				$value[$i]["Articulista"] = ArtigoArticulistaManage::buscarArtigoArticulista(1, $vmyObj[$i]->getIdArtigoArticulista());
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarArtigoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new Artigo();
			if( $myObj->buscarArtigoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdArtigo();	
				$value["id_artigo"] = $myObj->getIdArtigo();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getIdArtigoArticulista();	
				$value["id_artigo_articulista"] = $myObj->getIdArtigoArticulista();	
				$value[4] = $myObj->getTitulo();	
				$value["titulo"] = $myObj->getTitulo();	
				$value[5] = $myObj->getResumo();	
				$value["resumo"] = $myObj->getResumo();	
				$value[6] = $myObj->getTexto();	
				$value["texto"] = $myObj->getTexto();	
				$value[7] = $myObj->getArquivoAnexo();	
				$value["arquivo_anexo"] = $myObj->getArquivoAnexo();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[9] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarArtigoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new Artigo();
			$vmyObj = $myObj->consultarArtigoAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdArtigo();
				$value[$i]["id_artigo"] = $vmyObj[$i]->getIdArtigo();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i]["id_artigo_articulista"] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i][4] = $vmyObj[$i]->getTitulo();
				$value[$i]["titulo"] = $vmyObj[$i]->getTitulo();
				$value[$i][5] = $vmyObj[$i]->getResumo();
				$value[$i]["resumo"] = $vmyObj[$i]->getResumo();
				$value[$i][6] = $vmyObj[$i]->getTexto();
				$value[$i]["texto"] = $vmyObj[$i]->getTexto();
				$value[$i][7] = $vmyObj[$i]->getArquivoAnexo();
				$value[$i]["arquivo_anexo"] = $vmyObj[$i]->getArquivoAnexo();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][9] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirArtigo($myIdArtigo, $myIdentificador, $myIdeOrigem, $myIdArtigoArticulista, $myTitulo, $myResumo, $myTexto, $myArquivoAnexo, $myDatahora, $myStatus){
			$myObj = new Artigo();
			$myObj->setArtigo($myIdArtigo, $myIdentificador, $myIdeOrigem, $myIdArtigoArticulista, $myTitulo, $myResumo, $myTexto, $myArquivoAnexo, $myDatahora, $myStatus);
			return $myObj->inserirArtigo();
		}

		public static function alterarArtigo($myIdArtigo, $myIdentificador, $myIdeOrigem, $myIdArtigoArticulista, $myTitulo, $myResumo, $myTexto, $myArquivoAnexo, $myDatahora, $myStatus){
			$myObj = new Artigo();
			$myObj->setArtigo($myIdArtigo, $myIdentificador, $myIdeOrigem, $myIdArtigoArticulista, $myTitulo, $myResumo, $myTexto, $myArquivoAnexo, $myDatahora, $myStatus);
			return $myObj->alterarArtigo();
		}

		public static function alterarAtributoIdeOrigem($myIdArtigo, $myIdeOrigem){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setIdeOrigem($myIdeOrigem);
			return $myObj->alterarAtributoIdeOrigem();
		}

		public static function alterarAtributoIdArtigoArticulista($myIdArtigo, $myIdArtigoArticulista){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			return $myObj->alterarAtributoIdArtigoArticulista();
		}

		public static function alterarAtributoTitulo($myIdArtigo, $myTitulo){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setTitulo($myTitulo);
			return $myObj->alterarAtributoTitulo();
		}

		public static function alterarAtributoResumo($myIdArtigo, $myResumo){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setResumo($myResumo);
			return $myObj->alterarAtributoResumo();
		}

		public static function alterarAtributoTexto($myIdArtigo, $myTexto){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setTexto($myTexto);
			return $myObj->alterarAtributoTexto();
		}

		public static function alterarAtributoArquivoAnexo($myIdArtigo, $myArquivoAnexo){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setArquivoAnexo($myArquivoAnexo);
			return $myObj->alterarAtributoArquivoAnexo();
		}

		public static function alterarAtributoDatahora($myIdArtigo, $myDatahora){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setDatahora($myDatahora);
			return $myObj->alterarAtributoDatahora();
		}

		public static function alterarAtributoStatus($myIdArtigo, $myStatus){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirArtigo($myIdArtigo){
			$myObj = new Artigo();
			$myObj->setIdArtigo($myIdArtigo);
			return $myObj->excluirArtigo();
		}
		
		public static function ArtigosByChave($Chave, $DataInicial, $DataFinal){
			
			$expData = "";
			if(Validacao::isData($DataInicial) && Validacao::isData($DataFinal)){
				$expData = " (DAY(`tb_artigo`.datahora) >= ".System::FormatarData($DataInicial, "d")." AND
							  MONTH(`tb_artigo`.datahora) >= ".System::FormatarData($DataInicial, "m")." AND
							  YEAR(`tb_artigo`.datahora) >= ".System::FormatarData($DataInicial, "Y").") AND
							  (DAY(`tb_artigo`.datahora) <= ".System::FormatarData($DataFinal, "d")." AND
							  MONTH(`tb_artigo`.datahora) <= ".System::FormatarData($DataFinal, "m")." AND
							  YEAR(`tb_artigo`.datahora) <= ".System::FormatarData($DataFinal, "Y").") AND";
			}
			
			if(empty($Chave)){
				$Chave = "%";
			}
			
			$sql = "SELECT *
					FROM
					  tb_artigo
					WHERE
					  $expData
					  (tb_artigo.`status` = 1) AND 
					  (tb_artigo.titulo LIKE '%$Chave%' OR tb_artigo.texto LIKE '%$Chave%')
					ORDER BY datahora DESC";
			
			return ArtigoManage::consultarArtigo(3, $sql);
		}	
		
		public static function ArtigosByMais( $NotIn = 0, $Limit = 5 ){
			$sql = "SELECT 
					  `tb_artigo`.*
					FROM
					  `tb_artigo`
					WHERE
					  `tb_artigo`.`status` = 1 AND 
					  `tb_artigo`.id_artigo NOT IN($NotIn) 
					ORDER BY
					  `tb_artigo`.datahora DESC
					LIMIT $Limit";
			
			return ArtigoManage::consultarArtigo(3, $sql);
		}

	} 
?>