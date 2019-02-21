<?
	class AssociadoPlanoAttribute{
		public static function IdAssociadoPlano(){
			return "id_associado_plano";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Valor(){
			return "valor";
		}
		public static function Prorata(){
			return "prorata";
		}
		public static function Recorrencia(){
			return "recorrencia";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_associado_plano";
		}
		public static function _Default(){
			return AssociadoPlanoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AssociadoPlanoAttribute::IdAssociadoPlano() : { return true; } break;
				case AssociadoPlanoAttribute::Identificador() : { return true; } break;
				case AssociadoPlanoAttribute::Titulo() : { return true; } break;
				case AssociadoPlanoAttribute::Descricao() : { return true; } break;
				case AssociadoPlanoAttribute::Valor() : { return true; } break;
				case AssociadoPlanoAttribute::Prorata() : { return true; } break;
				case AssociadoPlanoAttribute::Recorrencia() : { return true; } break;
				case AssociadoPlanoAttribute::Prioridade() : { return true; } break;
				case AssociadoPlanoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_associado_plano", "type"=>"bigint(20)", "text"=>"Cуdigo Associado Plano"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Tнtulo"),
				array("value"=>"descricao", "type"=>"text", "text"=>"Descriзгo"),
				array("value"=>"valor", "type"=>"float(9,2)", "text"=>"Valor"),
				array("value"=>"prorata", "type"=>"int(11)", "text"=>"Prorata"),
				array("value"=>"recorrencia", "type"=>"int(11)", "text"=>"Recorrencia"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_associado_plano","identificador","titulo","descricao","valor","prorata","recorrencia","prioridade","status");
		}
	}
?>