<?
	class ArquivoAttribute{
		public static function IdArquivo(){
			return "id_arquivo";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdLojista(){
			return "id_lojista";
		}
		public static function IdArquivoDisciplina(){
			return "id_arquivo_disciplina";
		}
		public static function IdArquivoTipo(){
			return "id_arquivo_tipo";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function IdUsuarioResponsavel(){
			return "id_usuario_responsavel";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Texto(){
			return "texto";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function DatahoraEdicao(){
			return "datahora_edicao";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_arquivo";
		}
		public static function _Default(){
			return ArquivoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArquivoAttribute::IdArquivo() : { return true; } break;
				case ArquivoAttribute::Identificador() : { return true; } break;
				case ArquivoAttribute::IdLojista() : { return true; } break;
				case ArquivoAttribute::IdArquivoDisciplina() : { return true; } break;
				case ArquivoAttribute::IdArquivoTipo() : { return true; } break;
				case ArquivoAttribute::IdUsuario() : { return true; } break;
				case ArquivoAttribute::IdUsuarioResponsavel() : { return true; } break;
				case ArquivoAttribute::Titulo() : { return true; } break;
				case ArquivoAttribute::Texto() : { return true; } break;
				case ArquivoAttribute::Datahora() : { return true; } break;
				case ArquivoAttribute::DatahoraEdicao() : { return true; } break;
				case ArquivoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_arquivo", "type"=>"bigint(20)", "text"=>"Código Arquivo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_lojista", "type"=>"bigint(20)", "text"=>"Código Lojista"),
				array("value"=>"id_arquivo_disciplina", "type"=>"bigint(20)", "text"=>"Código Arquivo Disciplina"),
				array("value"=>"id_arquivo_tipo", "type"=>"bigint(20)", "text"=>"Código Arquivo Tipo"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"id_usuario_responsavel", "type"=>"bigint(20)", "text"=>"Código Usuário Responsável"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"datahora_edicao", "type"=>"datetime", "text"=>"Data/Hora Edição"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_arquivo","identificador","id_lojista","id_arquivo_disciplina","id_arquivo_tipo","id_usuario","id_usuario_responsavel","titulo","texto","datahora","datahora_edicao","status");
		}
	}
?>