<?
	class NoticiaTipo {
		public static function Noticia(){
			return 1;
		}
		public static function LinkExterno(){
			return 2;
		}
		public static function _Default(){
			return NoticiaTipo::Noticia();
		}
		public static function _Descricao($value){
			switch ($value){
				case NoticiaTipo::Noticia() : return "Notícia";
				case NoticiaTipo::LinkExterno() : return "Link Externo";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(NoticiaTipo::Noticia(), NoticiaTipo::_Descricao(NoticiaTipo::Noticia()));
			$vobj[] = array(NoticiaTipo::LinkExterno(), NoticiaTipo::_Descricao(NoticiaTipo::LinkExterno()));
			
			return $vobj;
		}
	}
?>