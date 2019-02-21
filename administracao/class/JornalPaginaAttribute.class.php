<?
	class JornalPaginaAttribute{
		public static function IdJornalPagina(){
			return "id_jornal_pagina";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdJornalEdicao(){
			return "id_jornal_edicao";
		}
		public static function IdJornalEstrutura(){
			return "id_jornal_estrutura";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function _Table(){
			return "tb_jornal_pagina";
		}
		public static function _Default(){
			return JornalPaginaAttribute::Imagem();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case JornalPaginaAttribute::IdJornalPagina() : { return true; } break;
				case JornalPaginaAttribute::Identificador() : { return true; } break;
				case JornalPaginaAttribute::IdJornalEdicao() : { return true; } break;
				case JornalPaginaAttribute::IdJornalEstrutura() : { return true; } break;
				case JornalPaginaAttribute::Imagem() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_jornal_pagina", "type"=>"bigint(20)", "text"=>"Cуdigo Jornal Pбgina"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_jornal_edicao", "type"=>"bigint(20)", "text"=>"Cуdigo Jornal Ediзгo"),
				array("value"=>"id_jornal_estrutura", "type"=>"bigint(20)", "text"=>"Cуdigo Jornal Estrutura"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
			);
		}
		public static function _GetKeys(){
			return array("id_jornal_pagina","identificador","id_jornal_edicao","id_jornal_estrutura","imagem");
		}
	}
?>