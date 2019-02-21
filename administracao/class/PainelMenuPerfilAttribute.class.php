<?
	class PainelMenuPerfilAttribute{
		public static function IdPainelMenuPerfil(){
			return "id_painel_menu_perfil";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdPainelMenu(){
			return "id_painel_menu";
		}
		public static function IdUsuarioPerfil(){
			return "id_usuario_perfil";
		}
		public static function _Table(){
			return "tb_painel_menu_perfil";
		}
		public static function _Default(){
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case PainelMenuPerfilAttribute::IdPainelMenuPerfil() : { return true; } break;
				case PainelMenuPerfilAttribute::Identificador() : { return true; } break;
				case PainelMenuPerfilAttribute::IdPainelMenu() : { return true; } break;
				case PainelMenuPerfilAttribute::IdUsuarioPerfil() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_painel_menu_perfil", "type"=>"bigint(20)", "text"=>"Código Painel Menu Perfil"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_painel_menu", "type"=>"bigint(20)", "text"=>"Código Painel Menu"),
				array("value"=>"id_usuario_perfil", "type"=>"bigint(20)", "text"=>"Código Usuário Perfil"),
			);
		}
		public static function _GetKeys(){
			return array("id_painel_menu_perfil","identificador","id_painel_menu","id_usuario_perfil");
		}
	}
?>