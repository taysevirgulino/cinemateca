<?
	class BannerAcessoAttribute{
		public static function IdBannerAcesso(){
			return "id_banner_acesso";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdBanner(){
			return "id_banner";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Click(){
			return "click";
		}
		public static function View(){
			return "view";
		}
		public static function _Table(){
			return "tb_banner_acesso";
		}
		public static function _Default(){
			return BannerAcessoAttribute::Datahora();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case BannerAcessoAttribute::IdBannerAcesso() : { return true; } break;
				case BannerAcessoAttribute::Identificador() : { return true; } break;
				case BannerAcessoAttribute::IdBanner() : { return true; } break;
				case BannerAcessoAttribute::Datahora() : { return true; } break;
				case BannerAcessoAttribute::Click() : { return true; } break;
				case BannerAcessoAttribute::View() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_banner_acesso", "type"=>"bigint(20)", "text"=>"Código Banner Acesso"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_banner", "type"=>"bigint(20)", "text"=>"Código Banner"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"click", "type"=>"int(11)", "text"=>"Click"),
				array("value"=>"view", "type"=>"int(11)", "text"=>"View"),
			);
		}
		public static function _GetKeys(){
			return array("id_banner_acesso","identificador","id_banner","datahora","click","view");
		}
	}
?>