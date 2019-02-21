<?
	class MensagemAcessoAttribute{
		public static function IdMensagemAcesso(){
			return "id_mensagem_acesso";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdMensagem(){
			return "id_mensagem";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_mensagem_acesso";
		}
		public static function _Default(){
			return MensagemAcessoAttribute::Datahora();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case MensagemAcessoAttribute::IdMensagemAcesso() : { return true; } break;
				case MensagemAcessoAttribute::Identificador() : { return true; } break;
				case MensagemAcessoAttribute::IdMensagem() : { return true; } break;
				case MensagemAcessoAttribute::IdUsuario() : { return true; } break;
				case MensagemAcessoAttribute::Datahora() : { return true; } break;
				case MensagemAcessoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_mensagem_acesso", "type"=>"bigint(20)", "text"=>"Código Mensagem Acesso"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_mensagem", "type"=>"bigint(20)", "text"=>"Código Mensagem"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_mensagem_acesso","identificador","id_mensagem","id_usuario","datahora","status");
		}
	}
?>