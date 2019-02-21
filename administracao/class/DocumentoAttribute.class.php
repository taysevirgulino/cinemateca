<?
	class DocumentoAttribute{
		public static function IdDocumento(){
			return "id_documento";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdEmpreendimento(){
			return "id_empreendimento";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Arquivo(){
			return "arquivo";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_documento";
		}
		public static function _Default(){
			return DocumentoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case DocumentoAttribute::IdDocumento() : { return true; } break;
				case DocumentoAttribute::Identificador() : { return true; } break;
				case DocumentoAttribute::IdEmpreendimento() : { return true; } break;
				case DocumentoAttribute::IdUsuario() : { return true; } break;
				case DocumentoAttribute::Titulo() : { return true; } break;
				case DocumentoAttribute::Arquivo() : { return true; } break;
				case DocumentoAttribute::Datahora() : { return true; } break;
				case DocumentoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_documento", "type"=>"bigint(20)", "text"=>"Código Documento"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_empreendimento", "type"=>"bigint(20)", "text"=>"Código Empreendimento"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_documento","identificador","id_empreendimento","id_usuario","titulo","arquivo","datahora","status");
		}
	}
?>