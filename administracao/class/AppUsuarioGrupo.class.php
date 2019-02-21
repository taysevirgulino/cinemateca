<? 
class AppUsuarioGrupo{ 
	 
	protected $myIdAppUsuarioGrupo, $myIdentificador, $myNome, $mySigla, $myTipo, $myNivel;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppUsuarioGrupo( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario_grupo ". 
					   "WHERE `id_app_usuario_grupo` = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario_grupo ". 
					   "WHERE (`identificador`='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario_grupo ". 
					   "WHERE (`nome`='".$this->getNome()."') AND (`sigla`='".$this->getSigla()."') AND (`tipo`=".$this->getTipo().") AND (`nivel`='".$this->getNivel()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppUsuarioGrupo( $dbq->valor("id_app_usuario_grupo") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setSigla( $dbq->valor("sigla") ); 
			$this->setTipo( $dbq->valor("tipo") ); 
			$this->setNivel( $dbq->valor("nivel") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppUsuarioGrupo( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario_grupo "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario_grupo ". 
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
			$obj = new AppUsuarioGrupo(); 
			$obj->setIdAppUsuarioGrupo( $dbq->valor("id_app_usuario_grupo") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setSigla( $dbq->valor("sigla") ); 
			$obj->setTipo( $dbq->valor("tipo") ); 
			$obj->setNivel( $dbq->valor("nivel") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarAppUsuarioGrupoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!AppUsuarioGrupoAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarAppUsuarioGrupo(4, SearchMounter::ValidateAndMounter(AppUsuarioGrupoAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarAppUsuarioGrupoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarAppUsuarioGrupo(3, SearchMounter::ValidateAndMounter(AppUsuarioGrupoAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirAppUsuarioGrupo(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_usuario_grupo(`identificador`, `nome`, `sigla`, `tipo`, `nivel`) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getSigla() )."', ".$this->getTipo().", '".$this->tratarString( $this->getNivel() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarAppUsuarioGrupo(2, ""); 
	} 
	 
	public function alterarAppUsuarioGrupo(){ 
 
		$sql = "UPDATE tb_app_usuario_grupo ". 
			   "SET `nome`='".$this->tratarString( $this->getNome() )."', `sigla`='".$this->tratarString( $this->getSigla() )."', `tipo`=".$this->getTipo().", `nivel`='".$this->tratarString( $this->getNivel() )."' ". 
			   "WHERE `id_app_usuario_grupo` = ".$this->getIdAppUsuarioGrupo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_app_usuario_grupo ". 
			   "SET `nome`='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE `id_app_usuario_grupo` = ".$this->getIdAppUsuarioGrupo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoSigla(){ 
 
		$sql = "UPDATE tb_app_usuario_grupo ". 
			   "SET `sigla`='".$this->tratarString( $this->getSigla() )."' ". 
			   "WHERE `id_app_usuario_grupo` = ".$this->getIdAppUsuarioGrupo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTipo(){ 
 
		$sql = "UPDATE tb_app_usuario_grupo ". 
			   "SET `tipo`=".$this->getTipo()." ". 
			   "WHERE `id_app_usuario_grupo` = ".$this->getIdAppUsuarioGrupo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNivel(){ 
 
		$sql = "UPDATE tb_app_usuario_grupo ". 
			   "SET `nivel`='".$this->tratarString( $this->getNivel() )."' ". 
			   "WHERE `id_app_usuario_grupo` = ".$this->getIdAppUsuarioGrupo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirAppUsuarioGrupo(){ 
		$sql = "DELETE FROM tb_app_usuario_grupo ". 
			   "WHERE id_app_usuario_grupo = ".$this->getIdAppUsuarioGrupo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getAppUsuarioGrupo(){ 
		return $this; 
	} 
	 
	public function setAppUsuarioGrupo($IdAppUsuarioGrupo, $Identificador, $Nome, $Sigla, $Tipo, $Nivel){ 
			$this->setIdAppUsuarioGrupo( $IdAppUsuarioGrupo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setSigla( $Sigla ); 
			$this->setTipo( $Tipo ); 
			$this->setNivel( $Nivel ); 
	} 
 
	public function setIdAppUsuarioGrupo( $valor ){ $this->myIdAppUsuarioGrupo = $valor; } 
	public function getIdAppUsuarioGrupo(){ return $this->myIdAppUsuarioGrupo; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setSigla( $valor ){ $this->mySigla = $valor; } 
	public function getSigla(){ return $this->mySigla; } 
 
	public function setTipo( $valor ){ $this->myTipo = $valor; } 
	public function getTipo(){ return $this->myTipo; } 
 
	public function setNivel( $valor ){ $this->myNivel = $valor; } 
	public function getNivel(){ return $this->myNivel; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>