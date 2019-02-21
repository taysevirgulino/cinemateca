<?
	class CronogramaTipoAttribute{
		public static function IdCronogramaTipo(){
			return "id_cronograma_tipo";
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
			return "tb_cronograma_tipo";
		}
		public static function _Default(){
			return CronogramaTipoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case CronogramaTipoAttribute::IdCronogramaTipo() : { return true; } break;
				case CronogramaTipoAttribute::Identificador() : { return true; } break;
				case CronogramaTipoAttribute::Titulo() : { return true; } break;
				case CronogramaTipoAttribute::Prioridade() : { return true; } break;
				case CronogramaTipoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_cronograma_tipo", "type"=>"bigint(20)", "text"=>"Código Cronograma Tipo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_cronograma_tipo","identificador","titulo","prioridade","status");
		}
	}
?>