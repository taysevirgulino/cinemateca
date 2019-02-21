<?
	class EmpreendimentoAttribute{
		public static function IdEmpreendimento(){
			return "id_empreendimento";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Endereco(){
			return "endereco";
		}
		public static function Telefone(){
			return "telefone";
		}
		public static function Email(){
			return "email";
		}
		public static function AreaBrutaLocavel(){
			return "area_bruta_locavel";
		}
		public static function AreaTotalConstruida(){
			return "area_total_construida";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_empreendimento";
		}
		public static function _Default(){
			return EmpreendimentoAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EmpreendimentoAttribute::IdEmpreendimento() : { return true; } break;
				case EmpreendimentoAttribute::Identificador() : { return true; } break;
				case EmpreendimentoAttribute::Titulo() : { return true; } break;
				case EmpreendimentoAttribute::Endereco() : { return true; } break;
				case EmpreendimentoAttribute::Telefone() : { return true; } break;
				case EmpreendimentoAttribute::Email() : { return true; } break;
				case EmpreendimentoAttribute::AreaBrutaLocavel() : { return true; } break;
				case EmpreendimentoAttribute::AreaTotalConstruida() : { return true; } break;
				case EmpreendimentoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_empreendimento", "type"=>"bigint(20)", "text"=>"Código Empreendimento"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"endereco", "type"=>"varchar(255)", "text"=>"Endereço"),
				array("value"=>"telefone", "type"=>"varchar(100)", "text"=>"Telefone"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"area_bruta_locavel", "type"=>"float(9,2)", "text"=>"Área Bruta Locavel"),
				array("value"=>"area_total_construida", "type"=>"float(9,2)", "text"=>"Área Total Construida"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_empreendimento","identificador","titulo","endereco","telefone","email","area_bruta_locavel","area_total_construida","status");
		}
	}
?>