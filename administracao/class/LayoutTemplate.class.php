<?
	define('SMARTY_DIR', LayoutTemplateGlobals::SmartyPath());
	require_once(SMARTY_DIR . 'Smarty.class.php');
	
	class LayoutTemplate extends Smarty {
		
		protected $myTitle, $myHead;
		public $Site, $TemplateTopo, $TemplateConteudo, $OG, $Configuracao;
		
		public function __construct($CacheLifetime=0, Site $Site = null){
			parent::__construct();
			$this->setTemplateDir( LayoutTemplateGlobals::TemplatePath( "default" ) )
				 ->setCompileDir( LayoutTemplateGlobals::CompilePath()."default/" )
				 ->setCacheDir( LayoutTemplateGlobals::CachePath()."default/" )
				 ->setConfigDir( LayoutTemplateGlobals::ConfigPath() );
			if($CacheLifetime > 0){
				$this->cache_lifetime = ($CacheLifetime*60);
				$this->caching = 2;
			}else{
				$this->cache_lifetime = 0;
				$this->caching = false;
			}
			$this->Site = $Site;
		}
		public function __destruct(){}

		public function Load(){
			//VARIABLES ----------------------------------------------------------------------|
			$this->Site = (($this->Site==null) ? CurrentSite::Site() : $this->Site );
			$this->Configuracao = ConfiguracaoManagePartial::buscarConfiguracao(1, 1);
			if(empty($this->OG["title"])){
				$this->setOG($this->Configuracao["nome"], $this->Configuracao["rodape"], $this->Site->getUrl());
			}
			$this->assign("Url", Url::_Links());
			//$this->assign("Banner", BannerManage::Carregar());
			//$this->assign("Menu", AcessoRapidoManage2::Menu());
			//$this->assign("Conteudo1", ConteudoManage2::Conteudo('capa_frase'));
			//$this->assign("LABEL_LEGENDA", utf8_decode(strftime("%A, %d de %B de %Y")));
			
			if( UsuarioLogin::Autenticado() ){
			    $this->assign("painelMenu", PainelMenuManage2::Menu());
			    $this->assign("objUsuario", UsuarioLogin::getUsuario());
			    $this->assign("menuNotificacoes", NotificacaoManage2::Menu());
			    $this->assign("menuMensagens", MensagemManage2::Menu());
			}
			if( EmpreendimentoManage2::Empreendimento_Selecionado() ){
			    $this->assign("objEmpreendimento", EmpreendimentoManage2::Empreendimento_Ativo());
			}
			
			//VALEUS DEFAULT------------------------------------------------------------------|
			$this->assign("TITLE", $this->getTitle());
			$this->assign("OG", $this->getOG());
			$this->assign("SITE", $this->Site);
			$this->assign("SRC_CSS", $this->SrcCss());
			$this->assign("SRC_SCRIPT", $this->SrcScript());
			$this->assign("SRC_SCRIPT_TEMPLATE", $this->SrcScriptTemplate());
			$this->assign("SRC_IMAGE", $this->SrcImage());
			$this->assign("URL_PATH", Url::_Path());
			$this->assign("URL_HOST", Url::_Host());
			$this->assign("CONFIG", $this->Configuracao);
		}
		public function Load_Head(){
			$this->assign("HEAD", $this->getHead());
		}
		
		public function SrcCss( $File="" ){
			return Config::Src_Css().$File;
		}
		
		public function SrcScript( $File="" ){
			return Config::Src_Script().$File;
		}
		
		public function SrcScriptTemplate( $File="" ){
			return Config::Src_Script_Template().$File;
		}
		
		public function SrcImage( $File="" ){
			return Config::Src_Image().$File;
		}
		
		public function setTitle( $titlePage ){
			$this->myTitle = $titlePage; 
		} 
		public function getTitle(){ return $this->myTitle; } 

		public function setOG( $title, $description, $url, $image="", $type="website" ){ $this->OG = array("title"=>$title, "description"=>$description, "url"=>$url, "image"=>$image, "type"=>$type,); }
		public function getOG(){ return $this->OG; }
	}
?>