<? 
class AppLogonHistorico{ 
	 
	protected $myIdAppLogonHistorico, $myIdentificador, $myIdAppLogon, $myIdeObjeto, $myObjeto, $myAcao, $myIp, $mySessao, $myDatahora;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppLogonHistorico( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon_historico ". 
					   "WHERE `id_app_logon_historico` = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon_historico ". 
					   "WHERE (`identificador`='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon_historico ". 
					   "WHERE (`id_app_logon`=".$this->getIdAppLogon().") AND (`ide_objeto`='".$this->getIdeObjeto()."') AND (`objeto`='".$this->getObjeto()."') AND (`acao`='".$this->getAcao()."') AND (`ip`='".$this->getIp()."') AND (`sessao`='".$this->getSessao()."') AND (`datahora`='".$this->getDatahora()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppLogonHistorico( $dbq->valor("id_app_logon_historico") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdAppLogon( $dbq->valor("id_app_logon") ); 
			$this->setIdeObjeto( $dbq->valor("ide_objeto") ); 
			$this->setObjeto( $dbq->valor("objeto") ); 
			$this->setAcao( $dbq->valor("acao") ); 
			$this->setIp( $dbq->valor("ip") ); 
			$this->setSessao( $dbq->valor("sessao") ); 
			$this->setDatahora( $dbq->valor("datahora") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppLogonHistorico( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon_historico "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon_historico ". 
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
			$obj = new AppLogonHistorico(); 
			$obj->setIdAppLogonHistorico( $dbq->valor("id_app_logon_historico") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdAppLogon( $dbq->valor("id_app_logon") ); 
			$obj->setIdeObjeto( $dbq->valor("ide_objeto") ); 
			$obj->setObjeto( $dbq->valor("objeto") ); 
			$obj->setAcao( $dbq->valor("acao") ); 
			$obj->setIp( $dbq->valor("ip") ); 
			$obj->setSessao( $dbq->valor("sessao") ); 
			$obj->setDatahora( $dbq->valor("datahora") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarAppLogonHistoricoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!AppLogonHistoricoAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarAppLogonHistorico(4, SearchMounter::ValidateAndMounter(AppLogonHistoricoAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarAppLogonHistoricoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarAppLogonHistorico(3, SearchMounter::ValidateAndMounter(AppLogonHistoricoAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirAppLogonHistorico(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_logon_historico(`identificador`, `id_app_logon`, `ide_objeto`, `objeto`, `acao`, `ip`, `sessao`, `datahora`) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', ".$this->getIdAppLogon().", '".$this->tratarString( $this->getIdeObjeto() )."', '".$this->tratarString( $this->getObjeto() )."', '".$this->tratarString( $this->getAcao() )."', '".$this->tratarString( $this->getIp() )."', '".$this->tratarString( $this->getSessao() )."', '".$this->tratarString( $this->getDatahora() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarAppLogonHistorico(2, ""); 
	} 
	 
	public function alterarAppLogonHistorico(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `id_app_logon`=".$this->getIdAppLogon().", `ide_objeto`='".$this->tratarString( $this->getIdeObjeto() )."', `objeto`='".$this->tratarString( $this->getObjeto() )."', `acao`='".$this->tratarString( $this->getAcao() )."', `ip`='".$this->tratarString( $this->getIp() )."', `sessao`='".$this->tratarString( $this->getSessao() )."', `datahora`='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdAppLogon(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `id_app_logon`=".$this->getIdAppLogon()." ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdeObjeto(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `ide_objeto`='".$this->tratarString( $this->getIdeObjeto() )."' ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoObjeto(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `objeto`='".$this->tratarString( $this->getObjeto() )."' ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoAcao(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `acao`='".$this->tratarString( $this->getAcao() )."' ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIp(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `ip`='".$this->tratarString( $this->getIp() )."' ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoSessao(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `sessao`='".$this->tratarString( $this->getSessao() )."' ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDatahora(){ 
 
		$sql = "UPDATE tb_app_logon_historico ". 
			   "SET `datahora`='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE `id_app_logon_historico` = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirAppLogonHistorico(){ 
		$sql = "DELETE FROM tb_app_logon_historico ". 
			   "WHERE id_app_logon_historico = ".$this->getIdAppLogonHistorico(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getAppLogonHistorico(){ 
		return $this; 
	} 
	 
	public function setAppLogonHistorico($IdAppLogonHistorico, $Identificador, $IdAppLogon, $IdeObjeto, $Objeto, $Acao, $Ip, $Sessao, $Datahora){ 
			$this->setIdAppLogonHistorico( $IdAppLogonHistorico ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdAppLogon( $IdAppLogon ); 
			$this->setIdeObjeto( $IdeObjeto ); 
			$this->setObjeto( $Objeto ); 
			$this->setAcao( $Acao ); 
			$this->setIp( $Ip ); 
			$this->setSessao( $Sessao ); 
			$this->setDatahora( $Datahora ); 
	} 
 
	public function setIdAppLogonHistorico( $valor ){ $this->myIdAppLogonHistorico = $valor; } 
	public function getIdAppLogonHistorico(){ return $this->myIdAppLogonHistorico; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdAppLogon( $valor ){ $this->myIdAppLogon = $valor; } 
	public function getIdAppLogon(){ return $this->myIdAppLogon; } 
 
	public function setIdeObjeto( $valor ){ $this->myIdeObjeto = $valor; } 
	public function getIdeObjeto(){ return $this->myIdeObjeto; } 
 
	public function setObjeto( $valor ){ $this->myObjeto = $valor; } 
	public function getObjeto(){ return $this->myObjeto; } 
 
	public function setAcao( $valor ){ $this->myAcao = $valor; } 
	public function getAcao(){ return $this->myAcao; } 
 
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