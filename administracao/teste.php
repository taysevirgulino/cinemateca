<?
	require_once("config.inc.php");

$a = array();
	
$a[] = "S15;	174,74;	3";
$a[] = "S16;	174,74;	3";
$a[] = "S17;	174,74;	3";
$a[] = "S18;	42,76;	3";
$a[] = "S22;	41,20;	3";
$a[] = "S25;	41,50;	3";
$a[] = "S26;	1.295,25;	1";
$a[] = "1001;	468,36;	4";
$a[] = "1010;	140,20;	3";
$a[] = "1011;	154,14;	3";
$a[] = "1014;	239,75;	2";
$a[] = "1015;	239,75;	2";
$a[] = "1016;	62,99;	3";
$a[] = "1017;	63,00;	3";
$a[] = "1018;	63,00;	3";
$a[] = "1030;	56,88;	3";
$a[] = "1031;	39,75;	3";
$a[] = "1033;	50,00;	3";
$a[] = "1036;	50,00;	3";
$a[] = "1039;	37,00;	3";
$a[] = "1041;	41,86;	3";
$a[] = "1045A;	50,12;	3";
$a[] = "1047;	142,53;	3";
$a[] = "1059;	61,75;	3";
$a[] = "1061;	65,27;	3";
$a[] = "1068;	41,75;	3";
$a[] = "1069;	41,75;	3";
$a[] = "1070A;	46,00;	3";
$a[] = "1073;	58,37;	3";
$a[] = "1075A;	44,50;	3";
$a[] = "1075B;	29,75;	3";
$a[] = "1077;	80,00;	3";
$a[] = "1078;	80,00;	3";
$a[] = "1079;	245,25;	2";
$a[] = "1080;	245,25;	2";
$a[] = "1081;	61,75;	3";
$a[] = "1086;	61,75;	3";
$a[] = "1087;	123,50;	3";
$a[] = "1088;	123,50;	3";
$a[] = "1108;	83,50;	3";
$a[] = "1119;	83,50;	3";
$a[] = "1120;	83,50;	3";
$a[] = "2001;	2.145,73;	1";
$a[] = "2002;	93,90;	3";
$a[] = "2003;	93,90;	3";
$a[] = "2004;	116,10;	3";
$a[] = "2007;	134,73;	3";
$a[] = "2008;	134,73;	3";
$a[] = "2012;	97,19;	3";
$a[] = "2013;	97,19;	3";
$a[] = "2014;	97,19;	3";
$a[] = "2018;	94,40;	3";
$a[] = "2019;	94,40;	3";
$a[] = "2020;	94,40;	3";
$a[] = "2026A;	52,60;	3";
$a[] = "2027;	42,50;	3";
$a[] = "2029;	42,50;	3";
$a[] = "2033A;	34,25;	3";
$a[] = "2037;	74,85;	3";
$a[] = "2044;	73,81;	3";
$a[] = "2050;	140,40;	3";
$a[] = "2051;	30,20;	3";
$a[] = "2053;	316,03;	2";
$a[] = "2055;	316,03;	2";
$a[] = "2055;	316,03;	2";
$a[] = "2056;	143,85;	3";
$a[] = "2057;	52,09;	3";
$a[] = "2060;	113,96;	3";
$a[] = "2061;	113,96;	3";
$a[] = "2063A;	87,50;	3";
$a[] = "2065;	94,51;	3";
$a[] = "2067;	60,12;	3";
$a[] = "2071;	62,50;	3";
$a[] = "2072;	62,50;	3";
$a[] = "2076;	130,47;	3";
$a[] = "2077;	130,47;	3";
$a[] = "2078;	130,47;	3";
$a[] = "2079;	62,58;	3";
$a[] = "2083;	107,10;	3";
$a[] = "2084;	240,40;	2";
$a[] = "2085;	40,00;	3";
$a[] = "2086;	41,20;	3";
$a[] = "2087;	229,80;	2";
$a[] = "2089;	45,83;	3";
$a[] = "2092;	53,05;	3";
$a[] = "2093;	455,10;	2";
$a[] = "2094;	455,10;	2";
$a[] = "2095;	50,73;	3";
$a[] = "2097;	123,25;	3";
$a[] = "2098;	51,25;	3";
$a[] = "2104;	62,50;	3";
$a[] = "2105;	107,50;	3";
$a[] = "2108;	100,00;	3";
$a[] = "2109;	100,00;	3";
$a[] = "3004A;	53,00;	3";
$a[] = "3005;	53,50;	3";
$a[] = "3013;	107,52;	5";
$a[] = "3014;	107,52;	5";
$a[] = "3032A;	26,75;	3";
$a[] = "3032B;	26,75;	3";
$a[] = "3032C;	53,5;	3";
$a[] = "3032D;	77,96;	3";
$a[] = "3033;	52,27;	3";
$a[] = "3033A;	51,12;	3";


print"<pre>";
foreach ($a as $value) {
	list($frm_numero, $frm_area, $frm_id_segmento) = explode(";", $value);
	 
	$id_segmento = trim($frm_id_segmento);
	$numero = trim($frm_numero);
	$area = trim($frm_area);
	 
	$objLoja = new Loja();
	if( !$objLoja->buscarAttribute(LojaAttribute::Numero(), $numero) ){
		$objLoja->setIdEmpreendimento( 3 );
		$objLoja->setIdSegmento( $id_segmento );
		$objLoja->setNumero( $numero );
		$objLoja->setPavimento( '' );
		$objLoja->setArea( System::ConverterDouble($area) );
		$objLoja->setStatus( 1 );
		 
		$objLoja->inserir();
	}
	
	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::IdLoja(), $objLoja->getIdLoja()) ){
		$objLojista->setIdLoja( $objLoja->getIdLoja() );
		$objLojista->setIdUsuarioResponsavel( 2 );
		$objLojista->setNome( '' );
		$objLojista->setResponsavel( '' );
		$objLojista->setFraquia( 2 );
		$objLojista->setImagem( '' );
		$objLojista->setObservacoes( '' );
		$objLojista->setStatus( 1 );
	
		$objLojista->inserir();
	}

}
print"</pre>";
	
	/*
	$file = file("lojistas.csv");
	
	foreach ($file as $linha) {
	    list($luc, $nome_loja, $area, $tipo, $responsavel_nome, $responsavel_email, $responsavel_telefone1, $responsavel_telefone2, $responsavel2_nome, $responsavel2_email, $responsavel2_telefone1, $responsavel2_telefone2, $projetista_nome, $projetista_email, $projetista_telefone1, $projetista_telefone2) = explode(";", $linha);
	    
	    $luc = trim($luc);
	    $tipo = trim($tipo);
	    $nome_loja = trim($nome_loja);
	    $responsavel_nome = trim($responsavel_nome);
	    $responsavel_email = trim($responsavel_email);
	    $responsavel_telefone1 = trim($responsavel_telefone1);
	    $responsavel_telefone2 = trim($responsavel_telefone2);
	    $responsavel2_nome = trim($responsavel2_nome);
	    $projetista_nome = trim($projetista_nome);
	    
	    $objSegmento = new Segmento();
	    if( !$objSegmento->buscarAttribute(SegmentoAttribute::Titulo(), $tipo) ){
	        $objSegmento->setTitulo( $tipo );
	        $objSegmento->setCor( '' );
	        $objSegmento->setPrioridade( SegmentoManage::ultimaPrioridade() );
	        
	        $objSegmento->inserir();
	    }
	    
	    $objLoja = new Loja();
	    if( !$objLoja->buscarAttribute(LojaAttribute::Numero(), $luc) ){
	        $objLoja->setIdEmpreendimento( 1 );
	        $objLoja->setIdSegmento( $objSegmento->getIdSegmento() );
	        $objLoja->setNumero( $luc );
	        $objLoja->setPavimento( '' );
	        $objLoja->setArea( System::ConverterDouble($area) );
	        $objLoja->setStatus( 1 );
	        
	        $objLoja->inserir();
	    }
	    
	    $objLojista = new Lojista();
	    if( !$objLojista->buscarAttribute(LojistaAttribute::Nome(), $nome_loja) ){
	        $objLojista->setIdLoja( $objLoja->getIdLoja() );
	        $objLojista->setIdUsuarioResponsavel( 2 );
	        $objLojista->setNome( $nome_loja );
	        $objLojista->setResponsavel( $responsavel_nome );
	        $objLojista->setFraquia( 2 );
	        $objLojista->setImagem( '' );
	        $objLojista->setObservacoes( '' );
	        $objLojista->setStatus( 1 );
	        
	        $objLojista->inserir();
	    }
	    
	    if( !empty($responsavel_nome)){
    	    $objPessoa = new LojistaPessoa();
    		$objPessoa->setIdLojista( $objLojista->getIdLojista() ); 
    		$objPessoa->setIdLojistaPessoaPerfil( 4 ); 
    		$objPessoa->setIdUsuario( 2 ); 
    		$objPessoa->setNome( $responsavel_nome ); 
    		$objPessoa->setEmail( trim($responsavel_email) ); 
    		$objPessoa->setEmail2( '' ); 
    		$objPessoa->setTelefone( trim($responsavel_telefone1) ); 
    		$objPessoa->setTelefone2( trim($responsavel_telefone2) ); 
    		$objPessoa->setReceberEmail( 1 ); 
    		$objPessoa->setStatus( 1 );
    		 
    		$objPessoa->inserir();
	    }
		
	    if( !empty($responsavel2_nome)){
    		$objPessoa = new LojistaPessoa();
    		$objPessoa->setIdLojista( $objLojista->getIdLojista() );
    		$objPessoa->setIdLojistaPessoaPerfil( 4 );
    		$objPessoa->setIdUsuario( 2 );
    		$objPessoa->setNome( trim($responsavel2_nome) );
    		$objPessoa->setEmail( trim($responsavel2_email) );
    		$objPessoa->setEmail2( '' );
    		$objPessoa->setTelefone( trim($responsavel2_telefone1) );
    		$objPessoa->setTelefone2( trim($responsavel2_telefone2) );
    		$objPessoa->setReceberEmail( 1 );
    		$objPessoa->setStatus( 1 );
    		
    		$objPessoa->inserir();
	    }
		
	    if( !empty($projetista_nome)){
    		$objPessoa = new LojistaPessoa();
    		$objPessoa->setIdLojista( $objLojista->getIdLojista() );
    		$objPessoa->setIdLojistaPessoaPerfil( 6 );
    		$objPessoa->setIdUsuario( 2 );
    		$objPessoa->setNome( trim($projetista_nome) );
    		$objPessoa->setEmail( trim($projetista_email) );
    		$objPessoa->setEmail2( '' );
    		$objPessoa->setTelefone( trim($projetista_telefone1) );
    		$objPessoa->setTelefone2( trim($projetista_telefone2) );
    		$objPessoa->setReceberEmail( 1 );
    		$objPessoa->setStatus( 1 );
    		
    		$objPessoa->inserir();
	    }
		
	}
	//print_r($file);
	
	
	
	/*$v = array();
	$v[] = "1;PROCEDIMENTO PRÉ-OBRA;5";
	$v[] = ";Projeto arquitetônico Liberado + ART;1";
	$v[] = ";Entrega do Termo de Recebimento de Loja;1";
	$v[] = ";Entrega ART Execução;1";
	$v[] = ";Entrega Seguro de Obras;1";
	$v[] = ";Tapume de obra;1";
	$v[] = "2;CIVIL;25";
	$v[] = ";Projeto estrutural Liberado + ART;4";
	$v[] = ";Execução do mezanino metálico;5";
	$v[] = ";Execução do contrapiso;5";
	$v[] = ";Fechamento em drywall - paredes;4";
	$v[] = ";Fechamento em drywall - forro;4";
	$v[] = ";Instalação de piso;3";
	$v[] = "3;INSTALAÇÕES ELÉTRICAS;20";
	$v[] = ";Projeto elétrico Liberado + ART;5";
	$v[] = ";Instalações elétricas;5";
	$v[] = ";Finalização do Quadro Elétrico;5";
	$v[] = ";Instalação de luminárias;5";
	$v[] = "4;INSTALAÇÕES INCÊNDIO;15";
	$v[] = ";Projeto incêndio Liberado + ART;3";
	$v[] = ";Teste rede de sprinkler e hidrante;3";
	$v[] = ";Sprinkler e Hidrantes ;6";
	$v[] = ";Interligação do sistema de detecção com o shopping;2";
	$v[] = ";Extintores;1";
	$v[] = "5;INSTALAÇÕES AR CONDICIONADO;25";
	$v[] = ";Projeto ar condicionado Liberado + ART;5";
	$v[] = ";Montagem do equipamento de ar condicionado;10";
	$v[] = ";Montagem dos dutos;8";
	$v[] = ";Instalação de grelhas e acabamentos;2";
	$v[] = "6;ACABAMENTOS E MONTAGEM DE LOJA;10";
	$v[] = ";Marcenaria;3";
	$v[] = ";Fachada (incluindo vidros);3";
	$v[] = ";Letreiro fachada;1";
	$v[] = ";Produtos / Mercadorias;3";
	
	$pt = 0;
	$pe = 0;
	$idTipo = 0;
	foreach ($v as $value) {
	    $a = explode(";", $value);
	    $id = intval($a[0]);
	    if( $id > 0 ){
	        $obj = new CronogramaTipo();
	        $obj->setCronogramaTipo(null, null, trim($a[1]), $pt++, 1);
	        $obj->inserir();
	        $idTipo = $obj->getIdCronogramaTipo();
	    }else{
	        $obj = new CronogramaEtapa();
	        $obj->setCronogramaEtapa(null, null, $idTipo, trim($a[1]), '', intval($a[2]), $pe++, 1);
	        $obj->inserir();
	    }
	}
	
	/*$v = array();
	$v[] = "Arquiteto";
	$v[] = "Proprietário";
	$v[] = "Gerenciador";
	$v[] = "Responsável Administrativo";
	$v[] = "Consultor/Empreiteiro";
	$v[] = "Projetista Estrutural";
	$v[] = "Projetista Elétrico";
	$v[] = "Projetista Hidráulico";
	$v[] = "Projetista de Arcondicionado";
	$v[] = "Projetista de Gás";
	$v[] = "Projetista de Exaustão";
	$v[] = "Projetista de CO2";
	$v[] = "Projetista de Incêndio";
	
	
	foreach ($v as $i => $value) {
	    $obj = new LojistaPessoaPerfil();
	    $obj->setLojistaPessoaPerfil(null, null, $value, $i);
	    $obj->inserir();
	    print $obj->getIdLojistaPessoaPerfil()."<br>";
	}
	
	
	/*NotificacaoManage2::Registrar(NotificacaoTipo::Alerta(), 1, "Sua senha expirará em breve", Url::Usuario_Editar());
	NotificacaoManage2::Registrar(NotificacaoTipo::Erro(), 1, "Sua senha nao foi salva", Url::Usuario_Editar());
	NotificacaoManage2::Registrar(NotificacaoTipo::Info(), 1, "Você está muito bem, parabéns", Url::Usuario_Editar());
	NotificacaoManage2::Registrar(NotificacaoTipo::Sucesso(), 1, "Seu procedimento foi concluído", Url::Usuario_Editar());*/
	
	/*$obj = new Segmento();
	$obj->setSegmento(null, null, "Megalojas", "cor", 1);
	if($obj->inserir()){
	    echo "ok";
	}*/
	
	/*$obj = new Segmento();
	$obj->setSegmento(3, "032c1010a0ff372ce545a48a867e5642", "t3", "cor1", 2);
	if($obj->excluir()){
	    echo "ok";
	}*/
	
	/*$obj = new Segmento();
	if($obj->buscarAttribute(SegmentoAttribute::Titulo(), "t3", SearchComparer::Contem())){
	    echo "ok";
	    $obj->buscarTipo(3, null);
	}
	print_r($obj);*/
	
	/*$itensSegmento = SegmentoManage::consultarSearchQuery(
	    array(
	        new SearchQueryComparer(SegmentoAttribute::Titulo(), SearchComparer::Contem(), SearchCondition::E(), 't'),
	    ),
	    array(
	        new SearchQueryOrder(SegmentoAttribute::Titulo(), SearchOrder::Crescente())
	    )
	);
	print_r($itensSegmento);
	
	/*$data = array(
	    SegmentoAttribute::Titulo() => 1,
	    'cor' => 'red',
	    'prioridade' => 2
	);
	
	SegmentoManage::inserir($data);
	
	/*$query = SearchMounter::Query(
		NoticiaAttribute::_Table(),
		array(
			new SearchQueryComparer(NoticiaAttribute::IdEditoria(), SearchComparer::Igual(), SearchCondition::E(), 10),
			new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		)
	);
	
	$obj = new Noticia();
	$quantidade = $obj->count($query);*/

	/*
	$obj = new Noticia();
	
	$noticias = $obj->consultarAttribute(NoticiaAttribute::Status(), 1, SearchComparer::Igual(), NoticiaAttribute::DatahoraEdicao(), SearchOrder::Decrescente());
	*/
	
	
	/*$noticias = NoticiaManage::consultarAttribute(NoticiaAttribute::Status(), 1, SearchComparer::Igual(), NoticiaAttribute::DatahoraEdicao(), SearchOrder::Decrescente());
	
	foreach ($noticias as $noticia) {
		print_r($noticia);
	}*/
	
	/*$obj = new Noticia();
	if( $obj->buscarAttribute(NoticiaAttribute::IdNoticia(), 1416631154, SearchComparer::Igual()) ){
		//var_dump($obj);
		print $obj->getTitulo();
	}*/
	
	//$noticia = NoticiaManage::buscarAttribute(NoticiaAttribute::IdNoticia(), 1416631154, SearchComparer::Igual());
	
	//var_dump($noticia);
	
	
	
	
	
	/*$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();
	
	$SearchQueryComparerCollection[] = new SearchQueryComparer(NoticiaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), '98defd6ee70dfb1dea416cecdf391f58');
	$SearchQueryComparerCollection[] = new SearchQueryComparer(NoticiaAttribute::Titulo(), SearchComparer::Contem(), SearchCondition::E(), 'Título');
	
	$SearchQueryOrderCollection[] = new SearchQueryOrder(NoticiaAttribute::Titulo(), SearchOrder::Crescente());
	$SearchQueryOrderCollection[] = new SearchQueryOrder(NoticiaAttribute::IdNoticia(), SearchOrder::Decrescente());
	
	var_dump(
		NoticiaManage::count( SearchMounter::MounterByQueryCount(NoticiaAttribute::_Table(), $SearchQueryComparerCollection) )
	);
	
	$query = SearchMounter::MounterByQueryLimit(NoticiaAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, 0, 10);
	var_dump(
		NoticiaManage::consultar($query)
	);*/
	
	/*$query = SearchMounter::MounterByQueryLimit(NoticiaAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, 0, 10);
	var_dump( 
		$query
	);
	
	var_dump( 
		NoticiaManage::consultar($query)
	);*/
	
	/*$SearchQueryComparerCollection = array();
	$SearchQueryComparerCollection2 = array();
	$SearchQueryOrderCollection = array();
	$SearchQueryComparerGroupCollection = array();
	
	$SearchQueryOrderCollection[] = new SearchQueryOrder(NoticiaAttribute::Titulo(), SearchOrder::Crescente());
	$SearchQueryOrderCollection[] = new SearchQueryOrder(NoticiaAttribute::IdNoticia(), SearchOrder::Decrescente());
	
	$SearchQueryComparerCollection[] = new SearchQueryComparer(NoticiaAttribute::Chapeu(), SearchComparer::Igual(), SearchCondition::E(), 'Chapéu');
	$SearchQueryComparerCollection[] = new SearchQueryComparer(NoticiaAttribute::Chapeu(), SearchComparer::Igual(), SearchCondition::OU(), 'Chapéu');
	
	$SearchQueryComparerCollection2[] = new SearchQueryComparer(NoticiaAttribute::Titulo(), SearchComparer::Igual(), SearchCondition::E(), 'Título');
	$SearchQueryComparerCollection2[] = new SearchQueryComparer(NoticiaAttribute::Titulo(), SearchComparer::Contem(), SearchCondition::OU(), 'Novo');
	
	$SearchQueryComparerGroupCollection[] = new SearchQueryComparerGroup($SearchQueryComparerCollection, SearchCondition::E());
	$SearchQueryComparerGroupCollection[] = new SearchQueryComparerGroup($SearchQueryComparerCollection2, SearchCondition::OU());
	
	$query = SearchMounter::MounterByQueryLimitGroup(NoticiaAttribute::_Table(), $SearchQueryComparerGroupCollection, $SearchQueryOrderCollection, 0, 10);
	print_r($query);
	var_dump(
		$query
	);
	
	var_dump(
		NoticiaManage::consultar($query)
	);*/
	
	//var_dump( NoticiaManage::buscarAttribute(NoticiaAttribute::IdNoticia(), 1390149806) );
	//var_dump( NoticiaManage::buscarAttribute(NoticiaAttribute::IdNoticia(), 1390149718) );
	//var_dump( NoticiaManage::buscarAttribute(NoticiaAttribute::IdNoticia(), 1389984586) );
	
	
	//var_dump( NoticiaManage::excluirNoticia(1389986409) );
	//var_dump( NoticiaManage::inserirNoticia(null, null, null, 1, 1, 1, 1, 'Chapéu1', 'Título', 'Resumo', 'Texto', 'http://www.google.com.br', '_blank', 'Credito foto', 'Descricao foto', 'Foto arquivo', 'null.jpg', 0, 0, 0, '1-noticia', 'http://bity', date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), 1, 1));
	//var_dump( NoticiaManage::alterarNoticia(1390149806, null, null, 1, 1, 1, 1, 'Chapéu2', 'Título', 'Resumo', 'Texto', 'http://www.google.com.br', '_blank', 'Credito foto', 'Descricao foto', 'Foto arquivo', 'null.jpg', 0, 0, 0, '1-noticia', 'http://bity', date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), 1, 1));
	//var_dump( NoticiaManage::consultarNoticia());
	
	//$objNoticia = new Noticia();
	
	//$objNoticia->setNoticia(null, null, null, 1, 1, 1, 1, 'Chapéu', 'Título', 'Resumo', 'Texto', 'http://www.google.com.br', '_blank', 'Credito foto', 'Descricao foto', 'Foto arquivo', 'null.jpg', 0, 0, 0, '1-noticia', 'http://bity', date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), 1, 1);
	//var_dump( $objNoticia->inserir() );
	
	//$objNoticia->buscar(3, $objNoticia->getIdNoticia());
	
	//print_r($objNoticia);
	
	//$result = $objNoticia->consultar(1, '');
	//print_r($result);
	
	//$objNoticia->buscarTipo(1, 1389984707);
	//$objNoticia->setTitulo('Novo título através update '.time());
	//var_dump($objNoticia->alterar());
	//var_dump($objNoticia->alterarAtributoTitulo());
	
	//var_dump($objNoticia->excluir());
	
	/*var_dump( 
		$objNoticia->buscarAttribute(NoticiaAttribute::IdNoticia(), 1389984707, SearchComparer::MaiorIgual())
	);*/
	
	//$result = $objNoticia->consultarAttribute(NoticiaAttribute::Titulo(), 'Título', SearchComparer::Contem(), NoticiaAttribute::IdNoticia(), SearchOrder::Decrescente());
	//print_r($result);
	
	//print_r($objNoticia);
	
	//$objNoticia->buscarNoticia( $tipo, $valor );
	/*$objNoticia->consultarNoticia( $tipo, $valor );
	$objNoticia->buscarNoticiaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare);
	$objNoticia->consultarNoticiaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
	$objNoticia->inserirNoticia();
	$objNoticia->alterarNoticia();
	$objNoticia->alterarAtributoIdEditoria();
	$objNoticia->excluirNoticia();
	$objNoticia->getNoticia();*/
	
	//print_r( $objNoticia->toArray() );
	
	
	//$objNoticia->alterarAtributoTitulo();
	
	
	
	/*$connection = new Mongo();
	$db = $connection->mvjtocantins1511;
	
	//print_r( $db->listCollections() );
	$collection = $db->teste;
	
	/*$document = $collection->findOne();
	var_dump( $document );*/
	
	/*$collection->insert( 
		array(
			'name'=>'japa',
			'enderecos' => array(
								'rua' => '706 Sul',
								'numero' => 10
							)
		)
	);
	
	$documents = $collection->find();
	
	foreach ($documents as $value){
		var_dump($value);
	}*/
	
	/*$Noticia = NoticiaManage::buscarAttribute(NoticiaAttribute::IdNoticia(), 1392386087);
	
	$Areas = AreaPublicacaoManage::consultarAttribute(null, null, null, AreaPublicacaoAttribute::Prioridade());
	
	$Editorias = EditoriaManage::consultar();
	$ce = count($Editorias);
	$countE = -1;
	
	for($i=0; $i < count($Areas); $i++){
		for($j=0; $j < intval($Areas[$i]["quantidade"]); $j++){
			if($countE >= ($ce-1)){
				$countE = 0;
			}else{
				$countE++;
			}
			$IdEditoria = $Editorias[$countE]["id_editoria"];
			
			$Noticia["id_noticia"] = null;
			$Noticia["identificador"] = null;
			$Noticia["id_area_publicacao"] = $Areas[$i]["id_area_publicacao"];
			$Noticia["id_editoria"] = $IdEditoria;
			
			NoticiaManage::inserir( $Noticia );
			
			print $countE." # ".$IdEditoria." - ".$Areas[$i]["id_area_publicacao"]."<br>";
		}
	}*/
?>