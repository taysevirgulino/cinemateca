<?
	class EnqueteAlternativaAttribute{
		public static function IdEnqueteAlternativa(){
			return "id_enquete_alternativa";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdEnquete(){
			return "id_enquete";
		}
		public static function Resposta(){
			return "resposta";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_enquete_alternativa";
		}
		public static function _Default(){
			return EnqueteAlternativaAttribute::Resposta();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EnqueteAlternativaAttribute::IdEnqueteAlternativa() : { return true; } break;
				case EnqueteAlternativaAttribute::Identificador() : { return true; } break;
				case EnqueteAlternativaAttribute::IdeOrigem() : { return true; } break;
				case EnqueteAlternativaAttribute::IdEnquete() : { return true; } break;
				case EnqueteAlternativaAttribute::Resposta() : { return true; } break;
				case EnqueteAlternativaAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_enquete_alternativa", "type"=>"bigint(20)", "text"=>"Código Enquete Alternativa"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_enquete", "type"=>"bigint(20)", "text"=>"Código Enquete"),
				array("value"=>"resposta", "type"=>"varchar(255)", "text"=>"Resposta"),
				array("value"=>"prioridade", "type"=>"bigint(20)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_enquete_alternativa","identificador","ide_origem","id_enquete","resposta","prioridade");
		}
	}
?>