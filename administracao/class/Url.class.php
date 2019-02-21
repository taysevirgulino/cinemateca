<?
	class Url{
		public static function IsUrlRewrite(){
			return true;
		}		
		
		public static function _Path(){
			return Config::Url_Path();
		}
		
		public static function _Host(){
			return Config::Url_Host();
		}
		
		public static function _RewriteString( $str ){
			$str = trim($str);
			$str = strtolower($str);
			$str = strip_tags($str);
			$str = preg_replace("{ }", "-", $str);
			$str = preg_replace("{[[:space:]]}", "-", $str);
			$str = preg_replace("{[çÇ]}", "c", $str);
			$str = preg_replace("{[áÁäÄàÀãÃâÂ]}", "a", $str);
			$str = preg_replace("{[éÉëËèÈêÊ]}", "e", $str);
			$str = preg_replace("{[íÍïÏìÌîÎ]}", "i", $str);
			$str = preg_replace("{[óÓöÖòÒõÕôÔ]}", "o", $str);
			$str = preg_replace("{[úÚüÜùÙûÛ]}", "u", $str);
			
			$str = preg_replace("{[^a-z0-9]}", "-", $str);
			$str = preg_replace("{(-)+}", "-", $str);
			
			if(preg_match("/(-)+$/", $str)){
				$str = substr($str, 0, (strlen($str)-1));
			}
			$str = substr($str, 0, 100);
			
			return $str;
		}
		
		public static function _Links(){
			return array(
				"Principal" => Url::Principal(),
				"Entrar" => Url::Entrar(),
				"Entrar_Empreendimento" => Url::Entrar_Empreendimento(),
				"Painel" => Url::Painel(),
				"Sair" => Url::Sair(),
				"Senha" => Url::Senha(),
				"Usuario_Editar" => Url::Usuario_Editar(),
				"Notificacoes" => Url::Notificacoes(),
			);
		}
		
		public static function Principal(){
			if(Url::IsUrlRewrite()){
				return Url::_Path();
			}else{
				return Url::_Path();
			}
		}
		
		public static function Pagina($IdPagina, $Identificador, $Slug){
			if(Url::IsUrlRewrite()){
				return Url::_Path()."pagina-".$Slug;
			}else{
				return Url::_Path()."pagina.php?l=$Identificador";
			}
		}
		
		public static function Senha() {
			if (Url::IsUrlRewrite()) {
				return Url::_Path() . "associar-senha";
			} else {
				return Url::_Path() . "associar_senha.php";
			}
		}
		
		public static function Sair() {
			if (Url::IsUrlRewrite()) {
				return Url::_Path() . "sair";
			} else {
				return Url::_Path() . "sair.php";
			}
		}
		
		public static function Entrar($url='') {
			if (Url::IsUrlRewrite()) {
				return Url::_Path() . "entrar".((empty($url)) ? '' : '?url='.base64_encode($url) );
			} else {
				return Url::_Path() . "entrar.php".((empty($url)) ? '' : '?url='.base64_encode($url) );
			}
		}
		
		public static function Entrar_Empreendimento($url='') {
		    if (Url::IsUrlRewrite()) {
		        return Url::_Path() . "entrar-empreendimento".((empty($url)) ? '' : '?url='.base64_encode($url) );
		    } else {
		        return Url::_Path() . "entrar_empreendimento.php".((empty($url)) ? '' : '?url='.base64_encode($url) );
		    }
		}
		
		public static function Painel() {
		    return self::Principal();
		}
		
		public static function Usuario_Editar() {
			if (Url::IsUrlRewrite()) {
				return Url::_Path() . "usuario-editar";
			} else {
				return Url::_Path() . "usuario_editar.php";
			}
		}
		
		public static function Notificacoes() {
			if (Url::IsUrlRewrite()) {
				return Url::_Path() . "notificacoes";
			} else {
				return Url::_Path() . "notificacoes.php";
			}
		}
		
		public static function Lojista_Selecionar($url) {
			if (Url::IsUrlRewrite()) {
				return Url::_Path() . "lojista-selecionar?page=".$url;
			} else {
				return Url::_Path() . "lojista_selecionar.php?page=".$url;
			}
		}
		
		public static function Arquivo($Identificador){
		    if(Url::IsUrlRewrite()){
		        return Url::_Path()."arquivo-view-".$Identificador;
		    }else{
		        return Url::_Path()."arquivo_view.php?ide=$Identificador";
		    }
		}
		
		public static function Mensagem($Identificador){
		    if(Url::IsUrlRewrite()){
		        return Url::_Path()."mensagem-view-".$Identificador;
		    }else{
		        return Url::_Path()."mensagem_view.php?ide=$Identificador";
		    }
		}
		
		public static function Documentos() {
		    if (Url::IsUrlRewrite()) {
		        return Url::_Path() . "documento-list";
		    } else {
		        return Url::_Path() . "documento_list.php";
		    }
		}
		
		public static function Fotos($Identificador="") {
		    if( !Validacao::isHash($Identificador) ){
		        return Url::_Path() . "lojista-selecionar?page=foto-list";
		    }
		    if(Url::IsUrlRewrite()){
		        return Url::_Path()."foto-list-".$Identificador;
		    }else{
		        return Url::_Path()."foto_list.php?ide=$Identificador";
		    }
		}
		
	}
?>