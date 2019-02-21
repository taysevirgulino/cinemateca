<?
	class SiteGrupoAttribute{
		public static function IdSiteGrupo(){
			return "id_site_grupo";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdSite(){
			return "id_site";
		}
		public static function IdAppUsuarioGrupo(){
			return "id_app_usuario_grupo";
		}
		public static function _Table(){
			return "tb_site_grupo";
		}
		public static function _Default(){
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case SiteGrupoAttribute::IdSiteGrupo() : { return true; } break;
				case SiteGrupoAttribute::Identificador() : { return true; } break;
				case SiteGrupoAttribute::IdSite() : { return true; } break;
				case SiteGrupoAttribute::IdAppUsuarioGrupo() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_site_grupo", "type"=>"bigint(20)", "text"=>"Código Site Grupo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_site", "type"=>"bigint(20)", "text"=>"Código Site"),
				array("value"=>"id_app_usuario_grupo", "type"=>"bigint(20)", "text"=>"Código App Usuário Grupo"),
			);
		}
		public static function _GetKeys(){
			return array("id_site_grupo","identificador","id_site","id_app_usuario_grupo");
		}
	}
?>