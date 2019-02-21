<?
	class VideoCategoriaAttribute{
		public static function IdVideoCategoria(){
			return "id_video_categoria";
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
			return "tb_video_categoria";
		}
		public static function _Default(){
			return VideoCategoriaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case VideoCategoriaAttribute::IdVideoCategoria() : { return true; } break;
				case VideoCategoriaAttribute::Identificador() : { return true; } break;
				case VideoCategoriaAttribute::IdeOrigem() : { return true; } break;
				case VideoCategoriaAttribute::Nome() : { return true; } break;
				case VideoCategoriaAttribute::Descricao() : { return true; } break;
				case VideoCategoriaAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_video_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Vнdeo Categoria"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_video_categoria","identificador","ide_origem","nome","descricao","prioridade");
		}
	}
?>