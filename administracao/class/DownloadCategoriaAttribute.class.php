<?
	class DownloadCategoriaAttribute{
		public static function IdDownloadCategoria(){
			return "id_download_categoria";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
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
		public static function _Table(){
			return "tb_download_categoria";
		}
		public static function _Default(){
			return DownloadCategoriaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case DownloadCategoriaAttribute::IdDownloadCategoria() : { return true; } break;
				case DownloadCategoriaAttribute::Identificador() : { return true; } break;
				case DownloadCategoriaAttribute::IdeOrigem() : { return true; } break;
				case DownloadCategoriaAttribute::Nome() : { return true; } break;
				case DownloadCategoriaAttribute::Descricao() : { return true; } break;
				case DownloadCategoriaAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_download_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Download Categoria"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"nome", "type"=>"varchar(200)", "text"=>"Nome"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_download_categoria","identificador","ide_origem","nome","descricao","prioridade");
		}
	}
?>