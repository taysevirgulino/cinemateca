<?
	class AppLogonHistoricoLog {
		
		public static function _Add(){
			return "Add";
		}
		public static function _Edit(){
			return "Edit";
		}
		public static function _List(){
			return "List";
		}
		public static function _Remove(){
			return "Remove";
		}
		public static function _View(){
			return "View";
		}
		public static function _Operation(){
			return "Operation";
		}
		public static function _Priority(){
			return "Priority";
		}
		public static function _Export(){
			return "Export";
		}
		
		public static function Registrar($Objeto, $Identificador, $Acao){
			$AppLogon = AppLogonManage::GetAppLogon();
			return AppLogonHistoricoManage::inserirAppLogonHistorico(-1, null, $AppLogon->getIdAppLogon(), $Identificador, $Objeto, $Acao, $_SERVER["REMOTE_ADDR"], session_id(), date("Y-m-d H:i:s"));
		}
		
		public static function Consultar($IdeObjeto){
			$sql = "SELECT 
					  tb_app_logon_historico.id_app_logon_historico,
					  tb_app_logon_historico.identificador,
					  tb_app_logon_historico.id_app_logon,
					  tb_app_logon_historico.ide_objeto,
					  tb_app_logon_historico.objeto,
					  tb_app_logon_historico.acao,
					  tb_app_logon_historico.ip,
					  tb_app_logon_historico.sessao,
					  tb_app_logon_historico.datahora,
					  tb_app_logon.datahora_login,
					  tb_app_logon.datahora_logout,
					  tb_app_usuario.id_app_usuario,
					  tb_app_usuario.nome,
					  tb_app_usuario.email,
					  tb_app_usuario.login
					FROM
					  tb_app_logon_historico
					  INNER JOIN tb_app_logon ON (tb_app_logon_historico.id_app_logon = tb_app_logon.id_app_logon)
					  INNER JOIN tb_app_usuario ON (tb_app_logon.id_app_usuario = tb_app_usuario.id_app_usuario)
					WHERE
					  tb_app_logon_historico.ide_objeto = '$IdeObjeto'
					ORDER BY
					  tb_app_logon_historico.datahora DESC";
			
			
			$dbq = new dbQuery(); 
			$dbq->consultar($sql); 
			$objs = array(); 
			$i = 0; 
			 
			while( $dbq->registro() ){ 
				$obj = array();
				$obj["id_app_logon_historico"] = $dbq->valor("id_app_logon_historico");
				$obj["identificador"] = $dbq->valor("identificador");
				$obj["id_app_logon"] = $dbq->valor("id_app_logon");
				$obj["ide_objeto"] = $dbq->valor("ide_objeto");
				$obj["objeto"] = $dbq->valor("objeto");
				$obj["acao"] = $dbq->valor("acao");
				$obj["acao_label"] = AppLogonHistoricoLog::_DescricaoByAcao($dbq->valor("acao"));
				$obj["ip"] = $dbq->valor("ip");
				$obj["sessao"] = $dbq->valor("sessao");
				$obj["datahora"] = $dbq->valor("datahora");
				$obj["datahora_login"] = $dbq->valor("datahora_login");
				$obj["datahora_logout"] = $dbq->valor("datahora_logout");
				$obj["id_app_usuario"] = $dbq->valor("id_app_usuario");
				$obj["nome"] = $dbq->valor("nome");
				$obj["email"] = $dbq->valor("email");
				$obj["login"] = $dbq->valor("login");
				$objs[ $i ] = $obj; 
				$i++; 
			} 
			 
			$dbq->desconectar(); unset($dbq); 
			 
			return $objs; 
		}
		
		public static function _DescricaoByAcao($Acao){
			switch ($Acao){
				case AppLogonHistoricoLog::_Add() : return "Cadastro";
				case AppLogonHistoricoLog::_Edit() : return "Ediчуo";
				case AppLogonHistoricoLog::_List() : return "Listagem";
				case AppLogonHistoricoLog::_Remove() : return "Remoчуo";
				case AppLogonHistoricoLog::_View() : return "Visualizar";
				case AppLogonHistoricoLog::_Operation() : return "Operaчуo";
				case AppLogonHistoricoLog::_Priority() : return "Prioridade";
				case AppLogonHistoricoLog::_Export() : return "Exportar";
			}
			return "---";
		}
		
	}
?>