<?
	class AudioAttribute{
		public static function IdAudio(){
			return "id_audio";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdAudioCategoria(){
			return "id_audio_categoria";
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
			return "tb_audio";
		}
		public static function _Default(){
			return AudioAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AudioAttribute::IdAudio() : { return true; } break;
				case AudioAttribute::Identificador() : { return true; } break;
				case AudioAttribute::IdeOrigem() : { return true; } break;
				case AudioAttribute::IdAudioCategoria() : { return true; } break;
				case AudioAttribute::Titulo() : { return true; } break;
				case AudioAttribute::Descricao() : { return true; } break;
				case AudioAttribute::Arquivo() : { return true; } break;
				case AudioAttribute::Embed() : { return true; } break;
				case AudioAttribute::Width() : { return true; } break;
				case AudioAttribute::Height() : { return true; } break;
				case AudioAttribute::Imagem() : { return true; } break;
				case AudioAttribute::Datahora() : { return true; } break;
				case AudioAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_audio", "type"=>"bigint(20)", "text"=>"Cуdigo Бudio"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_audio_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Бudio Categoria"),
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
			return array("id_audio","identificador","ide_origem","id_audio_categoria","titulo","descricao","arquivo","embed","width","height","imagem","datahora","status");
		}
	}
?>