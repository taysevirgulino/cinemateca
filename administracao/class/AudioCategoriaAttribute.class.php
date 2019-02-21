<?
	class AudioCategoriaAttribute{
		public static function IdAudioCategoria(){
			return "id_audio_categoria";
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
			return "tb_audio_categoria";
		}
		public static function _Default(){
			return AudioCategoriaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AudioCategoriaAttribute::IdAudioCategoria() : { return true; } break;
				case AudioCategoriaAttribute::Identificador() : { return true; } break;
				case AudioCategoriaAttribute::IdeOrigem() : { return true; } break;
				case AudioCategoriaAttribute::Nome() : { return true; } break;
				case AudioCategoriaAttribute::Descricao() : { return true; } break;
				case AudioCategoriaAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_audio_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Бudio Categoria"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_audio_categoria","identificador","ide_origem","nome","descricao","prioridade");
		}
	}
?>