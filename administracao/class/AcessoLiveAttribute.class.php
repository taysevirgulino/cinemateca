<?
	class AcessoLiveAttribute{
		public static function IdAcessoLive(){
			return "id_acesso_live";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Acesso(){
			return "acesso";
		}
		public static function _Table(){
			return "tb_acesso_live";
		}
		public static function _Default(){
			return AcessoLiveAttribute::Datahora();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AcessoLiveAttribute::IdAcessoLive() : { return true; } break;
				case AcessoLiveAttribute::Identificador() : { return true; } break;
				case AcessoLiveAttribute::IdeOrigem() : { return true; } break;
				case AcessoLiveAttribute::Datahora() : { return true; } break;
				case AcessoLiveAttribute::Acesso() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_acesso_live", "type"=>"bigint(20)", "text"=>"Código Acesso Live"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"acesso", "type"=>"bigint(20)", "text"=>"Acesso"),
			);
		}
		public static function _GetKeys(){
			return array("id_acesso_live","identificador","ide_origem","datahora","acesso");
		}
	}
?>