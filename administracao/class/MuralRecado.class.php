<? 
class MuralRecado{ 
	 
	protected $myIdMuralRecado, $myIdentificador, $myNome, $myEmail, $myTexto, $myIp, $myDatahora, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarMuralRecado( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_mural_recado ". 
					   "WHERE id_mural_recado = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_mural_recado ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_mural_recado ". 
					   "WHERE (nome='".$this->getNome()."') AND (email='".$this->getEmail()."') AND (texto='".$this->getTexto()."') AND (ip='".$this->getIp()."') AND (datahora='".$this->getDatahora()."') AND (status='".$this->getStatus()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdMuralRecado( $dbq->valor("id_mural_recado") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setEmail( $dbq->valor("email") ); 
			$this->setTexto( $dbq->valor("texto") ); 
			$this->setIp( $dbq->valor("ip") ); 
			$this->setDatahora( $dbq->valor("datahora") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarMuralRecado( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_mural_recado "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_mural_recado ". 
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
			$obj = new MuralRecado(); 
			$obj->setIdMuralRecado( $dbq->valor("id_mural_recado") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setEmail( $dbq->valor("email") ); 
			$obj->setTexto( $dbq->valor("texto") ); 
			$obj->setIp( $dbq->valor("ip") ); 
			$obj->setDatahora( $dbq->valor("datahora") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarMuralRecadoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!MuralRecadoAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarMuralRecado(4, SearchMounter::ValidateAndMounter(MuralRecadoAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarMuralRecadoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarMuralRecado(3, SearchMounter::ValidateAndMounter(MuralRecadoAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirMuralRecado(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_mural_recado(identificador, nome, email, texto, ip, datahora, status) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getEmail() )."', '".$this->tratarString( $this->getTexto() )."', '".$this->tratarString( $this->getIp() )."', '".$this->tratarString( $this->getDatahora() )."', '".$this->tratarString( $this->getStatus() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarMuralRecado(2, ""); 
	} 
	 
	public function alterarMuralRecado(){ 
 
		$sql = "UPDATE tb_mural_recado ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."', email='".$this->tratarString( $this->getEmail() )."', texto='".$this->tratarString( $this->getTexto() )."', ip='".$this->tratarString( $this->getIp() )."', datahora='".$this->tratarString( $this->getDatahora() )."', status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_mural_recado ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoEmail(){ 
 
		$sql = "UPDATE tb_mural_recado ". 
			   "SET email='".$this->tratarString( $this->getEmail() )."' ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTexto(){ 
 
		$sql = "UPDATE tb_mural_recado ". 
			   "SET texto='".$this->tratarString( $this->getTexto() )."' ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIp(){ 
 
		$sql = "UPDATE tb_mural_recado ". 
			   "SET ip='".$this->tratarString( $this->getIp() )."' ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDatahora(){ 
 
		$sql = "UPDATE tb_mural_recado ". 
			   "SET datahora='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_mural_recado ". 
			   "SET status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirMuralRecado(){ 
		$sql = "DELETE FROM tb_mural_recado ". 
			   "WHERE id_mural_recado = ".$this->getIdMuralRecado(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getMuralRecado(){ 
		return $this; 
	} 
	 
	public function setMuralRecado($IdMuralRecado, $Identificador, $Nome, $Email, $Texto, $Ip, $Datahora, $Status){ 
			$this->setIdMuralRecado( $IdMuralRecado ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setEmail( $Email ); 
			$this->setTexto( $Texto ); 
			$this->setIp( $Ip ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdMuralRecado( $valor ){ $this->myIdMuralRecado = $valor; } 
	public function getIdMuralRecado(){ return $this->myIdMuralRecado; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setEmail( $valor ){ $this->myEmail = $valor; } 
	public function getEmail(){ return $this->myEmail; } 
 
	public function setTexto( $valor ){ $this->myTexto = $valor; } 
	public function getTexto(){ return $this->myTexto; } 
 
	public function setIp( $valor ){ $this->myIp = $valor; } 
	public function getIp(){ return $this->myIp; } 
 
	public function setDatahora( $valor ){ $this->myDatahora = $valor; } 
	public function getDatahora(){ return $this->myDatahora; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>