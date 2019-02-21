<?
	class CurriculoAreaAttribute{
		public static function IdCurriculoArea(){
			return "id_curriculo_area";
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
			return "tb_curriculo_area";
		}
		public static function _Default(){
			return CurriculoAreaAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case CurriculoAreaAttribute::IdCurriculoArea() : { return true; } break;
				case CurriculoAreaAttribute::Identificador() : { return true; } break;
				case CurriculoAreaAttribute::Titulo() : { return true; } break;
				case CurriculoAreaAttribute::Prioridade() : { return true; } break;
				case CurriculoAreaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_curriculo_area", "type"=>"bigint(20)", "text"=>"Código Currículo Área"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_curriculo_area","identificador","titulo","prioridade","status");
		}
	}
?>