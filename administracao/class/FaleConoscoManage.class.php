<? 
	class FaleConoscoManage extends AbstractEntityManage implements EntityManageInterface {
		
		public static function QuantidadeHoje(){
			$query = SearchMounter::Query(
				FaleConoscoAttribute::_Table(),
				array(
					new SearchQueryComparer(FaleConoscoAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), date("Y-m-d 00:00:00")),
					new SearchQueryComparer(FaleConoscoAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), date("Y-m-d 23:59:59")),
				)
			);
			return FaleConoscoManage::count($query);
		}
		
		public static function QuantidadeStatus($status){
			$query = SearchMounter::Query(
				FaleConoscoAttribute::_Table(),
				array(
					new SearchQueryComparer(FaleConoscoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), $status),
				)
			);
			return FaleConoscoManage::count($query);
		}
		
		public static function Enviar( $post ){
			$error = array();
			$success = array();
			
			$frm_id_fale_conosco_assunto = System::_QueryString($post["FrmIdFaleConoscoAssunto"]);
			$frm_nome = utf8_decode(System::_QueryString($post["FrmNome"]));
			$frm_email = System::_QueryString($post["FrmEmail"]);
			$frm_telefone = System::_QueryString($post["FrmTelefone"]);
			$frm_cidade = System::_QueryString($post["FrmCidade"]);
			$frm_estado = System::_QueryString($post["FrmEstado"]);
			$frm_mensagem = utf8_decode(System::_QueryString($post["FrmMensagem"]));
			$frm_datahora = date("Y-m-d H:i:s");
			$frm_status = 0;
			$frm_bt = System::_QueryString($post["btSubmit"]);
			
			if( !Validacao::isVazio($frm_nome) ){
			
				if( $frm_id_fale_conosco_assunto == 0 ){
					$error[] = "Preencha a Área de Interesse";
				}
				if( Validacao::isVazio($frm_nome) ){
					$error[] = "Preencha o Nome";
				}
				if( Validacao::isVazio($frm_email) ){
					$error[] = "Preencha o E-mail";
				}
				if( Validacao::isVazio($frm_telefone) ){
					$error[] = "Preencha o Telefone";
				}
				if( Validacao::isVazio($frm_mensagem) ){
					$error[] = "Preencha a Mensagem";
				}
			
				if( count($error) <= 0 ){
			
					$obj = new FaleConosco();
					$obj->setFaleConosco(-1, null, null, $frm_id_fale_conosco_assunto, $frm_nome, $frm_email, $frm_telefone, $frm_cidade, $frm_estado, $frm_mensagem, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status);
					if($obj->inserirFaleConosco()){
			
						$_Email = new Email( CurrentSite::Site() );
						$_Email->FaleConosco($obj);
			
						$success[] = "Sua mensagem foi enviada com sucesso. Aguarde nosso contato.";
					}else{
						$error[] = "Problema ao enviar mensagem, tente novamente daqui alguns minutos";
					}
				}
			}
			
			if( count($error) > 0){
				return array(
					"status" => 0,
					"aviso" => utf8_encode(implode("; ", $error))
				);
			}else{
				return array(
					"status" => 0,
					"aviso" => utf8_encode(implode(" ", $success))
				);
			}
			
		}
	}
?>