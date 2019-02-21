<?
	class EnqueteRespostaAttribute{
		public static function IdEnqueteResposta(){
			return "id_enquete_resposta";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdEnqueteAlternativa(){
			return "id_enquete_alternativa";
		}
		public static function Ip(){
			return "ip";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function _Table(){
			return "tb_enquete_resposta";
		}
		public static function _Default(){
			return EnqueteRespostaAttribute::Ip();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EnqueteRespostaAttribute::IdEnqueteResposta() : { return true; } break;
				case EnqueteRespostaAttribute::Identificador() : { return true; } break;
				case EnqueteRespostaAttribute::IdeOrigem() : { return true; } break;
				case EnqueteRespostaAttribute::IdEnqueteAlternativa() : { return true; } break;
				case EnqueteRespostaAttribute::Ip() : { return true; } break;
				case EnqueteRespostaAttribute::Datahora() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_enquete_resposta", "type"=>"bigint(20)", "text"=>"Código Enquete Resposta"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_enquete_alternativa", "type"=>"bigint(20)", "text"=>"Código Enquete Alternativa"),
				array("value"=>"ip", "type"=>"varchar(32)", "text"=>"Ip"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
			);
		}
		public static function _GetKeys(){
			return array("id_enquete_resposta","identificador","ide_origem","id_enquete_alternativa","ip","datahora");
		}
	}
?>