<? 
	class LojistaEtapaManage2 extends LojistaEtapaManage {
	    
	    public static function Fullcalendar_Usuario(Usuario $objUsuario){
	        
	        $lojistas = LojistaManage2::Lojistas_Usuario($objUsuario);
	        $datas = array();
	        
	        foreach($lojistas as $lojista){
	            $datas = array_merge($datas, self::Fullcalendar($lojista));
	        }
	        
	        return $datas;
	    }
	    
        /**
         * @param Lojista $objLojista
         * @return multitype:multitype:string unknown NULL
         */
	    public static function Fullcalendar(Lojista $objLojista){
	        	
	        $sql = "SELECT DISTINCT 
                      tb_cronograma_tipo.titulo AS tipo,
                      tb_cronograma_etapa.titulo AS etapa,
                      tb_lojista_etapa.id_lojista_etapa,
                      tb_lojista_etapa.identificador,
                      tb_lojista_etapa.`data`,
                      tb_lojista_etapa.`status`
                    FROM
                      tb_lojista_etapa
                      INNER JOIN tb_cronograma_etapa ON (tb_lojista_etapa.id_cronograma_etapa = tb_cronograma_etapa.id_cronograma_etapa)
                      INNER JOIN tb_cronograma_tipo ON (tb_cronograma_etapa.id_cronograma_tipo = tb_cronograma_tipo.id_cronograma_tipo)
                    WHERE
                      tb_lojista_etapa.id_lojista = :id_lojista
                    ORDER BY
                      tb_lojista_etapa.`data`";
                    		
    		$adapter = Config::getAdapterService("Lojista");
    		$prepare = $adapter->getConnection()->prepare($sql);
    		$result = $prepare->execute( array(
    		    ':id_lojista' => $objLojista->getIdLojista(),
    		) );
    		
    		$datas = $prepare->fetchAll(PDO::FETCH_ASSOC);
    
    		foreach ($datas as $i => $value) {
	            $className = "";
	            $status = "";
	            if($value["status"] == 1){ //concluido
                    $status = "Concluído";
                    $className = "fc-green";
                }else
                if($value["data"] >= date("Y-m-d")){ //aberto
                    $status = "Aberto";
                    $className = "fc-grey";
                }else{ //vencido
                    $status = "Vencido";
                    $className = "fc-red";
                }
                $datas[$i]["className"] = $className;
                $datas[$i]["status"] = $status;
	        }
	        
	        $url = Url::_Path()."lojista-cronograma-".$objLojista->getIdentificador();
	        
	        $itens = array();
	        foreach ($datas as $data) {
	            $start = System::FormatarData($data["data"], "Y-m-d");
	            //$start = new DateTime(System::FormatarData($data["data"], "Y-m-d")." 00:00:00");
	            //$start = $start->format('c');
	    
	            $item = array(
	                'id' => $data["identificador"],
	                'title' => utf8_encode($data["etapa"]),
	                'description' => utf8_encode($data["tipo"]),
	                'lojista' => utf8_encode($objLojista->getNome()),
	                'data' => utf8_encode(System::FormatarData($data["data"], "d/m/Y")),
	                'start' => $start,
	                'end' => $start,
	                'url' => $url,
	                'className' => $data["className"],
	                'status' => utf8_encode($data["status"]),
	            );
	    
	            $itens[] = $item;
	        }
	        	
	        return $itens;
	    }
	    
	}
?>