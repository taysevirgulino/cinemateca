<?
	class NotificacaoTipo {
		public static function Sucesso(){
			return 1;
		}
		public static function Alerta(){
			return 2;
		}
		public static function Erro(){
			return 3;
		}
		public static function Info(){
			return 4;
		}
		public static function _Default(){
			return NotificacaoTipo::Sucesso();
		}
		public static function _Descricao($value){
			switch ($value){
				case NotificacaoTipo::Sucesso() : return "Sucesso";
				case NotificacaoTipo::Alerta() : return "Alerta";
				case NotificacaoTipo::Erro() : return "Erro";
				case NotificacaoTipo::Info() : return "Informaחדo";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(NotificacaoTipo::Sucesso(), NotificacaoTipo::_Descricao(NotificacaoTipo::Sucesso()));
			$vobj[] = array(NotificacaoTipo::Alerta(), NotificacaoTipo::_Descricao(NotificacaoTipo::Alerta()));
			$vobj[] = array(NotificacaoTipo::Erro(), NotificacaoTipo::_Descricao(NotificacaoTipo::Erro()));
			$vobj[] = array(NotificacaoTipo::Info(), NotificacaoTipo::_Descricao(NotificacaoTipo::Info()));
			
			return $vobj;
		}
	    public static function _IconeClass($value){
			switch ($value){
				case NotificacaoTipo::Sucesso() : return "fa fa-check-square-o text-success";
				case NotificacaoTipo::Alerta() : return "fa fa-exclamation-circle text-warning";
				case NotificacaoTipo::Erro() : return "fa fa-ban text-danger";
				case NotificacaoTipo::Info() : return "fa fa-info-circle text-info";
			}
		}
	}
?>