<?
	class ArquivoTipoAttribute{
		public static function IdArquivoTipo(){
			return "id_arquivo_tipo";
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
			return "tb_arquivo_tipo";
		}
		public static function _Default(){
			return ArquivoTipoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArquivoTipoAttribute::IdArquivoTipo() : { return true; } break;
				case ArquivoTipoAttribute::Identificador() : { return true; } break;
				case ArquivoTipoAttribute::Titulo() : { return true; } break;
				case ArquivoTipoAttribute::Prioridade() : { return true; } break;
				case ArquivoTipoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_arquivo_tipo", "type"=>"bigint(20)", "text"=>"Código Arquivo Tipo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_arquivo_tipo","identificador","titulo","prioridade","status");
		}
	}
?>