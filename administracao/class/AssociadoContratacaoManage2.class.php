<? 
	class AssociadoContratacaoManage2 extends AssociadoContratacaoManage {
		
		public static function Contratar( Associado $objAssociado, $idAssociadoPlano ){
			
			$objPlano = new AssociadoPlano();
			if( !$objPlano->buscarAttribute(AssociadoPlanoAttribute::IdAssociadoPlano(), $idAssociadoPlano)){
				return false;
			}
			
			$corrigido = AssociadoPlanoManage2::Correcao($objPlano);
			
			$ValorBruto = $corrigido['valor_bruto'];
			$ValorDesconto = $corrigido['valor_desconto'];
			$ValorFinal = $corrigido['valor_final'];
			$PlanoDataInicial = $corrigido['plano_data_inicial'];
			$PlanoDataFinal = $corrigido['plano_data_final'];
			
			$Status = AssociadoContratacaoStatus::Aberto();
			$PagamentoDatahora = '0000-00-00 00:00:00';
			$PagamentoValor = 0;
			if($ValorFinal <= 0){
				$Status = AssociadoContratacaoStatus::Pago();
				$PagamentoDatahora = date("Y-m-d H:i:s");
			}
			
			$objContratacao = new AssociadoContratacao();
			$objContratacao->setIdAssociado( $objAssociado->getIdAssociado() );
			$objContratacao->setIdAssociadoPlano( $objPlano->getIdAssociadoPlano() );
			$objContratacao->setValorBruto( $ValorBruto );
			$objContratacao->setValorDesconto( $ValorDesconto );
			$objContratacao->setValorFinal( $ValorFinal );
			$objContratacao->setDatahora( date("Y-m-d H:i:s") );
			$objContratacao->setPagamentoRetorno( '' );
			$objContratacao->setPagamentoDatahora( $PagamentoDatahora );
			$objContratacao->setPagamentoValor( $PagamentoValor );
			$objContratacao->setPlanoDataInicial( $PlanoDataInicial );
			$objContratacao->setPlanoDataFinal( $PlanoDataFinal );
			$objContratacao->setStatus( $Status );
			
			if( $objContratacao->inserir() ){
				
				$objAssociado->setIdAssociadoPlano( $objContratacao->getIdAssociadoPlano() );
				$objAssociado->setContratacaoId( $objContratacao->getIdAssociadoContratacao() );
				$objAssociado->setContratacaoDataInicial( $objContratacao->getPlanoDataInicial() );
				$objAssociado->setContratacaoDataFinal( $objContratacao->getPlanoDataFinal() );
				if($objContratacao->getStatus() == AssociadoContratacaoStatus::Pago()){
					$objAssociado->setStatus( AssociadoStatus::Ativo() );
				}
				$objAssociado->alterar();
				
				return true;
			}
			
			return false;
		}
		
		public static function Pagar(AssociadoContratacao $objContratacao, AssociadoPlano $objPlano, Associado $objAssociado, $Log=""){
				
			if(!empty($Log)){
				$objContratacao->setPagamentoRetorno( $Log );
			}
			$objContratacao->setPagamentoDatahora( date("Y-m-d H:i:s") );
			$objContratacao->setPagamentoValor( $objContratacao->getValorFinal() );
			$objContratacao->setStatus( AssociadoContratacaoStatus::Pago() );
				
			if( $objContratacao->alterar() ){
				
				$objAssociado->setIdAssociadoPlano( $objContratacao->getIdAssociadoPlano() );
				$objAssociado->setContratacaoId( $objContratacao->getIdAssociadoContratacao() );
				$objAssociado->setContratacaoDataInicial( $objContratacao->getPlanoDataInicial() );
				$objAssociado->setContratacaoDataFinal( $objContratacao->getPlanoDataFinal() );
				$objAssociado->setStatus( AssociadoStatus::Ativo() );
				$objAssociado->alterar();
				
				$EmailAviso = new Email(CurrentSite::Site());
				$EmailAviso->Associado_Contratacao_Pago($objPlano, $objContratacao, $objAssociado);
		
				return true;
			}
				
			return false;
		}
		
		public static function Contratacao(Associado $objAssociado){
			$objContratacao = new AssociadoContratacao();
			if( !$objContratacao->buscarAttribute(AssociadoContratacaoAttribute::IdAssociadoContratacao(), $objAssociado->getContratacaoId())){
				return null;
			}
			return $objContratacao;
		}
	}
?>