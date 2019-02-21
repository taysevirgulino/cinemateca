<? 
class ArtigoArticulista{ 
	 
	protected $myIdArtigoArticulista, $myIdentificador, $myIdeOrigem, $myNome, $myPerfil, $myEmail, $myTelefone, $myFoto;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarArtigoArticulista( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo_articulista ". 
					   "WHERE id_artigo_articulista = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo_articulista ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo_articulista ". 
					   "WHERE (ide_origem='".$this->getIdeOrigem()."') AND (nome='".$this->getNome()."') AND (perfil='".$this->getPerfil()."') AND (email='".$this->getEmail()."') AND (telefone='".$this->getTelefone()."') AND (foto='".$this->getFoto()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdArtigoArticulista( $dbq->valor("id_artigo_articulista") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setPerfil( $dbq->valor("perfil") ); 
			$this->setEmail( $dbq->valor("email") ); 
			$this->setTelefone( $dbq->valor("telefone") ); 
			$this->setFoto( $dbq->valor("foto") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarArtigoArticulista( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo_articulista ". 
					   "WHERE ide_origem = '".Current::IdeOrigem()."'"; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_artigo_articulista ". 
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
			$obj = new ArtigoArticulista(); 
			$obj->setIdArtigoArticulista( $dbq->valor("id_artigo_articulista") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setPerfil( $dbq->valor("perfil") ); 
			$obj->setEmail( $dbq->valor("email") ); 
			$obj->setTelefone( $dbq->valor("telefone") ); 
			$obj->setFoto( $dbq->valor("foto") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarArtigoArticulistaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!ArtigoArticulistaAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarArtigoArticulista(4, SearchMounter::ValidateAndMounter(ArtigoArticulistaAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarArtigoArticulistaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarArtigoArticulista(3, SearchMounter::ValidateAndMounter(ArtigoArticulistaAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirArtigoArticulista(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_artigo_articulista(identificador, ide_origem, nome, perfil, email, telefone, foto) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getIdeOrigem() )."', '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getPerfil() )."', '".$this->tratarString( $this->getEmail() )."', '".$this->tratarString( $this->getTelefone() )."', '".$this->tratarString( $this->getFoto() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarArtigoArticulista(2, ""); 
	} 
	 
	public function alterarArtigoArticulista(){ 
 
		$sql = "UPDATE tb_artigo_articulista ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."', perfil='".$this->tratarString( $this->getPerfil() )."', email='".$this->tratarString( $this->getEmail() )."', telefone='".$this->tratarString( $this->getTelefone() )."', foto='".$this->tratarString( $this->getFoto() )."' ". 
			   "WHERE id_artigo_articulista = ".$this->getIdArtigoArticulista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_artigo_articulista ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE id_artigo_articulista = ".$this->getIdArtigoArticulista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoPerfil(){ 
 
		$sql = "UPDATE tb_artigo_articulista ". 
			   "SET perfil='".$this->tratarString( $this->getPerfil() )."' ". 
			   "WHERE id_artigo_articulista = ".$this->getIdArtigoArticulista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoEmail(){ 
 
		$sql = "UPDATE tb_artigo_articulista ". 
			   "SET email='".$this->tratarString( $this->getEmail() )."' ". 
			   "WHERE id_artigo_articulista = ".$this->getIdArtigoArticulista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTelefone(){ 
 
		$sql = "UPDATE tb_artigo_articulista ". 
			   "SET telefone='".$this->tratarString( $this->getTelefone() )."' ". 
			   "WHERE id_artigo_articulista = ".$this->getIdArtigoArticulista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoFoto(){ 
 
		$sql = "UPDATE tb_artigo_articulista ". 
			   "SET foto='".$this->tratarString( $this->getFoto() )."' ". 
			   "WHERE id_artigo_articulista = ".$this->getIdArtigoArticulista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirArtigoArticulista(){ 
		$sql = "DELETE FROM tb_artigo_articulista ". 
			   "WHERE id_artigo_articulista = ".$this->getIdArtigoArticulista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getArtigoArticulista(){ 
		return $this; 
	} 
	 
	public function setArtigoArticulista($IdArtigoArticulista, $Identificador, $IdeOrigem, $Nome, $Perfil, $Email, $Telefone, $Foto){ 
			$this->setIdArtigoArticulista( $IdArtigoArticulista ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setNome( $Nome ); 
			$this->setPerfil( $Perfil ); 
			$this->setEmail( $Email ); 
			$this->setTelefone( $Telefone ); 
			$this->setFoto( $Foto ); 
	} 
 
	public function setIdArtigoArticulista( $valor ){ $this->myIdArtigoArticulista = $valor; } 
	public function getIdArtigoArticulista(){ return $this->myIdArtigoArticulista; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdeOrigem( $valor ){ $this->myIdeOrigem = $valor; } 
	public function getIdeOrigem(){ return (!empty($this->myIdeOrigem)) ? $this->myIdeOrigem : $this->myIdeOrigem = Current::IdeOrigem(); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setPerfil( $valor ){ $this->myPerfil = $valor; } 
	public function getPerfil(){ return $this->myPerfil; } 
 
	public function setEmail( $valor ){ $this->myEmail = $valor; } 
	public function getEmail(){ return $this->myEmail; } 
 
	public function setTelefone( $valor ){ $this->myTelefone = $valor; } 
	public function getTelefone(){ return $this->myTelefone; } 
 
	public function setFoto( $valor ){ $this->myFoto = $valor; } 
	public function getFoto(){ return $this->myFoto; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>