<?
	$IDA = intval(System::_REQUEST("ida"));
	$objAlbum = new GaleriaAlbum();
	if(!$objAlbum->buscarGaleriaAlbum(1, $IDA)){ System::Redirect("galeria_album_list.php"); }
	$album_label = $objAlbum->getNome();

	$ID = intval( System::_REQUEST("id") );
	$link_add = "galeria_foto_add.php?ida=$IDA";
	$link_edit = "galeria_foto_edit.php?id=$ID&ida=$IDA";
	$link_remove = "galeria_foto_remove.php?id=$ID&ida=$IDA";
	$link_list = "galeria_foto_list.php?ida=$IDA";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new GaleriaFoto();
	if(!$obj->buscarGaleriaFoto(1, $ID)){ System::Redirect($link_list); }

	$frm_id_galeria_album = $obj->getIdGaleriaAlbum();
	$frm_credito = System::_POST("FrmCredito");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_foto_file = $_FILES["FrmFotoFile"];
	$frm_prioridade = $obj->getPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_galeria_album) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Galeria Сlbum#";
		}
		$frm_foto = $obj->getFoto();
		if( ! Validacao::isVazio($frm_foto_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_foto_file, "../images/galeria/$prename", 2)){
				$frm_foto = $prename.$upload->getName();
				$i = new Imagem();
				$i->carregarImagem("../images/galeria/$frm_foto");
				
				$i->salvarImagemByPorcentagemWidth(640, "../images/galeria/A$frm_foto");
				$i->salvarImagemByCorte(160, 160, "../images/galeria/B$frm_foto");
				if( ($i->getImagemWidth() > 700) ){
					$i->salvarImagemByPorcentagemWidth(700, "../images/galeria/$frm_foto");
				}
				
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(GaleriaFotoManage::alterarGaleriaFoto($ID, null, null, $frm_id_galeria_album, $frm_credito, $frm_descricao, $frm_foto, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_galeria_album = $obj->getIdGaleriaAlbum();
		$frm_credito = $obj->getCredito();
		$frm_descricao = $obj->getDescricao();
		$frm_foto = $obj->getFoto();
	}
?>