<? 
class Artigo{ 
	 
	protected $myIdArtigo, $myIdentificador, $myIdeOrigem, $myIdArtigoArticulista, $myTitulo, $myResumo, $myTexto, $myArquivoAnexo, $myDatahora, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarArtigo( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo ". 
					   "WHERE id_artigo = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo ". 
					   "WHERE (ide_origem='".$this->getIdeOrigem()."') AND (id_artigo_articulista=".$this->getIdArtigoArticulista().") AND (titulo='".$this->getTitulo()."') AND (resumo='".$this->getResumo()."') AND (texto='".$this->getTexto()."') AND (arquivo_anexo='".$this->getArquivoAnexo()."') AND (datahora='".$this->getDatahora()."') AND (status='".$this->getStatus()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdArtigo( $dbq->valor("id_artigo") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$this->setIdArtigoArticulista( $dbq->valor("id_artigo_articulista") ); 
			$this->setTitulo( $dbq->valor("titulo") ); 
			$this->setResumo( $dbq->valor("resumo") ); 
			$this->setTexto( $dbq->valor("texto") ); 
			$this->setArquivoAnexo( $dbq->valor("arquivo_anexo") ); 
			$this->setDatahora( $dbq->valor("datahora") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarArtigo( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo ". 
					   "WHERE ide_origem = '".Current::IdeOrigem()."'"; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo ". 
					   "".$valor." "; 
			}break; 
			case 3 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return null;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		$objs = array(); 
		$i = 0; 
		 
		while( $dbq->registro() ){ 
			$obj = new Artigo(); 
			$obj->setIdArtigo( $dbq->valor("id_artigo") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$obj->setIdArtigoArticulista( $dbq->valor("id_artigo_articulista") ); 
			$obj->setTitulo( $dbq->valor("titulo") ); 
			$obj->setResumo( $dbq->valor("resumo") ); 
			$obj->setTexto( $dbq->valor("texto") ); 
			$obj->setArquivoAnexo( $dbq->valor("arquivo_anexo") ); 
			$obj->setDatahora( $dbq->valor("datahora") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarArtigoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!ArtigoAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarArtigo(4, SearchMounter::ValidateAndMounter(ArtigoAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarArtigoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarArtigo(3, SearchMounter::ValidateAndMounter(ArtigoAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirArtigo(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_artigo(identificador, ide_origem, id_artigo_articulista, titulo, resumo, texto, arquivo_anexo, datahora, status) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getIdeOrigem() )."', ".$this->getIdArtigoArticulista().", '".$this->tratarString( $this->getTitulo() )."', '".$this->tratarString( $this->getResumo() )."', '".$this->tratarString( $this->getTexto() )."', '".$this->tratarString( $this->getArquivoAnexo() )."', '".$this->tratarString( $this->getDatahora() )."', '".$this->tratarString( $this->getStatus() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarArtigo(2, ""); 
	} 
	 
	public function alterarArtigo(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET id_artigo_articulista=".$this->getIdArtigoArticulista().", titulo='".$this->tratarString( $this->getTitulo() )."', resumo='".$this->tratarString( $this->getResumo() )."', texto='".$this->tratarString( $this->getTexto() )."', arquivo_anexo='".$this->tratarString( $this->getArquivoAnexo() )."', datahora='".$this->tratarString( $this->getDatahora() )."', status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdArtigoArticulista(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET id_artigo_articulista=".$this->getIdArtigoArticulista()." ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTitulo(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET titulo='".$this->tratarString( $this->getTitulo() )."' ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoResumo(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET resumo='".$this->tratarString( $this->getResumo() )."' ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTexto(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET texto='".$this->tratarString( $this->getTexto() )."' ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoArquivoAnexo(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET arquivo_anexo='".$this->tratarString( $this->getArquivoAnexo() )."' ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDatahora(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET datahora='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_artigo ". 
			   "SET status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirArtigo(){ 
		$sql = "DELETE FROM tb_artigo ". 
			   "WHERE id_artigo = ".$this->getIdArtigo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getArtigo(){ 
		return $this; 
	} 
	 
	public function setArtigo($IdArtigo, $Identificador, $IdeOrigem, $IdArtigoArticulista, $Titulo, $Resumo, $Texto, $ArquivoAnexo, $Datahora, $Status){ 
			$this->setIdArtigo( $IdArtigo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdArtigoArticulista( $IdArtigoArticulista ); 
			$this->setTitulo( $Titulo ); 
			$this->setResumo( $Resumo ); 
			$this->setTexto( $Texto ); 
			$this->setArquivoAnexo( $ArquivoAnexo ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdArtigo( $valor ){ $this->myIdArtigo = $valor; } 
	public function getIdArtigo(){ return $this->myIdArtigo; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdeOrigem( $valor ){ $this->myIdeOrigem = $valor; } 
	public function getIdeOrigem(){ return (!empty($this->myIdeOrigem)) ? $this->myIdeOrigem : $this->myIdeOrigem = Current::IdeOrigem(); } 
 
	public function setIdArtigoArticulista( $valor ){ $this->myIdArtigoArticulista = $valor; } 
	public function getIdArtigoArticulista(){ return $this->myIdArtigoArticulista; } 
 
	public function setTitulo( $valor ){ $this->myTitulo = $valor; } 
	public function getTitulo(){ return $this->myTitulo; } 
 
	public function setResumo( $valor ){ $this->myResumo = $valor; } 
	public function getResumo(){ return $this->myResumo; } 
 
	public function setTexto( $valor ){ $this->myTexto = $valor; } 
	public function getTexto(){ return $this->myTexto; } 
 
	public function setArquivoAnexo( $valor ){ $this->myArquivoAnexo = $valor; } 
	public function getArquivoAnexo(){ return $this->myArquivoAnexo; } 
 
	public function setDatahora( $valor ){ $this->myDatahora = $valor; } 
	public function getDatahora(){ return $this->myDatahora; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>