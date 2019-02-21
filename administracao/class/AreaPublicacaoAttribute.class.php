<?
	class AreaPublicacaoAttribute{
		public static function IdAreaPublicacao(){
			return "id_area_publicacao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdAreaPublicacaoBloco(){
			return "id_area_publicacao_bloco";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Quantidade(){
			return "quantidade";
		}
		public static function Img(){
			return "img";
		}
		public static function ImgWidth(){
			return "img_width";
		}
		public static function ImgHeight(){
			return "img_height";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_area_publicacao";
		}
		public static function _Default(){
			return AreaPublicacaoAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AreaPublicacaoAttribute::IdAreaPublicacao() : { return true; } break;
				case AreaPublicacaoAttribute::Identificador() : { return true; } break;
				case AreaPublicacaoAttribute::IdAreaPublicacaoBloco() : { return true; } break;
				case AreaPublicacaoAttribute::Nome() : { return true; } break;
				case AreaPublicacaoAttribute::Quantidade() : { return true; } break;
				case AreaPublicacaoAttribute::Img() : { return true; } break;
				case AreaPublicacaoAttribute::ImgWidth() : { return true; } break;
				case AreaPublicacaoAttribute::ImgHeight() : { return true; } break;
				case AreaPublicacaoAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_area_publicacao", "type"=>"bigint(20)", "text"=>"Cуdigo Бrea Publicaзгo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_area_publicacao_bloco", "type"=>"bigint(20)", "text"=>"Cуdigo Бrea Publicaзгo Bloco"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"quantidade", "type"=>"int(11)", "text"=>"Quantidade"),
				array("value"=>"img", "type"=>"int(11)", "text"=>"Img"),
				array("value"=>"img_width", "type"=>"int(11)", "text"=>"Img Largura (Width)"),
				array("value"=>"img_height", "type"=>"int(11)", "text"=>"Img Altura (Height)"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_area_publicacao","identificador","id_area_publicacao_bloco","nome","quantidade","img","img_width","img_height","prioridade");
		}
	}
?>