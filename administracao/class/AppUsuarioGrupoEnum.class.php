<?
	class AppUsuarioGrupoEnum{
		public static function UsuarioGrupo(){
			return 0;
		}
		public static function UsuarioSistema(){
			return 1;
		}
		public static function _GetDescription($type){
			switch ($type){
				case AppUsuarioGrupoEnum::UsuarioGrupo() : { return "Usuário de Grupo"; } break;
				case AppUsuarioGrupoEnum::UsuarioSistema() : { return "Usuário do Sistema"; } break;
			}
		}
	}
?>