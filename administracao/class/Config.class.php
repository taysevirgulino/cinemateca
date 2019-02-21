<?
class Config {

	public function __construct(){}
	public function __destruct(){}

	public static function DB_Host(){
			return "localhost";
		}
		public static function DB_Database(){
			return "cinemateca";
		}
		public static function DB_User(){
			return "root";
		}
		public static function DB_Password(){
			return "mysql";
		}

	/*CONFIGURA��ES FACTORY *************************************************/
	/**
	 * @return AdapterServiceInterface
	 */
	public static function getAdapterService($entityName=null)
	{
		AdapterServiceFactory::registerAdapterService('AdapterServiceMongo', function (){
			return new AdapterServiceMongo(
				"mongodb://localhost",
				array(),
				'cinemateca'
			);
		});
		AdapterServiceFactory::registerAdapterService('AdapterServicePDO', function (){
            return new AdapterServicePDO(
                sprintf('mysql:host=%s;dbname=%s', self::DB_Host(), self::DB_Database()),
                self::DB_User(),
                self::DB_Password(),
                array()
            );
		});

		if( null != $entityName){
			switch ($entityName) {
				case (preg_match('/^((App|Emkt))/', $entityName) ? true : false): {
					return AdapterServiceFactory::singleton('AdapterServiceMysql');
				}
				case (preg_match('/^((PainelMenu|Arquivo|Cronograma|Curriculo|Documento|Empreendimento|Foto|Loja|Lojista|Mensagem|Segmento|Usuario|Notificacao))/', $entityName) ? true : false): {
					return AdapterServiceFactory::singleton('AdapterServicePDO');
				}
			}
		}
		return AdapterServiceFactory::singleton('AdapterServiceMongo');
	}
	/**
	 * @param string $entityName
	 * @return AdapterSearchMounterInterface
	 */
	public static function getAdapterSearchMounter($entityName=null)
	{
		if( null != $entityName){
			switch ($entityName) {
				case (preg_match('/^((App|Emkt))/', $entityName) ? true : false): {
					return AdapterSearchMounterFactory::singleton('AdapterSearchMounterSQL');
				}
				case (preg_match('/^((PainelMenu|Arquivo|Cronograma|Curriculo|Documento|Empreendimento|Foto|Loja|Lojista|Mensagem|Segmento|Usuario|Notificacao))/', $entityName) ? true : false): {
					return AdapterSearchMounterFactory::singleton('AdapterSearchMounterPDO');
				}
			}
		}
		return AdapterSearchMounterFactory::singleton('AdapterSearchMounterMongo');
	}
/*CONFIGURA��ES TEMPLATE ************************************************/
	public static function LayoutTemplateGlobals_IsLinux(){
		//return true;
		return false;
	}
	public static function LayoutTemplateGlobals_SmartyPath(){
		if(Config::LayoutTemplateGlobals_IsLinux()){
			return "/home/tosenac/public_html/template/_smarty/libs/";
		}else{
			return "C:\www\Cinemateca/template/_smarty/libs/";
		}
	}
	public static function LayoutTemplateGlobals_TemplatePath( $Template ){
		if(Config::LayoutTemplateGlobals_IsLinux()){
			return "/home/tosenac/public_html/template/$Template/html/";
		}else{
			return "C:\www\Cinemateca/template/$Template/html/";
		}
	}
	public static function LayoutTemplateGlobals_CompilePath(){
		if(Config::LayoutTemplateGlobals_IsLinux()){
			return "/home/tosenac/public_html/template/_smarty/compile/";
		}else{
			return "C:\www\Cinemateca/template/_smarty/compile/";
		}
	}
	public static function LayoutTemplateGlobals_ConfigPath(){
		if(Config::LayoutTemplateGlobals_IsLinux()){
			return "/home/tosenac/public_html/template/_smarty/config/";
		}else{
			return "C:\www\Cinemateca/template/_smarty/config/";
		}
	}
	public static function LayoutTemplateGlobals_CachePath(){
		if(Config::LayoutTemplateGlobals_IsLinux()){
			return "/home/tosenac/public_html/template/_smarty/cache/";
		}else{
			return "C:\www\Cinemateca/template/_smarty/cache/";
		}
	}
	public static function LayoutTemplateGlobals_EmailTemplatePath( $Template ){
		if(Config::LayoutTemplateGlobals_IsLinux()){
			return "/home/tosenac/public_html/template/$Template/html/email/";
		}else{
			return "C:\www\Cinemateca/template/$Template/html/email/";
		}
	}

	public static function Src_Css(){
		return Config::Url_Path()."template/".CurrentSite::Site()->getTemplate()."/style/";
	}
	public static function Src_Script(){
		return Config::Url_Path()."script/";
	}
	public static function Src_Script_Template(){
		return Config::Url_Path()."template/".CurrentSite::Site()->getTemplate()."/script/";
	}
	public static function Src_Image(){
		return Config::Url_Path()."template/".CurrentSite::Site()->getTemplate()."/images/";
	}
	public static function Src_Image_Noticia(){
		return Config::Url_Path()."template/".CurrentSite::Site()->getTemplate()."/images/";
	}

	/*CONFIGURA��ES HOST ****************************************************/
	public static function Server_Host(){
		//return "sal.brmalls.net";
		return $_SERVER["HTTP_HOST"];
	}
	public static function Server_Username(){
		return "cinemateca";
	}

	/*CONFIGURA��ES URL *****************************************************/
	public static function Url_Host(){
		return "http://".Config::Server_Host();
	}
	public static function Url_Host_Https(){
		return "http://".Config::Server_Host();
		//return "https://".Config::Server_Host();
	}
	public static function Url_Path(){
		//return "/";
		return "/Cinemateca/";
	}
	public static function Url_FCK_Files(){
		return Config::Url_Host().Config::Url_Path()."administracao/files/";
	}
	public static function Url_Twitter_RSS(){
		return ConfiguracaoManagePartial::ConfiguracaoCurrent()->getTwitterRssUrl();
	}

	/*CONFIGURA��ES GOOGLE ANALYTICS ****************************************/
	public static function Analytics_WebPropertyID(){
		return ConfiguracaoManagePartial::ConfiguracaoCurrent()->getAnalyticsKey();
	}

	/*CONFIGURA��ES E-MAIL **************************************************/
	public static function Mail_SMTPAuth(){
		return true;
	}
	public static function Mail_Host(){
		return "smtp.emailsrvr.com";
	}
	public static function Mail_Username(){
	    return "sender@artemsite.net";
	}
	public static function Mail_Password(){
		return "FetT6Dw8ud73";
	}
	public static function Mail_Port(){
		return "587";
	}
	public static function Mail_Sender(){
		return "sender@artemsite.net";
	}
	public static function Mail_From(){
		return "sender@artemsite.net";
	}
	public static function Mail_AddressBCC(){
		return "frederycomiguel@gmail.com";
	}
	public static function Mail_AddressSAC(){
		return "sac@artemsite.com.br";
	}
}
?>
