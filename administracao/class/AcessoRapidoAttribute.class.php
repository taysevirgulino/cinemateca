<?
	class AcessoRapidoAttribute{
		public static function IdAcessoRapido(){
			return "id_acesso_rapido";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdAcessoRapidoPai(){
			return "id_acesso_rapido_pai";
		}
		public static function IdAcessoRapidoBloco(){
			return "id_acesso_rapido_bloco";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Url(){
			return "url";
		}
		public static function Target(){
			return "target";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_acesso_rapido";
		}
		public static function _Default(){
			return AcessoRapidoAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AcessoRapidoAttribute::IdAcessoRapido() : { return true; } break;
				case AcessoRapidoAttribute::Identificador() : { return true; } break;
				case AcessoRapidoAttribute::IdeOrigem() : { return true; } break;
				case AcessoRapidoAttribute::IdAcessoRapidoPai() : { return true; } break;
				case AcessoRapidoAttribute::IdAcessoRapidoBloco() : { return true; } break;
				case AcessoRapidoAttribute::Nome() : { return true; } break;
				case AcessoRapidoAttribute::Url() : { return true; } break;
				case AcessoRapidoAttribute::Target() : { return true; } break;
				case AcessoRapidoAttribute::Prioridade() : { return true; } break;
				case AcessoRapidoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_acesso_rapido", "type"=>"bigint(20)", "text"=>"Código Acesso Rápido"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_acesso_rapido_pai", "type"=>"bigint(20)", "text"=>"Código Acesso Rápido Pai"),
				array("value"=>"id_acesso_rapido_bloco", "type"=>"bigint(20)", "text"=>"Código Acesso Rápido Bloco"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"url", "type"=>"varchar(255)", "text"=>"Url (Endereço)"),
				array("value"=>"target", "type"=>"varchar(20)", "text"=>"Abrir"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_acesso_rapido","identificador","ide_origem","id_acesso_rapido_pai","id_acesso_rapido_bloco","nome","url","target","prioridade","status");
		}
	}
?>