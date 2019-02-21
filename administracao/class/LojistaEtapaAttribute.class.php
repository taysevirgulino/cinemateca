<?
	class LojistaEtapaAttribute{
		public static function IdLojistaEtapa(){
			return "id_lojista_etapa";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdCronogramaEtapa(){
			return "id_cronograma_etapa";
		}
		public static function IdLojista(){
			return "id_lojista";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Data(){
			return "data";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_lojista_etapa";
		}
		public static function _Default(){
			return LojistaEtapaAttribute::Data();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LojistaEtapaAttribute::IdLojistaEtapa() : { return true; } break;
				case LojistaEtapaAttribute::Identificador() : { return true; } break;
				case LojistaEtapaAttribute::IdCronogramaEtapa() : { return true; } break;
				case LojistaEtapaAttribute::IdLojista() : { return true; } break;
				case LojistaEtapaAttribute::IdUsuario() : { return true; } break;
				case LojistaEtapaAttribute::Data() : { return true; } break;
				case LojistaEtapaAttribute::Datahora() : { return true; } break;
				case LojistaEtapaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_lojista_etapa", "type"=>"bigint(20)", "text"=>"Código Lojista Etapa"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_cronograma_etapa", "type"=>"bigint(20)", "text"=>"Código Cronograma Etapa"),
				array("value"=>"id_lojista", "type"=>"bigint(20)", "text"=>"Código Lojista"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"data", "type"=>"date", "text"=>"Data"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_lojista_etapa","identificador","id_cronograma_etapa","id_lojista","id_usuario","data","datahora","status");
		}
	}
?>