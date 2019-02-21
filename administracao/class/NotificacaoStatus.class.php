<?
	class NotificacaoStatus {
	    public static function Aberto(){
	        return 1;
	    }
		public static function Lido(){
			return 2;
		}
		public static function Excluido(){
			return 3;
		}
		public static function _Default(){
			return NotificacaoStatus::Aberto();
		}
		public static function _Descricao($value){
			switch ($value){
				case NotificacaoStatus::Aberto() : return "<span class='vermelho negrito'>Aberto</span>";
			    case NotificacaoStatus::Lido() : return "<span class='negrito verde'>Lido</span>";
				case NotificacaoStatus::Excluido() : return "<span class='vermelho'><strike>Excluído</strike></span>";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(NotificacaoStatus::Aberto(), NotificacaoStatus::_Descricao(NotificacaoStatus::Aberto()));
			$vobj[] = array(NotificacaoStatus::Lido(), NotificacaoStatus::_Descricao(NotificacaoStatus::Lido()));
			$vobj[] = array(NotificacaoStatus::Excluido(), NotificacaoStatus::_Descricao(NotificacaoStatus::Excluido()));
			
			return $vobj;
		}
	}
?>