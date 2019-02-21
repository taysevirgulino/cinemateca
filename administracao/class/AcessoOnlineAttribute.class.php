<?
	class AcessoOnlineAttribute{
		public static function IdAcessoOnline(){
			return "id_acesso_online";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function Sessao(){
			return "sessao";
		}
		public static function TimeStamp(){
			return "time_stamp";
		}
		public static function _Table(){
			return "tb_acesso_online";
		}
		public static function _Default(){
			return AcessoOnlineAttribute::Sessao();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AcessoOnlineAttribute::IdAcessoOnline() : { return true; } break;
				case AcessoOnlineAttribute::Identificador() : { return true; } break;
				case AcessoOnlineAttribute::IdeOrigem() : { return true; } break;
				case AcessoOnlineAttribute::Sessao() : { return true; } break;
				case AcessoOnlineAttribute::TimeStamp() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_acesso_online", "type"=>"bigint(20)", "text"=>"Código Acesso Online"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"sessao", "type"=>"varchar(32)", "text"=>"Sessão"),
				array("value"=>"time_stamp", "type"=>"bigint(20)", "text"=>"Time Stamp"),
			);
		}
		public static function _GetKeys(){
			return array("id_acesso_online","identificador","ide_origem","sessao","time_stamp");
		}
	}
?>