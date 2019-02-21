<?
	class AgendaCategoriaAttribute{
		public static function IdAgendaCategoria(){
			return "id_agenda_categoria";
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
			return "tb_agenda_categoria";
		}
		public static function _Default(){
			return AgendaCategoriaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AgendaCategoriaAttribute::IdAgendaCategoria() : { return true; } break;
				case AgendaCategoriaAttribute::Identificador() : { return true; } break;
				case AgendaCategoriaAttribute::IdeOrigem() : { return true; } break;
				case AgendaCategoriaAttribute::Nome() : { return true; } break;
				case AgendaCategoriaAttribute::Descricao() : { return true; } break;
				case AgendaCategoriaAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_agenda_categoria", "type"=>"bigint(20)", "text"=>"Cуdigo Agenda Categoria"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descriзгo"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_agenda_categoria","identificador","ide_origem","nome","descricao","prioridade");
		}
	}
?>