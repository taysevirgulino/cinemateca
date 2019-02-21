<? 
class AppComponenteMenu{ 
	 
	protected $myIdAppComponenteMenu, $myIdAppComponenteMenuPai, $myUrl, $myDescricao, $myImagem, $myPrioridade, $myTipo, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppComponenteMenu( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_menu ". 
					   "WHERE id_app_componente_menu = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_menu ". 
					   "WHERE (id_app_componente_menu=".$this->getIdAppComponenteMenu().")"; 
			}break; 
			case 3 : { 
				$sql = $valor;
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppComponenteMenu( $dbq->valor("id_app_componente_menu") ); 
			$this->setIdAppComponenteMenuPai( $dbq->valor("id_app_componente_menu_pai") ); 
			$this->setUrl( $dbq->valor("url") ); 
			$this->setDescricao( $dbq->valor("descricao") ); 
			$this->setImagem( $dbq->valor("imagem") ); 
			$this->setPrioridade( $dbq->valor("prioridade") ); 
			$this->setTipo( $dbq->valor("tipo") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppComponenteMenu( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_menu "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_menu ". 
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
			$obj = new AppComponenteMenu(); 
			$obj->setIdAppComponenteMenu( $dbq->valor("id_app_componente_menu") ); 
			$obj->setIdAppComponenteMenuPai( $dbq->valor("id_app_componente_menu_pai") ); 
			$obj->setUrl( $dbq->valor("url") ); 
			$obj->setDescricao( $dbq->valor("descricao") ); 
			$obj->setImagem( $dbq->valor("imagem") ); 
			$obj->setPrioridade( $dbq->valor("prioridade") ); 
			$obj->setTipo( $dbq->valor("tipo") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
	
	public function quantidadeFilhos(){ 
		$sql = "SELECT count(*) AS qtd
				FROM tb_app_componente_menu
				WHERE id_app_componente_menu_pai = ".$this->getIdAppComponenteMenu()." AND status=1"; 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		$qtd = 0;
		 
		if( $dbq->registro() ){ 
			$qtd = $dbq->valor("qtd"); 
		} 
		$dbq->desconectar(); unset($dbq); 
		return $qtd; 
	}

	public function montarFiliacao($id, $valor){
		$id = intval($id);
		if( empty($id) ){ return ""; }
		
		if( $this->buscarAppComponenteMenu(1, $id) ){
			if( $this->getTipo() == 1){
				if(! empty($valor))
					$valor = " -> ".$valor;
	
				return $this->getDescricao().$valor;
			}else{
				if(! empty($valor))
					$valor = " -> ".$valor;
					
				return $this->montarFiliacao($this->getIdAppComponenteMenuPai(), $this->getDescricao().$valor);
			}
		}
		return "";
	}
	
	public function inserirAppComponenteMenu(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_componente_menu(id_app_componente_menu, id_app_componente_menu_pai, url, descricao, imagem, prioridade, tipo, status) ". 
			   "VALUES(".$this->getIdAppComponenteMenu().", ".$this->getIdAppComponenteMenuPai().", '".$this->tratarString( $this->getUrl() )."', '".$this->tratarString( $this->getDescricao() )."', '".$this->tratarString( $this->getImagem() )."', ".$this->getPrioridade().", ".$this->getTipo().", ".$this->getStatus().")"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function alterarAppComponenteMenu(){ 
 
		$sql = "UPDATE tb_app_componente_menu ". 
			   "SET id_app_componente_menu_pai=".$this->getIdAppComponenteMenuPai().", url='".$this->tratarString( $this->getUrl() )."', descricao='".$this->tratarString( $this->getDescricao() )."', imagem='".$this->tratarString( $this->getImagem() )."', prioridade=".$this->getPrioridade().", tipo=".$this->getTipo().", status=".$this->getStatus()." ". 
			   "WHERE id_app_componente_menu = ".$this->getIdAppComponenteMenu(); 
 		
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function excluirAppComponenteMenu(){ 
		$sql = "DELETE FROM tb_app_componente_menu ". 
			   "WHERE id_app_componente_menu = ".$this->getIdAppComponenteMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function getAppComponenteMenu(){ 
		return $this; 
	} 
	 
	public function setAppComponenteMenu($IdAppComponenteMenu, $IdAppComponenteMenuPai, $Url, $Descricao, $Imagem, $Prioridade, $Tipo, $Status){ 
			$this->setIdAppComponenteMenu( $IdAppComponenteMenu ); 
			$this->setIdAppComponenteMenuPai( $IdAppComponenteMenuPai ); 
			$this->setUrl( $Url ); 
			$this->setDescricao( $Descricao ); 
			$this->setImagem( $Imagem ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setTipo( $Tipo ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdAppComponenteMenu( $valor ){ $this->myIdAppComponenteMenu = $valor; } 
	public function getIdAppComponenteMenu(){ return $this->myIdAppComponenteMenu; } 
 
	public function setIdAppComponenteMenuPai( $valor ){ $this->myIdAppComponenteMenuPai = $valor; } 
	public function getIdAppComponenteMenuPai(){ return $this->myIdAppComponenteMenuPai; } 
 
	public function setUrl( $valor ){ $this->myUrl = $valor; } 
	public function getUrl(){ return $this->myUrl; } 
 
	public function setDescricao( $valor ){ $this->myDescricao = $valor; } 
	public function getDescricao(){ return $this->myDescricao; } 
 
	public function setImagem( $valor ){ $this->myImagem = $valor; } 
	public function getImagem(){ return $this->myImagem; } 
 
	public function setPrioridade( $valor ){ $this->myPrioridade = $valor; } 
	public function getPrioridade(){ return $this->myPrioridade; } 
 
	public function setTipo( $valor ){ $this->myTipo = $valor; } 
	public function getTipo(){ return $this->myTipo; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 

	public function compareTo( $obj ){ 
		return( get_class( $this ) == get_class( $obj ) ); 
	}	 
} 
?>