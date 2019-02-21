<?
	class EmktDisparoStatus{
		public static function Agendado(){
			return 1;
		}
		public static function Processando(){
			return 2;
		}
		public static function Concluido(){
			return 3;
		}
		
		public static function _Descricao( $Status ){
			switch ($Status){
				case EmktDisparoStatus::Agendado() : return "<span class='azul'>Agendado</span>";
				case EmktDisparoStatus::Processando() : return "<span class='vermelho negrito'>Processando</span>";
				case EmktDisparoStatus::Concluido() : return "<span class='verde'>Concluído</span>";
			}
		}
	}
?>