<?
	class AssociadoContratacaoStatus {
		public static function Aberto(){
			return 1;
		}
		public static function Pago(){
			return 2;
		}
		public static function Utilizado(){
			return 3;
		}
		public static function Cancelado(){
			return 4;
		}
		public static function _Default(){
			return AssociadoContratacaoStatus::Aberto();
		}
		public static function _Descricao($value){
			switch ($value){
				case AssociadoContratacaoStatus::Aberto() : return "<span class='vermelho'>Aberto</span>";
				case AssociadoContratacaoStatus::Pago() : return "<span class='verde negrito'>Pago</span>";
				case AssociadoContratacaoStatus::Utilizado() : return "<span class='azul'>Utilizado</span>";
				case AssociadoContratacaoStatus::Cancelado() : return "<span class='vermelho'>Cancelado</span>";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(AssociadoContratacaoStatus::Aberto(), AssociadoContratacaoStatus::_Descricao(AssociadoContratacaoStatus::Aberto()));
			$vobj[] = array(AssociadoContratacaoStatus::Pago(), AssociadoContratacaoStatus::_Descricao(AssociadoContratacaoStatus::Pago()));
			//$vobj[] = array(AssociadoContratacaoStatus::Utilizado(), AssociadoContratacaoStatus::_Descricao(AssociadoContratacaoStatus::Utilizado()));
			$vobj[] = array(AssociadoContratacaoStatus::Cancelado(), AssociadoContratacaoStatus::_Descricao(AssociadoContratacaoStatus::Cancelado()));
			
			return $vobj;
		}
	}
?>