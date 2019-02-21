<?
	class AreaPublicacaoBlocoAttribute{
		public static function IdAreaPublicacaoBloco(){
			return "id_area_publicacao_bloco";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Legenda(){
			return "legenda";
		}
		public static function Url(){
			return "url";
		}
		public static function Style(){
			return "style";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_area_publicacao_bloco";
		}
		public static function _Default(){
			return AreaPublicacaoBlocoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AreaPublicacaoBlocoAttribute::IdAreaPublicacaoBloco() : { return true; } break;
				case AreaPublicacaoBlocoAttribute::Identificador() : { return true; } break;
				case AreaPublicacaoBlocoAttribute::Titulo() : { return true; } break;
				case AreaPublicacaoBlocoAttribute::Legenda() : { return true; } break;
				case AreaPublicacaoBlocoAttribute::Url() : { return true; } break;
				case AreaPublicacaoBlocoAttribute::Style() : { return true; } break;
				case AreaPublicacaoBlocoAttribute::Prioridade() : { return true; } break;
				case AreaPublicacaoBlocoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_area_publicacao_bloco", "type"=>"bigint(20)", "text"=>"Código Área Publicação Bloco"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"legenda", "type"=>"varchar(255)", "text"=>"Legenda"),
				array("value"=>"url", "type"=>"varchar(255)", "text"=>"Url (Endereço)"),
				array("value"=>"style", "type"=>"varchar(100)", "text"=>"Style"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_area_publicacao_bloco","identificador","titulo","legenda","url","style","prioridade","status");
		}
	}
?>