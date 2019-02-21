<?
	class ArquivoAnexoAttribute{
		public static function IdArquivoAnexo(){
			return "id_arquivo_anexo";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdArquivo(){
			return "id_arquivo";
		}
		public static function IdArquivoHistorico(){
			return "id_arquivo_historico";
		}
		public static function Arquivo(){
			return "arquivo";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function _Table(){
			return "tb_arquivo_anexo";
		}
		public static function _Default(){
			return ArquivoAnexoAttribute::Arquivo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArquivoAnexoAttribute::IdArquivoAnexo() : { return true; } break;
				case ArquivoAnexoAttribute::Identificador() : { return true; } break;
				case ArquivoAnexoAttribute::IdArquivo() : { return true; } break;
				case ArquivoAnexoAttribute::IdArquivoHistorico() : { return true; } break;
				case ArquivoAnexoAttribute::Arquivo() : { return true; } break;
				case ArquivoAnexoAttribute::Datahora() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_arquivo_anexo", "type"=>"bigint(20)", "text"=>"Código Arquivo Anexo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_arquivo", "type"=>"bigint(20)", "text"=>"Código Arquivo"),
				array("value"=>"id_arquivo_historico", "type"=>"bigint(20)", "text"=>"Código Arquivo Histórico"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
			);
		}
		public static function _GetKeys(){
			return array("id_arquivo_anexo","identificador","id_arquivo","id_arquivo_historico","arquivo","datahora");
		}
	}
?>