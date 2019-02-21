<?
	class SegmentoAttribute{
		public static function IdSegmento(){
			return "id_segmento";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Cor(){
			return "cor";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_segmento";
		}
		public static function _Default(){
			return SegmentoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case SegmentoAttribute::IdSegmento() : { return true; } break;
				case SegmentoAttribute::Identificador() : { return true; } break;
				case SegmentoAttribute::Titulo() : { return true; } break;
				case SegmentoAttribute::Cor() : { return true; } break;
				case SegmentoAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_segmento", "type"=>"bigint(20)", "text"=>"Código Segmento"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"cor", "type"=>"varchar(20)", "text"=>"Cor"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_segmento","identificador","titulo","cor","prioridade");
		}
	}
?>