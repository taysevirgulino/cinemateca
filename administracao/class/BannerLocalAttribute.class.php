<?
	class BannerLocalAttribute{
		public static function IdBannerLocal(){
			return "id_banner_local";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Codigo(){
			return "codigo";
		}
		public static function _Table(){
			return "tb_banner_local";
		}
		public static function _Default(){
			return BannerLocalAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case BannerLocalAttribute::IdBannerLocal() : { return true; } break;
				case BannerLocalAttribute::Identificador() : { return true; } break;
				case BannerLocalAttribute::Nome() : { return true; } break;
				case BannerLocalAttribute::Codigo() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_banner_local", "type"=>"bigint(20)", "text"=>"Código Banner Local"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"nome", "type"=>"varchar(200)", "text"=>"Nome"),
				array("value"=>"codigo", "type"=>"varchar(20)", "text"=>"Código"),
			);
		}
		public static function _GetKeys(){
			return array("id_banner_local","identificador","nome","codigo");
		}
	}
?>