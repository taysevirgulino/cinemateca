<?
	class MensagemAttribute{
		public static function IdMensagem(){
			return "id_mensagem";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdEmpreendimento(){
			return "id_empreendimento";
		}
		public static function IdLojista(){
			return "id_lojista";
		}
		public static function IdUsuarioRemetente(){
			return "id_usuario_remetente";
		}
		public static function IdUsuarioDestinatario(){
			return "id_usuario_destinatario";
		}
		public static function Titulo(){
			return "titulo";
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
		public static function DatahoraEdicao(){
			return "datahora_edicao";
		}
		public static function Ip(){
			return "ip";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_mensagem";
		}
		public static function _Default(){
			return MensagemAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case MensagemAttribute::IdMensagem() : { return true; } break;
				case MensagemAttribute::Identificador() : { return true; } break;
				case MensagemAttribute::IdEmpreendimento() : { return true; } break;
				case MensagemAttribute::IdLojista() : { return true; } break;
				case MensagemAttribute::IdUsuarioRemetente() : { return true; } break;
				case MensagemAttribute::IdUsuarioDestinatario() : { return true; } break;
				case MensagemAttribute::Titulo() : { return true; } break;
				case MensagemAttribute::Texto() : { return true; } break;
				case MensagemAttribute::Arquivo() : { return true; } break;
				case MensagemAttribute::Datahora() : { return true; } break;
				case MensagemAttribute::DatahoraEdicao() : { return true; } break;
				case MensagemAttribute::Ip() : { return true; } break;
				case MensagemAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_mensagem", "type"=>"bigint(20)", "text"=>"Código Mensagem"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_empreendimento", "type"=>"bigint(20)", "text"=>"Código Empreendimento"),
				array("value"=>"id_lojista", "type"=>"bigint(20)", "text"=>"Código Lojista"),
				array("value"=>"id_usuario_remetente", "type"=>"bigint(20)", "text"=>"Código Usuário Remetente"),
				array("value"=>"id_usuario_destinatario", "type"=>"bigint(20)", "text"=>"Código Usuário Destinatário"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"datahora_edicao", "type"=>"datetime", "text"=>"Data/Hora Edição"),
				array("value"=>"ip", "type"=>"varchar(32)", "text"=>"Ip"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_mensagem","identificador","id_empreendimento","id_lojista","id_usuario_remetente","id_usuario_destinatario","titulo","texto","arquivo","datahora","datahora_edicao","ip","status");
		}
	}
?>