<?
	class TempoCidadeAttribute{
		public static function IdTempoCidade(){
			return "id_tempo_cidade";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Uf(){
			return "uf";
		}
		public static function Codigo(){
			return "codigo";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_tempo_cidade";
		}
		public static function _Default(){
			return TempoCidadeAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case TempoCidadeAttribute::IdTempoCidade() : { return true; } break;
				case TempoCidadeAttribute::Identificador() : { return true; } break;
				case TempoCidadeAttribute::Nome() : { return true; } break;
				case TempoCidadeAttribute::Uf() : { return true; } break;
				case TempoCidadeAttribute::Codigo() : { return true; } break;
				case TempoCidadeAttribute::Prioridade() : { return true; } break;
				case TempoCidadeAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_tempo_cidade", "type"=>"bigint(20)", "text"=>"Código Tempo Cidade"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"uf", "type"=>"varchar(2)", "text"=>"Uf"),
				array("value"=>"codigo", "type"=>"int(11)", "text"=>"Código"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_tempo_cidade","identificador","nome","uf","codigo","prioridade","status");
		}
	}
?>