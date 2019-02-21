<?
	class AcessoRapidoBlocoAttribute{
		public static function IdAcessoRapidoBloco(){
			return "id_acesso_rapido_bloco";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_acesso_rapido_bloco";
		}
		public static function _Default(){
			return AcessoRapidoBlocoAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AcessoRapidoBlocoAttribute::IdAcessoRapidoBloco() : { return true; } break;
				case AcessoRapidoBlocoAttribute::Identificador() : { return true; } break;
				case AcessoRapidoBlocoAttribute::IdeOrigem() : { return true; } break;
				case AcessoRapidoBlocoAttribute::Nome() : { return true; } break;
				case AcessoRapidoBlocoAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_acesso_rapido_bloco", "type"=>"bigint(20)", "text"=>"Código Acesso Rápido Bloco"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_acesso_rapido_bloco","identificador","ide_origem","nome","prioridade");
		}
	}
?>