<?
	class TagRelacaoAttribute{
		public static function IdTagRelacao(){
			return "id_tag_relacao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdTag(){
			return "id_tag";
		}
		public static function IdNoticia(){
			return "id_noticia";
		}
		public static function _Table(){
			return "tb_tag_relacao";
		}
		public static function _Default(){
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case TagRelacaoAttribute::IdTagRelacao() : { return true; } break;
				case TagRelacaoAttribute::Identificador() : { return true; } break;
				case TagRelacaoAttribute::IdTag() : { return true; } break;
				case TagRelacaoAttribute::IdNoticia() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_tag_relacao", "type"=>"bigint(20)", "text"=>"Cуdigo Tag Relaзгo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_tag", "type"=>"bigint(20)", "text"=>"Cуdigo Tag"),
				array("value"=>"id_noticia", "type"=>"bigint(20)", "text"=>"Cуdigo Notнcia"),
			);
		}
		public static function _GetKeys(){
			return array("id_tag_relacao","identificador","id_tag","id_noticia");
		}
	}
?>