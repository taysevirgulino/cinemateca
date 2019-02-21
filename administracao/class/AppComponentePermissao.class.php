<? 
class AppComponentePermissao{ 
	 
	protected $myIdAppPermissao, $myIdAppUsuarioGrupo, $myIdAppComponente, $myPermissao;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppComponentePermissao( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_permissao ". 
					   "WHERE id_app_permissao = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_permissao ". 
					   "WHERE (id_app_usuario_grupo=".$this->getIdAppUsuarioGrupo().") AND (id_app_componente=".$this->getIdAppComponente().") AND (permissao=".$this->getPermissao().")"; 
			}break; 
			case 3 : { 
				$sql = $valor;
			}break; 
			case 4 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_permissao ". 
					   "WHERE (id_app_usuario_grupo=$valor)"; 
			}break; 			
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppPermissao( $dbq->valor("id_app_permissao") ); 
			$this->setIdAppUsuarioGrupo( $dbq->valor("id_app_usuario_grupo") ); 
			$this->setIdAppComponente( $dbq->valor("id_app_componente") ); 
			$this->setPermissao( $dbq->valor("permissao") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppComponentePermissao( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_permissao "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_permissao ". 
					   "".$valor." "; 
			}break; 
			case 3 : { 
				$sql = $valor; 
			}break; 
			case 4 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_permissao ". 
					   "WHERE (id_app_usuario_grupo = ".$valor.")"; 
			}break; 
			case 5 : { 
				$sql = "SELECT DISTINCT 
						  `tb_app_componente_permissao`.*
						FROM
						  `tb_app_componente_permissao`
						  INNER JOIN `tb_app_componente` ON (`tb_app_componente_permissao`.id_app_componente = `tb_app_componente`.id_app_componente)
						  INNER JOIN `tb_app_componente_pagina` ON (`tb_app_componente`.id_app_componente = `tb_app_componente_pagina`.id_app_componente_pagina)
						WHERE
						  `tb_app_componente_permissao`.id_app_usuario_grupo = $valor"; 
			}break; 			
			case 6 : { 
				$sql = "SELECT DISTINCT 
						  `tb_app_componente_permissao`.*
						FROM
						  `tb_app_componente_permissao`
						  INNER JOIN `tb_app_componente` ON (`tb_app_componente_permissao`.id_app_componente = `tb_app_componente`.id_app_componente)
						  INNER JOIN `tb_app_componente_menu` ON (`tb_app_componente`.id_app_componente = `tb_app_componente_menu`.id_app_componente_menu)
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
			$obj = new AppComponentePermissao(); 
			$obj->setIdAppPermissao( $dbq->valor("id_app_permissao") ); 
			$obj->setIdAppUsuarioGrupo( $dbq->valor("id_app_usuario_grupo") ); 
			$obj->setIdAppComponente( $dbq->valor("id_app_componente") ); 
			$obj->setPermissao( $dbq->valor("permissao") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function inserirAppComponentePermissao(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_componente_permissao(id_app_usuario_grupo, id_app_componente, permissao) ". 
			   "VALUES(".$this->getIdAppUsuarioGrupo().", ".$this->getIdAppComponente().", ".$this->getPermissao().")"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function alterarAppComponentePermissao(){ 
 
		$sql = "UPDATE tb_app_componente_permissao ". 
			   "SET id_app_usuario_grupo=".$this->getIdAppUsuarioGrupo().", id_app_componente=".$this->getIdAppComponente().", permissao=".$this->getPermissao()." ". 
			   "WHERE id_app_permissao = ".$this->getIdAppPermissao(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function excluirAppComponentePermissao(){ 
		$sql = "DELETE FROM tb_app_componente_permissao ". 
			   "WHERE id_app_permissao = ".$this->getIdAppPermissao(); 
 		print $sql."<br>";
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function getAppComponentePermissao(){ 
		return $this; 
	} 
	 
	public function setAppComponentePermissao($IdAppPermissao, $IdAppUsuarioGrupo, $IdAppComponente, $Permissao){ 
			$this->setIdAppPermissao( $IdAppPermissao ); 
			$this->setIdAppUsuarioGrupo( $IdAppUsuarioGrupo ); 
			$this->setIdAppComponente( $IdAppComponente ); 
			$this->setPermissao( $Permissao ); 
	} 
 
	public function setIdAppPermissao( $valor ){ $this->myIdAppPermissao = $valor; } 
	public function getIdAppPermissao(){ return $this->myIdAppPermissao; } 
 
	public function setIdAppUsuarioGrupo( $valor ){ $this->myIdAppUsuarioGrupo = $valor; } 
	public function getIdAppUsuarioGrupo(){ return $this->myIdAppUsuarioGrupo; } 
 
	public function setIdAppComponente( $valor ){ $this->myIdAppComponente = $valor; } 
	public function getIdAppComponente(){ return $this->myIdAppComponente; } 
 
	public function setPermissao( $valor ){ $this->myPermissao = $valor; } 
	public function getPermissao(){ return $this->myPermissao; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 

	public function compareTo( $obj ){ 
		return( get_class( $this ) == get_class( $obj ) ); 
	}	 
} 
?>