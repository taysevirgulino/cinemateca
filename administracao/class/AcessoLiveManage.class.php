<? 
	class AcessoLiveManage extends AbstractEntityManage implements EntityManageInterface {
		
		public static function Acessar(){
			
			$query = SearchMounter::Query(AcessoLiveAttribute::_Table(), array(
				new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), date("Y-m-d H:00:00")),
				new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), date("Y-m-d H:59:59")),
				new SearchQueryComparer(AcessoLiveAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem())
			));
			
			$obj = new AcessoLive();
			if( $obj->buscar($query) )
			{
				$obj->setAcesso( $obj->getAcesso() + 1 );
				$obj->alterarAtributo( AcessoLiveAttribute::Acesso() );
			}else{
				$obj->setAcessoLive(null, null, null, date("Y-m-d H:i:s"), 1);
				$obj->inserir();
			}
			
			print $obj->getIdAcessoLive();
		}
		
		public static function QuantidadeAcessosHoje(){ 
			
			$query = SearchMounter::Query(
				AcessoLiveAttribute::_Table(),
				array(
					new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), date("Y-m-d H:00:00")),
					new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), date("Y-m-d H:59:59")),
					new SearchQueryComparer(AcessoLiveAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem())
				)
			);
			
			$obj = new AcessoLive();
			$itens = $obj->consultar($query);
			
			$count = 0;
			foreach ($itens as $value) {
				$count += $value->getAcesso();
			}
			
			return $count;
			
		}	

		public static function Acessar_Cookie(){
			return self::Acessar();
		}
		
		
		public static function Relatorio_Acesso_Ano(){
			$adapter = Config::getAdapterService('AcessoLive');
				
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
					$vobj = array();
					$countTotal = 0;
					
					$anoAtual = intval(date("Y"));
					foreach(range(($anoAtual-10), $anoAtual) as $ano) {

						$objAcessoLive = new AcessoLive();
						$itensAcessoLive = $objAcessoLive->consultarSearchQuery(
							array(
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), "$ano-01-01 00:00:00"),
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), "$ano-12-31 23:59:59"),
							)
						);
						$count = 0;
						foreach ($itensAcessoLive as $valueAcessoLive) {
							$count += $valueAcessoLive->getAcesso();
						}
						
						if($count > 0){
							$vobj[] = array( $ano, $count );
							$countTotal += $count;
						}
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$countTotal), 2, ",", ".");
					}
					
					return $vobj;
				} break;
				default:{
					
					$sql = "SELECT
							  DATE_FORMAT(`tb_acesso_live`.datahora,'%Y') AS data,
							  SUM(`tb_acesso_live`.acesso) AS qtd
							FROM
							  `tb_acesso_live`
							GROUP BY
							   data
							ORDER BY data DESC";
					
					$dbq = new dbQuery();	
					$dbq->consultar($sql);
					
					$vobj = array();
					$i=0;
					$qtd=0;
					while( $dbq->registro() ){
						$vobj[$i][0] = $dbq->valor("data");
						$vobj[$i++][1] = $dbq->valor("qtd");
						$qtd += intval($dbq->valor("qtd"));
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$qtd), 2, ",", ".");
					}
					
					return $vobj;
				} break;
			}
					
			return array();
		}
		
		public static function Relatorio_Acesso_Mes($ano){
			$adapter = Config::getAdapterService('AcessoLive');
				
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
					$vobj = array();
					$countTotal = 0;
					
					foreach(range(1, 12) as $mes) {
						$mes = (($mes<10) ? "0$mes" : $mes );
						$objAcessoLive = new AcessoLive();
						$itensAcessoLive = $objAcessoLive->consultarSearchQuery(
							array(
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), "$ano-$mes-01 00:00:00"),
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), "$ano-$mes-31 23:59:59"),
							)
						);
						$count = 0;
						foreach ($itensAcessoLive as $valueAcessoLive) {
							$count += intval($valueAcessoLive->getAcesso());
						}
						
						if($count > 0){
							$vobj[] = array( "$ano/$mes", $count );
							$countTotal += $count;
						}
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$countTotal), 2, ",", ".");
					}
					
					return $vobj;
				} break;
				default:{
					
					$sql = "SELECT
							  DATE_FORMAT(`tb_acesso_live`.datahora,'%Y/%m') AS data,
							  SUM(`tb_acesso_live`.acesso) AS qtd
							FROM
							  `tb_acesso_live`
							WHERE
							   (YEAR(`tb_acesso_live`.datahora) = $ano)
							GROUP BY
							   data
							ORDER BY data DESC";
					
					$dbq = new dbQuery();	
					$dbq->consultar($sql);
					
					$vobj = array();
					$i=0;
					$qtd=0;
					while( $dbq->registro() ){
						$vobj[$i][0] = $dbq->valor("data");
						$vobj[$i++][1] = $dbq->valor("qtd");
						$qtd += intval($dbq->valor("qtd"));
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$qtd), 2, ",", ".");
					}
					
					return $vobj;
				} break;
			}
					
			return array();
		}
		
		public static function Relatorio_Acesso_Dia($ano, $mes){
			$adapter = Config::getAdapterService('AcessoLive');
				
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
					$vobj = array();
					$countTotal = 0;
					
					foreach(range(1, 31) as $dia) {
						$dia = (($dia<10) ? "0$dia" : $dia );
						$objAcessoLive = new AcessoLive();
						$itensAcessoLive = $objAcessoLive->consultarSearchQuery(
							array(
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), "$ano-$mes-$dia 00:00:00"),
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), "$ano-$mes-$dia 23:59:59"),
							)
						);
						$count = 0;
						foreach ($itensAcessoLive as $valueAcessoLive) {
							$count += intval($valueAcessoLive->getAcesso());
						}
						
						if($count > 0){
							$vobj[] = array( "$ano/$mes/$dia", $count );
							$countTotal += $count;
						}
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$countTotal), 2, ",", ".");
					}
					
					return $vobj;
				} break;
				default:{
					
					$sql = "SELECT
							  DATE_FORMAT(`tb_acesso_live`.datahora,'%Y/%m/%d') AS data,
							  SUM(`tb_acesso_live`.acesso) AS qtd
							FROM
							  `tb_acesso_live`
							WHERE
							   (YEAR(`tb_acesso_live`.datahora) = $ano) AND (MONTH(`tb_acesso_live`.datahora) = $mes)
							GROUP BY
							   data
							ORDER BY data DESC";
					
					$dbq = new dbQuery();	
					$dbq->consultar($sql);
					
					$vobj = array();
					$i=0;
					$qtd=0;
					while( $dbq->registro() ){
						$vobj[$i][0] = $dbq->valor("data");
						$vobj[$i++][1] = $dbq->valor("qtd");
						$qtd += intval($dbq->valor("qtd"));
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$qtd), 2, ",", ".");
					}
					
					return $vobj;
				} break;
			}
					
			return array();
		}
		
		public static function Relatorio_Acesso_Hora($ano, $mes, $dia){
			$adapter = Config::getAdapterService('AcessoLive');
				
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
					$vobj = array();
					$countTotal = 0;
					
					foreach(range(0, 23) as $hora) {
						$hora = (($hora<10) ? "0$hora" : $hora );
						$objAcessoLive = new AcessoLive();
						$itensAcessoLive = $objAcessoLive->consultarSearchQuery(
							array(
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), "$ano-$mes-$dia $hora:00:00"),
								new SearchQueryComparer(AcessoLiveAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), "$ano-$mes-$dia $hora:59:59"),
							)
						);
						$count = 0;
						foreach ($itensAcessoLive as $valueAcessoLive) {
							$count += intval($valueAcessoLive->getAcesso());
						}
						
						if($count > 0){
							$vobj[] = array( "$ano/$mes/$dia $hora h", $count );
							$countTotal += $count;
						}
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$countTotal), 2, ",", ".");
					}
					
					return $vobj;
				} break;
				default:{
					
					$sql = "SELECT
							  DATE_FORMAT(`tb_acesso_live`.datahora,'%Y/%m/%d [%Hh]') AS data,
							  SUM(`tb_acesso_live`.acesso) AS qtd
							FROM
							  `tb_acesso_live`
							WHERE
							   (YEAR(`tb_acesso_live`.datahora) = $ano) AND (MONTH(`tb_acesso_live`.datahora) = $mes) AND (DAY(`tb_acesso_live`.datahora) = $dia)
							GROUP BY
							   data
							ORDER BY data DESC";
					
					$dbq = new dbQuery();	
					$dbq->consultar($sql);
					
					$vobj = array();
					$i=0;
					$qtd=0;
					while( $dbq->registro() ){
						$vobj[$i][0] = $dbq->valor("data");
						$vobj[$i++][1] = $dbq->valor("qtd");
						$qtd += intval($dbq->valor("qtd"));
					}
					
					for($i=0; $i < count($vobj); $i++){
						$vobj[$i][2] = number_format(((100*$vobj[$i][1])/$qtd), 2, ",", ".");
					}
					
					return $vobj;
				} break;
			}
					
			return array();
		}
		
	}
?>