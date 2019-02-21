<?
	class NoticiaManage2 extends NoticiaManage {
		
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null){
			$value = NoticiaManage::consultar($query, $sort, $offset, $limit);
				
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = Url::Noticia_Slug($value[$i]["id_noticia"], $value[$i]["slug"]);
				$value[$i]["foto_area_publicacao"] = Url::_Path()."images/noticia/".((!empty($value[$i]["foto_area_publicacao"])) ? $value[$i]["foto_area_publicacao"] : "null.jpg" );
				$value[$i]["foto_arquivo_file"] = $value[$i]["foto_arquivo"];
				$value[$i]["foto_arquivo"] = ((!empty($value[$i]["foto_arquivo"])) ? Url::_Path()."images/noticia/".$value[$i]["foto_arquivo"] : "" );
			}
				
			return $value;
		}
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0)
		{
			$value = NoticiaManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = Url::Noticia_Slug($value[$i]["id_noticia"], $value[$i]["slug"]);
				$value[$i]["foto_area_publicacao"] = Url::_Path()."images/noticia/".((!empty($value[$i]["foto_area_publicacao"])) ? $value[$i]["foto_area_publicacao"] : "null.jpg" );
				$value[$i]["foto_arquivo_file"] = $value[$i]["foto_arquivo"];
				$value[$i]["foto_arquivo"] = ((!empty($value[$i]["foto_arquivo"])) ? Url::_Path()."images/noticia/".$value[$i]["foto_arquivo"] : "" );
			}
			
			return $value;
		}
		
		public static function consultarNoticia( $tipo, $valor ){
			$value = NoticiaManage::consultarNoticia( $tipo, $valor );
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = Url::Noticia_Slug($value[$i]["id_noticia"], $value[$i]["slug"]);
				$value[$i]["foto_area_publicacao"] = Url::_Path()."images/noticia/".((!empty($value[$i]["foto_area_publicacao"])) ? $value[$i]["foto_area_publicacao"] : "null.jpg" );
				$value[$i]["foto_arquivo_file"] = $value[$i]["foto_arquivo"];
				$value[$i]["foto_arquivo"] = ((!empty($value[$i]["foto_arquivo"])) ? Url::_Path()."images/noticia/".$value[$i]["foto_arquivo"] : "" );
			}
				
			return $value;
		}
		
		public static function Ultimas($Limit=5, $IdNotIn=0){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
				new SearchQueryComparer(NoticiaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
				new SearchQueryComparer(NoticiaAttribute::IdNoticia(), SearchComparer::Diferente(), SearchCondition::E(), $IdNotIn),
				new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
			), array(
				new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
			), 0, $Limit);
			
			return NoticiaManage2::consultarNoticia(3, $query);
		}
		
		public static function Ultima($IdEditoria){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
					new SearchQueryComparer(NoticiaAttribute::IdEditoria(), SearchComparer::Igual(), SearchCondition::E(),  $IdEditoria),
					new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
			), array(
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
			), 0, 1);
			
			$obj = new Noticia();
			if($obj->buscar($query)){
				return $obj;
			}
			
			return null;
		}
		
		public static function Autocomplete( $Chave ){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
				new SearchQueryComparer(NoticiaAttribute::Titulo(), SearchComparer::Contem(), SearchCondition::E(), $Chave),
			), array(
					new SearchQueryOrder(NoticiaAttribute::Titulo(), SearchOrder::Crescente())
			), 0, 10);
		
			return NoticiaManage2::consultarNoticia(3, $query);
		}
		
		public static function Slug($IdNoticia, $Titulo, $IdEditoria){
			//$obj = new Editoria();
			//$obj->buscarEditoria(1, $IdEditoria);
			//$editoria = preg_replace("{[^a-z0-9]}", "", Url::_RewriteString($obj->getNome()));
			$editoria = "noticia";
			
			return $editoria."-$IdNoticia-".Url::_RewriteString($Titulo);
		}
		
		public static function EncurtarUrl($Url){
			$Url = TwitterBitLy::Short( $Url );
			//$Url = new TwitterMigreMe( $Url );
				
			return $Url;
		}
		
		public static function Noticias_Relacionadas($IdNoticia, $Limit=100){
			
			$adapter = Config::getAdapterService('Noticia');
			
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
					
					$objNoticiaRelacao = new NoticiaRelacao();
					$itens = $objNoticiaRelacao->consultarSearchQuery(array(
						new SearchQueryComparer(NoticiaRelacaoAttribute::IdNoticia(), SearchComparer::Igual(), SearchCondition::E(), $IdNoticia)
					));
					$in = array();
					foreach ($itens as $relacao) {
						$in[] = $relacao->getIdNoticiaLigacao();
					}
					if( count($in) <= 0){
						return array();
					}
					$query = array(
						NoticiaAttribute::IdNoticia() => array('$in' => $in)
					);
					$sort = SearchOrderMongo::Mounter(NoticiaAttribute::Datahora(), SearchOrder::Decrescente());
					
					return NoticiaManage2::consultar($query, $sort, 0, $Limit);
				} break;
				default:{
					$sql = "SELECT DISTINCT
								tb_noticia.*
							FROM
								tb_noticia
								INNER JOIN tb_noticia_relacao ON (tb_noticia.id_noticia = tb_noticia_relacao.id_noticia_ligacao)
							WHERE
								tb_noticia_relacao.id_noticia = $IdNoticia AND
								tb_noticia.`status` = ".NoticiaStatus::Publicado()."
							ORDER BY
								tb_noticia.datahora DESC 
							LIMIT $Limit";
					
					return NoticiaManage2::consultar($query);
				} break;
			}
			
			return array();
		}
		
		public static function Noticias_Area($IdAreaPublicacao, $Quantidade){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
				new SearchQueryComparer(NoticiaAttribute::IdAreaPublicacao(), SearchComparer::Igual(), SearchCondition::E(), $IdAreaPublicacao),
				new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
			), array(
				new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
			), 0, $Quantidade);
			
			return NoticiaManage2::consultarNoticia(3, $query);
		}

		public static function Noticias_Data($Data, $Limit=10){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
				new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
				new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), System::FormatarData($Data, "Y-m-d")." 00:00:01"),
				new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), System::FormatarData($Data, "Y-m-d")." 23:59:59"),
			), array(
				new SearchQueryOrder(NoticiaAttribute::Click(), SearchOrder::Decrescente()),
				new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
			), 0, $Limit);
			
			return NoticiaManage2::consultarNoticia(3, $query);
		}
		
		public static function Ultimas_Semana(){
			
			/*$datas = array();
			
			$sql = "SELECT DISTINCT 
					  DATE(tb_noticia.datahora) AS `data`
					FROM
					  tb_noticia
					WHERE
					  tb_noticia.`status` = 1 AND DATE(tb_noticia.datahora) < DATE(NOW()) AND DATE(tb_noticia.datahora) <> '0000-00-00'
					ORDER BY
					  DATE(tb_noticia.datahora) DESC 
					LIMIT 6";
			
			$dbq = new dbQuery();
			$dbq->consultar($sql);
			while( $dbq->registro() ){
				$datas[] = array("dia"=>$dbq->valor("data"));
			}	
			$dbq->desconectar(); unset($dbq);
			
			for ($i = 0; $i < count($datas); $i++) {
				$datas[$i]["legenda"] = System::DescricaoSemana(date("N", strtotime( $datas[$i]["dia"] )));
				$datas[$i]["Noticias"] = NoticiaManage2::Noticias_Data($datas[$i]["dia"], 4);
			}
			
			return $datas;*/
		}
		
		public static function Acessar(Noticia $objNoticia){
			$objNoticia->setClick( $objNoticia->getClick() + 1);
			return $objNoticia->alterarAtributoClick();
		}
		
		public static function Imagem_Noticia(Noticia $objNoticia){
			if(strlen($objNoticia->getFotoArquivo()) > 0){
				return sprintf("%s%simages/noticia/%s", Url::_Host(), Url::_Path(), $objNoticia->getFotoArquivo());
			}
			if(strlen($objNoticia->getFotoAreaPublicacao()) > 0){
				return sprintf("%s%simages/noticia/%s", Url::_Host(), Url::_Path(), $objNoticia->getFotoAreaPublicacao());
			}
			return NoticiaManage2::Imagem_Texto( System::_TextByHtml($objNoticia->getTexto() ) );
		}
		
		public static function Imagem_Texto($string){
			$tmpval = array();
			$preg = "|<img(.*?)>|s";
			preg_match_all($preg, $string, $tags);
			if(count($tags) > 0){
				$preg = '|src="(.*?)"|s';
				preg_match_all($preg, $string, $tags);
				if(count($tags) > 0){
					return $tags[1][0];
				}else{
					$preg = "|src='(.*?)'|s";
					preg_match_all($preg, $string, $tags);
					return $tags[1][0];
				}
			}
			return "";
		}
		
		public static function Indicar($IdNoticia, $Nome, $Email){
		
			$obj = new Noticia();
			if(!$obj->buscarNoticia(1, $IdNoticia)){
				return false;
			}
		
			$Site = CurrentSite::Site();
			$_Email = new Email( $Site );
			$_Email->IndicarNoticia($Nome, $Email, $obj->getTitulo(), Url::_Host().Url::Noticia_Slug($obj->getIdNoticia(), $obj->getSlug()));
		
			return IndiqueManage::inserirIndique(-1, null, null, $Nome, $Email, $Nome, $Email, $_SERVER['REMOTE_ADDR'], session_id(), date("Y-m-d H:i:s"));
		}

		public static function Erro($IdNoticia, $Nome, $Email, $Mensagem){
			$msg = "";
				
			$Noticia = new Noticia();
			if($Noticia->buscarNoticia(1, intval($IdNoticia))){
				$msg .= "<b>Notícia: </b> ".$Noticia->getTitulo()." [Código: ".$Noticia->getIdNoticia()."] <br />";
			}
			$msg .= "<b>Erro: </b> $Mensagem";
				
			$obj = new FaleConosco();
			$obj->setIdFaleConosco( -1 );
			$obj->setIdentificador( null );
			$obj->setIdeOrigem( null );
			$obj->setIdFaleConoscoAssunto( 6 );
			$obj->setNome( $Nome );
			$obj->setEmail( $Email );
			$obj->setTelefone( "" );
			$obj->setCidade( "" );
			$obj->setEstado( "" );
			$obj->setMensagem( $msg );
			$obj->setDatahora( date("Y-m-d H:i:s") );
			$obj->setStatus( 0 );
			$obj->inserirFaleConosco();
		
			$_Email = new Email(CurrentSite::Site());
			$_Email->FaleConosco($obj);
		
			return true;
		}
	}
?>