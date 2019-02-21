<?
	class JornalEdicaoAttribute{
		public static function IdJornalEdicao(){
			return "id_jornal_edicao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Numero(){
			return "numero";
		}
		public static function Ano(){
			return "ano";
		}
		public static function DataInicial(){
			return "data_inicial";
		}
		public static function DataFinal(){
			return "data_final";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_jornal_edicao";
		}
		public static function _Default(){
			return JornalEdicaoAttribute::Numero();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case JornalEdicaoAttribute::IdJornalEdicao() : { return true; } break;
				case JornalEdicaoAttribute::Identificador() : { return true; } break;
				case JornalEdicaoAttribute::Numero() : { return true; } break;
				case JornalEdicaoAttribute::Ano() : { return true; } break;
				case JornalEdicaoAttribute::DataInicial() : { return true; } break;
				case JornalEdicaoAttribute::DataFinal() : { return true; } break;
				case JornalEdicaoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_jornal_edicao", "type"=>"bigint(20)", "text"=>"Cуdigo Jornal Ediзгo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"numero", "type"=>"varchar(5)", "text"=>"Nъmero"),
				array("value"=>"ano", "type"=>"varchar(4)", "text"=>"Ano"),
				array("value"=>"data_inicial", "type"=>"date", "text"=>"Data Inicial"),
				array("value"=>"data_final", "type"=>"date", "text"=>"Data Final"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_jornal_edicao","identificador","numero","ano","data_inicial","data_final","status");
		}
	}
?>