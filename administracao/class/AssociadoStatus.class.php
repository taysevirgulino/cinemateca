<?//pendente, ativo, vencido, cancelado
	class AssociadoStatus {
		public static function Pendente(){
			return 1;
		}
		public static function Ativo(){
			return 2;
		}
		public static function Vencido(){
			return 3;
		}
		public static function Cancelado(){
			return 4;
		}
		public static function _Default(){
			return AssociadoStatus::Pendente();
		}
		public static function _Descricao($value){
			switch ($value){
				case AssociadoStatus::Pendente() : return "<span class='vermelho'>Pendente</span>";
				case AssociadoStatus::Ativo() : return "<span class='negrito verde'>Ativo</span>";
				case AssociadoStatus::Vencido() : return "<span class='vermelho negrito'>Vencido</span>";
				case AssociadoStatus::Cancelado() : return "<span class='vermelho'><strike>Cancelado</strike></span>";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(AssociadoStatus::Pendente(), AssociadoStatus::_Descricao(AssociadoStatus::Pendente()));
			$vobj[] = array(AssociadoStatus::Ativo(), AssociadoStatus::_Descricao(AssociadoStatus::Ativo()));
			$vobj[] = array(AssociadoStatus::Vencido(), AssociadoStatus::_Descricao(AssociadoStatus::Vencido()));
			$vobj[] = array(AssociadoStatus::Cancelado(), AssociadoStatus::_Descricao(AssociadoStatus::Cancelado()));
			
			return $vobj;
		}
	}
?>