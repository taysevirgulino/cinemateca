<?
	class VideoAttribute{
		public static function IdVideo(){
			return "id_video";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdVideoCategoria(){
			return "id_video_categoria";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Arquivo(){
			return "arquivo";
		}
		public static function Embed(){
			return "embed";
		}
		public static function Width(){
			return "width";
		}
		public static function Height(){
			return "height";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_video";
		}
		public static function _Default(){
			return VideoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case VideoAttribute::IdVideo() : { return true; } break;
				case VideoAttribute::Identificador() : { return true; } break;
				case VideoAttribute::IdeOrigem() : { return true; } break;
				case VideoAttribute::IdVideoCategoria() : { return true; } break;
				case VideoAttribute::Titulo() : { return true; } break;
				case VideoAttribute::Descricao() : { return true; } break;
				case VideoAttribute::Arquivo() : { return true; } break;
				case VideoAttribute::Embed() : { return true; } break;
				case VideoAttribute::Width() : { return true; } break;
				case VideoAttribute::Height() : { return true; } break;
				case VideoAttribute::Imagem() : { return true; } break;
				case VideoAttribute::Datahora() : { return true; } break;
				case VideoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_video", "type"=>"bigint(20)", "text"=>"Cуdigo Vнdeo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_video_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Vнdeo Categoria"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Tнtulo"),
				array("value"=>"descricao", "type"=>"text", "text"=>"Descriзгo"),
				array("value"=>"arquivo", "type"=>"varchar(255)", "text"=>"Arquivo"),
				array("value"=>"embed", "type"=>"text", "text"=>"Embed"),
				array("value"=>"width", "type"=>"int(11)", "text"=>"Largura (Width)"),
				array("value"=>"height", "type"=>"int(11)", "text"=>"Altura (Height)"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_video","identificador","ide_origem","id_video_categoria","titulo","descricao","arquivo","embed","width","height","imagem","datahora","status");
		}
	}
?>