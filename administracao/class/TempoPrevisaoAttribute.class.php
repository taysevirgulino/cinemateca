<?
	class TempoPrevisaoAttribute{
		public static function IdTempoPrevisao(){
			return "id_tempo_previsao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdTempoCidade(){
			return "id_tempo_cidade";
		}
		public static function Dia(){
			return "dia";
		}
		public static function Tempo(){
			return "tempo";
		}
		public static function Maxima(){
			return "maxima";
		}
		public static function Minima(){
			return "minima";
		}
		public static function Iuv(){
			return "iuv";
		}
		public static function _Table(){
			return "tb_tempo_previsao";
		}
		public static function _Default(){
			return TempoPrevisaoAttribute::Dia();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case TempoPrevisaoAttribute::IdTempoPrevisao() : { return true; } break;
				case TempoPrevisaoAttribute::Identificador() : { return true; } break;
				case TempoPrevisaoAttribute::IdTempoCidade() : { return true; } break;
				case TempoPrevisaoAttribute::Dia() : { return true; } break;
				case TempoPrevisaoAttribute::Tempo() : { return true; } break;
				case TempoPrevisaoAttribute::Maxima() : { return true; } break;
				case TempoPrevisaoAttribute::Minima() : { return true; } break;
				case TempoPrevisaoAttribute::Iuv() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_tempo_previsao", "type"=>"bigint(20)", "text"=>"Código Tempo Previsão"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_tempo_cidade", "type"=>"bigint(20)", "text"=>"Código Tempo Cidade"),
				array("value"=>"dia", "type"=>"date", "text"=>"Dia"),
				array("value"=>"tempo", "type"=>"varchar(20)", "text"=>"Tempo"),
				array("value"=>"maxima", "type"=>"int(11)", "text"=>"Máxima"),
				array("value"=>"minima", "type"=>"int(11)", "text"=>"Mínima"),
				array("value"=>"iuv", "type"=>"varchar(20)", "text"=>"Iuv"),
			);
		}
		public static function _GetKeys(){
			return array("id_tempo_previsao","identificador","id_tempo_cidade","dia","tempo","maxima","minima","iuv");
		}
	}
?>