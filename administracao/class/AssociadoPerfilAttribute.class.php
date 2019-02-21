<?
	class AssociadoPerfilAttribute{
		public static function IdAssociadoPerfil(){
			return "id_associado_perfil";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_associado_perfil";
		}
		public static function _Default(){
			return AssociadoPerfilAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AssociadoPerfilAttribute::IdAssociadoPerfil() : { return true; } break;
				case AssociadoPerfilAttribute::Identificador() : { return true; } break;
				case AssociadoPerfilAttribute::Titulo() : { return true; } break;
				case AssociadoPerfilAttribute::Prioridade() : { return true; } break;
				case AssociadoPerfilAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_associado_perfil", "type"=>"bigint(20)", "text"=>"Código Associado Perfil"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"prioridade", "type"=>"bigint(20)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_associado_perfil","identificador","titulo","prioridade","status");
		}
	}
?>