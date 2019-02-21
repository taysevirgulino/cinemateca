<?
	class GaleriaAlbumAttribute{
		public static function IdGaleriaAlbum(){
			return "id_galeria_album";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdGaleriaCategoria(){
			return "id_galeria_categoria";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_galeria_album";
		}
		public static function _Default(){
			return GaleriaAlbumAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case GaleriaAlbumAttribute::IdGaleriaAlbum() : { return true; } break;
				case GaleriaAlbumAttribute::Identificador() : { return true; } break;
				case GaleriaAlbumAttribute::IdeOrigem() : { return true; } break;
				case GaleriaAlbumAttribute::IdGaleriaCategoria() : { return true; } break;
				case GaleriaAlbumAttribute::Nome() : { return true; } break;
				case GaleriaAlbumAttribute::Descricao() : { return true; } break;
				case GaleriaAlbumAttribute::Datahora() : { return true; } break;
				case GaleriaAlbumAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_galeria_album", "type"=>"bigint(20)", "text"=>"Cуdigo Galeria Бlbum"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_galeria_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Galeria Categoria"),
				array("value"=>"nome", "type"=>"varchar(200)", "text"=>"Nome"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"bigint(20)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_galeria_album","identificador","ide_origem","id_galeria_categoria","nome","descricao","datahora","status");
		}
	}
?>