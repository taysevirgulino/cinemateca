<?
	class EixoAttribute{
		public static function IdEixo(){
			return "id_eixo";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Categoria(){
			return "categoria";
		}
		public static function Nome(){
			return "nome";
		}
		public static function IdDisciplina(){
			return "id_disciplina";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_eixo";
		}
		public static function _Default(){
			return EixoAttribute::Categoria();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EixoAttribute::IdEixo() : { return true; } break;
				case EixoAttribute::Identificador() : { return true; } break;
				case EixoAttribute::Categoria() : { return true; } break;
				case EixoAttribute::Nome() : { return true; } break;
				case EixoAttribute::IdDisciplina() : { return true; } break;
				case EixoAttribute::Datahora() : { return true; } break;
				case EixoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_eixo", "type"=>"bigint(20)", "text"=>"Código Eixo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"categoria", "type"=>"varchar(255)", "text"=>"Categoria"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"id_disciplina", "type"=>"bigint(20)", "text"=>"Código Disciplina"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_eixo","identificador","categoria","nome","id_disciplina","datahora","status");
		}
	}
?>