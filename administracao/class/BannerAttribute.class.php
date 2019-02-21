<?
	class BannerAttribute{
		public static function IdBanner(){
			return "id_banner";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdBannerLocal(){
			return "id_banner_local";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Url(){
			return "url";
		}
		public static function Target(){
			return "target";
		}
		public static function Width(){
			return "width";
		}
		public static function Height(){
			return "height";
		}
		public static function PeriodoStatus(){
			return "periodo_status";
		}
		public static function PeriodoInicial(){
			return "periodo_inicial";
		}
		public static function PeriodoFinal(){
			return "periodo_final";
		}
		public static function Arquivo(){
			return "arquivo";
		}
		public static function Tipo(){
			return "tipo";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_banner";
		}
		public static function _Default(){
			return BannerAttribute::Descricao();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case BannerAttribute::IdBanner() : { return true; } break;
				case BannerAttribute::Identificador() : { return true; } break;
				case BannerAttribute::IdeOrigem() : { return true; } break;
				case BannerAttribute::IdBannerLocal() : { return true; } break;
				case BannerAttribute::Descricao() : { return true; } break;
				case BannerAttribute::Url() : { return true; } break;
				case BannerAttribute::Target() : { return true; } break;
				case BannerAttribute::Width() : { return true; } break;
				case BannerAttribute::Height() : { return true; } break;
				case BannerAttribute::PeriodoStatus() : { return true; } break;
				case BannerAttribute::PeriodoInicial() : { return true; } break;
				case BannerAttribute::PeriodoFinal() : { return true; } break;
				case BannerAttribute::Arquivo() : { return true; } break;
				case BannerAttribute::Tipo() : { return true; } break;
				case BannerAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_banner", "type"=>"bigint(20)", "text"=>"Código Banner"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_banner_local", "type"=>"bigint(20)", "text"=>"Código Banner Local"),
				array("value"=>"descricao", "type"=>"varchar(200)", "text"=>"Descrição"),
				array("value"=>"url", "type"=>"varchar(255)", "text"=>"Url (Endereço)"),
				array("value"=>"target", "type"=>"varchar(20)", "text"=>"Abrir"),
				array("value"=>"width", "type"=>"varchar(20)", "text"=>"Largura (Width)"),
				array("value"=>"height", "type"=>"varchar(20)", "text"=>"Altura (Height)"),
				array("value"=>"periodo_status", "type"=>"int(11)", "text"=>"Período Status"),
				array("value"=>"periodo_inicial", "type"=>"date", "text"=>"Período Inicial"),
				array("value"=>"periodo_final", "type"=>"date", "text"=>"Período Final"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"tipo", "type"=>"int(11)", "text"=>"Tipo"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_banner","identificador","ide_origem","id_banner_local","descricao","url","target","width","height","periodo_status","periodo_inicial","periodo_final","arquivo","tipo","status");
		}
	}
?>