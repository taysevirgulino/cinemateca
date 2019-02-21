<?php
class API {

	/*public static function lojistaEtapaUpdate( $formData ){
		
	    $rs = array();
	    $form = array(); parse_str($formData, $form);
	    
	    foreach ($form as $key => $value) {
	        $form[$key] = utf8_decode($value);
	    }
		
		return json_encode(array(
			'sucess' => false,
			'msg' => utf8_encode('Problema ao cadastrar, tente novamente')
		));
	}*/
	
	public static function lojistaEtapaUpdate( $ideLojista, $ideEtapa, $status, $data ){
		
	    if( !UsuarioLogin::Autenticado() ){
	        return json_encode(array(
	            'sucess' => false,
	            'msg' => utf8_encode('Usuário não autenticado, tente novamente')
	        ));
	    }

	    $objLojista = new Lojista();
	    if( !$objLojista->buscarAttribute(LojistaAttribute::Identificador(), System::_QueryString($ideLojista)) ){
	        return json_encode(array(
	            'sucess' => false,
	            'msg' => utf8_encode('Lojista não localizado, tente novamente')
	        ));
	    }
	    
	    $objEtapa = new CronogramaEtapa();
	    if( !$objEtapa->buscarAttribute(CronogramaEtapaAttribute::Identificador(), System::_QueryString($ideEtapa)) ){
	        return json_encode(array(
	            'sucess' => false,
	            'msg' => utf8_encode('Eata não identificada, tente novamente')
	        ));
	    }
	    
	    $query = SearchMounter::Query(
	        LojistaEtapaAttribute::_Table(),
	        array(
	            new SearchQueryComparer(LojistaEtapaAttribute::IdCronogramaEtapa(), SearchComparer::Igual(), SearchCondition::E(), $objEtapa->getIdCronogramaEtapa()),
	            new SearchQueryComparer(LojistaEtapaAttribute::IdLojista(), SearchComparer::Igual(), SearchCondition::E(), $objLojista->getIdLojista()),
	        ),
	        array(
	            new SearchQueryOrder(LojistaEtapaAttribute::IdLojistaEtapa(), SearchOrder::Crescente()),
	        )
	    );
	    
	    $data = ((Validacao::isData($data)) ? System::FormatarData($data, "Y-m-d") : "0000-00-00" );
	    
	    $result = false;
	    $obj = new LojistaEtapa();
	    if( !$obj->buscar($query) ){
	        $obj->setIdLojistaEtapa( null );
	        $obj->setIdentificador( null );
	        $obj->setIdCronogramaEtapa( $objEtapa->getIdCronogramaEtapa() );
	        $obj->setIdLojista( $objLojista->getIdLojista() );
	        $obj->setIdUsuario( UsuarioLogin::IdUsuario() );
	        $obj->setData( $data );
	        $obj->setDatahora( date("Y-m-d H:i:s") );
	        $obj->setStatus( $status );
	        
	        $result = $obj->inserir();
	    }else{
	        $obj->setIdUsuario( UsuarioLogin::IdUsuario() );
	        $obj->setData( $data );
	        $obj->setDatahora( date("Y-m-d H:i:s") );
	        $obj->setStatus( $status );
	        
	        $result = $obj->alterar();
	    }
	    
	    if( $result ){
	        $cronograma = LojistaCronogramaManage2::Update($objLojista);
	        
	        return json_encode(array(
	            'sucess' => true,
	            'msg' => utf8_encode('Etapa atualizada com sucesso')
	        ));
	    }
	    
	    return json_encode(array(
	        'sucess' => false,
	        'msg' => utf8_encode('Problema ao executar, tente novamente')
	    ));
	}
	
	public static function lojistaPessoaSenha( $ideLojistaPessoa ){
		
	    if( !UsuarioLogin::Autenticado() ){
	        return json_encode(array(
	            'sucess' => false,
	            'msg' => utf8_encode('Usuário não autenticado, tente novamente')
	        ));
	    }

	    $objLojistaPessoa = new LojistaPessoa();
	    if( !$objLojistaPessoa->buscarAttribute(LojistaPessoaAttribute::Identificador(), System::_QueryString($ideLojistaPessoa)) ){
	        return json_encode(array(
	            'sucess' => false,
	            'msg' => utf8_encode('Pessoa não localizada, tente novamente')
	        ));
	    }
	    
	    $objUsuario = new Usuario();
	    if( !$objUsuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $objLojistaPessoa->getIdUsuario()) ){
	        return json_encode(array(
	            'sucess' => false,
	            'msg' => utf8_encode('Usuário não localizado, tente novamente')
	        ));
	    }
	    
	    $mail = new Email(CurrentSite::Site());
	    
	    if( $mail->Usuario_Senha($objUsuario, "email_acesso") ){
	        return json_encode(array(
	            'sucess' => true,
	            'msg' => utf8_encode('Dados de acesso foram encaminhados por e-mail.')
	        ));
	    }
	    
	    return json_encode(array(
	        'sucess' => false,
	        'msg' => utf8_encode('Senha não foi enviada, tente novamente')
	    ));
	}
	
	public static function lojistaCronogramaPrevisao( $formData ){
	
	    $rs = array();
	    $form = array(); parse_str($formData, $form);
	    
	    $previsao_inicio = ((Validacao::isData($form["FrmPrevisaoInicio"])) ? System::FormatarData($form["FrmPrevisaoInicio"], "Y-m-d") : "0000-00-00" );
	    $previsao_fim = ((Validacao::isData($form["FrmPrevisaoFim"])) ? System::FormatarData($form["FrmPrevisaoFim"], "Y-m-d") : "0000-00-00" );
	    
	    $obj = new LojistaCronograma();
	    if( $obj->buscarAttribute(LojistaCronogramaAttribute::Identificador(), System::_QueryString($form["FrmCronogramaIde"])) ){
	        $obj->setPrevisaoInicio( $previsao_inicio );
	        $obj->setPrevisaoFim( $previsao_fim );
	        $obj->setDatahora( date("Y-m-d H:i:s") );
	        
	        if( $obj->alterar() ){
	            return json_encode(array(
	                'sucess' => true,
	                'msg' => utf8_encode('Cronograma atualizado com sucesso')
	            ));
	        }
	    }
	
	    return json_encode(array(
	        'sucess' => false,
	        'msg' => utf8_encode('Problema ao salvar, tente novamente')
	    ));
	}
	
}
?>
