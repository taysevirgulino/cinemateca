<?
	class TagAttribute{
		public static function IdTag(){
			return "id_tag";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Slug(){
			return "slug";
		}
		public static function Quantidade(){
			return "quantidade";
		}
		public static function _Table(){
			return "tb_tag";
		}
		public static function _Default(){
			return TagAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case TagAttribute::IdTag() : { return true; } break;
				case TagAttribute::Identificador() : { return true; } break;
				case TagAttribute::Nome() : { return true; } break;
				case TagAttribute::Slug() : { return true; } break;
				case TagAttribute::Quantidade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_tag", "type"=>"bigint(20)", "text"=>"Código Tag"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"slug", "type"=>"varchar(255)", "text"=>"Slug"),
				array("value"=>"quantidade", "type"=>"int(11)", "text"=>"Quantidade"),
			);
		}
		public static function _GetKeys(){
			return array("id_tag","identificador","nome","slug","quantidade");
		}
	}
?>