<?
	class EmktStatus {
		
		public static function StatusByEmkt( $IdEmkt ){
			$Disparo = EmktDisparoManage::buscarEmktDisparoAttribute(EmktDisparoAttribute::IdEmkt(), $IdEmkt);
			
			if(!empty($Disparo)){
				return $Disparo["status"];
			}
			
			return 0;
		}

		public static function _DescricaoByStatus( $Status ){
			
			switch ($Status){
				case 0 : return "<span class='vermelho negrito'>AGENDAR ENVIO</span>";
				default: return EmktDisparoStatus::_Descricao($Status);
			}
			
			return "---";
		}
		
		
		
	}
?>