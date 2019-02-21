<?
	class NotificacaoAttribute{
		public static function IdNotificacao(){
			return "id_notificacao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Link(){
			return "link";
		}
		public static function Tipo(){
			return "tipo";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function DatahoraAcesso(){
			return "datahora_acesso";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_notificacao";
		}
		public static function _Default(){
			return NotificacaoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case NotificacaoAttribute::IdNotificacao() : { return true; } break;
				case NotificacaoAttribute::Identificador() : { return true; } break;
				case NotificacaoAttribute::IdUsuario() : { return true; } break;
				case NotificacaoAttribute::Titulo() : { return true; } break;
				case NotificacaoAttribute::Descricao() : { return true; } break;
				case NotificacaoAttribute::Link() : { return true; } break;
				case NotificacaoAttribute::Tipo() : { return true; } break;
				case NotificacaoAttribute::Datahora() : { return true; } break;
				case NotificacaoAttribute::DatahoraAcesso() : { return true; } break;
				case NotificacaoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_notificacao", "type"=>"bigint(20)", "text"=>"Cуdigo Notificaзгo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Cуdigo Usuбrio"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Tнtulo"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"link", "type"=>"varchar(255)", "text"=>"Link"),
				array("value"=>"tipo", "type"=>"int(11)", "text"=>"Tipo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"datahora_acesso", "type"=>"datetime", "text"=>"Data/Hora Acesso"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_notificacao","identificador","id_usuario","titulo","descricao","link","tipo","datahora","datahora_acesso","status");
		}
	}
?>