<?
	class LojistaPessoaPerfilAttribute{
		public static function IdLojistaPessoaPerfil(){
			return "id_lojista_pessoa_perfil";
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
		public static function _Table(){
			return "tb_lojista_pessoa_perfil";
		}
		public static function _Default(){
			return LojistaPessoaPerfilAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LojistaPessoaPerfilAttribute::IdLojistaPessoaPerfil() : { return true; } break;
				case LojistaPessoaPerfilAttribute::Identificador() : { return true; } break;
				case LojistaPessoaPerfilAttribute::Titulo() : { return true; } break;
				case LojistaPessoaPerfilAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_lojista_pessoa_perfil", "type"=>"bigint(20)", "text"=>"Código Lojista Pessoa Perfil"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"prioridade", "type"=>"bigint(20)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_lojista_pessoa_perfil","identificador","titulo","prioridade");
		}
	}
?>