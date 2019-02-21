<? 
	class LojistaCronogramaManage2 extends LojistaCronogramaManage {
	    
	    /**
	     * @param Lojista $objLojista
	     * @return LojistaCronograma
	     */
	    public static function Update($objLojista){
	        
	        $itensCronogramaEtapa = CronogramaEtapaManage::consultarSearchQuery(
	            array(
	                new SearchQueryComparer(CronogramaEtapaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
	            ),
	            array(
	                new SearchQueryOrder(CronogramaEtapaAttribute::Titulo(), SearchOrder::Crescente())
	            )
	        );
	        
	        $porcentagem_indefinido = 0;
	        $porcentagem_aberto = 0;
	        $porcentagem_vencido = 0;
	        $porcentagem_concluido = 0;
	        
	        foreach ($itensCronogramaEtapa as $etapa) {
	            $query = SearchMounter::Query(
	                LojistaEtapaAttribute::_Table(),
	                array(
	                    new SearchQueryComparer(LojistaEtapaAttribute::IdLojista(), SearchComparer::Igual(), SearchCondition::E(), $objLojista),
	                    new SearchQueryComparer(LojistaEtapaAttribute::IdCronogramaEtapa(), SearchComparer::Igual(), SearchCondition::E(), $etapa['id_cronograma_etapa']),
	                )
	            );
	            
	            $porcentagem = intval($etapa['porcentagem']);
	            
	            $lojistaEtapa = new LojistaEtapa();
	            if( $lojistaEtapa->buscar($query) ){
	                
	                if($lojistaEtapa->getStatus() == 1){
	                    $porcentagem_concluido += $porcentagem;
	                }else
	                if($lojistaEtapa->getData() >= date("Y-m-d")){
	                    $porcentagem_aberto += $porcentagem;
	                }else{
	                    $porcentagem_vencido += $porcentagem;
	                }
	            }else{
	                $porcentagem_indefinido += $porcentagem;
	            }
	        }	        
	        
	        $id_cronograma_farol = 0;
	        if( $porcentagem_indefinido == 100 ){
	            $id_cronograma_farol = 1; //indefinido
	        }else
	        if( $porcentagem_vencido == 0 ){
	            $id_cronograma_farol = 2; //verde
	        }else
	        if( $porcentagem_vencido <= 10 ){
	            $id_cronograma_farol = 3; //amarelo
	        }else
	        if( $porcentagem_vencido > 10 ){
	            $id_cronograma_farol = 4; //amarelo
	        }
	        
	        
	        $query = SearchMounter::Query(
	            LojistaCronogramaAttribute::_Table(),
	            array(
	                new SearchQueryComparer(LojistaCronogramaAttribute::IdLojista(), SearchComparer::Igual(), SearchCondition::E(), $objLojista),
	            ),
	            array(
	                new SearchQueryOrder(LojistaCronogramaAttribute::IdLojista(), SearchOrder::Crescente()),
	            )
	        );
	       
	        $objCronograma = new LojistaCronograma();
	        
	        if( !$objCronograma->buscar($query) ){
	            
	            $objCronograma->setIdLojistaCronograma( null );
	            $objCronograma->setIdentificador( null );
	            $objCronograma->setIdLojista( $objLojista );
	            $objCronograma->setIdCronogramaFarol( $id_cronograma_farol );
	            $objCronograma->setPorcentagemIndefinido( $porcentagem_indefinido );
	            $objCronograma->setPorcentagemAberto( $porcentagem_aberto );
	            $objCronograma->setPorcentagemVencido( $porcentagem_vencido );
	            $objCronograma->setPorcentagemConcluido( $porcentagem_concluido );
	            $objCronograma->setPrevisaoInicio( "0000-00-00" );
	            $objCronograma->setPrevisaoFim( "0000-00-00" );
	            $objCronograma->setDatahora( date("Y-m-d H:i:s") );
	            
	            $objCronograma->inserir();
	        }else{
	            
	            $objCronograma->setIdCronogramaFarol( $id_cronograma_farol );
	            $objCronograma->setPorcentagemIndefinido( $porcentagem_indefinido );
	            $objCronograma->setPorcentagemAberto( $porcentagem_aberto );
	            $objCronograma->setPorcentagemVencido( $porcentagem_vencido );
	            $objCronograma->setPorcentagemConcluido( $porcentagem_concluido );
	            $objCronograma->setDatahora( date("Y-m-d H:i:s") );
	            
	            $objCronograma->alterar();
	        }
	        
	        if( !Validacao::isData($objCronograma->getPrevisaoInicio()) ){
	            $objCronograma->setPrevisaoInicio("");
	        }else{
	            $objCronograma->setPrevisaoInicio( System::FormatarData($objCronograma->getPrevisaoInicio(), "d/m/Y"));
	        }
	        if( !Validacao::isData($objCronograma->getPrevisaoFim()) ){
	            $objCronograma->setPrevisaoFim("");
	        }else{
	            $objCronograma->setPrevisaoFim( System::FormatarData($objCronograma->getPrevisaoFim(), "d/m/Y"));
	        }
	        return $objCronograma;
	        
	    }
	    
	}
?>