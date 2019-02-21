<? 
	class CurriculoManage2 extends CurriculoManage {
	    
	    public static function Acessar(Curriculo $objCurriculo){
	        $obj = new CurriculoAcesso();
	        $obj->setIdCurriculoAcesso( null );
	        $obj->setIdentificador( null );
	        $obj->setIdCurriculo( $objCurriculo->getIdCurriculo() );
	        $obj->setIdUsuario( UsuarioLogin::IdUsuario() );
	        $obj->setDatahora( date("Y-m-d H:i:s") );
	        $obj->setIp( $_SERVER["REMOTE_ADDR"] );
	        
	        return $obj->inserir();
	    }
	    
	}
?>