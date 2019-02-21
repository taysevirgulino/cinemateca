<?
	class LocalidadeAttribute{
		public static function IdLocalidade(){
			return "id_localidade";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Uf(){
			return "uf";
		}
		public static function Cidade(){
			return "cidade";
		}
		public static function Capital(){
			return "capital";
		}
		public static function _Table(){
			return "tb_localidade";
		}
		public static function _Default(){
			return LocalidadeAttribute::Uf();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LocalidadeAttribute::IdLocalidade() : { return true; } break;
				case LocalidadeAttribute::Identificador() : { return true; } break;
				case LocalidadeAttribute::Uf() : { return true; } break;
				case LocalidadeAttribute::Cidade() : { return true; } break;
				case LocalidadeAttribute::Capital() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_localidade", "type"=>"bigint(20)", "text"=>"Código Localidade"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"uf", "type"=>"char(2)", "text"=>"Uf"),
				array("value"=>"cidade", "type"=>"varchar(200)", "text"=>"Cidade"),
				array("value"=>"capital", "type"=>"int(11)", "text"=>"Capital"),
			);
		}
		public static function _GetKeys(){
			return array("id_localidade","identificador","uf","cidade","capital");
		}
	}
?>