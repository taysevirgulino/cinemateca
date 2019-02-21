<?
	class CurriculoSegmentoAttribute{
		public static function IdCurriculoSegmento(){
			return "id_curriculo_segmento";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_curriculo_segmento";
		}
		public static function _Default(){
			return CurriculoSegmentoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case CurriculoSegmentoAttribute::IdCurriculoSegmento() : { return true; } break;
				case CurriculoSegmentoAttribute::Identificador() : { return true; } break;
				case CurriculoSegmentoAttribute::Titulo() : { return true; } break;
				case CurriculoSegmentoAttribute::Prioridade() : { return true; } break;
				case CurriculoSegmentoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_curriculo_segmento", "type"=>"bigint(20)", "text"=>"Código Currículo Segmento"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_curriculo_segmento","identificador","titulo","prioridade","status");
		}
	}
?>