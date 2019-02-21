<? 
	class MensagemManage2 extends MensagemManage {
	    
	    public static function Enviar($arrayDestinatario, $titulo, $texto, $arquivo=''){
	        $objEmpreendimento = new Empreendimento();
	        $objSegmento = new Segmento();
	        $objLojista = new Lojista();
	        $objUsuario = new Usuario();
	        $frm_id_empreendimento = 0;
	        $frm_id_lojista = 0;
	        $frm_id_usuario_remetente = UsuarioLogin::IdUsuario();
	        
	        $ids = array();
	        foreach ($arrayDestinatario as $key => $value) {
	            if( $objEmpreendimento->buscarAttribute(EmpreendimentoAttribute::Identificador(), $value) ){
	                $frm_id_empreendimento = $objEmpreendimento->getIdEmpreendimento();
	                $ids = array_merge($ids, self::Usuarios_Empreendimento($objEmpreendimento));
	            }else
	            if( $objSegmento->buscarAttribute(SegmentoAttribute::Identificador(), $value) ){
	                $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	                $frm_id_empreendimento = $objEmpreendimento->getIdEmpreendimento();
	                $ids = array_merge($ids, self::Usuarios_Segmento($objSegmento, $objEmpreendimento));
	            }else
	            if( $objLojista->buscarAttribute(LojistaAttribute::Identificador(), $value) ){
	                $frm_id_lojista = $objLojista->getIdLojista();
	                $ids = array_merge($ids, self::Usuarios_Lojista($objLojista));
	            }else
	            if( $objUsuario->buscarAttribute(UsuarioAttribute::Identificador(), $value) ){
	                $ids = array_merge($ids, array( array("id_usuario"=>$objUsuario->getIdUsuario()) ));
	            }
	        }
	        
	        $destinatarios = array();
	        foreach ($ids as $value) {
	            $destinatarios[ $value['id_usuario'] ] = $value['id_usuario'];
	        }
	        
	        foreach ($destinatarios as $value) {
	            //if( $value != $frm_id_usuario_remetente ){
	            if( true ){
	                $obj = new Mensagem();
	                $obj->setIdEmpreendimento( $frm_id_empreendimento );
	                $obj->setIdLojista( $frm_id_lojista );
	                $obj->setIdUsuarioRemetente( $frm_id_usuario_remetente );
	                $obj->setIdUsuarioDestinatario( $value );
	                $obj->setTitulo( $titulo );
	                $obj->setTexto( $texto );
	                $obj->setArquivo( $arquivo );
	                $obj->setDatahora( date("Y-m-d H:i:s") );
	                $obj->setDatahoraEdicao( date("Y-m-d H:i:s") );
	                $obj->setIp( $_SERVER["REMOTE_ADDR"] );
	                $obj->setStatus( MensagemStatus::Aberto() );
	                 
	                if( $obj->inserir() ){
	                    $objA = new MensagemAcesso();
	                    $objA->setIdMensagem( $obj->getIdMensagem() );
	                    $objA->setIdUsuario( $obj->getIdUsuarioDestinatario() );
	                    $objA->setDatahora( date("Y-m-d H:i:s") );
	                    $objA->setStatus( 0 );
	                    $objA->inserir();
	                    
	                    $usuario = new Usuario();
	                    if( $usuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $obj->getIdUsuarioDestinatario()) ){
	                        $mail = new Email(CurrentSite::Site());
	                        $mail->Mensagem_Nova($usuario, $obj);
	                    }
	                }
	            }
	        }
	        
	        return true;
	    }
	    
	    public static function Responder(Mensagem $objMensagem, $texto, $arquivo=''){
	        $obj = new MensagemResposta();
	        $obj->setIdMensagem( $objMensagem->getIdMensagem() );
	        $obj->setIdUsuario( UsuarioLogin::IdUsuario() );
	        $obj->setTexto( $texto );
	        $obj->setArquivo( $arquivo );
	        $obj->setDatahora( date("Y-m-d H:i:s") );
	        $obj->setIp( $_SERVER["REMOTE_ADDR"] );
	        
	        if( $obj->inserir() ){
	            $objMensagem->setDatahoraEdicao( date("Y-m-d H:i:s") );
	            $objMensagem->setStatus( MensagemStatus::Respondido() );
	            $objMensagem->alterar();
	            
	            $usuario = new Usuario();
	            if( $usuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $objMensagem->getIdUsuarioRemetente()) ){
	                $mail = new Email(CurrentSite::Site());
	                $mail->Mensagem_Resposta($usuario, $objMensagem);
	            }
	            
	            return true;
	        }
	        
	        return false;
	    }
	    
	    public static function Usuarios_Empreendimento(Empreendimento $objEmpreendimento){
	        
	        $sql = "SELECT DISTINCT 
                      tb_usuario.id_usuario
                    FROM
                      tb_empreendimento
                      INNER JOIN tb_loja ON (tb_empreendimento.id_empreendimento = tb_loja.id_empreendimento)
                      INNER JOIN tb_lojista ON (tb_loja.id_loja = tb_lojista.id_loja)
                      INNER JOIN tb_usuario ON (tb_lojista.id_usuario_responsavel = tb_usuario.id_usuario)
                    WHERE
                      tb_usuario.`status` = 1 AND tb_empreendimento.id_empreendimento = :id_empreendimento
                    UNION ALL
                    (
                    SELECT DISTINCT 
                      tb_usuario.id_usuario
                    FROM
                      tb_empreendimento
                      INNER JOIN tb_loja ON (tb_empreendimento.id_empreendimento = tb_loja.id_empreendimento)
                      INNER JOIN tb_lojista ON (tb_loja.id_loja = tb_lojista.id_loja)
                      INNER JOIN tb_lojista_pessoa ON (tb_lojista.id_lojista = tb_lojista_pessoa.id_lojista)
                      INNER JOIN tb_usuario ON (tb_lojista_pessoa.id_usuario = tb_usuario.id_usuario)
                    WHERE
                      tb_usuario.`status` = 1 AND tb_empreendimento.id_empreendimento = :id_empreendimento
                     )";
	        
	        $adapter = Config::getAdapterService("Lojista");
	        $prepare = $adapter->getConnection()->prepare($sql);
	        $result = $prepare->execute( array(
	            ':id_empreendimento' => $objEmpreendimento->getIdEmpreendimento()
	        ) );
	        
	        return $prepare->fetchAll(PDO::FETCH_ASSOC);
	    }
	    
	    public static function Usuarios_Segmento(Segmento $objSegmento, Empreendimento $objEmpreendimento){
	        
	        $sql = "SELECT DISTINCT 
                      tb_usuario.id_usuario
                    FROM
                      tb_empreendimento
                      INNER JOIN tb_loja ON (tb_empreendimento.id_empreendimento = tb_loja.id_empreendimento)
                      INNER JOIN tb_lojista ON (tb_loja.id_loja = tb_lojista.id_loja)
                      INNER JOIN tb_usuario ON (tb_lojista.id_usuario_responsavel = tb_usuario.id_usuario)
                    WHERE
                      (tb_usuario.`status` = 1) AND (tb_empreendimento.id_empreendimento = :id_empreendimento) AND (tb_loja.id_segmento = :id_segmento) 
                    UNION ALL
                    (
                    SELECT DISTINCT 
                      tb_usuario.id_usuario
                    FROM
                      tb_empreendimento
                      INNER JOIN tb_loja ON (tb_empreendimento.id_empreendimento = tb_loja.id_empreendimento)
                      INNER JOIN tb_lojista ON (tb_loja.id_loja = tb_lojista.id_loja)
                      INNER JOIN tb_lojista_pessoa ON (tb_lojista.id_lojista = tb_lojista_pessoa.id_lojista)
                      INNER JOIN tb_usuario ON (tb_lojista_pessoa.id_usuario = tb_usuario.id_usuario)
                    WHERE
                      (tb_usuario.`status` = 1) AND (tb_empreendimento.id_empreendimento = :id_empreendimento) AND (tb_loja.id_segmento = :id_segmento) 
                     )";
	        
	        $adapter = Config::getAdapterService("Lojista");
	        $prepare = $adapter->getConnection()->prepare($sql);
	        $result = $prepare->execute( array(
	            ':id_empreendimento' => $objEmpreendimento->getIdEmpreendimento(),
	            ':id_segmento' => $objSegmento->getIdSegmento()
	        ) );
	        
	        return $prepare->fetchAll(PDO::FETCH_ASSOC);
	    }
	    
	    public static function Usuarios_Lojista(Lojista $objLojista){
	        
	        $sql = "SELECT DISTINCT 
                      tb_usuario.id_usuario
                    FROM
                      tb_lojista
                      INNER JOIN tb_lojista_pessoa ON (tb_lojista.id_lojista = tb_lojista_pessoa.id_lojista)
                      INNER JOIN tb_usuario ON (tb_lojista_pessoa.id_usuario = tb_usuario.id_usuario)
                    WHERE
                      tb_usuario.`status` = 1 AND tb_lojista.id_lojista = :id_lojista";
	        
	        $adapter = Config::getAdapterService("Lojista");
	        $prepare = $adapter->getConnection()->prepare($sql);
	        $result = $prepare->execute( array(
	            ':id_lojista' => $objLojista->getIdLojista()
	        ) );
	        
	        return $prepare->fetchAll(PDO::FETCH_ASSOC);
	    }
	    
	    public static function Status( $idMensagem, $idUsuario ){
	        
	        $rs = array(
	            'status' => 1,
	            'label' => 'Não lida',
	            'class' => 'primary',
	            'icon' => 'fa fa-eye-slash'
	        );
	        
	        $query = SearchMounter::Query(
	            MensagemAcessoAttribute::_Table(),
	            array(
	                new SearchQueryComparer(MensagemAcessoAttribute::IdMensagem(), SearchComparer::Igual(), SearchCondition::E(), $idMensagem),
	                new SearchQueryComparer(MensagemAcessoAttribute::IdUsuario(), SearchComparer::Igual(), SearchCondition::E(), $idUsuario),
	            ),
	            array(
	                new SearchQueryOrder(MensagemAcessoAttribute::Datahora(), SearchOrder::Decrescente()),
	            ),
	            0, 1
	        );
	        $objAcesso = new MensagemAcesso();
	        if( $objAcesso->buscar($query) ){
	            $rs = array(
	                'status' => 2,
	                'label' => 'Lida',
	                'class' => 'success',
	                'icon' => 'fa fa-check'
	            );
	            
	            $query = SearchMounter::Query(
	                MensagemRespostaAttribute::_Table(),
	                array(
	                    new SearchQueryComparer(MensagemRespostaAttribute::IdMensagem(), SearchComparer::Igual(), SearchCondition::E(), $idMensagem),
	                    new SearchQueryComparer(MensagemRespostaAttribute::IdUsuario(), SearchComparer::Igual(), SearchCondition::E(), $idUsuario),
	                ),
	                array(
	                    new SearchQueryOrder(MensagemRespostaAttribute::Datahora(), SearchOrder::Decrescente()),
	                ),
	                0, 1
	            );
	            
	            $objResposta = new MensagemResposta();
	            if( $objResposta->buscar($query) ){
	                $rs = array(
	                    'status' => 3,
	                    'label' => 'Respondida',
	                    'class' => 'secondary',
	                    'icon' => 'fa fa-refresh'
	                );
	            }
	        }
	        
	        $rs['span'] = '<span class="btn btn-xs btn-'.$rs['class'].'"><i class="'.$rs['icon'].'"></i> '.$rs['label'].'</span>';
	        
	        return $rs;
	    }
	    
	    public static function Acessar(Mensagem $objMensagem){
	        $objMensagemAcesso = new MensagemAcesso();
	        $itensMensagemAcesso = $objMensagemAcesso->consultarSearchQuery(
	            array(
	                new SearchQueryComparer(MensagemAcessoAttribute::IdMensagem(), SearchComparer::Igual(), SearchCondition::E(), $objMensagem->getIdMensagem()),
	                new SearchQueryComparer(MensagemAcessoAttribute::IdUsuario(), SearchComparer::Igual(), SearchCondition::E(), UsuarioLogin::IdUsuario()),
	            ),
	            array(
	                new SearchQueryOrder(MensagemAcessoAttribute::IdMensagemAcesso(), SearchOrder::Crescente())
	            ),
	            0, 1
	        );
	        foreach ($itensMensagemAcesso as $obj) {
	            $obj->setDatahora( date("Y-m-d H:i:s") );
	            $obj->setStatus( 1 );
	            return $obj->alterar();
	        }
	        
	        $obj = new MensagemAcesso();
	        $obj->setIdMensagem( $objMensagem->getIdMensagem() );
	        $obj->setIdUsuario( UsuarioLogin::IdUsuario() );
	        $obj->setDatahora( date("Y-m-d H:i:s") );
	        $obj->setStatus( 1 );
	        
	        return $obj->inserir();
	    }
	    
	    public static function Menu(){
	        
	        $sql = "SELECT DISTINCT 
                      tb_usuario.nome AS usuario_nome,
                      tb_usuario.imagem AS usuario_imagem,
                      tb_mensagem.identificador,
                      tb_mensagem.titulo,
                      tb_mensagem.datahora
                    FROM
                      tb_mensagem_acesso
                      INNER JOIN tb_mensagem ON (tb_mensagem_acesso.id_mensagem = tb_mensagem.id_mensagem)
                      INNER JOIN tb_usuario ON (tb_mensagem.id_usuario_remetente = tb_usuario.id_usuario)
                    WHERE
                      (tb_mensagem_acesso.id_usuario = :id_usuario AND tb_mensagem_acesso.`status` = 0)
                    ORDER BY
                      tb_mensagem_acesso.datahora DESC";
	        
	        $adapter = Config::getAdapterService("Mensagem");
	        $prepare = $adapter->getConnection()->prepare($sql);
	        $result = $prepare->execute( array(
	            ':id_usuario' => UsuarioLogin::IdUsuario()
	        ) );
	        
	        $itens = $prepare->fetchAll(PDO::FETCH_ASSOC);
	        
	        return array(
	            "badge" => count($itens),
	            "itens" => $itens,
	        );
	        
	    }
	    
	}
?>