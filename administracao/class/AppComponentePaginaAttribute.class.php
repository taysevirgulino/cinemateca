<?
	class AppComponentePaginaAttribute{
		public static function IdAppComponentePagina($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_componente_pagina" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(50)");
		}
		public static function Url($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "url" : "varchar(100)");
		}
		public static function Descricao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "descricao" : "varchar(100)");
		}
		public static function _Table(){
			return "tb_app_componente_pagina";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppComponentePaginaAttribute::Url($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppComponentePaginaAttribute::IdAppComponentePagina() : { return true; } break;
				case AppComponentePaginaAttribute::Identificador() : { return true; } break;
				case AppComponentePaginaAttribute::Url() : { return true; } break;
				case AppComponentePaginaAttribute::Descricao() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_componente_pagina";
			$Attributes[0]["text"] = "Codigo App Componente Pagina";
			$Attributes[2]["value"] = "url";
			$Attributes[2]["text"] = "Url";
			$Attributes[3]["value"] = "descricao";
			$Attributes[3]["text"] = "Descricao";
			return $Attributes;
		}
	}
?>