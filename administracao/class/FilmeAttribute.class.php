<?
	class FilmeAttribute{
		public static function IdFilme(){
			return "id_filme";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdEixo(){
			return "id_eixo";
		}
		public static function IdDisciplina(){
			return "id_disciplina";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Url(){
			return "url";
		}
		public static function UrlYoutube(){
			return "url_youtube";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_filme";
		}
		public static function _Default(){
			return FilmeAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case FilmeAttribute::IdFilme() : { return true; } break;
				case FilmeAttribute::Identificador() : { return true; } break;
				case FilmeAttribute::IdEixo() : { return true; } break;
				case FilmeAttribute::IdDisciplina() : { return true; } break;
				case FilmeAttribute::Nome() : { return true; } break;
				case FilmeAttribute::Url() : { return true; } break;
				case FilmeAttribute::UrlYoutube() : { return true; } break;
				case FilmeAttribute::Descricao() : { return true; } break;
				case FilmeAttribute::Datahora() : { return true; } break;
				case FilmeAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_filme", "type"=>"bigint(20)", "text"=>"Código Filme"),
				array("value"=>"identificador", "type"=>"int(32)", "text"=>"Identificador"),
				array("value"=>"id_eixo", "type"=>"bigint(20)", "text"=>"Código Eixo"),
				array("value"=>"id_disciplina", "type"=>"bigint(20)", "text"=>"Código Disciplina"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"url", "type"=>"varchar(255)", "text"=>"Url (Endereço)"),
				array("value"=>"url_youtube", "type"=>"varchar(255)", "text"=>"Url (Endereço) Youtube"),
				array("value"=>"descricao", "type"=>"varchar(255)", "text"=>"Descrição"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_filme","identificador","id_eixo","id_disciplina","nome","url","url_youtube","descricao","datahora","status");
		}
	}
?>