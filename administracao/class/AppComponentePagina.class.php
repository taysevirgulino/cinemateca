<? 
class AppComponentePagina{ 
	 
	protected $myIdAppComponentePagina, $myIdentificador, $myUrl, $myDescricao;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppComponentePagina( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_pagina ". 
					   "WHERE id_app_componente_pagina = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_pagina ". 
					   "WHERE (identificador='".$this->getIdentificador()."') AND (url='".$this->getUrl()."') AND (descricao='".$this->getDescricao()."')"; 
			}break; 
			case 3 : { 
				$sql = $valor;
			}break; 
			case 4 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_pagina ". 
					   "WHERE (url='".$this->getUrl()."')"; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppComponentePagina( $dbq->valor("id_app_componente_pagina") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setUrl( $dbq->valor("url") ); 
			$this->setDescricao( $dbq->valor("descricao") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppComponentePagina( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_pagina "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_pagina ". 
					   "".$valor." "; 
			}break; 
			case 3 : { 
				$sql = $valor; 
			}break; 			
			case 4 : { 
				$sql = "SELECT DISTINCT 
						  `tb_app_componente_pagina`.*
						FROM
						  `tb_app_componente_pagina`
						  INNER JOIN `tb_app_componente` ON (`tb_app_componente_pagina`.id_app_componente_pagina = `tb_app_componente`.id_app_componente)
						  INNER JOIN `tb_app_componente_permissao` ON (`tb_app_componente`.id_app_componente = `tb_app_componente_permissao`.id_app_componente)
						WHERE
						  `tb_app_componente_permissao`.id_app_usuario_grupo = $valor"; 
			}break; 
		} 
		 
		if( empty($sql) ){ return null;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		$objs = array(); 
		$i = 0; 
		 
		while( $dbq->registro() ){ 
			$obj = new AppComponentePagina(); 
			$obj->setIdAppComponentePagina( $dbq->valor("id_app_componente_pagina") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setUrl( $dbq->valor("url") ); 
			$obj->setDescricao( $dbq->valor("descricao") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function inserirAppComponentePagina(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_componente_pagina(id_app_componente_pagina, identificador, url, descricao) ". 
			   "VALUES(".$this->getIdAppComponentePagina().", '".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getUrl() )."', '".$this->tratarString( $this->getDescricao() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function alterarAppComponentePagina(){ 
 
		$sql = "UPDATE tb_app_componente_pagina ". 
			   "SET identificador='".$this->tratarString( $this->getIdentificador() )."', url='".$this->tratarString( $this->getUrl() )."', descricao='".$this->tratarString( $this->getDescricao() )."' ". 
			   "WHERE id_app_componente_pagina = ".$this->getIdAppComponentePagina(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function excluirAppComponentePagina(){ 
		$sql = "DELETE FROM tb_app_componente_pagina ". 
			   "WHERE id_app_componente_pagina = ".$this->getIdAppComponentePagina(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function getAppComponentePagina(){ 
		return $this; 
	} 
	 
	public function setAppComponentePagina($IdAppComponentePagina, $Identificador, $Url, $Descricao){ 
			$this->setIdAppComponentePagina( $IdAppComponentePagina ); 
			$this->setIdentificador( $Identificador ); 
			$this->setUrl( $Url ); 
			$this->setDescricao( $Descricao ); 
	} 
 
	public function setIdAppComponentePagina( $valor ){ $this->myIdAppComponentePagina = $valor; } 
	public function getIdAppComponentePagina(){ return $this->myIdAppComponentePagina; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return $this->myIdentificador; } 
 
	public function setUrl( $valor ){ $this->myUrl = $valor; } 
	public function getUrl(){ return $this->myUrl; } 
 
	public function setDescricao( $valor ){ $this->myDescricao = $valor; } 
	public function getDescricao(){ return $this->myDescricao; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 

	public function compareTo( $obj ){ 
		return( get_class( $this ) == get_class( $obj ) ); 
	}	 
} 
?>