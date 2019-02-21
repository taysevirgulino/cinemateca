<?
	class NoticiaComentarioAttribute{
		public static function IdNoticiaComentario(){
			return "id_noticia_comentario";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdNoticia(){
			return "id_noticia";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Email(){
			return "email";
		}
		public static function Url(){
			return "url";
		}
		public static function Texto(){
			return "texto";
		}
		public static function Ip(){
			return "ip";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_noticia_comentario";
		}
		public static function _Default(){
			return NoticiaComentarioAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case NoticiaComentarioAttribute::IdNoticiaComentario() : { return true; } break;
				case NoticiaComentarioAttribute::Identificador() : { return true; } break;
				case NoticiaComentarioAttribute::IdeOrigem() : { return true; } break;
				case NoticiaComentarioAttribute::IdNoticia() : { return true; } break;
				case NoticiaComentarioAttribute::Nome() : { return true; } break;
				case NoticiaComentarioAttribute::Email() : { return true; } break;
				case NoticiaComentarioAttribute::Url() : { return true; } break;
				case NoticiaComentarioAttribute::Texto() : { return true; } break;
				case NoticiaComentarioAttribute::Ip() : { return true; } break;
				case NoticiaComentarioAttribute::Datahora() : { return true; } break;
				case NoticiaComentarioAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_noticia_comentario", "type"=>"bigint(20)", "text"=>"Código Notícia Comentário"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_noticia", "type"=>"bigint(20)", "text"=>"Código Notícia"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"url", "type"=>"varchar(255)", "text"=>"Url (Endereço)"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"ip", "type"=>"varchar(15)", "text"=>"Ip"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_noticia_comentario","identificador","ide_origem","id_noticia","nome","email","url","texto","ip","datahora","status");
		}
	}
?>