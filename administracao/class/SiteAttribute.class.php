<?
	class SiteAttribute{
		public static function IdSite(){
			return "id_site";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Email(){
			return "email";
		}
		public static function EmailNome(){
			return "email_nome";
		}
		public static function Url(){
			return "url";
		}
		public static function Host(){
			return "host";
		}
		public static function Template(){
			return "template";
		}
		public static function ImagemTopo(){
			return "imagem_topo";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_site";
		}
		public static function _Default(){
			return SiteAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case SiteAttribute::IdSite() : { return true; } break;
				case SiteAttribute::Identificador() : { return true; } break;
				case SiteAttribute::Titulo() : { return true; } break;
				case SiteAttribute::Email() : { return true; } break;
				case SiteAttribute::EmailNome() : { return true; } break;
				case SiteAttribute::Url() : { return true; } break;
				case SiteAttribute::Host() : { return true; } break;
				case SiteAttribute::Template() : { return true; } break;
				case SiteAttribute::ImagemTopo() : { return true; } break;
				case SiteAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_site", "type"=>"bigint(20)", "text"=>"Código Site"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"email_nome", "type"=>"varchar(255)", "text"=>"E-mail Nome"),
				array("value"=>"url", "type"=>"varchar(255)", "text"=>"Url (Endereço)"),
				array("value"=>"host", "type"=>"varchar(255)", "text"=>"Host"),
				array("value"=>"template", "type"=>"varchar(255)", "text"=>"Template"),
				array("value"=>"imagem_topo", "type"=>"varchar(255)", "text"=>"Imagem Topo"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_site","identificador","titulo","email","email_nome","url","host","template","imagem_topo","status");
		}
	}
?>