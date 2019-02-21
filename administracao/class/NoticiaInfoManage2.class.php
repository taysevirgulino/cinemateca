<? 
	class NoticiaInfoManage2 extends NoticiaInfoManage { 
		
		public static function Info($IdNoticia){
			$IdNoticia = intval($IdNoticia);
			$obj = new NoticiaInfo();
			if(!$obj->buscarNoticiaInfoAttribute(NoticiaInfoAttribute::IdNoticia(), $IdNoticia)){
				$Noticia = new Noticia();
				$Noticia->buscarNoticia(1, $IdNoticia);
				$Editoria = new Editoria();
				$Editoria->buscarEditoria(1, intval($Noticia->getIdEditoria()));
				
				$obj->setIdNoticiaInfo( null );
				$obj->setIdentificador( null );
				$obj->setIdNoticia( $IdNoticia );
				$obj->setIdAppUsuarioCadastro( 1 );
				$obj->setIdAppUsuarioEdicao( 1 );
				$obj->setDatahoraCadastro( $Noticia->getDatahora() );
				$obj->setDatahoraEdicao( "0000-00-00 00:00:00" );
				$obj->setUrlCurta( NoticiaInfoManage2::EncurtarUrl(Url::_Host().Url::Noticia($Noticia->getIdNoticia(), $Noticia->getIdentificador(), $Noticia->getTitulo(), $Editoria->getNome())) );
				$obj->inserirNoticiaInfo();
			}
			
			return $obj;
		}
		
		public static function EncurtarUrl($Url){
			$Url = TwitterBitLy::Short( $Url );
			//$Url = new TwitterMigreMe( $Url );
			
			return $Url;
		}

	} 
?>