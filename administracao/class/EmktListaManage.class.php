<? 
	class EmktListaManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarEmktLista( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktLista();
			if( $myObj->buscarEmktLista( $tipo, $valor ) ){
				$value[0] = $myObj->getIdEmktLista();	
				$value["id_emkt_lista"] = $myObj->getIdEmktLista();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktLista( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktLista();
			$vmyObj = $myObj->consultarEmktLista( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktLista();
				$value[$i]["id_emkt_lista"] = $vmyObj[$i]->getIdEmktLista();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				
				$value[$i]["ContatosCount"] = EmktContatoManage::ContatosCountByLista($vmyObj[$i]->getIdEmktLista());
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarEmktListaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new EmktLista();
			if( $myObj->buscarEmktListaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdEmktLista();	
				$value["id_emkt_lista"] = $myObj->getIdEmktLista();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktListaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new EmktLista();
			$vmyObj = $myObj->consultarEmktListaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktLista();
				$value[$i]["id_emkt_lista"] = $vmyObj[$i]->getIdEmktLista();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				
				$value[$i]["ContatosCount"] = EmktContatoManage::ContatosCountByLista($vmyObj[$i]->getIdEmktLista());
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirEmktLista($myIdEmktLista, $myIdentificador, $myNome){
			$myObj = new EmktLista();
			$myObj->setEmktLista($myIdEmktLista, $myIdentificador, $myNome);
			return $myObj->inserirEmktLista();
		}

		public static function alterarEmktLista($myIdEmktLista, $myIdentificador, $myNome){
			$myObj = new EmktLista();
			$myObj->setEmktLista($myIdEmktLista, $myIdentificador, $myNome);
			return $myObj->alterarEmktLista();
		}

		public static function alterarAtributoNome($myIdEmktLista, $myNome){
			$myObj = new EmktLista();
			$myObj->setIdEmktLista($myIdEmktLista);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function excluirEmktLista($myIdEmktLista){
			$myObj = new EmktLista();
			$myObj->setIdEmktLista($myIdEmktLista);
			return $myObj->excluirEmktLista();
		}
		
		public static function ListasCountByContato($IdContato){
			$sql = "SELECT 
					  COUNT(`tb_emkt_lista`.id_emkt_lista) AS count
					FROM
					  `tb_emkt_contato_lista`
					  INNER JOIN `tb_emkt_lista` ON (`tb_emkt_contato_lista`.id_emkt_lista = `tb_emkt_lista`.id_emkt_lista)
					WHERE
					  `tb_emkt_contato_lista`.id_emkt_contato = $IdContato";
			
			return SearchMysqlQuery::CountBySql($sql);
		}
		
		public static function ListasByContato($IdContato){
			$sql = "SELECT 
					  tb_emkt_lista.*
					FROM
					  tb_emkt_lista
					WHERE
					  tb_emkt_lista.id_emkt_lista IN (SELECT tb_emkt_contato_lista.id_emkt_lista FROM tb_emkt_contato_lista WHERE tb_emkt_contato_lista.id_emkt_contato = $IdContato)
					ORDER BY
					  tb_emkt_lista.nome";
			
			return EmktListaManage::consultarEmktLista(3, $sql);
		}		
		
		public static function ListasByDisparo($IdDisparo){
			$sql = "SELECT 
					  tb_emkt_lista.*
					FROM
					  tb_emkt_lista
					WHERE
					  tb_emkt_lista.id_emkt_lista IN (SELECT tb_emkt_destinatario.id_emkt_lista FROM tb_emkt_destinatario WHERE tb_emkt_destinatario.id_emkt_disparo = $IdDisparo)
					ORDER BY
					  tb_emkt_lista.nome";
			
			return EmktListaManage::consultarEmktLista(3, $sql);
		}

	} 
?>