<?
	class LayoutTemplateGlobals {
		protected static function IsLinux(){
			return Config::LayoutTemplateGlobals_IsLinux();
		}
		public static function SmartyPath(){
			return Config::LayoutTemplateGlobals_SmartyPath();
		}
		public static function TemplatePath( $Template ){
			return Config::LayoutTemplateGlobals_TemplatePath($Template);
		}
		public static function CompilePath(){
			return Config::LayoutTemplateGlobals_CompilePath();
		}
		public static function ConfigPath(){
			return Config::LayoutTemplateGlobals_ConfigPath();
		}
		public static function CachePath(){
			return Config::LayoutTemplateGlobals_CachePath();
		}
		public static function EmailTemplatePath( $Template ){
			return Config::LayoutTemplateGlobals_EmailTemplatePath( $Template );
		}
	}
?>