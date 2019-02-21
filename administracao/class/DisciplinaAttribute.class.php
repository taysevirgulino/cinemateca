<?
	class DisciplinaAttribute{
		public static function IdDisciplina(){
			return "id_disciplina";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Semestre(){
			return "semestre";
		}
		public static function Conteudo(){
			return "conteudo";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_disciplina";
		}
		public static function _Default(){
			return DisciplinaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case DisciplinaAttribute::IdDisciplina() : { return true; } break;
				case DisciplinaAttribute::Identificador() : { return true; } break;
				case DisciplinaAttribute::Nome() : { return true; } break;
				case DisciplinaAttribute::Semestre() : { return true; } break;
				case DisciplinaAttribute::Conteudo() : { return true; } break;
				case DisciplinaAttribute::Datahora() : { return true; } break;
				case DisciplinaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_disciplina", "type"=>"bigint(20)", "text"=>"Código Disciplina"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"semestre", "type"=>"varchar(20)", "text"=>"Semestre"),
				array("value"=>"conteudo", "type"=>"varchar(255)", "text"=>"Conteúdo"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_disciplina","identificador","nome","semestre","conteudo","datahora","status");
		}
	}
?>