<?
	class MensagemRespostaAttribute{
		public static function IdMensagemResposta(){
			return "id_mensagem_resposta";
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
		public static function Texto(){
			return "texto";
		}
		public static function Arquivo(){
			return "arquivo";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Ip(){
			return "ip";
		}
		public static function _Table(){
			return "tb_mensagem_resposta";
		}
		public static function _Default(){
			return MensagemRespostaAttribute::Texto();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case MensagemRespostaAttribute::IdMensagemResposta() : { return true; } break;
				case MensagemRespostaAttribute::Identificador() : { return true; } break;
				case MensagemRespostaAttribute::IdMensagem() : { return true; } break;
				case MensagemRespostaAttribute::IdUsuario() : { return true; } break;
				case MensagemRespostaAttribute::Texto() : { return true; } break;
				case MensagemRespostaAttribute::Arquivo() : { return true; } break;
				case MensagemRespostaAttribute::Datahora() : { return true; } break;
				case MensagemRespostaAttribute::Ip() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_mensagem_resposta", "type"=>"bigint(20)", "text"=>"Código Mensagem Resposta"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_mensagem", "type"=>"bigint(20)", "text"=>"Código Mensagem"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"ip", "type"=>"varchar(32)", "text"=>"Ip"),
			);
		}
		public static function _GetKeys(){
			return array("id_mensagem_resposta","identificador","id_mensagem","id_usuario","texto","arquivo","datahora","ip");
		}
	}
?>