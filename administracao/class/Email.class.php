<?
	class Email extends PHPMailer {

		public $PathTemplates = "";
		/**
		 * @var Site
		 */
		public $Site;

		public function __construct( $Site ){
			$this->Site = $Site;
			$this->PathTemplates = LayoutTemplateGlobals::EmailTemplatePath( $Site->getTemplate() );
			$this->From = $this->Sender = $Site->getEmail();
			$this->FromName = $Site->getEmailNome();

			$this->IsHTML(true);

			if(Config::Mail_SMTPAuth()){
				$this->IsSMTP();
				$this->SMTPDebug = 1;
				$this->Port = Config::Mail_Port();
				$this->Host = $this->Hostname = Config::Mail_Host();
				$this->SMTPAuth = Config::Mail_SMTPAuth();
				$this->Username = Config::Mail_Username();
				$this->Password = Config::Mail_Password();
				$this->Sender = Config::Mail_Sender();
				$this->From = Config::Mail_From();
			}else{
				$this->IsMail();
				$this->Host = $this->Hostname = $Site->getHost();
			}
		}
		public function __destruct(){}

		/*public function Send(){
			return true;

			return self::Send();
		}*/


		public function Usuario_Senha(Usuario $objUsuario, $templateConteudo="email_lembrar_senha"){

			$objConteudo = ConteudoManage2::Conteudo( $templateConteudo );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objUsuario->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $objUsuario->getLogin() , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i", UsuarioCrypt::Decrypt( $objUsuario->getSenha() ) , $Conteudo);

			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = $objConteudo->getLegenda();

			$this->AddReplyTo($this->Site->getEmail());

			$this->AddAddress($objUsuario->getEmail(), $objUsuario->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}
		public function Usuario(Lojista $objLojista, $frm_login, $frm_senha, $objUsuario, $templateConteudo="email_acesso"){



			$objConteudo = ConteudoManage2::Conteudo( $templateConteudo );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objLojista->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $frm_login , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i",  $frm_senha , $Conteudo);

			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = $objConteudo->getLegenda();

			$this->AddReplyTo($this->Site->getEmail());

            $this->AddReplyTo($objUsuario->getEmail());
          

			$this->AddAddress($objLojista->getEmail(), $objLojista->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}

		public function Arquivo_Novo(Usuario $objUsuario, Arquivo $objArquivo){

			$objConteudo = ConteudoManage2::Conteudo( "email_arquivo_novo" );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objUsuario->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $objUsuario->getLogin() , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i", UsuarioCrypt::Decrypt( $objUsuario->getSenha() ) , $Conteudo);
			$Conteudo = preg_replace("/#TITULO#/i", $objArquivo->getTitulo(), $Conteudo);
			$Conteudo = preg_replace("/#LINK#/i", Url::_Host().Url::Arquivo($objArquivo->getIdentificador()), $Conteudo);


			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = preg_replace("/#TITULO#/i", $objArquivo->getTitulo(), $objConteudo->getLegenda());

			$this->AddReplyTo($this->Site->getEmail());

			$this->AddAddress($objUsuario->getEmail(), $objUsuario->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}

		public function Arquivo_Interacao(Usuario $objUsuario, Arquivo $objArquivo){

			$objConteudo = ConteudoManage2::Conteudo( "email_arquivo_interacao" );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objUsuario->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $objUsuario->getLogin() , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i", UsuarioCrypt::Decrypt( $objUsuario->getSenha() ) , $Conteudo);
			$Conteudo = preg_replace("/#TITULO#/i", $objArquivo->getTitulo(), $Conteudo);
			$Conteudo = preg_replace("/#LINK#/i", Url::_Host().Url::Arquivo($objArquivo->getIdentificador()), $Conteudo);

			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = preg_replace("/#TITULO#/i", $objArquivo->getTitulo(), $objConteudo->getLegenda());

			$this->AddReplyTo($this->Site->getEmail());

			$this->AddAddress($objUsuario->getEmail(), $objUsuario->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}

		public function Mensagem_Nova(Usuario $objUsuario, Mensagem $objMensagem){

			$objConteudo = ConteudoManage2::Conteudo( "email_mensagem_nova" );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objUsuario->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $objUsuario->getLogin() , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i", UsuarioCrypt::Decrypt( $objUsuario->getSenha() ) , $Conteudo);

			$Conteudo = preg_replace("/#TITULO#/i", $objMensagem->getTitulo(), $Conteudo);
			$Conteudo = preg_replace("/#LINK#/i", Url::_Host().Url::Mensagem($objMensagem->getIdentificador()), $Conteudo);

			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = preg_replace("/#TITULO#/i", $objMensagem->getTitulo(), $objConteudo->getLegenda());

			$this->AddReplyTo($this->Site->getEmail());

			$this->AddAddress($objUsuario->getEmail(), $objUsuario->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}

		public function Mensagem_Resposta(Usuario $objUsuario, Mensagem $objMensagem){

			$objConteudo = ConteudoManage2::Conteudo( "email_mensagem_resposta" );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objUsuario->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $objUsuario->getLogin() , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i", UsuarioCrypt::Decrypt( $objUsuario->getSenha() ) , $Conteudo);

			$Conteudo = preg_replace("/#TITULO#/i", $objMensagem->getTitulo(), $Conteudo);
			$Conteudo = preg_replace("/#LINK#/i", Url::_Host().Url::Mensagem($objMensagem->getIdentificador()), $Conteudo);

			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = preg_replace("/#TITULO#/i", $objMensagem->getTitulo(), $objConteudo->getLegenda());

			$this->AddReplyTo($this->Site->getEmail());

			$this->AddAddress($objUsuario->getEmail(), $objUsuario->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}

		public function Documento_Novos(Usuario $objUsuario, $quantidadeNovos){

			$objConteudo = ConteudoManage2::Conteudo( "email_documentos_novos" );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objUsuario->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $objUsuario->getLogin() , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i", UsuarioCrypt::Decrypt( $objUsuario->getSenha() ) , $Conteudo);

			$Conteudo = preg_replace("/#QUANTIDADE#/i", $quantidadeNovos, $Conteudo);
			$Conteudo = preg_replace("/#LINK#/i", Url::_Host().Url::Documentos(), $Conteudo);

			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = $objConteudo->getLegenda();

			$this->AddReplyTo($this->Site->getEmail());

			$this->AddAddress($objUsuario->getEmail(), $objUsuario->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}

		public function Foto_Novas(Usuario $objUsuario, Lojista $objLojista, $quantidadeNovos){

			$objConteudo = ConteudoManage2::Conteudo( "email_fotografia_novas" );

			$Conteudo = System::_TextByHtml($objConteudo->getTexto());
			$Conteudo = preg_replace("/#NOME#/i", $objUsuario->getNome() , $Conteudo);
			$Conteudo = preg_replace("/#LOGIN#/i", $objUsuario->getLogin() , $Conteudo);
			$Conteudo = preg_replace("/#SENHA#/i", UsuarioCrypt::Decrypt( $objUsuario->getSenha() ) , $Conteudo);

			$Conteudo = preg_replace("/#LOJA_NOME#/i", $objLojista->getNome(), $Conteudo);
			$Conteudo = preg_replace("/#QUANTIDADE#/i", $quantidadeNovos, $Conteudo);
			$Conteudo = preg_replace("/#LINK#/i", Url::_Host().Url::Fotos($objLojista->getIdentificador()), $Conteudo);

			$Body = $this->lerHtml( $this->PathTemplates."template.tpl.php" );
			$Body = preg_replace("/#CONTEUDO#/i", $Conteudo, $Body);
			$this->Body = $Body;

			$this->Subject = preg_replace("/#LOJA_NOME#/i", $objLojista->getNome(), $objConteudo->getLegenda());

			$this->AddReplyTo($this->Site->getEmail());

			$this->AddAddress($objUsuario->getEmail(), $ob->getNome());

			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			return $this->Send();
		}



		public function FaleConosco($objFaleConosco){
			$Assunto = new FaleConoscoAssunto();
			$Assunto->buscarFaleConoscoAssunto(1, $objFaleConosco->getIdFaleConoscoAssunto());

			$Body = $this->lerHtml( $this->PathTemplates."faleconosco.tpl.php" );
			$Body = eregi_replace("#DATA#", date("d/m/Y H:i:s"), $Body);
			$Body = eregi_replace("#AREA#", $Assunto->getAssunto(), $Body);
			$Body = eregi_replace("#NOME#", $objFaleConosco->getNome(), $Body);
			$Body = eregi_replace("#EMAIL#", $objFaleConosco->getEmail(), $Body);
			$Body = eregi_replace("#TELEFONE#", $objFaleConosco->getTelefone(), $Body);
			$Body = eregi_replace("#ASSUNTO#", $objFaleConosco->getCidade()."/".$objFaleConosco->getEstado(), $Body);
			$Body = eregi_replace("#MENSAGEM#", nl2br($objFaleConosco->getMensagem()), $Body);
			$this->Body = $Body;

			$this->Subject = "FALE CONOSCO [".$objFaleConosco->getNome().",".$objFaleConosco->getEmail()."]";
			$this->AddAddress($this->From, $this->FromName);
			$this->AddReplyTo($objFaleConosco->getEmail(), $objFaleConosco->getNome());
			$AddressBCC = Config::Mail_AddressBCC();
			if(!empty($AddressBCC)){
				$this->AddBCC($AddressBCC);
			}

			$emails = $Assunto->getEmails();
			if(!empty($emails)){
				$emails = explode(";", $emails);
				foreach ($emails as $value) {
					$value = trim($value);
					if(Validacao::isEmail($value)){
						$this->AddBCC($value);
					}
				}
			}

			return $this->Send();
		}

		public function FaleSuporte($nome, $email, $url, $assunto, $mensagem){

			$Body = $this->lerHtml( $this->PathTemplates."falesuporte.tpl.php" );
			$Body = eregi_replace("#DATA#", date("d/m/Y H:i:s"), $Body);
			$Body = eregi_replace("#NOME#", $nome, $Body);
			$Body = eregi_replace("#EMAIL#", $email, $Body);
			$Body = eregi_replace("#URL#", $url, $Body);
			$Body = eregi_replace("#ASSUNTO#", $assunto, $Body);
			$Body = eregi_replace("#MENSAGEM#", nl2br($mensagem), $Body);
			$this->Body = $Body;

			$this->Subject = "Ticket Suporte Técnico ".date("d/m/Y H:i:s");
			$this->AddAddress( Config::Mail_AddressSAC() );
			$this->From = $email;
			$this->FromName = $nome;

			return $this->Send();
		}


		protected function lerHtml( $arquivo ){
			$fp = fopen ($arquivo, "r");
            $fcontent = "";
            while (!feof ($fp))
            {
                $fcontent .= fgets ($fp, 1024);
            }
            fclose($fp);
            return $fcontent;
		}

	}
?>