<?
	class UsuarioStatus {
		public static function Ativo(){
			return 1;
		}
		public static function Inativo(){
			return 2;
		}
		public static function Cancelado(){
			return 3;
		}
		public static function _Default(){
			return UsuarioStatus::Ativo();
		}
		public static function _Descricao($value){
			switch ($value){
				case UsuarioStatus::Ativo() : return "<span class='negrito verde'>Ativo</span>";
				case UsuarioStatus::Inativo() : return "<span class='vermelho negrito'>Inativo</span>";
				case UsuarioStatus::Cancelado() : return "<span class='vermelho'><strike>Cancelado</strike></span>";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(UsuarioStatus::Ativo(), UsuarioStatus::_Descricao(UsuarioStatus::Ativo()));
			$vobj[] = array(UsuarioStatus::Inativo(), UsuarioStatus::_Descricao(UsuarioStatus::Inativo()));
			$vobj[] = array(UsuarioStatus::Cancelado(), UsuarioStatus::_Descricao(UsuarioStatus::Cancelado()));
			
			return $vobj;
		}
	}
?>