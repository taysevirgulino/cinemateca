<?
	class LojistaAttribute{
		public static function IdLojista(){
			return "id_lojista";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdLoja(){
			return "id_loja";
		}
		public static function IdUsuarioResponsavel(){
			return "id_usuario_responsavel";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Responsavel(){
			return "responsavel";
		}
		public static function Fraquia(){
			return "fraquia";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Observacoes(){
			return "observacoes";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_lojista";
		}
		public static function _Default(){
			return LojistaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LojistaAttribute::IdLojista() : { return true; } break;
				case LojistaAttribute::Identificador() : { return true; } break;
				case LojistaAttribute::IdLoja() : { return true; } break;
				case LojistaAttribute::IdUsuarioResponsavel() : { return true; } break;
				case LojistaAttribute::Nome() : { return true; } break;
				case LojistaAttribute::Responsavel() : { return true; } break;
				case LojistaAttribute::Fraquia() : { return true; } break;
				case LojistaAttribute::Imagem() : { return true; } break;
				case LojistaAttribute::Observacoes() : { return true; } break;
				case LojistaAttribute::Email() : { return true; } break;
				case LojistaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_lojista", "type"=>"bigint(20)", "text"=>"Código Lojista"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_loja", "type"=>"bigint(20)", "text"=>"Código Loja"),
				array("value"=>"id_usuario_responsavel", "type"=>"bigint(20)", "text"=>"Código Usuário Responsável"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"responsavel", "type"=>"varchar(255)", "text"=>"Responsável"),
				array("value"=>"fraquia", "type"=>"int(11)", "text"=>"Fraquia"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"observacoes", "type"=>"text", "text"=>"Observações"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"Email"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_lojista","identificador","id_loja","id_usuario_responsavel","nome","responsavel","fraquia","imagem","observacoes", "email","status");
		}
	}
?>