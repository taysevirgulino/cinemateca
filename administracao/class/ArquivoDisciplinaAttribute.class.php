<?
	class ArquivoDisciplinaAttribute{
		public static function IdArquivoDisciplina(){
			return "id_arquivo_disciplina";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_arquivo_disciplina";
		}
		public static function _Default(){
			return ArquivoDisciplinaAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArquivoDisciplinaAttribute::IdArquivoDisciplina() : { return true; } break;
				case ArquivoDisciplinaAttribute::Identificador() : { return true; } break;
				case ArquivoDisciplinaAttribute::Titulo() : { return true; } break;
				case ArquivoDisciplinaAttribute::Prioridade() : { return true; } break;
				case ArquivoDisciplinaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_arquivo_disciplina", "type"=>"bigint(20)", "text"=>"Código Arquivo Disciplina"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_arquivo_disciplina","identificador","titulo","prioridade","status");
		}
	}
?>