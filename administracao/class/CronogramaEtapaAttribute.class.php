<?
	class CronogramaEtapaAttribute{
		public static function IdCronogramaEtapa(){
			return "id_cronograma_etapa";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdCronogramaTipo(){
			return "id_cronograma_tipo";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Porcentagem(){
			return "porcentagem";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_cronograma_etapa";
		}
		public static function _Default(){
			return CronogramaEtapaAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case CronogramaEtapaAttribute::IdCronogramaEtapa() : { return true; } break;
				case CronogramaEtapaAttribute::Identificador() : { return true; } break;
				case CronogramaEtapaAttribute::IdCronogramaTipo() : { return true; } break;
				case CronogramaEtapaAttribute::Titulo() : { return true; } break;
				case CronogramaEtapaAttribute::Descricao() : { return true; } break;
				case CronogramaEtapaAttribute::Porcentagem() : { return true; } break;
				case CronogramaEtapaAttribute::Prioridade() : { return true; } break;
				case CronogramaEtapaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_cronograma_etapa", "type"=>"bigint(20)", "text"=>"Cуdigo Cronograma Etapa"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_cronograma_tipo", "type"=>"bigint(20)", "text"=>"Cуdigo Cronograma Tipo"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Tнtulo"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"porcentagem", "type"=>"int(11)", "text"=>"Porcentagem"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_cronograma_etapa","identificador","id_cronograma_tipo","titulo","descricao","porcentagem","prioridade","status");
		}
	}
?>