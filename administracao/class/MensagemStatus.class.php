<?
	class MensagemStatus {
		public static function Aberto(){
			return 1;
		}
		public static function Lido(){
			return 2;
		}
		public static function Respondido(){
			return 3;
		}
		public static function Excluido(){
			return 4;
		}
		public static function _Default(){
			return self::Aberto();
		}
		public static function _Descricao($value){
			switch ($value){
				case self::Aberto() : return "Não lida";
				case self::Lido() : return "Lida";
				case self::Respondido() : return "Respondida";
				case self::Excluido() : return "Excluída";
			}
		}
		public static function _Descricao2($value){
			switch ($value){
				case self::Aberto() : {
				    $rs = array(
				        'status' => 1,
				        'label' => 'Não lida',
				        'class' => 'primary',
				        'icon' => 'fa fa-eye-slash'
				    );
				}break;
				case self::Lido() : {
				    $rs = array(
				        'status' => 2,
				        'label' => 'Lida',
				        'class' => 'success',
				        'icon' => 'fa fa-check'
				    );
				}break;
				case self::Respondido() : {
				     $rs = array(
	                    'status' => 3,
	                    'label' => 'Respondida',
	                    'class' => 'secondary',
	                    'icon' => 'fa fa-refresh'
	                );
				}break;
				case self::Excluido() : {
				     $rs = array(
	                    'status' => 4,
	                    'label' => 'Excluído',
	                    'class' => 'tertiary',
	                    'icon' => 'fa fa-trash'
	                );
				}break;
			}
			$rs['span'] = '<span class="btn btn-xs btn-'.$rs['class'].'"><i class="'.$rs['icon'].'"></i> '.$rs['label'].'</span>';
			
			return $rs;
		}
		public static function _Values(){
			$vobj = array();
			$vobj[] = array(self::Aberto(), self::_Descricao(self::Aberto()));
			$vobj[] = array(self::Lido(), self::_Descricao(self::Lido()));
			$vobj[] = array(self::Respondido(), self::_Descricao(self::Respondido()));
			$vobj[] = array(self::Excluido(), self::_Descricao(self::Excluido()));
			
			return $vobj;
		}
	}
?>