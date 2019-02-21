<?
	class FaleConoscoAttribute{
		public static function IdFaleConosco(){
			return "id_fale_conosco";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdFaleConoscoAssunto(){
			return "id_fale_conosco_assunto";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Email(){
			return "email";
		}
		public static function Telefone(){
			return "telefone";
		}
		public static function Cidade(){
			return "cidade";
		}
		public static function Estado(){
			return "estado";
		}
		public static function Mensagem(){
			return "mensagem";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_fale_conosco";
		}
		public static function _Default(){
			return FaleConoscoAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case FaleConoscoAttribute::IdFaleConosco() : { return true; } break;
				case FaleConoscoAttribute::Identificador() : { return true; } break;
				case FaleConoscoAttribute::IdeOrigem() : { return true; } break;
				case FaleConoscoAttribute::IdFaleConoscoAssunto() : { return true; } break;
				case FaleConoscoAttribute::Nome() : { return true; } break;
				case FaleConoscoAttribute::Email() : { return true; } break;
				case FaleConoscoAttribute::Telefone() : { return true; } break;
				case FaleConoscoAttribute::Cidade() : { return true; } break;
				case FaleConoscoAttribute::Estado() : { return true; } break;
				case FaleConoscoAttribute::Mensagem() : { return true; } break;
				case FaleConoscoAttribute::Datahora() : { return true; } break;
				case FaleConoscoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_fale_conosco", "type"=>"bigint(20)", "text"=>"Código Fale Conosco"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_fale_conosco_assunto", "type"=>"bigint(20)", "text"=>"Código Fale Conosco Assunto"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"email", "type"=>"varchar(200)", "text"=>"E-mail"),
				array("value"=>"telefone", "type"=>"varchar(20)", "text"=>"Telefone"),
				array("value"=>"cidade", "type"=>"varchar(255)", "text"=>"Cidade"),
				array("value"=>"estado", "type"=>"varchar(2)", "text"=>"Estado"),
				array("value"=>"mensagem", "type"=>"text", "text"=>"Mensagem"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_fale_conosco","identificador","ide_origem","id_fale_conosco_assunto","nome","email","telefone","cidade","estado","mensagem","datahora","status");
		}
	}
?>