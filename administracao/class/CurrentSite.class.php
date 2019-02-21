<?
	class CurrentSite{
		
		public static function IdeOrigem(){
			return CurrentSite::Site()->getIdentificador();
			
			//return Current::IdeOrigemDefault();
			/*$ideOrigem = $_SESSION["NEW_IDE_ORIGEM"];

			if(empty($ideOrigem)){
				$ideOrigem = Current::IdeOrigemDefault();
			}
			
			return $ideOrigem;*/
		}

		public static function Site(){
			$parm = System::_GET("site");
			$obj = $_SESSION["NEW_CURRENT_SITE"];
			
			if ( get_class( $obj ) == "Site" ) {
				if($obj->getTemplate() != $parm){
					$obj = new Site();
					if( ! $obj->buscarSiteAttribute(SiteAttribute::Template(), $parm) ){
						$obj->buscarSiteAttribute(SiteAttribute::Identificador(), Current::IdeOrigemDefault());
					}
					CurrentSite::setSite( $obj );
				}
				return $obj;
			}else{
				$obj = new Site();
				if( ! $obj->buscarSiteAttribute(SiteAttribute::Template(), $parm) ){
					$obj->buscarSiteAttribute(SiteAttribute::Identificador(), Current::IdeOrigemDefault());
				}
				CurrentSite::setSite( $obj );
				return $obj;
			}
		}
		
		public static function Validar(){
			$Site = CurrentSite::Site();
			if($Site->getStatus() == 0){
				$Teste = System::_GET("producao");
				if(empty($Teste)){
					$Teste = $_SESSION["NEW_SITE_CONSTRUCAO"];
				}
				if($Teste != "artemsite"){
					System::Redirect(Url::_Path()."construcao/");
				}else{
					$_SESSION["NEW_SITE_CONSTRUCAO"] = $Teste;
				}
			}
		}
		
		public static function TemplateDefault(){
			return "default";
		}

		public static function setIdeOrigem($ideOrigem){
			$_SESSION["NEW_IDE_ORIGEM"] = ((Validacao::isHash($ideOrigem)) ? $ideOrigem : Current::IdeOrigemDefault() );
			$_SESSION["NEW_CURRENT_SITE"] = null;
		}
		
		private static function setSite($objSite){
			$_SESSION["NEW_IDE_ORIGEM"] = $objSite->getIdentificador();
			$_SESSION["NEW_CURRENT_SITE"] = $objSite;
		}
	}
?>