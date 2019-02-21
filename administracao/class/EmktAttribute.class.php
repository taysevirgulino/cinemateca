<?
	class EmktAttribute{
		public static function IdEmkt($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function Titulo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "titulo" : "varchar(255)");
		}
		public static function Assunto($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "assunto" : "varchar(255)");
		}
		public static function RemetenteNome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "remetente_nome" : "varchar(255)");
		}
		public static function RemetenteEmail($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "remetente_email" : "varchar(255)");
		}
		public static function MensagemHtml($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "mensagem_html" : "text");
		}
		public static function MensagemTexto($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "mensagem_texto" : "text");
		}
		public static function Datahora($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora" : "datetime");
		}
		public static function _Table(){
			return "tb_emkt";
		}
		public static function _Default($FieldNameOrType = 1){
			return EmktAttribute::Titulo($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EmktAttribute::IdEmkt() : { return true; } break;
				case EmktAttribute::Identificador() : { return true; } break;
				case EmktAttribute::Titulo() : { return true; } break;
				case EmktAttribute::Assunto() : { return true; } break;
				case EmktAttribute::RemetenteNome() : { return true; } break;
				case EmktAttribute::RemetenteEmail() : { return true; } break;
				case EmktAttribute::MensagemHtml() : { return true; } break;
				case EmktAttribute::MensagemTexto() : { return true; } break;
				case EmktAttribute::Datahora() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_emkt";
			$Attributes[0]["text"] = "Código Emkt";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "titulo";
			$Attributes[2]["text"] = "Título";
			$Attributes[3]["value"] = "assunto";
			$Attributes[3]["text"] = "Assunto";
			$Attributes[4]["value"] = "remetente_nome";
			$Attributes[4]["text"] = "Remetente Nome";
			$Attributes[5]["value"] = "remetente_email";
			$Attributes[5]["text"] = "Remetente E-mail";
			$Attributes[6]["value"] = "mensagem_html";
			$Attributes[6]["text"] = "Mensagem Html";
			$Attributes[7]["value"] = "mensagem_texto";
			$Attributes[7]["text"] = "Mensagem Texto";
			$Attributes[8]["value"] = "datahora";
			$Attributes[8]["text"] = "Data/Hora";
			return $Attributes;
		}
	}
?>