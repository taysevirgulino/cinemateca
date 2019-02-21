<?
	class EixoCategoriaAttribute{
		public static function IdEixoCategoria(){
			return "id_eixo_categoria";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_eixo_categoria";
		}
		public static function _Default(){
			return EixoCategoriaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EixoCategoriaAttribute::IdEixoCategoria() : { return true; } break;
				case EixoCategoriaAttribute::Identificador() : { return true; } break;
				case EixoCategoriaAttribute::Nome() : { return true; } break;
				case EixoCategoriaAttribute::Datahora() : { return true; } break;
				case EixoCategoriaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_eixo_categoria", "type"=>"bigint(20)", "text"=>"Código Eixo Categoria"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_eixo_categoria","identificador","nome","datahora","status");
		}
	}
?>