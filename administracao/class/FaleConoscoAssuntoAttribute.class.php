<?
	class FaleConoscoAssuntoAttribute{
		public static function IdFaleConoscoAssunto(){
			return "id_fale_conosco_assunto";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function Assunto(){
			return "assunto";
		}
		public static function Emails(){
			return "emails";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_fale_conosco_assunto";
		}
		public static function _Default(){
			return FaleConoscoAssuntoAttribute::Assunto();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case FaleConoscoAssuntoAttribute::IdFaleConoscoAssunto() : { return true; } break;
				case FaleConoscoAssuntoAttribute::Identificador() : { return true; } break;
				case FaleConoscoAssuntoAttribute::IdeOrigem() : { return true; } break;
				case FaleConoscoAssuntoAttribute::Assunto() : { return true; } break;
				case FaleConoscoAssuntoAttribute::Emails() : { return true; } break;
				case FaleConoscoAssuntoAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_fale_conosco_assunto", "type"=>"bigint(20)", "text"=>"Código Fale Conosco Assunto"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"assunto", "type"=>"varchar(100)", "text"=>"Assunto"),
				array("value"=>"emails", "type"=>"varchar(255)", "text"=>"E-mails"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_fale_conosco_assunto","identificador","ide_origem","assunto","emails","prioridade");
		}
	}
?>