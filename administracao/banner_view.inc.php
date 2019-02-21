<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "banner_add.php";
	$link_edit = "banner_edit.php?id=$ID";
	$link_remove = "banner_remove.php?id=$ID";
	$link_list = "banner_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Banner();

	if( $obj->buscarBanner(1, $ID) ){
		$ValueBannerLocal = BannerLocalManage::buscarBannerLocal(1, $obj->getIdBannerLocal());
		$frm_id_banner_local = $ValueBannerLocal["nome"];
		$frm_descricao = $obj->getDescricao();
		$frm_url = $obj->getUrl();
		$frm_target = (($obj->getTarget()=='_blank') ? "Nova Página" : "Mesma Página");
		$frm_width = $obj->getWidth();
		$frm_height = $obj->getHeight();
		$frm_periodo_status = (($obj->getPeriodoStatus()==1) ? "Ativo" : "Inativo");
		$frm_periodo_inicial = System::FormatarData($obj->getPeriodoInicial(), "d/m/y");
		$frm_periodo_final = System::FormatarData($obj->getPeriodoFinal(), "d/m/y");
		$frm_arquivo = BannerTipo::Src("../files/publicidade/".$obj->getArquivo(), $obj->getWidth(), $obj->getHeight());
		$frm_tipo = BannerTipo::_Descricao($obj->getTipo());
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
		
		$frm_link = Url::Banner($obj->getIdBanner(), $obj->getIdentificador(), $obj->getDescricao());
	}else{
		System::Redirect($link_list);
	}
?>