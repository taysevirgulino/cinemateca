<?
	class NoticiaStatus {
		public static function Publicado(){
			return 1;
		}
		public static function Agendado(){
			return 2;
		}
		public static function Inativo(){
			return 0;
		}
		public static function _Default(){
			return NoticiaStatus::Publicado();
		}
		public static function _Descricao($value){
			switch ($value){
				case NoticiaStatus::Publicado() : return "<span style='color:#090'>Publicado</span>";
				case NoticiaStatus::Agendado() : return "<span style='color:#00F'>Agendado</span>";
				case NoticiaStatus::Inativo() : return "<span style='color:#900'>Inativo</span>";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(NoticiaStatus::Publicado(), NoticiaStatus::_Descricao(NoticiaStatus::Publicado()));
			$vobj[] = array(NoticiaStatus::Inativo(), NoticiaStatus::_Descricao(NoticiaStatus::Inativo()));
				
			return $vobj;
		}
	}
?>