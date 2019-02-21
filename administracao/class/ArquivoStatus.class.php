<?
	class ArquivoStatus {
		public static function Aberto(){
			return 1;
		}
		public static function Analise(){
			return 2;
		}
		public static function Aguardando(){
			return 3;
		}
		public static function Concluido(){
			return 4;
		}
		public static function _Default(){
			return self::Aberto();
		}
		public static function _Descricao($value){
			switch ($value){
				case self::Aberto() : return "<span class='vermelho negrito'>Aberto</span>";
				case self::Analise() : return "<span class='azul negrito'>Analise</span>";
				case self::Aguardando() : return "<span class='azul negrito'><strike>Aguardando</strike></span>";
				case self::Concluido() : return "<span class='verde negrito'><strike>Concluído</strike></span>";
			}
		}
		public static function _Descricao2($value){
			switch ($value){
				case self::Aberto() : return "<span class='label label-primary'><i class='fa fa-clock-o'></i> Aberto</span>";
				case self::Analise() : return "<span class='label label-secondary'><i class='fa fa-eye'></i> Em Análise</span>";
				case self::Aguardando() : return "<span class='label label-warning'><i class='fa fa-share'></i> Aguardando Lojista</span>";
				case self::Concluido() : return "<span class='label label-success'><i class='fa fa-check'></i> Concluído</span>";
			}
		}
		public static function _Class($value){
			switch ($value){
				case self::Aberto() : return "primary";
				case self::Analise() : return "secondary";
				case self::Aguardando() : return "warning";
				case self::Concluido() : return "success";
			}
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(self::Aberto(), self::_Descricao(self::Aberto()));
			$vobj[] = array(self::Analise(), self::_Descricao(self::Analise()));
			$vobj[] = array(self::Aguardando(), self::_Descricao(self::Aguardando()));
			$vobj[] = array(self::Concluido(), self::_Descricao(self::Concluido()));
			
			return $vobj;
		}
		
		public static function _Values2(){
			$vobj = array();
			$vobj[] = array(self::Aberto(), strip_tags(self::_Descricao2(self::Aberto())), self::_Class(self::Aberto()));
			$vobj[] = array(self::Analise(), strip_tags(self::_Descricao2(self::Analise())), self::_Class(self::Analise()));
			$vobj[] = array(self::Aguardando(), strip_tags(self::_Descricao2(self::Aguardando())), self::_Class(self::Aguardando()));
			$vobj[] = array(self::Concluido(), strip_tags(self::_Descricao2(self::Concluido())), self::_Class(self::Concluido()));
			
			return $vobj;
		}
	}
?>