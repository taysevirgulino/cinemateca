<? 
	class MuralRecadoManage2 extends MuralRecadoManage { 
		
		public static function Recados ( $Limit ){
			$sql = "SELECT 
					  tb_mural_recado.*
					FROM
					  tb_mural_recado
					WHERE
					  tb_mural_recado.`status` = 1
					ORDER BY
					  tb_mural_recado.datahora DESC
					LIMIT $Limit";
			
			return MuralRecadoManage2::consultarMuralRecado(3, $sql);
		}
		
		public static function Comentar($Nome, $Email, $Mensagem){
			$rs = array();
			$rs["status"] = 0;
			
			$obj = new MuralRecado();
			$obj->setIdMuralRecado( -1 );
			$obj->setIdentificador( null );
			$obj->setNome( $Nome );
			$obj->setEmail( $Email );
			$obj->setTexto( $Mensagem );
			$obj->setIp( $_SERVER["REMOTE_ADDR"] );
			$obj->setDatahora( date("Y-m-d H:i:s") );
			$obj->setStatus( 0 );
			
			if($obj->inserirMuralRecado()){
				$rs["status"] = 1;
				$rs["aviso"] = utf8_encode("Obrigado por participar. Aguarde moderaчуo.");
			}else{
				$rs["status"] = 0;
				$rs["aviso"] = utf8_encode("Problema ao comentar. Por favor, tente novamente daqui alguns minutos!");
			}
		
			return $rs;
		}

	} 
?>