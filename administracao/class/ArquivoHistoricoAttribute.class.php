<?
	class ArquivoHistoricoAttribute{
		public static function IdArquivoHistorico(){
			return "id_arquivo_historico";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdArquivo(){
			return "id_arquivo";
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
		public static function Texto(){
			return "texto";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_arquivo_historico";
		}
		public static function _Default(){
			return ArquivoHistoricoAttribute::Texto();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArquivoHistoricoAttribute::IdArquivoHistorico() : { return true; } break;
				case ArquivoHistoricoAttribute::Identificador() : { return true; } break;
				case ArquivoHistoricoAttribute::IdArquivo() : { return true; } break;
				case ArquivoHistoricoAttribute::IdArquivoTipo() : { return true; } break;
				case ArquivoHistoricoAttribute::IdUsuario() : { return true; } break;
				case ArquivoHistoricoAttribute::IdUsuarioResponsavel() : { return true; } break;
				case ArquivoHistoricoAttribute::Texto() : { return true; } break;
				case ArquivoHistoricoAttribute::Datahora() : { return true; } break;
				case ArquivoHistoricoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_arquivo_historico", "type"=>"bigint(20)", "text"=>"Código Arquivo Histórico"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_arquivo", "type"=>"bigint(20)", "text"=>"Código Arquivo"),
				array("value"=>"id_arquivo_tipo", "type"=>"bigint(20)", "text"=>"Código Arquivo Tipo"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"id_usuario_responsavel", "type"=>"bigint(20)", "text"=>"Código Usuário Responsável"),
				array("value"=>"texto", "type"=>"text", "text"=>"Texto"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_arquivo_historico","identificador","id_arquivo","id_arquivo_tipo","id_usuario","id_usuario_responsavel","texto","datahora","status");
		}
	}
?>