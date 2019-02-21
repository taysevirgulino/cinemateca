<?
	class ArquivoDownloadAttribute{
		public static function IdArquivoDownload(){
			return "id_arquivo_download";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdArquivoAnexo(){
			return "id_arquivo_anexo";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Ip(){
			return "ip";
		}
		public static function _Table(){
			return "tb_arquivo_download";
		}
		public static function _Default(){
			return ArquivoDownloadAttribute::Datahora();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArquivoDownloadAttribute::IdArquivoDownload() : { return true; } break;
				case ArquivoDownloadAttribute::Identificador() : { return true; } break;
				case ArquivoDownloadAttribute::IdArquivoAnexo() : { return true; } break;
				case ArquivoDownloadAttribute::IdUsuario() : { return true; } break;
				case ArquivoDownloadAttribute::Datahora() : { return true; } break;
				case ArquivoDownloadAttribute::Ip() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_arquivo_download", "type"=>"bigint(20)", "text"=>"Código Arquivo Download"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_arquivo_anexo", "type"=>"bigint(20)", "text"=>"Código Arquivo Anexo"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"ip", "type"=>"varchar(32)", "text"=>"Ip"),
			);
		}
		public static function _GetKeys(){
			return array("id_arquivo_download","identificador","id_arquivo_anexo","id_usuario","datahora","ip");
		}
	}
?>