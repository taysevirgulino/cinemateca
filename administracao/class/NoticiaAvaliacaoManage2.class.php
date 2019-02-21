<? 
	class NoticiaAvaliacaoManage2 { 
		//1 = SIM
		//2 = NAO
		public static function Votar($IdNoticia, $Voto){
			$Noticia = new Noticia();
			
			$result = 3;
			
			if($Noticia->buscarNoticia(1, intval($IdNoticia))){
				$sql = "SELECT DISTINCT 
						  tb_noticia_avaliacao.*
						FROM
						  tb_noticia_avaliacao
						WHERE
						  tb_noticia_avaliacao.id_noticia = ".$Noticia->getIdNoticia()." AND 
						  tb_noticia_avaliacao.sessao = '".session_id()."'
						LIMIT 1";
				$obj = new NoticiaAvaliacao();
				if(!$obj->buscarNoticiaAvaliacao(4, $sql)){
					$obj->setIdNoticiaAvaliacao( -1 );
					$obj->setIdentificador( null );
					$obj->setIdNoticia( $Noticia->getIdNoticia() );
					$obj->setValor( intval($Voto) );
					$obj->setSessao( session_id() );
					$obj->setIp( $_SERVER["REMOTE_ADDR"] );
					
					if($obj->inserirNoticiaAvaliacao()){
						$result = 1;
					}
				}else{
					$result = 2;
				}
			}
			
			$rs = array();
			
			$rs["status"] = $result;
			$rs["sim"] = NoticiaAvaliacaoManage2::Quantidade($Noticia->getIdNoticia(), 1);
			$rs["nao"] = NoticiaAvaliacaoManage2::Quantidade($Noticia->getIdNoticia(), 2);
			
			return $rs;
		}
		
		public static function Quantidade($IdNoticia, $Valor){
			$sql = "SELECT 
					  COUNT(tb_noticia_avaliacao.id_noticia_avaliacao) AS `count`
					FROM
					  tb_noticia_avaliacao
					WHERE
					  tb_noticia_avaliacao.id_noticia = $IdNoticia AND 
					  tb_noticia_avaliacao.valor = $Valor";
			
			return SearchMysqlQuery::CountBySql($sql);
		}

	} 
?>