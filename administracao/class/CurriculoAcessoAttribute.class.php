<?
	class CurriculoAcessoAttribute{
		public static function IdCurriculoAcesso(){
			return "id_curriculo_acesso";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdCurriculo(){
			return "id_curriculo";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Ip(){
			return "ip";
		}
		public static function _Table(){
			return "tb_curriculo_acesso";
		}
		public static function _Default(){
			return CurriculoAcessoAttribute::Datahora();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case CurriculoAcessoAttribute::IdCurriculoAcesso() : { return true; } break;
				case CurriculoAcessoAttribute::Identificador() : { return true; } break;
				case CurriculoAcessoAttribute::IdCurriculo() : { return true; } break;
				case CurriculoAcessoAttribute::IdUsuario() : { return true; } break;
				case CurriculoAcessoAttribute::Datahora() : { return true; } break;
				case CurriculoAcessoAttribute::Ip() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_curriculo_acesso", "type"=>"bigint(20)", "text"=>"Código Currículo Acesso"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_curriculo", "type"=>"bigint(20)", "text"=>"Código Currículo"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"ip", "type"=>"varchar(32)", "text"=>"Ip"),
			);
		}
		public static function _GetKeys(){
			return array("id_curriculo_acesso","identificador","id_curriculo","id_usuario","datahora","ip");
		}
	}
?>