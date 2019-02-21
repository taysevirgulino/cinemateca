<?
	class FotoAttribute{
		public static function IdFoto(){
			return "id_foto";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdLojista(){
			return "id_lojista";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_foto";
		}
		public static function _Default(){
			return FotoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case FotoAttribute::IdFoto() : { return true; } break;
				case FotoAttribute::Identificador() : { return true; } break;
				case FotoAttribute::IdLojista() : { return true; } break;
				case FotoAttribute::IdUsuario() : { return true; } break;
				case FotoAttribute::Titulo() : { return true; } break;
				case FotoAttribute::Imagem() : { return true; } break;
				case FotoAttribute::Datahora() : { return true; } break;
				case FotoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_foto", "type"=>"bigint(20)", "text"=>"Código Foto"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_lojista", "type"=>"bigint(20)", "text"=>"Código Lojista"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_foto","identificador","id_lojista","id_usuario","titulo","imagem","datahora","status");
		}
	}
?>