<?
	class AssociadoContratacaoAttribute{
		public static function IdAssociadoContratacao(){
			return "id_associado_contratacao";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdAssociado(){
			return "id_associado";
		}
		public static function IdAssociadoPlano(){
			return "id_associado_plano";
		}
		public static function ValorBruto(){
			return "valor_bruto";
		}
		public static function ValorDesconto(){
			return "valor_desconto";
		}
		public static function ValorFinal(){
			return "valor_final";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function PagamentoRetorno(){
			return "pagamento_retorno";
		}
		public static function PagamentoDatahora(){
			return "pagamento_datahora";
		}
		public static function PagamentoValor(){
			return "pagamento_valor";
		}
		public static function PlanoDataInicial(){
			return "plano_data_inicial";
		}
		public static function PlanoDataFinal(){
			return "plano_data_final";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_associado_contratacao";
		}
		public static function _Default(){
			return AssociadoContratacaoAttribute::ValorBruto();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AssociadoContratacaoAttribute::IdAssociadoContratacao() : { return true; } break;
				case AssociadoContratacaoAttribute::Identificador() : { return true; } break;
				case AssociadoContratacaoAttribute::IdAssociado() : { return true; } break;
				case AssociadoContratacaoAttribute::IdAssociadoPlano() : { return true; } break;
				case AssociadoContratacaoAttribute::ValorBruto() : { return true; } break;
				case AssociadoContratacaoAttribute::ValorDesconto() : { return true; } break;
				case AssociadoContratacaoAttribute::ValorFinal() : { return true; } break;
				case AssociadoContratacaoAttribute::Datahora() : { return true; } break;
				case AssociadoContratacaoAttribute::PagamentoRetorno() : { return true; } break;
				case AssociadoContratacaoAttribute::PagamentoDatahora() : { return true; } break;
				case AssociadoContratacaoAttribute::PagamentoValor() : { return true; } break;
				case AssociadoContratacaoAttribute::PlanoDataInicial() : { return true; } break;
				case AssociadoContratacaoAttribute::PlanoDataFinal() : { return true; } break;
				case AssociadoContratacaoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_associado_contratacao", "type"=>"bigint(20)", "text"=>"Cσdigo Associado Contrataηγo"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_associado", "type"=>"bigint(20)", "text"=>"Cσdigo Associado"),
				array("value"=>"id_associado_plano", "type"=>"bigint(20)", "text"=>"Cσdigo Associado Plano"),
				array("value"=>"valor_bruto", "type"=>"float(9,2)", "text"=>"Valor Bruto"),
				array("value"=>"valor_desconto", "type"=>"float(9,2)", "text"=>"Valor Desconto"),
				array("value"=>"valor_final", "type"=>"float(9,2)", "text"=>"Valor Final"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
				array("value"=>"pagamento_retorno", "type"=>"text", "text"=>"Pagamento Retorno"),
				array("value"=>"pagamento_datahora", "type"=>"datetime", "text"=>"Pagamento Data/Hora"),
				array("value"=>"pagamento_valor", "type"=>"float(9,2)", "text"=>"Pagamento Valor"),
				array("value"=>"plano_data_inicial", "type"=>"date", "text"=>"Plano Data Inicial"),
				array("value"=>"plano_data_final", "type"=>"date", "text"=>"Plano Data Final"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_associado_contratacao","identificador","id_associado","id_associado_plano","valor_bruto","valor_desconto","valor_final","datahora","pagamento_retorno","pagamento_datahora","pagamento_valor","plano_data_inicial","plano_data_final","status");
		}
	}
?>