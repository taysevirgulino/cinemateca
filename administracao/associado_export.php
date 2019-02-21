<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = AssociadoManage::consultarAssociado(3, SearchMounter::MounterByQueryComparerOrder(AssociadoAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados Associado")
								 ->setSubject("Dados Associado")
								 ->setDescription("Dados Associado")
								 ->setKeywords("Dados Associado")
								 ->setCategory("Associado");

	$objPHPExcel->setActiveSheetIndex(0);

	$styleTitulo = array(
		"font" => array(
			"bold" => true,
		),
		"alignment" => array(
			"horizontal" => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		),
		"borders" => array(
			"bottom" => array(
				"style" => PHPExcel_Style_Border::BORDER_THICK,
				"color" => array("argb" => PHPExcel_Style_Color::COLOR_BLACK),
			),
		)
	);

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("Código Associado"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("Associado Perfil"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Localidade"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("Associado Plano"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Apelido"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("Nome"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("H1", utf8_encode("Cpf"));
	$objPHPExcel->getActiveSheet()->getStyle("H1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("I1", utf8_encode("Sexo"));
	$objPHPExcel->getActiveSheet()->getStyle("I1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("J1", utf8_encode("Data Nascimento"));
	$objPHPExcel->getActiveSheet()->getStyle("J1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("K1", utf8_encode("Estado Civil"));
	$objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("L1", utf8_encode("Rg"));
	$objPHPExcel->getActiveSheet()->getStyle("L1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("M1", utf8_encode("Formação"));
	$objPHPExcel->getActiveSheet()->getStyle("M1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("N1", utf8_encode("Descrição"));
	$objPHPExcel->getActiveSheet()->getStyle("N1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("N")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("O1", utf8_encode("Endereço"));
	$objPHPExcel->getActiveSheet()->getStyle("O1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("P1", utf8_encode("Número"));
	$objPHPExcel->getActiveSheet()->getStyle("P1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Q1", utf8_encode("Complemento"));
	$objPHPExcel->getActiveSheet()->getStyle("Q1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("R1", utf8_encode("Bairro"));
	$objPHPExcel->getActiveSheet()->getStyle("R1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("R")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("S1", utf8_encode("Cep"));
	$objPHPExcel->getActiveSheet()->getStyle("S1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("S")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("T1", utf8_encode("Telefone Fixo"));
	$objPHPExcel->getActiveSheet()->getStyle("T1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("T")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("U1", utf8_encode("Telefone Celular"));
	$objPHPExcel->getActiveSheet()->getStyle("U1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("U")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("V1", utf8_encode("Telefone Comercial"));
	$objPHPExcel->getActiveSheet()->getStyle("V1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("V")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("W1", utf8_encode("Redes"));
	$objPHPExcel->getActiveSheet()->getStyle("W1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("W")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("X1", utf8_encode("Imagem"));
	$objPHPExcel->getActiveSheet()->getStyle("X1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("X")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Y1", utf8_encode("E-mail"));
	$objPHPExcel->getActiveSheet()->getStyle("Y1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Y")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Z1", utf8_encode("Senha"));
	$objPHPExcel->getActiveSheet()->getStyle("Z1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Z")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AA1", utf8_encode("Empresa Nome"));
	$objPHPExcel->getActiveSheet()->getStyle("AA1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AA")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AB1", utf8_encode("Empresa Ramo"));
	$objPHPExcel->getActiveSheet()->getStyle("AB1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AB")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AC1", utf8_encode("Empresa Cnpj"));
	$objPHPExcel->getActiveSheet()->getStyle("AC1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AC")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AD1", utf8_encode("Empresa Natureza"));
	$objPHPExcel->getActiveSheet()->getStyle("AD1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AD")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AE1", utf8_encode("Empresa Cargo"));
	$objPHPExcel->getActiveSheet()->getStyle("AE1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AE")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AF1", utf8_encode("Empresa E-mail"));
	$objPHPExcel->getActiveSheet()->getStyle("AF1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AF")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AG1", utf8_encode("Empresa Site"));
	$objPHPExcel->getActiveSheet()->getStyle("AG1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AG")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AH1", utf8_encode("Empresa Telefone1"));
	$objPHPExcel->getActiveSheet()->getStyle("AH1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AH")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AI1", utf8_encode("Empresa Telefone2"));
	$objPHPExcel->getActiveSheet()->getStyle("AI1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AI")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AJ1", utf8_encode("Empresa Telefone3"));
	$objPHPExcel->getActiveSheet()->getStyle("AJ1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AJ")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AK1", utf8_encode("Empresa Endereço"));
	$objPHPExcel->getActiveSheet()->getStyle("AK1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AK")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AL1", utf8_encode("Empresa Cep"));
	$objPHPExcel->getActiveSheet()->getStyle("AL1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AL")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AM1", utf8_encode("Empresa Imagem"));
	$objPHPExcel->getActiveSheet()->getStyle("AM1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AM")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AN1", utf8_encode("Contratação Id"));
	$objPHPExcel->getActiveSheet()->getStyle("AN1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AN")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AO1", utf8_encode("Contratação Data Inicial"));
	$objPHPExcel->getActiveSheet()->getStyle("AO1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AO")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AP1", utf8_encode("Contratação Data Final"));
	$objPHPExcel->getActiveSheet()->getStyle("AP1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AP")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AQ1", utf8_encode("Newsletter"));
	$objPHPExcel->getActiveSheet()->getStyle("AQ1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AQ")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AR1", utf8_encode("Data/Hora Cadastro"));
	$objPHPExcel->getActiveSheet()->getStyle("AR1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AR")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AS1", utf8_encode("Data/Hora Edição"));
	$objPHPExcel->getActiveSheet()->getStyle("AS1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AS")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AT1", utf8_encode("Data/Hora Login"));
	$objPHPExcel->getActiveSheet()->getStyle("AT1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AT")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("AU1", utf8_encode("Status"));
	$objPHPExcel->getActiveSheet()->getStyle("AU1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("AU")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_associado"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$ValueAssociadoPerfil = AssociadoPerfilManage::buscarAssociadoPerfil(1, $vobj[$i]["id_associado_perfil"]);
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($ValueAssociadoPerfil["titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($vobj[$i]["id_localidade"]));
		$ValueAssociadoPlano = AssociadoPlanoManage::buscarAssociadoPlano(1, $vobj[$i]["id_associado_plano"]);
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($ValueAssociadoPlano["titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["apelido"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode($vobj[$i]["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("H".($i+2), utf8_encode($vobj[$i]["cpf"]));
		$objPHPExcel->getActiveSheet()->setCellValue("I".($i+2), utf8_encode($vobj[$i]["sexo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("J".($i+2), utf8_encode(System::FormatarData($vobj[$i]["data_nascimento"], "d/m/Y")));
		$objPHPExcel->getActiveSheet()->setCellValue("K".($i+2), utf8_encode($vobj[$i]["estado_civil"]));
		$objPHPExcel->getActiveSheet()->setCellValue("L".($i+2), utf8_encode($vobj[$i]["rg"]));
		$objPHPExcel->getActiveSheet()->setCellValue("M".($i+2), utf8_encode($vobj[$i]["formacao"]));
		$objPHPExcel->getActiveSheet()->setCellValue("N".($i+2), utf8_encode(System::_TextByHtml($vobj[$i]["descricao"])));
		$objPHPExcel->getActiveSheet()->setCellValue("O".($i+2), utf8_encode($vobj[$i]["endereco"]));
		$objPHPExcel->getActiveSheet()->setCellValue("P".($i+2), utf8_encode($vobj[$i]["numero"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Q".($i+2), utf8_encode($vobj[$i]["complemento"]));
		$objPHPExcel->getActiveSheet()->setCellValue("R".($i+2), utf8_encode($vobj[$i]["bairro"]));
		$objPHPExcel->getActiveSheet()->setCellValue("S".($i+2), utf8_encode($vobj[$i]["cep"]));
		$objPHPExcel->getActiveSheet()->setCellValue("T".($i+2), utf8_encode($vobj[$i]["telefone_fixo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("U".($i+2), utf8_encode($vobj[$i]["telefone_celular"]));
		$objPHPExcel->getActiveSheet()->setCellValue("V".($i+2), utf8_encode($vobj[$i]["telefone_comercial"]));
		$objPHPExcel->getActiveSheet()->setCellValue("W".($i+2), utf8_encode($vobj[$i]["redes"]));
		$objPHPExcel->getActiveSheet()->setCellValue("X".($i+2), utf8_encode($vobj[$i]["imagem"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Y".($i+2), utf8_encode($vobj[$i]["email"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Z".($i+2), utf8_encode($vobj[$i]["senha"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AA".($i+2), utf8_encode($vobj[$i]["empresa_nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AB".($i+2), utf8_encode($vobj[$i]["empresa_ramo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AC".($i+2), utf8_encode($vobj[$i]["empresa_cnpj"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AD".($i+2), utf8_encode($vobj[$i]["empresa_natureza"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AE".($i+2), utf8_encode($vobj[$i]["empresa_cargo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AF".($i+2), utf8_encode($vobj[$i]["empresa_email"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AG".($i+2), utf8_encode($vobj[$i]["empresa_site"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AH".($i+2), utf8_encode($vobj[$i]["empresa_telefone1"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AI".($i+2), utf8_encode($vobj[$i]["empresa_telefone2"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AJ".($i+2), utf8_encode($vobj[$i]["empresa_telefone3"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AK".($i+2), utf8_encode($vobj[$i]["empresa_endereco"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AL".($i+2), utf8_encode($vobj[$i]["empresa_cep"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AM".($i+2), utf8_encode($vobj[$i]["empresa_imagem"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AN".($i+2), utf8_encode($vobj[$i]["contratacao_id"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AO".($i+2), utf8_encode(System::FormatarData($vobj[$i]["contratacao_data_inicial"], "d/m/Y")));
		$objPHPExcel->getActiveSheet()->setCellValue("AP".($i+2), utf8_encode(System::FormatarData($vobj[$i]["contratacao_data_final"], "d/m/Y")));
		$objPHPExcel->getActiveSheet()->setCellValue("AQ".($i+2), utf8_encode($vobj[$i]["newsletter"]));
		$objPHPExcel->getActiveSheet()->setCellValue("AR".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora_cadastro"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("AS".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora_edicao"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("AT".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora_login"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("AU".($i+2), utf8_encode((($vobj[$i]["status"]==1) ? "Ativo" : "Inativo")));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);
	$objPHPExcel->getActiveSheet()->setAutoFilter( $objPHPExcel->getActiveSheet()->calculateWorksheetDimension() );

	$fileName = "Associado_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	ob_end_clean();
	$objWriter->save("php://output");
?>