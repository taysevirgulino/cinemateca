<?
	class ConfiguracaoAttribute{
		public static function IdConfiguracao(){
			return "id_configuracao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Numero(){
			return "numero";
		}
		public static function Cargo(){
			return "cargo";
		}
		public static function Estado(){
			return "estado";
		}
		public static function Slogan(){
			return "slogan";
		}
		public static function Partido(){
			return "partido";
		}
		public static function Coligacao(){
			return "coligacao";
		}
		public static function Cnpj(){
			return "cnpj";
		}
		public static function Email(){
			return "email";
		}
		public static function Telefone(){
			return "telefone";
		}
		public static function EnderecoCompleto(){
			return "endereco_completo";
		}
		public static function Rodape(){
			return "rodape";
		}
		public static function TwitterStatus(){
			return "twitter_status";
		}
		public static function TwitterUsername(){
			return "twitter_username";
		}
		public static function TwitterPassword(){
			return "twitter_password";
		}
		public static function TwitterRssUrl(){
			return "twitter_rss_url";
		}
		public static function LinkTwitter(){
			return "link_twitter";
		}
		public static function LinkOrkut(){
			return "link_orkut";
		}
		public static function LinkYoutube(){
			return "link_youtube";
		}
		public static function LinkFacebook(){
			return "link_facebook";
		}
		public static function LinkFlickr(){
			return "link_flickr";
		}
		public static function AnalyticsKey(){
			return "analytics_key";
		}
		public static function TemplateTopo(){
			return "template_topo";
		}
		public static function TemplateConteudo(){
			return "template_conteudo";
		}
		public static function _Table(){
			return "tb_configuracao";
		}
		public static function _Default(){
			return ConfiguracaoAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ConfiguracaoAttribute::IdConfiguracao() : { return true; } break;
				case ConfiguracaoAttribute::Identificador() : { return true; } break;
				case ConfiguracaoAttribute::Nome() : { return true; } break;
				case ConfiguracaoAttribute::Numero() : { return true; } break;
				case ConfiguracaoAttribute::Cargo() : { return true; } break;
				case ConfiguracaoAttribute::Estado() : { return true; } break;
				case ConfiguracaoAttribute::Slogan() : { return true; } break;
				case ConfiguracaoAttribute::Partido() : { return true; } break;
				case ConfiguracaoAttribute::Coligacao() : { return true; } break;
				case ConfiguracaoAttribute::Cnpj() : { return true; } break;
				case ConfiguracaoAttribute::Email() : { return true; } break;
				case ConfiguracaoAttribute::Telefone() : { return true; } break;
				case ConfiguracaoAttribute::EnderecoCompleto() : { return true; } break;
				case ConfiguracaoAttribute::Rodape() : { return true; } break;
				case ConfiguracaoAttribute::TwitterStatus() : { return true; } break;
				case ConfiguracaoAttribute::TwitterUsername() : { return true; } break;
				case ConfiguracaoAttribute::TwitterPassword() : { return true; } break;
				case ConfiguracaoAttribute::TwitterRssUrl() : { return true; } break;
				case ConfiguracaoAttribute::LinkTwitter() : { return true; } break;
				case ConfiguracaoAttribute::LinkOrkut() : { return true; } break;
				case ConfiguracaoAttribute::LinkYoutube() : { return true; } break;
				case ConfiguracaoAttribute::LinkFacebook() : { return true; } break;
				case ConfiguracaoAttribute::LinkFlickr() : { return true; } break;
				case ConfiguracaoAttribute::AnalyticsKey() : { return true; } break;
				case ConfiguracaoAttribute::TemplateTopo() : { return true; } break;
				case ConfiguracaoAttribute::TemplateConteudo() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_configuracao", "type"=>"bigint(20)", "text"=>"Código Configuração"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"numero", "type"=>"varchar(10)", "text"=>"Número"),
				array("value"=>"cargo", "type"=>"varchar(100)", "text"=>"Cargo"),
				array("value"=>"estado", "type"=>"varchar(100)", "text"=>"Estado"),
				array("value"=>"slogan", "type"=>"varchar(255)", "text"=>"Slogan"),
				array("value"=>"partido", "type"=>"varchar(20)", "text"=>"Partido"),
				array("value"=>"coligacao", "type"=>"varchar(255)", "text"=>"Coligação"),
				array("value"=>"cnpj", "type"=>"varchar(20)", "text"=>"Cnpj"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"telefone", "type"=>"varchar(100)", "text"=>"Telefone"),
				array("value"=>"endereco_completo", "type"=>"varchar(255)", "text"=>"Endereço Completo"),
				array("value"=>"rodape", "type"=>"text", "text"=>"Rodape"),
				array("value"=>"twitter_status", "type"=>"int(11)", "text"=>"Twitter Status"),
				array("value"=>"twitter_username", "type"=>"varchar(100)", "text"=>"Twitter Username"),
				array("value"=>"twitter_password", "type"=>"varchar(100)", "text"=>"Twitter Password"),
				array("value"=>"twitter_rss_url", "type"=>"varchar(255)", "text"=>"Twitter Rss Url (Endereço)"),
				array("value"=>"link_twitter", "type"=>"varchar(255)", "text"=>"Link Twitter"),
				array("value"=>"link_orkut", "type"=>"varchar(255)", "text"=>"Link Orkut"),
				array("value"=>"link_youtube", "type"=>"varchar(255)", "text"=>"Link Youtube"),
				array("value"=>"link_facebook", "type"=>"varchar(255)", "text"=>"Link Facebook"),
				array("value"=>"link_flickr", "type"=>"varchar(255)", "text"=>"Link Flickr"),
				array("value"=>"analytics_key", "type"=>"varchar(20)", "text"=>"Analytics Key"),
				array("value"=>"template_topo", "type"=>"varchar(20)", "text"=>"Template Topo"),
				array("value"=>"template_conteudo", "type"=>"varchar(20)", "text"=>"Template Conteúdo"),
			);
		}
		public static function _GetKeys(){
			return array("id_configuracao","identificador","nome","numero","cargo","estado","slogan","partido","coligacao","cnpj","email","telefone","endereco_completo","rodape","twitter_status","twitter_username","twitter_password","twitter_rss_url","link_twitter","link_orkut","link_youtube","link_facebook","link_flickr","analytics_key","template_topo","template_conteudo");
		}
	}
?>