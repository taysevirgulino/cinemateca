<?
	class AgendaAttribute{
		public static function IdAgenda(){
			return "id_agenda";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdeOrigem(){
			return "ide_origem";
		}
		public static function IdAgendaCategoria(){
			return "id_agenda_categoria";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Data(){
			return "data";
		}
		public static function Hora(){
			return "hora";
		}
		public static function Local(){
			return "local";
		}
		public static function InformacoesContato(){
			return "informacoes_contato";
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
			return "tb_agenda";
		}
		public static function _Default(){
			return AgendaAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AgendaAttribute::IdAgenda() : { return true; } break;
				case AgendaAttribute::Identificador() : { return true; } break;
				case AgendaAttribute::IdeOrigem() : { return true; } break;
				case AgendaAttribute::IdAgendaCategoria() : { return true; } break;
				case AgendaAttribute::Titulo() : { return true; } break;
				case AgendaAttribute::Descricao() : { return true; } break;
				case AgendaAttribute::Data() : { return true; } break;
				case AgendaAttribute::Hora() : { return true; } break;
				case AgendaAttribute::Local() : { return true; } break;
				case AgendaAttribute::InformacoesContato() : { return true; } break;
				case AgendaAttribute::Imagem() : { return true; } break;
				case AgendaAttribute::Datahora() : { return true; } break;
				case AgendaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_agenda", "type"=>"bigint(20)", "text"=>"Código Agenda"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"ide_origem", "type"=>"varchar(32)", "text"=>"Ide Origem"),
				array("value"=>"id_agenda_categoria", "type"=>"bigint(20)", "text"=>"Código Agenda Categoria"),
				array("value"=>"titulo", "type"=>"varchar(200)", "text"=>"Título"),
				array("value"=>"descricao", "type"=>"text", "text"=>"Descrição"),
				array("value"=>"data", "type"=>"date", "text"=>"Data"),
				array("value"=>"hora", "type"=>"time", "text"=>"Hora"),
				array("value"=>"local", "type"=>"varchar(200)", "text"=>"Local"),
				array("value"=>"informacoes_contato", "type"=>"varchar(255)", "text"=>"Informações Contato"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_agenda","identificador","ide_origem","id_agenda_categoria","titulo","descricao","data","hora","local","informacoes_contato","imagem","datahora","status");
		}
	}
?>