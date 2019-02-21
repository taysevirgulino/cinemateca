<?
	class NoticiaInfoAttribute{
		public static function IdNoticiaInfo(){
			return "id_noticia_info";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdNoticia(){
			return "id_noticia";
		}
		public static function IdAppUsuarioCadastro(){
			return "id_app_usuario_cadastro";
		}
		public static function IdAppUsuarioEdicao(){
			return "id_app_usuario_edicao";
		}
		public static function DatahoraCadastro(){
			return "datahora_cadastro";
		}
		public static function DatahoraEdicao(){
			return "datahora_edicao";
		}
		public static function UrlCurta(){
			return "url_curta";
		}
		public static function _Table(){
			return "tb_noticia_info";
		}
		public static function _Default(){
			return NoticiaInfoAttribute::DatahoraCadastro();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case NoticiaInfoAttribute::IdNoticiaInfo() : { return true; } break;
				case NoticiaInfoAttribute::Identificador() : { return true; } break;
				case NoticiaInfoAttribute::IdNoticia() : { return true; } break;
				case NoticiaInfoAttribute::IdAppUsuarioCadastro() : { return true; } break;
				case NoticiaInfoAttribute::IdAppUsuarioEdicao() : { return true; } break;
				case NoticiaInfoAttribute::DatahoraCadastro() : { return true; } break;
				case NoticiaInfoAttribute::DatahoraEdicao() : { return true; } break;
				case NoticiaInfoAttribute::UrlCurta() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_noticia_info", "type"=>"bigint(20)", "text"=>"Código Notícia Info"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_noticia", "type"=>"bigint(20)", "text"=>"Código Notícia"),
				array("value"=>"id_app_usuario_cadastro", "type"=>"bigint(20)", "text"=>"Código App Usuário Cadastro"),
				array("value"=>"id_app_usuario_edicao", "type"=>"bigint(20)", "text"=>"Código App Usuário Edição"),
				array("value"=>"datahora_cadastro", "type"=>"datetime", "text"=>"Data/Hora Cadastro"),
				array("value"=>"datahora_edicao", "type"=>"datetime", "text"=>"Data/Hora Edição"),
				array("value"=>"url_curta", "type"=>"varchar(255)", "text"=>"Url (Endereço) Curta"),
			);
		}
		public static function _GetKeys(){
			return array("id_noticia_info","identificador","id_noticia","id_app_usuario_cadastro","id_app_usuario_edicao","datahora_cadastro","datahora_edicao","url_curta");
		}
	}
?>