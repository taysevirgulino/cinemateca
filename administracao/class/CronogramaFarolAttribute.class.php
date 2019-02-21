<?
	class CronogramaFarolAttribute{
		public static function IdCronogramaFarol(){
			return "id_cronograma_farol";
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
		public static function Peso(){
			return "peso";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_cronograma_farol";
		}
		public static function _Default(){
			return CronogramaFarolAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case CronogramaFarolAttribute::IdCronogramaFarol() : { return true; } break;
				case CronogramaFarolAttribute::Identificador() : { return true; } break;
				case CronogramaFarolAttribute::Titulo() : { return true; } break;
				case CronogramaFarolAttribute::Cor() : { return true; } break;
				case CronogramaFarolAttribute::Peso() : { return true; } break;
				case CronogramaFarolAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_cronograma_farol", "type"=>"bigint(20)", "text"=>"Código Cronograma Farol"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"cor", "type"=>"varchar(20)", "text"=>"Cor"),
				array("value"=>"peso", "type"=>"float(9,2)", "text"=>"Peso"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_cronograma_farol","identificador","titulo","cor","peso","prioridade");
		}
	}
?>