<?
	class GaleriaFotoAttribute{
		public static function IdGaleriaFoto(){
			return "id_galeria_foto";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdGaleriaAlbum(){
			return "id_galeria_album";
		}
		public static function Credito(){
			return "credito";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Foto(){
			return "foto";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_galeria_foto";
		}
		public static function _Default(){
			return GaleriaFotoAttribute::Credito();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case GaleriaFotoAttribute::IdGaleriaFoto() : { return true; } break;
				case GaleriaFotoAttribute::Identificador() : { return true; } break;
				case GaleriaFotoAttribute::IdeOrigem() : { return true; } break;
				case GaleriaFotoAttribute::IdGaleriaAlbum() : { return true; } break;
				case GaleriaFotoAttribute::Credito() : { return true; } break;
				case GaleriaFotoAttribute::Descricao() : { return true; } break;
				case GaleriaFotoAttribute::Foto() : { return true; } break;
				case GaleriaFotoAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_galeria_foto", "type"=>"bigint(20)", "text"=>"Cуdigo Galeria Foto"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_galeria_album", "type"=>"bigint(20)", "text"=>"Cуdigo Galeria Бlbum"),
				array("value"=>"credito", "type"=>"varchar(255)", "text"=>"Crйdito"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"foto", "type"=>"varchar(255)", "text"=>"Foto"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_galeria_foto","identificador","ide_origem","id_galeria_album","credito","descricao","foto","prioridade");
		}
	}
?>