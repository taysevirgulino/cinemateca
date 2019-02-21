<?
	class PainelMenuAttribute{
		public static function IdPainelMenu(){
			return "id_painel_menu";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdPainelMenuPai(){
			return "id_painel_menu_pai";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Url(){
			return "url";
		}
		public static function Style(){
			return "style";
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
			return "tb_painel_menu";
		}
		public static function _Default(){
			return PainelMenuAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case PainelMenuAttribute::IdPainelMenu() : { return true; } break;
				case PainelMenuAttribute::Identificador() : { return true; } break;
				case PainelMenuAttribute::IdPainelMenuPai() : { return true; } break;
				case PainelMenuAttribute::Nome() : { return true; } break;
				case PainelMenuAttribute::Url() : { return true; } break;
				case PainelMenuAttribute::Style() : { return true; } break;
				case PainelMenuAttribute::Target() : { return true; } break;
				case PainelMenuAttribute::Prioridade() : { return true; } break;
				case PainelMenuAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_painel_menu", "type"=>"bigint(20)", "text"=>"Código Painel Menu"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_painel_menu_pai", "type"=>"bigint(20)", "text"=>"Código Painel Menu Pai"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"url", "type"=>"varchar(255)", "text"=>"Url (Endereço)"),
				array("value"=>"style", "type"=>"varchar(255)", "text"=>"Style"),
				array("value"=>"target", "type"=>"varchar(20)", "text"=>"Abrir"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_painel_menu","identificador","id_painel_menu_pai","nome","url","style","target","prioridade","status");
		}
	}
?>