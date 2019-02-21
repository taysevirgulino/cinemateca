<?
	class DownloadAttribute{
		public static function IdDownload(){
			return "id_download";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdDownloadCategoria(){
			return "id_download_categoria";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Arquivo(){
			return "arquivo";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Click(){
			return "click";
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
			return "tb_download";
		}
		public static function _Default(){
			return DownloadAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case DownloadAttribute::IdDownload() : { return true; } break;
				case DownloadAttribute::Identificador() : { return true; } break;
				case DownloadAttribute::IdeOrigem() : { return true; } break;
				case DownloadAttribute::IdDownloadCategoria() : { return true; } break;
				case DownloadAttribute::Nome() : { return true; } break;
				case DownloadAttribute::Descricao() : { return true; } break;
				case DownloadAttribute::Arquivo() : { return true; } break;
				case DownloadAttribute::Imagem() : { return true; } break;
				case DownloadAttribute::Click() : { return true; } break;
				case DownloadAttribute::Datahora() : { return true; } break;
				case DownloadAttribute::Prioridade() : { return true; } break;
				case DownloadAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_download", "type"=>"bigint(20)", "text"=>"Cуdigo Download"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_download_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Download Categoria"),
				array("value"=>"nome", "type"=>"varchar(200)", "text"=>"Nome"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"click", "type"=>"int(11)", "text"=>"Click"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_download","identificador","ide_origem","id_download_categoria","nome","descricao","arquivo","imagem","click","datahora","prioridade","status");
		}
	}
?>