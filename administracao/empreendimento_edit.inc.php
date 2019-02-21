<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "empreendimento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "empreendimento_add.php?back=$link_back";
	$link_edit = "empreendimento_edit.php?id=$ID&back=$link_back";
	$link_remove = "empreendimento_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Empreendimento();
	if(!$obj->buscarEmpreendimento(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_endereco = System::_POST("FrmEndereco");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_email = System::_POST("FrmEmail");
	$frm_area_bruta_locavel = System::_POST("FrmAreaBrutaLocavel");
	$frm_area_total_construida = System::_POST("FrmAreaTotalConstruida");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setTitulo( $frm_titulo ); 
			$obj->setEndereco( $frm_endereco ); 
			$obj->setTelefone( $frm_telefone ); 
			$obj->setEmail( $frm_email ); 
			$obj->setAreaBrutaLocavel( System::ConverterDouble($frm_area_bruta_locavel) ); 
			$obj->setAreaTotalConstruida( System::ConverterDouble($frm_area_total_construida) ); 
			$obj->setStatus( $frm_status ); 

			if($obj->alterarEmpreendimento()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_endereco = $obj->getEndereco();
		$frm_telefone = $obj->getTelefone();
		$frm_email = $obj->getEmail();
		$frm_area_bruta_locavel = System::FormatarValor($obj->getAreaBrutaLocavel());
		$frm_area_total_construida = System::FormatarValor($obj->getAreaTotalConstruida());
		$frm_status = $obj->getStatus();
	}
?>