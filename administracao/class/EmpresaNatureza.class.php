<?
	class EmpresaNatureza {
		public static function Formal(){
			return 1;
		}
		public static function Informal(){
			return 2;
		}
		public static function Profissional(){
			return 3;
		}
		public static function _Default(){
			return EmpresaNatureza::Formal();
		}
		public static function _Descricao($value){
			switch ($value){
				case EmpresaNatureza::Formal() : return "Formal";
				case EmpresaNatureza::Informal() : return "Informal";
				case EmpresaNatureza::Profissional() : return "Profissional Liberal";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(EmpresaNatureza::Formal(), EmpresaNatureza::_Descricao(EmpresaNatureza::Formal()));
			$vobj[] = array(EmpresaNatureza::Informal(), EmpresaNatureza::_Descricao(EmpresaNatureza::Informal()));
			$vobj[] = array(EmpresaNatureza::Profissional(), EmpresaNatureza::_Descricao(EmpresaNatureza::Profissional()));
			
			return $vobj;
		}
	}
?>