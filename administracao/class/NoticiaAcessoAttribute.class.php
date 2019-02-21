<?
	class NoticiaAcessoAttribute{
		public static function IdNoticiaAcesso(){
			return "id_noticia_acesso";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdNoticia(){
			return "id_noticia";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Click(){
			return "click";
		}
		public static function _Table(){
			return "tb_noticia_acesso";
		}
		public static function _Default(){
			return NoticiaAcessoAttribute::Datahora();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case NoticiaAcessoAttribute::IdNoticiaAcesso() : { return true; } break;
				case NoticiaAcessoAttribute::Identificador() : { return true; } break;
				case NoticiaAcessoAttribute::IdNoticia() : { return true; } break;
				case NoticiaAcessoAttribute::Datahora() : { return true; } break;
				case NoticiaAcessoAttribute::Click() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_noticia_acesso", "type"=>"bigint(20)", "text"=>"Código Notícia Acesso"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_noticia", "type"=>"bigint(20)", "text"=>"Código Notícia"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"click", "type"=>"int(11)", "text"=>"Click"),
			);
		}
		public static function _GetKeys(){
			return array("id_noticia_acesso","identificador","id_noticia","datahora","click");
		}
	}
?>