<?
	class JornalEstruturaAttribute{
		public static function IdJornalEstrutura(){
			return "id_jornal_estrutura";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Prioridade(){
			return "prioridade";
		}
		public static function _Table(){
			return "tb_jornal_estrutura";
		}
		public static function _Default(){
			return JornalEstruturaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case JornalEstruturaAttribute::IdJornalEstrutura() : { return true; } break;
				case JornalEstruturaAttribute::Identificador() : { return true; } break;
				case JornalEstruturaAttribute::Nome() : { return true; } break;
				case JornalEstruturaAttribute::Prioridade() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_jornal_estrutura", "type"=>"bigint(20)", "text"=>"Código Jornal Estrutura"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"prioridade", "type"=>"int(11)", "text"=>"Prioridade"),
			);
		}
		public static function _GetKeys(){
			return array("id_jornal_estrutura","identificador","nome","prioridade");
		}
	}
?>