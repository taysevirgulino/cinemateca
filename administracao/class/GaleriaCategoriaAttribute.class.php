<?
	class GaleriaCategoriaAttribute{
		public static function IdGaleriaCategoria(){
			return "id_galeria_categoria";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdGaleriaCategoriaPai(){
			return "id_galeria_categoria_pai";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_galeria_categoria";
		}
		public static function _Default(){
			return GaleriaCategoriaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case GaleriaCategoriaAttribute::IdGaleriaCategoria() : { return true; } break;
				case GaleriaCategoriaAttribute::Identificador() : { return true; } break;
				case GaleriaCategoriaAttribute::IdeOrigem() : { return true; } break;
				case GaleriaCategoriaAttribute::IdGaleriaCategoriaPai() : { return true; } break;
				case GaleriaCategoriaAttribute::Nome() : { return true; } break;
				case GaleriaCategoriaAttribute::Descricao() : { return true; } break;
				case GaleriaCategoriaAttribute::Prioridade() : { return true; } break;
				case GaleriaCategoriaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_galeria_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Galeria Categoria"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_galeria_categoria_pai", "type"=>"bigint(20)", "text"=>"Cуdigo Galeria Categoria Pai"),
				array("value"=>"nome", "type"=>"varchar(200)", "text"=>"Nome"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_galeria_categoria","identificador","ide_origem","id_galeria_categoria_pai","nome","descricao","prioridade","status");
		}
	}
?>