<? 
class Multimidia{ 
	 
	protected $myIdMultimidia, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myArquivo, $myEmbed, $myWidth, $myHeight, $myDestaque, $myImagem, $myTipo, $myDatahora, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarMultimidia( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_multimidia ". 
					   "WHERE `id_multimidia` = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_multimidia ". 
					   "WHERE (`identificador`='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_multimidia ". 
					   "WHERE (`ide_origem`='".$this->getIdeOrigem()."') AND (`nome`='".$this->getNome()."') AND (`descricao`='".$this->getDescricao()."') AND (`arquivo`='".$this->getArquivo()."') AND (`embed`='".$this->getEmbed()."') AND (`width`='".$this->getWidth()."') AND (`height`='".$this->getHeight()."') AND (`destaque`='".$this->getDestaque()."') AND (`imagem`='".$this->getImagem()."') AND (`tipo`='".$this->getTipo()."') AND (`datahora`='".$this->getDatahora()."') AND (`status`='".$this->getStatus()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdMultimidia( $dbq->valor("id_multimidia") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setDescricao( $dbq->valor("descricao") ); 
			$this->setArquivo( $dbq->valor("arquivo") ); 
			$this->setEmbed( $dbq->valor("embed") ); 
			$this->setWidth( $dbq->valor("width") ); 
			$this->setHeight( $dbq->valor("height") ); 
			$this->setDestaque( $dbq->valor("destaque") ); 
			$this->setImagem( $dbq->valor("imagem") ); 
			$this->setTipo( $dbq->valor("tipo") ); 
			$this->setDatahora( $dbq->valor("datahora") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarMultimidia( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_multimidia ". 
					   "WHERE ide_origem = '".Current::IdeOrigem()."'"; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_multimidia ". 
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
			$obj = new Multimidia(); 
			$obj->setIdMultimidia( $dbq->valor("id_multimidia") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setDescricao( $dbq->valor("descricao") ); 
			$obj->setArquivo( $dbq->valor("arquivo") ); 
			$obj->setEmbed( $dbq->valor("embed") ); 
			$obj->setWidth( $dbq->valor("width") ); 
			$obj->setHeight( $dbq->valor("height") ); 
			$obj->setDestaque( $dbq->valor("destaque") ); 
			$obj->setImagem( $dbq->valor("imagem") ); 
			$obj->setTipo( $dbq->valor("tipo") ); 
			$obj->setDatahora( $dbq->valor("datahora") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarMultimidiaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!MultimidiaAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarMultimidia(4, SearchMounter::ValidateAndMounter(MultimidiaAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarMultimidiaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarMultimidia(3, SearchMounter::ValidateAndMounter(MultimidiaAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirMultimidia(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_multimidia(`identificador`, `ide_origem`, `nome`, `descricao`, `arquivo`, `embed`, `width`, `height`, `destaque`, `imagem`, `tipo`, `datahora`, `status`) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getIdeOrigem() )."', '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getDescricao() )."', '".$this->tratarString( $this->getArquivo() )."', '".$this->tratarString( $this->getEmbed() )."', '".$this->tratarString( $this->getWidth() )."', '".$this->tratarString( $this->getHeight() )."', '".$this->tratarString( $this->getDestaque() )."', '".$this->tratarString( $this->getImagem() )."', '".$this->tratarString( $this->getTipo() )."', '".$this->tratarString( $this->getDatahora() )."', '".$this->tratarString( $this->getStatus() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarMultimidia(2, ""); 
	} 
	 
	public function alterarMultimidia(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `ide_origem`='".$this->tratarString( $this->getIdeOrigem() )."', `nome`='".$this->tratarString( $this->getNome() )."', `descricao`='".$this->tratarString( $this->getDescricao() )."', `arquivo`='".$this->tratarString( $this->getArquivo() )."', `embed`='".$this->tratarString( $this->getEmbed() )."', `width`='".$this->tratarString( $this->getWidth() )."', `height`='".$this->tratarString( $this->getHeight() )."', `destaque`='".$this->tratarString( $this->getDestaque() )."', `imagem`='".$this->tratarString( $this->getImagem() )."', `tipo`='".$this->tratarString( $this->getTipo() )."', `datahora`='".$this->tratarString( $this->getDatahora() )."', `status`='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `nome`='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDescricao(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `descricao`='".$this->tratarString( $this->getDescricao() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoArquivo(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `arquivo`='".$this->tratarString( $this->getArquivo() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoEmbed(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `embed`='".$this->tratarString( $this->getEmbed() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoWidth(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `width`='".$this->tratarString( $this->getWidth() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoHeight(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `height`='".$this->tratarString( $this->getHeight() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDestaque(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `destaque`='".$this->tratarString( $this->getDestaque() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoImagem(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `imagem`='".$this->tratarString( $this->getImagem() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTipo(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `tipo`='".$this->tratarString( $this->getTipo() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDatahora(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `datahora`='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_multimidia ". 
			   "SET `status`='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE `id_multimidia` = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirMultimidia(){ 
		$sql = "DELETE FROM tb_multimidia ". 
			   "WHERE id_multimidia = ".$this->getIdMultimidia(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getMultimidia(){ 
		return $this; 
	} 
	 
	public function setMultimidia($IdMultimidia, $Identificador, $IdeOrigem, $Nome, $Descricao, $Arquivo, $Embed, $Width, $Height, $Destaque, $Imagem, $Tipo, $Datahora, $Status){ 
			$this->setIdMultimidia( $IdMultimidia ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setNome( $Nome ); 
			$this->setDescricao( $Descricao ); 
			$this->setArquivo( $Arquivo ); 
			$this->setEmbed( $Embed ); 
			$this->setWidth( $Width ); 
			$this->setHeight( $Height ); 
			$this->setDestaque( $Destaque ); 
			$this->setImagem( $Imagem ); 
			$this->setTipo( $Tipo ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdMultimidia( $valor ){ $this->myIdMultimidia = $valor; } 
	public function getIdMultimidia(){ return $this->myIdMultimidia; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdeOrigem( $valor ){ $this->myIdeOrigem = $valor; } 
	public function getIdeOrigem(){ return (!empty($this->myIdeOrigem)) ? $this->myIdeOrigem : $this->myIdeOrigem = Current::IdeOrigem(); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setDescricao( $valor ){ $this->myDescricao = $valor; } 
	public function getDescricao(){ return $this->myDescricao; } 
 
	public function setArquivo( $valor ){ $this->myArquivo = $valor; } 
	public function getArquivo(){ return $this->myArquivo; } 
 
	public function setEmbed( $valor ){ $this->myEmbed = $valor; } 
	public function getEmbed(){ return $this->myEmbed; } 
 
	public function setWidth( $valor ){ $this->myWidth = $valor; } 
	public function getWidth(){ return $this->myWidth; } 
 
	public function setHeight( $valor ){ $this->myHeight = $valor; } 
	public function getHeight(){ return $this->myHeight; } 
 
	public function setDestaque( $valor ){ $this->myDestaque = $valor; } 
	public function getDestaque(){ return $this->myDestaque; } 
 
	public function setImagem( $valor ){ $this->myImagem = $valor; } 
	public function getImagem(){ return $this->myImagem; } 
 
	public function setTipo( $valor ){ $this->myTipo = $valor; } 
	public function getTipo(){ return $this->myTipo; } 
 
	public function setDatahora( $valor ){ $this->myDatahora = $valor; } 
	public function getDatahora(){ return $this->myDatahora; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>