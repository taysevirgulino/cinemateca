<? 
class AppUsuario{ 
	 
	protected $myIdAppUsuario, $myIdentificador, $myIdAppUsuarioGrupo, $myNome, $myEmail, $myLogin, $mySenha, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppUsuario( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario ". 
					   "WHERE id_app_usuario = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario ". 
					   "WHERE (id_app_usuario_grupo=".$this->getIdAppUsuarioGrupo().") AND (nome='".$this->getNome()."') AND (email='".$this->getEmail()."') AND (login='".$this->getLogin()."') AND (senha='".$this->getSenha()."') AND (status=".$this->getStatus().")"; 
			}break; 
			case 4 : { 
				$sql =  "SELECT ".
						"  tb_app_usuario.* ".
						"FROM ".
						"  tb_app_usuario ".
						"WHERE ".
						"  (tb_app_usuario.login = '".$this->getLogin()."') AND ".
						"  (tb_app_usuario.senha = '".$this->getSenha()."') AND ". 
						"  (tb_app_usuario.status = ".$this->getStatus().")"; 
			}break;				
			case 5 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppUsuario( $dbq->valor("id_app_usuario") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdAppUsuarioGrupo( $dbq->valor("id_app_usuario_grupo") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setEmail( $dbq->valor("email") ); 
			$this->setLogin( $dbq->valor("login") ); 
			$this->setSenha( $dbq->valor("senha") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppUsuario( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_usuario ". 
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
			$obj = new AppUsuario(); 
			$obj->setIdAppUsuario( $dbq->valor("id_app_usuario") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdAppUsuarioGrupo( $dbq->valor("id_app_usuario_grupo") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setEmail( $dbq->valor("email") ); 
			$obj->setLogin( $dbq->valor("login") ); 
			$obj->setSenha( $dbq->valor("senha") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarAppUsuarioAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!AppUsuarioAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarAppUsuario(5, SearchMounter::ValidateAndMounter(AppUsuarioAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarAppUsuarioAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarAppUsuario(3, SearchMounter::ValidateAndMounter(AppUsuarioAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirAppUsuario(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_usuario(identificador, id_app_usuario_grupo, nome, email, login, senha, status) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', ".$this->getIdAppUsuarioGrupo().", '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getEmail() )."', '".$this->tratarString( $this->getLogin() )."', '".$this->tratarString( $this->getSenha() )."', ".$this->getStatus().")"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 

		return $this->buscarAppUsuario(2, ""); 
	} 
	 
	public function alterarAppUsuario(){ 
 
		$sql = "UPDATE tb_app_usuario ". 
			   "SET id_app_usuario_grupo=".$this->getIdAppUsuarioGrupo().", nome='".$this->tratarString( $this->getNome() )."', email='".$this->tratarString( $this->getEmail() )."', login='".$this->tratarString( $this->getLogin() )."', senha='".$this->tratarString( $this->getSenha() )."', status=".$this->getStatus()." ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function alterarAtributoIdAppUsuarioGrupo(){ 
 
		$sql = "UPDATE tb_app_usuario ". 
			   "SET id_app_usuario_grupo=".$this->getIdAppUsuarioGrupo()." ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_app_usuario ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function alterarAtributoEmail(){ 
 
		$sql = "UPDATE tb_app_usuario ". 
			   "SET email='".$this->tratarString( $this->getEmail() )."' ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function alterarAtributoLogin(){ 
 
		$sql = "UPDATE tb_app_usuario ". 
			   "SET login='".$this->tratarString( $this->getLogin() )."' ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function alterarAtributoSenha(){ 
 
		$sql = "UPDATE tb_app_usuario ". 
			   "SET senha='".$this->tratarString( $this->getSenha() )."' ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_app_usuario ". 
			   "SET status=".$this->getStatus()." ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function excluirAppUsuario(){ 
		$sql = "DELETE FROM tb_app_usuario ". 
			   "WHERE id_app_usuario = ".$this->getIdAppUsuario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function getAppUsuario(){ 
		return $this; 
	} 
	 
	public function setAppUsuario($IdAppUsuario, $Identificador, $IdAppUsuarioGrupo, $Nome, $Email, $Login, $Senha, $Status){ 
			$this->setIdAppUsuario( $IdAppUsuario ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdAppUsuarioGrupo( $IdAppUsuarioGrupo ); 
			$this->setNome( $Nome ); 
			$this->setEmail( $Email ); 
			$this->setLogin( $Login ); 
			$this->setSenha( $Senha ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdAppUsuario( $valor ){ $this->myIdAppUsuario = $valor; } 
	public function getIdAppUsuario(){ return $this->myIdAppUsuario; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdAppUsuarioGrupo( $valor ){ $this->myIdAppUsuarioGrupo = $valor; } 
	public function getIdAppUsuarioGrupo(){ return $this->myIdAppUsuarioGrupo; } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setEmail( $valor ){ $this->myEmail = $valor; } 
	public function getEmail(){ return $this->myEmail; } 
 
	public function setLogin( $valor ){ $this->myLogin = $valor; } 
	public function getLogin(){ return $this->myLogin; } 
 
	public function setSenha( $valor ){ $this->mySenha = $valor; } 
	public function getSenha(){ return $this->mySenha; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>