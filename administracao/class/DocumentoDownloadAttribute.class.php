<?
	class DocumentoDownloadAttribute{
		public static function IdDocumentoDownload(){
			return "id_documento_download";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdDocumento(){
			return "id_documento";
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
			return "tb_documento_download";
		}
		public static function _Default(){
			return DocumentoDownloadAttribute::Datahora();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case DocumentoDownloadAttribute::IdDocumentoDownload() : { return true; } break;
				case DocumentoDownloadAttribute::Identificador() : { return true; } break;
				case DocumentoDownloadAttribute::IdDocumento() : { return true; } break;
				case DocumentoDownloadAttribute::IdUsuario() : { return true; } break;
				case DocumentoDownloadAttribute::Datahora() : { return true; } break;
				case DocumentoDownloadAttribute::Ip() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_documento_download", "type"=>"bigint(20)", "text"=>"Código Documento Download"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_documento", "type"=>"bigint(20)", "text"=>"Código Documento"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"ip", "type"=>"varchar(32)", "text"=>"Ip"),
			);
		}
		public static function _GetKeys(){
			return array("id_documento_download","identificador","id_documento","id_usuario","datahora","ip");
		}
	}
?>