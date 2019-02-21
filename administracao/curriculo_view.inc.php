<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_add.php?back=$link_back";
	$link_edit = "curriculo_edit.php?id=$ID&back=$link_back";
	$link_remove = "curriculo_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Curriculo();

	if( $obj->buscarCurriculo(1, $ID) ){
		$ValueEmpreendimento = EmpreendimentoManage::buscarEmpreendimento(1, $obj->getIdEmpreendimento());
		$frm_id_empreendimento = $ValueEmpreendimento["titulo"];
		$ValueCurriculoArea = CurriculoAreaManage::buscarCurriculoArea(1, $obj->getIdCurriculoArea());
		$frm_id_curriculo_area = $ValueCurriculoArea["titulo"];
		$ValueCurriculoSegmento = CurriculoSegmentoManage::buscarCurriculoSegmento(1, $obj->getIdCurriculoSegmento());
		$frm_id_curriculo_segmento = $ValueCurriculoSegmento["titulo"];
		$frm_nome = $obj->getNome();
		$frm_sobrenome = $obj->getSobrenome();
		$frm_sexo = $obj->getSexo();
		$frm_data_nascimento = System::FormatarData($obj->getDataNascimento(), "d/m/y");
		$frm_cpf = $obj->getCpf();
		$frm_estado_civil = $obj->getEstadoCivil();
		$frm_telefone = $obj->getTelefone();
		$frm_telefone2 = $obj->getTelefone2();
		$frm_email = $obj->getEmail();
		$frm_endereco = $obj->getEndereco();
		$frm_cidade = $obj->getCidade();
		$frm_estado = $obj->getEstado();
		$frm_imagem = $obj->getImagem();
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>