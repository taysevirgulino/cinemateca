<? 
	class UsuarioManage2 extends UsuarioManage {

	   public static function Cadastrar($idUsuarioPerfil, $nome, $email, $login, $senha, $imagem=''){
	       
	       $obj = new Usuario();
	       if( $obj->buscarAttribute(UsuarioAttribute::Login(), $login) ){
	           return null;
	       }
	       
	       $obj->setIdUsuario( null );
	       $obj->setIdentificador( null );
	       $obj->setIdUsuarioPerfil( $idUsuarioPerfil );
	       $obj->setNome( $nome );
	       $obj->setEmail( $email );
	       $obj->setImagem( $imagem );
	       $obj->setLogin( $login );
	       $obj->setSenha( UsuarioCrypt::Encrypt($senha) );
	       $obj->setDatahoraCadastro( date("Y-m-d H:i:s") );
	       $obj->setDatahoraEdicao( date("Y-m-d H:i:s") );
	       $obj->setDatahoraLogin( date("Y-m-d H:i:s") );
	       $obj->setStatus( UsuarioStatus::Ativo() );
	       
	       if( $obj->inserir() ){
	           return $obj;
	       }
	       
	       return null;
	   }

	   public static function LojistaPessoa(LojistaPessoa $objLojistaPessoa, $login, $senha, $ativo=true){
	       
	       $objUsuario = new Usuario();
	       if( !$objUsuario->buscarAttribute(UsuarioAttribute::IdUsuario(), intval($objLojistaPessoa->getIdUsuario())) ){
	           if( !$ativo ){
	               return true;
	           }
	           $rs = self::Cadastrar(1, $objLojistaPessoa->getNome(), $objLojistaPessoa->getEmail(), $login, $senha);
	           if( $rs != null ){
	               $objLojistaPessoa->setIdUsuario( $rs->getIdUsuario() );
	               return $objLojistaPessoa->alterarAtributo(LojistaPessoaAttribute::IdUsuario());
	           }
	       }else{
	           if( strlen($login) > 0 ){
	               $objUsuario->setLogin( $login );
	           }
	           if( strlen($senha) > 0 ){
	               $objUsuario->setSenha( UsuarioCrypt::Encrypt($senha) );
	           }
	           $objUsuario->setStatus( ($ativo) ? UsuarioStatus::Ativo() : UsuarioStatus::Inativo() );
	           $objUsuario->setDatahoraEdicao( date("Y-m-d H:i:s") );
	           
	           return $objUsuario->alterar();
	       }
	       
	       return false;
	   }
	   public static function Lojista(Lojista $objLojista, $login, $senha, $ativo=true){
	       
	       $objUsuario = new Usuario();
	       if( !$objUsuario->buscarAttribute(UsuarioAttribute::IdUsuario(), intval($objLojista->getIdUsuario())) ){
	           if( !$ativo ){
	               return true;
	           }
	           $rs = self::Cadastrar(1, $objLojista->getNome(), $objLojista->getEmail(), $login, $senha);
	           if( $rs != null ){
	               $objLojista->setIdUsuario( $rs->getIdUsuario() );
	               return $objLojista->alterarAtributo(LojistaAttribute::IdUsuarioResponsavel());
	           }
	       }else{
	           if( strlen($login) > 0 ){
	               $objUsuario->setLogin( $login );
	           }
	           if( strlen($senha) > 0 ){
	               $objUsuario->setSenha( UsuarioCrypt::Encrypt($senha) );
	           }
	           $objUsuario->setStatus( ($ativo) ? UsuarioStatus::Ativo() : UsuarioStatus::Inativo() );
	           $objUsuario->setDatahoraEdicao( date("Y-m-d H:i:s") );
	           
	           return $objUsuario->alterar();
	       }
	       
	       return false;
	   }


	   
	}
?>