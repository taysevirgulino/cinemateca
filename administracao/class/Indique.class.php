<? 
class Indique{ 
	 
	protected $myIdIndique, $myIdentificador, $myIdeOrigem, $myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail, $myIp, $mySessao, $myDatahora;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarIndique( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_indique ". 
					   "WHERE id_indique = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_indique ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_indique ". 
					   "WHERE (ide_origem='".$this->getIdeOrigem()."') AND (remetente_nome='".$this->getRemetenteNome()."') AND (remetente_email='".$this->getRemetenteEmail()."') AND (destinatario_nome='".$this->getDestinatarioNome()."') AND (destinatario_email='".$this->getDestinatarioEmail()."') AND (ip='".$this->getIp()."') AND (sessao='".$this->getSessao()."') AND (datahora='".$this->getDatahora()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdIndique( $dbq->valor("id_indique") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$this->setRemetenteNome( $dbq->valor("remetente_nome") ); 
			$this->setRemetenteEmail( $dbq->valor("remetente_email") ); 
			$this->setDestinatarioNome( $dbq->valor("destinatario_nome") ); 
			$this->setDestinatarioEmail( $dbq->valor("destinatario_email") ); 
			$this->setIp( $dbq->valor("ip") ); 
			$this->setSessao( $dbq->valor("sessao") ); 
			$this->setDatahora( $dbq->valor("datahora") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarIndique( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_indique ". 
					   "WHERE ide_origem = '".Current::IdeOrigem()."'"; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_indique ". 
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
			$obj = new Indique(); 
			$obj->setIdIndique( $dbq->valor("id_indique") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$obj->setRemetenteNome( $dbq->valor("remetente_nome") ); 
			$obj->setRemetenteEmail( $dbq->valor("remetente_email") ); 
			$obj->setDestinatarioNome( $dbq->valor("destinatario_nome") ); 
			$obj->setDestinatarioEmail( $dbq->valor("destinatario_email") ); 
			$obj->setIp( $dbq->valor("ip") ); 
			$obj->setSessao( $dbq->valor("sessao") ); 
			$obj->setDatahora( $dbq->valor("datahora") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarIndiqueAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!IndiqueAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarIndique(4, SearchMounter::ValidateAndMounter(IndiqueAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarIndiqueAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarIndique(3, SearchMounter::ValidateAndMounter(IndiqueAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirIndique(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_indique(identificador, ide_origem, remetente_nome, remetente_email, destinatario_nome, destinatario_email, ip, sessao, datahora) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getIdeOrigem() )."', '".$this->tratarString( $this->getRemetenteNome() )."', '".$this->tratarString( $this->getRemetenteEmail() )."', '".$this->tratarString( $this->getDestinatarioNome() )."', '".$this->tratarString( $this->getDestinatarioEmail() )."', '".$this->tratarString( $this->getIp() )."', '".$this->tratarString( $this->getSessao() )."', '".$this->tratarString( $this->getDatahora() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarIndique(2, ""); 
	} 
	 
	public function alterarIndique(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET remetente_nome='".$this->tratarString( $this->getRemetenteNome() )."', remetente_email='".$this->tratarString( $this->getRemetenteEmail() )."', destinatario_nome='".$this->tratarString( $this->getDestinatarioNome() )."', destinatario_email='".$this->tratarString( $this->getDestinatarioEmail() )."', ip='".$this->tratarString( $this->getIp() )."', sessao='".$this->tratarString( $this->getSessao() )."', datahora='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoRemetenteNome(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET remetente_nome='".$this->tratarString( $this->getRemetenteNome() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoRemetenteEmail(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET remetente_email='".$this->tratarString( $this->getRemetenteEmail() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDestinatarioNome(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET destinatario_nome='".$this->tratarString( $this->getDestinatarioNome() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDestinatarioEmail(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET destinatario_email='".$this->tratarString( $this->getDestinatarioEmail() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIp(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET ip='".$this->tratarString( $this->getIp() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoSessao(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET sessao='".$this->tratarString( $this->getSessao() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDatahora(){ 
 
		$sql = "UPDATE tb_indique ". 
			   "SET datahora='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirIndique(){ 
		$sql = "DELETE FROM tb_indique ". 
			   "WHERE id_indique = ".$this->getIdIndique(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getIndique(){ 
		return $this; 
	} 
	 
	public function setIndique($IdIndique, $Identificador, $IdeOrigem, $RemetenteNome, $RemetenteEmail, $DestinatarioNome, $DestinatarioEmail, $Ip, $Sessao, $Datahora){ 
			$this->setIdIndique( $IdIndique ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setRemetenteNome( $RemetenteNome ); 
			$this->setRemetenteEmail( $RemetenteEmail ); 
			$this->setDestinatarioNome( $DestinatarioNome ); 
			$this->setDestinatarioEmail( $DestinatarioEmail ); 
			$this->setIp( $Ip ); 
			$this->setSessao( $Sessao ); 
			$this->setDatahora( $Datahora ); 
	} 
 
	public function setIdIndique( $valor ){ $this->myIdIndique = $valor; } 
	public function getIdIndique(){ return $this->myIdIndique; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdeOrigem( $valor ){ $this->myIdeOrigem = $valor; } 
	public function getIdeOrigem(){ return (!empty($this->myIdeOrigem)) ? $this->myIdeOrigem : $this->myIdeOrigem = Current::IdeOrigem(); } 
 
	public function setRemetenteNome( $valor ){ $this->myRemetenteNome = $valor; } 
	public function getRemetenteNome(){ return $this->myRemetenteNome; } 
 
	public function setRemetenteEmail( $valor ){ $this->myRemetenteEmail = $valor; } 
	public function getRemetenteEmail(){ return $this->myRemetenteEmail; } 
 
	public function setDestinatarioNome( $valor ){ $this->myDestinatarioNome = $valor; } 
	public function getDestinatarioNome(){ return $this->myDestinatarioNome; } 
 
	public function setDestinatarioEmail( $valor ){ $this->myDestinatarioEmail = $valor; } 
	public function getDestinatarioEmail(){ return $this->myDestinatarioEmail; } 
 
	public function setIp( $valor ){ $this->myIp = $valor; } 
	public function getIp(){ return $this->myIp; } 
 
	public function setSessao( $valor ){ $this->mySessao = $valor; } 
	public function getSessao(){ return $this->mySessao; } 
 
	public function setDatahora( $valor ){ $this->myDatahora = $valor; } 
	public function getDatahora(){ return $this->myDatahora; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>