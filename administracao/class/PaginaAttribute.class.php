<?
	class PaginaAttribute{
		public static function IdPagina(){
			return "id_pagina";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdPaginaPai(){
			return "id_pagina_pai";
		}
		public static function Slug(){
			return "slug";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Resumo(){
			return "resumo";
		}
		public static function Texto(){
			return "texto";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function FilhosExibir(){
			return "filhos_exibir";
		}
		public static function FilhosTitulo(){
			return "filhos_titulo";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_pagina";
		}
		public static function _Default(){
			return PaginaAttribute::Slug();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case PaginaAttribute::IdPagina() : { return true; } break;
				case PaginaAttribute::Identificador() : { return true; } break;
				case PaginaAttribute::IdeOrigem() : { return true; } break;
				case PaginaAttribute::IdPaginaPai() : { return true; } break;
				case PaginaAttribute::Slug() : { return true; } break;
				case PaginaAttribute::Titulo() : { return true; } break;
				case PaginaAttribute::Resumo() : { return true; } break;
				case PaginaAttribute::Texto() : { return true; } break;
				case PaginaAttribute::Imagem() : { return true; } break;
				case PaginaAttribute::FilhosExibir() : { return true; } break;
				case PaginaAttribute::FilhosTitulo() : { return true; } break;
				case PaginaAttribute::Datahora() : { return true; } break;
				case PaginaAttribute::Prioridade() : { return true; } break;
				case PaginaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_pagina", "type"=>"bigint(20)", "text"=>"Código Página"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_pagina_pai", "type"=>"bigint(20)", "text"=>"Código Página Pai"),
				array("value"=>"slug", "type"=>"varchar(255)", "text"=>"Slug"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"resumo", "type"=>"varchar(255)", "text"=>"Resumo"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"filhos_exibir", "type"=>"int(11)", "text"=>"Filhos Exibir"),
				array("value"=>"filhos_titulo", "type"=>"varchar(255)", "text"=>"Filhos Título"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_pagina","identificador","ide_origem","id_pagina_pai","slug","titulo","resumo","texto","imagem","filhos_exibir","filhos_titulo","datahora","prioridade","status");
		}
	}
?>