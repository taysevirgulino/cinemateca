<?
	class ConteudoAttribute{
		public static function IdConteudo(){
			return "id_conteudo";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Codigo(){
			return "codigo";
		}
		public static function Legenda(){
			return "legenda";
		}
		public static function Texto(){
			return "texto";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_conteudo";
		}
		public static function _Default(){
			return ConteudoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ConteudoAttribute::IdConteudo() : { return true; } break;
				case ConteudoAttribute::Identificador() : { return true; } break;
				case ConteudoAttribute::IdeOrigem() : { return true; } break;
				case ConteudoAttribute::Titulo() : { return true; } break;
				case ConteudoAttribute::Codigo() : { return true; } break;
				case ConteudoAttribute::Legenda() : { return true; } break;
				case ConteudoAttribute::Texto() : { return true; } break;
				case ConteudoAttribute::Imagem() : { return true; } break;
				case ConteudoAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_conteudo", "type"=>"bigint(20)", "text"=>"Código Conteúdo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"codigo", "type"=>"varchar(50)", "text"=>"Código"),
				array("value"=>"legenda", "type"=>"varchar(255)", "text"=>"Legenda"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_conteudo","identificador","ide_origem","titulo","codigo","legenda","texto","imagem","prioridade");
		}
	}
?>