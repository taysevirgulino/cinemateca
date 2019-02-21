<?
	class TempoLegendaAttribute{
		public static function IdTempoLegenda(){
			return "id_tempo_legenda";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Codigo(){
			return "codigo";
		}
		public static function _Table(){
			return "tb_tempo_legenda";
		}
		public static function _Default(){
			return TempoLegendaAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case TempoLegendaAttribute::IdTempoLegenda() : { return true; } break;
				case TempoLegendaAttribute::Identificador() : { return true; } break;
				case TempoLegendaAttribute::Titulo() : { return true; } break;
				case TempoLegendaAttribute::Codigo() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_tempo_legenda", "type"=>"bigint(20)", "text"=>"Código Tempo Legenda"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"codigo", "type"=>"varchar(20)", "text"=>"Código"),
			);
		}
		public static function _GetKeys(){
			return array("id_tempo_legenda","identificador","titulo","codigo");
		}
	}
?>