<? 
class Emkt{ 
	 
	protected $myIdEmkt, $myIdentificador, $myTitulo, $myAssunto, $myRemetenteNome, $myRemetenteEmail, $myMensagemHtml, $myMensagemTexto, $myDatahora;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarEmkt( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt ". 
					   "WHERE id_emkt = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt ". 
					   "WHERE (titulo='".$this->getTitulo()."') AND (assunto='".$this->getAssunto()."') AND (remetente_nome='".$this->getRemetenteNome()."') AND (remetente_email='".$this->getRemetenteEmail()."') AND (mensagem_html='".$this->getMensagemHtml()."') AND (mensagem_texto='".$this->getMensagemTexto()."') AND (datahora='".$this->getDatahora()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdEmkt( $dbq->valor("id_emkt") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setTitulo( $dbq->valor("titulo") ); 
			$this->setAssunto( $dbq->valor("assunto") ); 
			$this->setRemetenteNome( $dbq->valor("remetente_nome") ); 
			$this->setRemetenteEmail( $dbq->valor("remetente_email") ); 
			$this->setMensagemHtml( $dbq->valor("mensagem_html") ); 
			$this->setMensagemTexto( $dbq->valor("mensagem_texto") ); 
			$this->setDatahora( $dbq->valor("datahora") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarEmkt( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt ". 
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
			$obj = new Emkt(); 
			$obj->setIdEmkt( $dbq->valor("id_emkt") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setTitulo( $dbq->valor("titulo") ); 
			$obj->setAssunto( $dbq->valor("assunto") ); 
			$obj->setRemetenteNome( $dbq->valor("remetente_nome") ); 
			$obj->setRemetenteEmail( $dbq->valor("remetente_email") ); 
			$obj->setMensagemHtml( $dbq->valor("mensagem_html") ); 
			$obj->setMensagemTexto( $dbq->valor("mensagem_texto") ); 
			$obj->setDatahora( $dbq->valor("datahora") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarEmktAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!EmktAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarEmkt(4, SearchMounter::ValidateAndMounter(EmktAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarEmktAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarEmkt(3, SearchMounter::ValidateAndMounter(EmktAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirEmkt(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_emkt(identificador, titulo, assunto, remetente_nome, remetente_email, mensagem_html, mensagem_texto, datahora) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getTitulo() )."', '".$this->tratarString( $this->getAssunto() )."', '".$this->tratarString( $this->getRemetenteNome() )."', '".$this->tratarString( $this->getRemetenteEmail() )."', '".$this->tratarString( $this->getMensagemHtml() )."', '".$this->tratarString( $this->getMensagemTexto() )."', '".$this->tratarString( $this->getDatahora() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarEmkt(2, ""); 
	} 
	 
	public function alterarEmkt(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET titulo='".$this->tratarString( $this->getTitulo() )."', assunto='".$this->tratarString( $this->getAssunto() )."', remetente_nome='".$this->tratarString( $this->getRemetenteNome() )."', remetente_email='".$this->tratarString( $this->getRemetenteEmail() )."', mensagem_html='".$this->tratarString( $this->getMensagemHtml() )."', mensagem_texto='".$this->tratarString( $this->getMensagemTexto() )."', datahora='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTitulo(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET titulo='".$this->tratarString( $this->getTitulo() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoAssunto(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET assunto='".$this->tratarString( $this->getAssunto() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoRemetenteNome(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET remetente_nome='".$this->tratarString( $this->getRemetenteNome() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoRemetenteEmail(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET remetente_email='".$this->tratarString( $this->getRemetenteEmail() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoMensagemHtml(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET mensagem_html='".$this->tratarString( $this->getMensagemHtml() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoMensagemTexto(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET mensagem_texto='".$this->tratarString( $this->getMensagemTexto() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDatahora(){ 
 
		$sql = "UPDATE tb_emkt ". 
			   "SET datahora='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirEmkt(){ 
		$sql = "DELETE FROM tb_emkt ". 
			   "WHERE id_emkt = ".$this->getIdEmkt(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getEmkt(){ 
		return $this; 
	} 
	 
	public function setEmkt($IdEmkt, $Identificador, $Titulo, $Assunto, $RemetenteNome, $RemetenteEmail, $MensagemHtml, $MensagemTexto, $Datahora){ 
			$this->setIdEmkt( $IdEmkt ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setAssunto( $Assunto ); 
			$this->setRemetenteNome( $RemetenteNome ); 
			$this->setRemetenteEmail( $RemetenteEmail ); 
			$this->setMensagemHtml( $MensagemHtml ); 
			$this->setMensagemTexto( $MensagemTexto ); 
			$this->setDatahora( $Datahora ); 
	} 
 
	public function setIdEmkt( $valor ){ $this->myIdEmkt = $valor; } 
	public function getIdEmkt(){ return $this->myIdEmkt; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setTitulo( $valor ){ $this->myTitulo = $valor; } 
	public function getTitulo(){ return $this->myTitulo; } 
 
	public function setAssunto( $valor ){ $this->myAssunto = $valor; } 
	public function getAssunto(){ return $this->myAssunto; } 
 
	public function setRemetenteNome( $valor ){ $this->myRemetenteNome = $valor; } 
	public function getRemetenteNome(){ return $this->myRemetenteNome; } 
 
	public function setRemetenteEmail( $valor ){ $this->myRemetenteEmail = $valor; } 
	public function getRemetenteEmail(){ return $this->myRemetenteEmail; } 
 
	public function setMensagemHtml( $valor ){ $this->myMensagemHtml = $valor; } 
	public function getMensagemHtml(){ return $this->myMensagemHtml; } 
 
	public function setMensagemTexto( $valor ){ $this->myMensagemTexto = $valor; } 
	public function getMensagemTexto(){ return $this->myMensagemTexto; } 
 
	public function setDatahora( $valor ){ $this->myDatahora = $valor; } 
	public function getDatahora(){ return $this->myDatahora; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>