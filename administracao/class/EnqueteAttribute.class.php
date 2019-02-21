<?
	class EnqueteAttribute{
		public static function IdEnquete(){
			return "id_enquete";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function Pergunta(){
			return "pergunta";
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
			return "tb_enquete";
		}
		public static function _Default(){
			return EnqueteAttribute::Pergunta();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EnqueteAttribute::IdEnquete() : { return true; } break;
				case EnqueteAttribute::Identificador() : { return true; } break;
				case EnqueteAttribute::IdeOrigem() : { return true; } break;
				case EnqueteAttribute::Pergunta() : { return true; } break;
				case EnqueteAttribute::DataInicial() : { return true; } break;
				case EnqueteAttribute::DataFinal() : { return true; } break;
				case EnqueteAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_enquete", "type"=>"bigint(20)", "text"=>"Código Enquete"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"pergunta", "type"=>"text", "text"=>"Pergunta"),
				array("value"=>"data_inicial", "type"=>"date", "text"=>"Data Inicial"),
				array("value"=>"data_final", "type"=>"date", "text"=>"Data Final"),
				array("value"=>"status", "type"=>"bigint(20)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_enquete","identificador","ide_origem","pergunta","data_inicial","data_final","status");
		}
	}
?>