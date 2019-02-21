<?
	class EditoriaAttribute{
		public static function IdEditoria(){
			return "id_editoria";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdEditoriaPai(){
			return "id_editoria_pai";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Legenda(){
			return "legenda";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function ImagemPagina(){
			return "imagem_pagina";
		}
		public static function Blog(){
			return "blog";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_editoria";
		}
		public static function _Default(){
			return EditoriaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EditoriaAttribute::IdEditoria() : { return true; } break;
				case EditoriaAttribute::Identificador() : { return true; } break;
				case EditoriaAttribute::IdeOrigem() : { return true; } break;
				case EditoriaAttribute::IdEditoriaPai() : { return true; } break;
				case EditoriaAttribute::Nome() : { return true; } break;
				case EditoriaAttribute::Legenda() : { return true; } break;
				case EditoriaAttribute::Descricao() : { return true; } break;
				case EditoriaAttribute::Imagem() : { return true; } break;
				case EditoriaAttribute::ImagemPagina() : { return true; } break;
				case EditoriaAttribute::Blog() : { return true; } break;
				case EditoriaAttribute::Prioridade() : { return true; } break;
				case EditoriaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_editoria", "type"=>"bigint(20)", "text"=>"Cуdigo Editoria"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_editoria_pai", "type"=>"bigint(20)", "text"=>"Cуdigo Editoria Pai"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"legenda", "type"=>"varchar(255)", "text"=>"Legenda"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"imagem_pagina", "type"=>"varchar(255)", "text"=>"Imagem Pбgina"),
				array("value"=>"blog", "type"=>"int(11)", "text"=>"Blog"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_editoria","identificador","ide_origem","id_editoria_pai","nome","legenda","descricao","imagem","imagem_pagina","blog","prioridade","status");
		}
	}
?>