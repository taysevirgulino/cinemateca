<? 
	class ConfiguracaoManagePartial extends ConfiguracaoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public function ConfiguracaoCurrent(){
			
			$Configuracao = $_SESSION["Configuracao"];
			if(empty($Configuracao)){
				$Configuracao = new Configuracao();
				$Configuracao->buscarConfiguracao(1, 1);
				$_SESSION["Configuracao"] = $Configuracao;
			}
			
			return $Configuracao;
		}

	} 
?>