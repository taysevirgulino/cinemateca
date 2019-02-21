<?
	class LojistaCronogramaAttribute{
		public static function IdLojistaCronograma(){
			return "id_lojista_cronograma";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdLojista(){
			return "id_lojista";
		}
		public static function IdCronogramaFarol(){
			return "id_cronograma_farol";
		}
		public static function PorcentagemIndefinido(){
			return "porcentagem_indefinido";
		}
		public static function PorcentagemAberto(){
			return "porcentagem_aberto";
		}
		public static function PorcentagemVencido(){
			return "porcentagem_vencido";
		}
		public static function PorcentagemConcluido(){
			return "porcentagem_concluido";
		}
		public static function PrevisaoInicio(){
			return "previsao_inicio";
		}
		public static function PrevisaoFim(){
			return "previsao_fim";
		}
		public static function Datahora(){
			return "datahora";
		}
		public static function _Table(){
			return "tb_lojista_cronograma";
		}
		public static function _Default(){
			return LojistaCronogramaAttribute::PorcentagemIndefinido();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LojistaCronogramaAttribute::IdLojistaCronograma() : { return true; } break;
				case LojistaCronogramaAttribute::Identificador() : { return true; } break;
				case LojistaCronogramaAttribute::IdLojista() : { return true; } break;
				case LojistaCronogramaAttribute::IdCronogramaFarol() : { return true; } break;
				case LojistaCronogramaAttribute::PorcentagemIndefinido() : { return true; } break;
				case LojistaCronogramaAttribute::PorcentagemAberto() : { return true; } break;
				case LojistaCronogramaAttribute::PorcentagemVencido() : { return true; } break;
				case LojistaCronogramaAttribute::PorcentagemConcluido() : { return true; } break;
				case LojistaCronogramaAttribute::PrevisaoInicio() : { return true; } break;
				case LojistaCronogramaAttribute::PrevisaoFim() : { return true; } break;
				case LojistaCronogramaAttribute::Datahora() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_lojista_cronograma", "type"=>"bigint(20)", "text"=>"Código Lojista Cronograma"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_lojista", "type"=>"bigint(20)", "text"=>"Código Lojista"),
				array("value"=>"id_cronograma_farol", "type"=>"bigint(20)", "text"=>"Código Cronograma Farol"),
				array("value"=>"porcentagem_indefinido", "type"=>"float(9,2)", "text"=>"Porcentagem Indefinido"),
				array("value"=>"porcentagem_aberto", "type"=>"float(9,2)", "text"=>"Porcentagem Aberto"),
				array("value"=>"porcentagem_vencido", "type"=>"float(9,2)", "text"=>"Porcentagem Vencido"),
				array("value"=>"porcentagem_concluido", "type"=>"float(9,2)", "text"=>"Porcentagem Concluido"),
				array("value"=>"previsao_inicio", "type"=>"date", "text"=>"Previsão Inicio"),
				array("value"=>"previsao_fim", "type"=>"date", "text"=>"Previsão Fim"),
				array("value"=>"datahora", "type"=>"datetime", "text"=>"Data/Hora"),
			);
		}
		public static function _GetKeys(){
			return array("id_lojista_cronograma","identificador","id_lojista","id_cronograma_farol","porcentagem_indefinido","porcentagem_aberto","porcentagem_vencido","porcentagem_concluido","previsao_inicio","previsao_fim","datahora");
		}
	}
?>