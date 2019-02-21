<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = CurriculoManage::consultarCurriculo(3, SearchMounter::MounterByQueryComparerOrder(CurriculoAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados Curriculo")
								 ->setSubject("Dados Curriculo")
								 ->setDescription("Dados Curriculo")
								 ->setKeywords("Dados Curriculo")
								 ->setCategory("Curriculo");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("C�digo Curr�culo"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("Empreendimento"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Curr�culo �rea"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("Curr�culo Segmento"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Nome"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("Sobrenome"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("H1", utf8_encode("Sexo"));
	$objPHPExcel->getActiveSheet()->getStyle("H1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("I1", utf8_encode("Data Nascimento"));
	$objPHPExcel->getActiveSheet()->getStyle("I1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("J1", utf8_encode("Cpf"));
	$objPHPExcel->getActiveSheet()->getStyle("J1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("K1", utf8_encode("Estado Civil"));
	$objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("L1", utf8_encode("Telefone"));
	$objPHPExcel->getActiveSheet()->getStyle("L1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("M1", utf8_encode("Telefone2"));
	$objPHPExcel->getActiveSheet()->getStyle("M1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("N1", utf8_encode("E-mail"));
	$objPHPExcel->getActiveSheet()->getStyle("N1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("N")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("O1", utf8_encode("Endere�o"));
	$objPHPExcel->getActiveSheet()->getStyle("O1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("P1", utf8_encode("Cidade"));
	$objPHPExcel->getActiveSheet()->getStyle("P1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Q1", utf8_encode("Estado"));
	$objPHPExcel->getActiveSheet()->getStyle("Q1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("R1", utf8_encode("Imagem"));
	$objPHPExcel->getActiveSheet()->getStyle("R1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("R")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("S1", utf8_encode("Arquivo"));
	$objPHPExcel->getActiveSheet()->getStyle("S1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("S")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("T1", utf8_encode("Data/Hora"));
	$objPHPExcel->getActiveSheet()->getStyle("T1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("T")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("U1", utf8_encode("Status"));
	$objPHPExcel->getActiveSheet()->getStyle("U1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("U")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_curriculo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$ValueEmpreendimento = EmpreendimentoManage::buscarEmpreendimento(1, $vobj[$i]["id_empreendimento"]);
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($ValueEmpreendimento["titulo"]));
		$ValueCurriculoArea = CurriculoAreaManage::buscarCurriculoArea(1, $vobj[$i]["id_curriculo_area"]);
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($ValueCurriculoArea["titulo"]));
		$ValueCurriculoSegmento = CurriculoSegmentoManage::buscarCurriculoSegmento(1, $vobj[$i]["id_curriculo_segmento"]);
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($ValueCurriculoSegmento["titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode($vobj[$i]["sobrenome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("H".($i+2), utf8_encode($vobj[$i]["sexo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("I".($i+2), utf8_encode(System::FormatarData($vobj[$i]["data_nascimento"], "d/m/Y")));
		$objPHPExcel->getActiveSheet()->setCellValue("J".($i+2), utf8_encode($vobj[$i]["cpf"]));
		$objPHPExcel->getActiveSheet()->setCellValue("K".($i+2), utf8_encode($vobj[$i]["estado_civil"]));
		$objPHPExcel->getActiveSheet()->setCellValue("L".($i+2), utf8_encode($vobj[$i]["telefone"]));
		$objPHPExcel->getActiveSheet()->setCellValue("M".($i+2), utf8_encode($vobj[$i]["telefone2"]));
		$objPHPExcel->getActiveSheet()->setCellValue("N".($i+2), utf8_encode($vobj[$i]["email"]));
		$objPHPExcel->getActiveSheet()->setCellValue("O".($i+2), utf8_encode($vobj[$i]["endereco"]));
		$objPHPExcel->getActiveSheet()->setCellValue("P".($i+2), utf8_encode($vobj[$i]["cidade"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Q".($i+2), utf8_encode($vobj[$i]["estado"]));
		$objPHPExcel->getActiveSheet()->setCellValue("R".($i+2), utf8_encode($vobj[$i]["imagem"]));
		$objPHPExcel->getActiveSheet()->setCellValue("S".($i+2), utf8_encode($vobj[$i]["arquivo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("T".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("U".($i+2), utf8_encode((($vobj[$i]["status"]==1) ? "Ativo" : "Inativo")));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);
	$objPHPExcel->getActiveSheet()->setAutoFilter( $objPHPExcel->getActiveSheet()->calculateWorksheetDimension() );

	$fileName = "Curriculo_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	ob_end_clean();
	$objWriter->save("php://output");
?>