<?
	class LojaAttribute{
		public static function IdLoja(){
			return "id_loja";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdEmpreendimento(){
			return "id_empreendimento";
		}
		public static function IdSegmento(){
			return "id_segmento";
		}
		public static function Numero(){
			return "numero";
		}
		public static function Pavimento(){
			return "pavimento";
		}
		public static function Area(){
			return "area";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_loja";
		}
		public static function _Default(){
			return LojaAttribute::Numero();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LojaAttribute::IdLoja() : { return true; } break;
				case LojaAttribute::Identificador() : { return true; } break;
				case LojaAttribute::IdEmpreendimento() : { return true; } break;
				case LojaAttribute::IdSegmento() : { return true; } break;
				case LojaAttribute::Numero() : { return true; } break;
				case LojaAttribute::Pavimento() : { return true; } break;
				case LojaAttribute::Area() : { return true; } break;
				case LojaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_loja", "type"=>"bigint(20)", "text"=>"Código Loja"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_empreendimento", "type"=>"bigint(20)", "text"=>"Código Empreendimento"),
				array("value"=>"id_segmento", "type"=>"bigint(20)", "text"=>"Código Segmento"),
				array("value"=>"numero", "type"=>"varchar(50)", "text"=>"Número"),
				array("value"=>"pavimento", "type"=>"varchar(255)", "text"=>"Pavimento"),
				array("value"=>"area", "type"=>"float(9,2)", "text"=>"Área"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_loja","identificador","id_empreendimento","id_segmento","numero","pavimento","area","status");
		}
	}
?>