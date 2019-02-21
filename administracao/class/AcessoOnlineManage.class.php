<? 
	class AcessoOnlineManage extends AbstractEntityManage implements EntityManageInterface {
		
		public static function Online(){
			return AcessoOnlineManage::count(
				SearchMounter::Count(AcessoOnlineAttribute::_Table(), array(
					new SearchQueryComparer(AcessoOnlineAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem())
				))
			);
		}
		
		public static function Atualizar( $sessao, $ideOrigem="" ){
		
			$obj = new AcessoOnline();
			
			if( $obj->buscarAttribute(AcessoOnlineAttribute::Sessao(), $sessao) )
			{
				$obj->setTimeStamp( time() );
				$obj->alterarAtributo( AcessoOnlineAttribute::TimeStamp() );
			}else{
				$obj->setAcessoOnline(null, null, null, $sessao, time());
				$obj->inserir();
			}
			
			//print $obj->getIdAcessoOnline();
			
			$itens = $obj->consultarSearchQuery(array(
				new SearchQueryComparer(AcessoOnlineAttribute::TimeStamp(), SearchComparer::Menor(), SearchCondition::E(), (time()-(60*5)))
			));
			
			foreach ($itens as $value)
			{
				$value->excluir();
			}

		}
		
	}
?>