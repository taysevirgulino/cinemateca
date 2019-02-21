<? 
	class NotificacaoManage2 extends NotificacaoManage {
	    
	    public static function Registrar($notificacaoTipo, $idUsuario, $mensagem="", $link="", $titulo=""){
	        $obj = new Notificacao();
	        $obj->setIdNotificacao( -1 );
	        $obj->setIdentificador( null );
	        $obj->setIdUsuario( $idUsuario );
	        $obj->setTitulo( ((empty($titulo)) ? NotificacaoTipo::_Descricao($notificacaoTipo) : $titulo ) );
	        $obj->setDescricao( $mensagem );
	        $obj->setLink( $link );
	        $obj->setTipo( $notificacaoTipo );
	        $obj->setDatahora( date("Y-m-d H:i:s") );
	        $obj->setDatahoraAcesso( "0000-00-00 00:00:00" );
	        $obj->setStatus( NotificacaoStatus::_Default() );
	        
	        return $obj->inserir();
	    }
	    
	    public static function consultarResult($itens){
	        foreach ($itens as $i => $valueNotificacao) {
	            $itens[$i]["classIcon"] = NotificacaoTipo::_IconeClass( $valueNotificacao["tipo"] );
	             
	            $data = System::FormatarData($valueNotificacao['datahora'], 'd/m/Y');
	            $hora = System::FormatarData($valueNotificacao['datahora'], 'H:i:s');
	            $data_short = (($data == date("d/m/Y")) ? System::FormatarData($valueNotificacao['datahora'], 'Hhi') : System::FormatarData($valueNotificacao['datahora'], 'd/m').' às '.System::FormatarData($valueNotificacao['datahora'], 'Hhi') );
	             
	            $itens[$i]["data_short"] = $data_short;
	        }
	        return $itens;
	    }
	    public static function Menu(){
	        $query = SearchMounter::Count(
	            NotificacaoAttribute::_Table(),
	            array(
	                new SearchQueryComparer(NotificacaoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NotificacaoStatus::Aberto()),
	                new SearchQueryComparer(NotificacaoAttribute::IdUsuario(), SearchComparer::Igual(), SearchCondition::E(), UsuarioLogin::IdUsuario()),
	            )
	        );
	        $count = NotificacaoManage2::count($query);
	        
	        $itensNotificacao = NotificacaoManage::consultarSearchQuery(
	            array(
	                new SearchQueryComparer(NotificacaoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NotificacaoStatus::Aberto()),
	                new SearchQueryComparer(NotificacaoAttribute::IdUsuario(), SearchComparer::Igual(), SearchCondition::E(), UsuarioLogin::IdUsuario()),
	            ),
	            array(
	                new SearchQueryOrder(NotificacaoAttribute::Datahora(), SearchOrder::Crescente())
	            ),
	            0, 5
	        );
	        
	        return array(
	            "badge" => $count,
	            "itens" => self::consultarResult($itensNotificacao),
	        );
	    }
	    
	    public static function Ler( $idNotificacao ){
	        if( UsuarioLogin::Autenticado() ){
	            $obj = new Notificacao();
	            if( $obj->buscarAttribute(NotificacaoAttribute::IdNotificacao(), intval($idNotificacao))){
	                if( $obj->getIdUsuario() == UsuarioLogin::IdUsuario() ){
	                    $obj->setDatahoraAcesso( date("Y-m-d H:i:s") ); 
			            $obj->setStatus( NotificacaoStatus::Lido() );
			            return $obj->alterar(); 
	                }
	            }
	        }
	        return false;
	    }
	    
	}
?>