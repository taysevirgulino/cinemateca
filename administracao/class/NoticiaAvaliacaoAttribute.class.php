<?
	class NoticiaAvaliacaoAttribute{
		public static function IdNoticiaAvaliacao(){
			return "id_noticia_avaliacao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdNoticia(){
			return "id_noticia";
		}
		public static function Valor(){
			return "valor";
		}
		public static function Sessao(){
			return "sessao";
		}
		public static function Ip(){
			return "ip";
		}
		public static function _Table(){
			return "tb_noticia_avaliacao";
		}
		public static function _Default(){
			return NoticiaAvaliacaoAttribute::Valor();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case NoticiaAvaliacaoAttribute::IdNoticiaAvaliacao() : { return true; } break;
				case NoticiaAvaliacaoAttribute::Identificador() : { return true; } break;
				case NoticiaAvaliacaoAttribute::IdNoticia() : { return true; } break;
				case NoticiaAvaliacaoAttribute::Valor() : { return true; } break;
				case NoticiaAvaliacaoAttribute::Sessao() : { return true; } break;
				case NoticiaAvaliacaoAttribute::Ip() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_noticia_avaliacao", "type"=>"bigint(20)", "text"=>"Cуdigo Notнcia Avaliaзгo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_noticia", "type"=>"bigint(20)", "text"=>"Cуdigo Notнcia"),
				array("value"=>"valor", "type"=>"int(11)", "text"=>"Valor"),
				array("value"=>"sessao", "type"=>"varchar(32)", "text"=>"Sessгo"),
				array("value"=>"ip", "type"=>"varchar(20)", "text"=>"Ip"),
			);
		}
		public static function _GetKeys(){
			return array("id_noticia_avaliacao","identificador","id_noticia","valor","sessao","ip");
		}
	}
?>