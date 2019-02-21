<?
	class NoticiaRelacaoAttribute{
		public static function IdNoticiaRelacao(){
			return "id_noticia_relacao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdNoticia(){
			return "id_noticia";
		}
		public static function IdNoticiaLigacao(){
			return "id_noticia_ligacao";
		}
		public static function _Table(){
			return "tb_noticia_relacao";
		}
		public static function _Default(){
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case NoticiaRelacaoAttribute::IdNoticiaRelacao() : { return true; } break;
				case NoticiaRelacaoAttribute::Identificador() : { return true; } break;
				case NoticiaRelacaoAttribute::IdNoticia() : { return true; } break;
				case NoticiaRelacaoAttribute::IdNoticiaLigacao() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_noticia_relacao", "type"=>"bigint(20)", "text"=>"Cуdigo Notнcia Relaзгo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_noticia", "type"=>"bigint(20)", "text"=>"Cуdigo Notнcia"),
				array("value"=>"id_noticia_ligacao", "type"=>"bigint(20)", "text"=>"Cуdigo Notнcia Ligaзгo"),
			);
		}
		public static function _GetKeys(){
			return array("id_noticia_relacao","identificador","id_noticia","id_noticia_ligacao");
		}
	}
?>