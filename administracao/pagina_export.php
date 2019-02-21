<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = PaginaManage::consultarPagina(3, SearchMounter::MounterByQueryComparerOrder(PaginaAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados Pagina")
								 ->setSubject("Dados Pagina")
								 ->setDescription("Dados Pagina")
								 ->setKeywords("Dados Pagina")
								 ->setCategory("Pagina");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("C�digo P�gina"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("P�gina"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Slug"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("T�tulo"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Resumo"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("Texto"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("H1", utf8_encode("Imagem"));
	$objPHPExcel->getActiveSheet()->getStyle("H1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("I1", utf8_encode("Filhos Exibir"));
	$objPHPExcel->getActiveSheet()->getStyle("I1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("J1", utf8_encode("Filhos T�tulo"));
	$objPHPExcel->getActiveSheet()->getStyle("J1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("K1", utf8_encode("Data/Hora"));
	$objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("L1", utf8_encode("Prioridade"));
	$objPHPExcel->getActiveSheet()->getStyle("L1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("M1", utf8_encode("Status"));
	$objPHPExcel->getActiveSheet()->getStyle("M1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_pagina"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$ValuePagina = PaginaManage::buscarPagina(1, $vobj[$i]["id_pagina"]);
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($ValuePagina["titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($vobj[$i]["slug"]));
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($vobj[$i]["titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["resumo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode(System::_TextByHtml($vobj[$i]["texto"])));
		$objPHPExcel->getActiveSheet()->setCellValue("H".($i+2), utf8_encode($vobj[$i]["imagem"]));
		$objPHPExcel->getActiveSheet()->setCellValue("I".($i+2), utf8_encode($vobj[$i]["filhos_exibir"]));
		$objPHPExcel->getActiveSheet()->setCellValue("J".($i+2), utf8_encode($vobj[$i]["filhos_titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("K".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("L".($i+2), utf8_encode($vobj[$i]["prioridade"]));
		$objPHPExcel->getActiveSheet()->setCellValue("M".($i+2), utf8_encode((($vobj[$i]["status"]==1) ? "Ativo" : "Inativo")));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

	$fileName = "Pagina_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	$objWriter->save("php://output");
?>