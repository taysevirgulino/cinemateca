<?
	class IndiqueAttribute{
		public static function IdIndique($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_indique" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdeOrigem($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ide_origem" : "varchar(32)");
		}
		public static function RemetenteNome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "remetente_nome" : "varchar(255)");
		}
		public static function RemetenteEmail($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "remetente_email" : "varchar(255)");
		}
		public static function DestinatarioNome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "destinatario_nome" : "varchar(255)");
		}
		public static function DestinatarioEmail($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "destinatario_email" : "varchar(255)");
		}
		public static function Ip($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ip" : "varchar(15)");
		}
		public static function Sessao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "sessao" : "varchar(32)");
		}
		public static function Datahora($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora" : "datetime");
		}
		public static function _Table(){
			return "tb_indique";
		}
		public static function _Default($FieldNameOrType = 1){
			return IndiqueAttribute::RemetenteNome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case IndiqueAttribute::IdIndique() : { return true; } break;
				case IndiqueAttribute::Identificador() : { return true; } break;
				case IndiqueAttribute::IdeOrigem() : { return true; } break;
				case IndiqueAttribute::RemetenteNome() : { return true; } break;
				case IndiqueAttribute::RemetenteEmail() : { return true; } break;
				case IndiqueAttribute::DestinatarioNome() : { return true; } break;
				case IndiqueAttribute::DestinatarioEmail() : { return true; } break;
				case IndiqueAttribute::Ip() : { return true; } break;
				case IndiqueAttribute::Sessao() : { return true; } break;
				case IndiqueAttribute::Datahora() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_indique";
			$Attributes[0]["text"] = "Código Indique";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "remetente_nome";
			$Attributes[2]["text"] = "Remetente Nome";
			$Attributes[3]["value"] = "remetente_email";
			$Attributes[3]["text"] = "Remetente E-mail";
			$Attributes[4]["value"] = "destinatario_nome";
			$Attributes[4]["text"] = "Destinatário Nome";
			$Attributes[5]["value"] = "destinatario_email";
			$Attributes[5]["text"] = "Destinatário E-mail";
			$Attributes[6]["value"] = "ip";
			$Attributes[6]["text"] = "Ip";
			$Attributes[7]["value"] = "sessao";
			$Attributes[7]["text"] = "Sessão";
			$Attributes[8]["value"] = "datahora";
			$Attributes[8]["text"] = "Data/Hora";
			return $Attributes;
		}
	}
?>