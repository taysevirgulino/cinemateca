<? 
	class LojistaManage2 extends LojistaManage {
	    
	    /**
	     * @param Usuario $objUsuario
	     * @return Lojista|NULL
	     */
	    public static function Lojista_Usuario(Usuario $objUsuario){
            $objLojistaPessoa = new LojistaPessoa();
            $itensLojistaPessoa = $objLojistaPessoa->consultarSearchQuery(
                array(
                    new SearchQueryComparer(LojistaPessoaAttribute::IdUsuario(), SearchComparer::Igual(), SearchCondition::E(), $objUsuario->getIdUsuario()),
                ),
                array(
                    new SearchQueryOrder(LojistaPessoaAttribute::IdLojistaPessoa(), SearchOrder::Crescente())
                ),
                0, 1
            );
            foreach ($itensLojistaPessoa as $valueLojistaPessoa) {
                $obj = new Lojista();
                if( $obj->buscarAttribute(LojistaAttribute::IdLojista(), $valueLojistaPessoa->getIdLojista()) ){
                    return $obj;
                }
            }
            
            return null;
	    }
	    
	    public static function Farol($idLojista){
	        $query = SearchMounter::Query(
	            LojistaCronogramaAttribute::_Table(),
	            array(
	                new SearchQueryComparer(LojistaCronogramaAttribute::IdLojista(), SearchComparer::Igual(), SearchCondition::E(), $idLojista),
	            ),
	            array(
	                new SearchQueryOrder(LojistaCronogramaAttribute::IdCronogramaFarol(), SearchOrder::Decrescente()),
	            ),
	            0, 1
	        );
	        
	        $objCronograma = new LojistaCronograma();
	        
	        if( $objCronograma->buscar($query) ){
	            
	            return CronogramaFarolManage::buscarAttribute(CronogramaFarolAttribute::IdCronogramaFarol(), $objCronograma->getIdCronogramaFarol());
	            
	        }else{
	            
	            return CronogramaFarolManage::buscarAttribute(CronogramaFarolAttribute::IdCronogramaFarol(), 1);
	            
	        }
	    }
	    
	    public static function Listagem(Empreendimento $objEmpreendimento=null){
	        if($objEmpreendimento == null){
	            $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	        }
	        
	        $sql = "SELECT DISTINCT
                  tb_loja.numero,
                  tb_loja.`area`,
                  tb_segmento.titulo AS segmento_titulo,
                  tb_segmento.cor AS segmento_cor,
                  tb_lojista.id_lojista,
                  tb_lojista.identificador,
                  tb_lojista.id_usuario_responsavel,
                  tb_lojista.nome,
                  tb_lojista.responsavel,
                  tb_lojista.fraquia,
                  tb_lojista.imagem,
                  tb_lojista.observacoes,
				  tb_lojista.email,
                  tb_lojista.`status`
                FROM
                  tb_lojista
                  INNER JOIN tb_loja ON (tb_lojista.id_loja = tb_loja.id_loja)
                  INNER JOIN tb_segmento ON (tb_loja.id_segmento = tb_segmento.id_segmento)
                WHERE
                  tb_loja.id_empreendimento = :id_empreendimento
                ORDER BY
                  tb_lojista.nome";
	        
	        $adapter = Config::getAdapterService("Lojista");
	        $prepare = $adapter->getConnection()->prepare($sql);
	        $result = $prepare->execute( array(
	            ':id_empreendimento' => $objEmpreendimento->getIdEmpreendimento()
	        ) );
	        
	        return $prepare->fetchAll(PDO::FETCH_ASSOC);
	    }
	    
	    /**
	     * @param Usuario $objUsuario
	     * @return multitype:
	     */
	    public static function Lojistas_Usuario(Usuario $objUsuario){
	        
	        $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	        
	        switch ($objUsuario->getIdUsuarioPerfil()) {
	            case 1: { //lojista
	                $sql = "SELECT DISTINCT 
                              tb_lojista.*
                            FROM
                              tb_lojista_pessoa
                              INNER JOIN tb_lojista ON (tb_lojista_pessoa.id_lojista = tb_lojista.id_lojista)
                              INNER JOIN tb_loja ON (tb_lojista.id_loja = tb_loja.id_loja)
                            WHERE
                              (tb_lojista_pessoa.id_usuario = ".$objUsuario->getIdUsuario()." AND tb_loja.id_empreendimento = ".$objEmpreendimento->getIdEmpreendimento().")
                            ORDER BY
                              tb_lojista.nome";
	            }break;
	            case 2: { //atendente
	                $sql = "SELECT DISTINCT 
                              tb_lojista.*
                            FROM
                              tb_lojista
                              INNER JOIN tb_loja ON (tb_lojista.id_loja = tb_loja.id_loja)
                            WHERE
                              (tb_lojista.id_usuario_responsavel = ".$objUsuario->getIdUsuario()." AND tb_loja.id_empreendimento = ".$objEmpreendimento->getIdEmpreendimento().")
                            ORDER BY
                              tb_lojista.nome";
	            }break;
	            default: { //atendente
	                $sql = "SELECT DISTINCT 
                              tb_lojista.*
                            FROM
                              tb_lojista
                              INNER JOIN tb_loja ON (tb_lojista.id_loja = tb_loja.id_loja)
                            WHERE
                              (tb_loja.id_empreendimento = ".$objEmpreendimento->getIdEmpreendimento().")
                            ORDER BY
                              tb_lojista.nome";
	            }break;
	        }
	        
	        $objLojista = new Lojista();
	        return $objLojista->consultar(array("__sql"=>$sql));
	    }
	}
?>