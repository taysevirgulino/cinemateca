<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = ArtigoArticulistaManage::consultarArtigoArticulista(3, SearchMounter::MounterByQueryComparerOrder(ArtigoArticulistaAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados ArtigoArticulista")
								 ->setSubject("Dados ArtigoArticulista")
								 ->setDescription("Dados ArtigoArticulista")
								 ->setKeywords("Dados ArtigoArticulista")
								 ->setCategory("ArtigoArticulista");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("Código Artigo Articulista"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("Nome"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Perfil"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("E-mail"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Telefone"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("Foto"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_artigo_articulista"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($vobj[$i]["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode(System::_TextByHtml($vobj[$i]["perfil"])));
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($vobj[$i]["email"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["telefone"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode($vobj[$i]["foto"]));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

	$fileName = "ArtigoArticulista_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	$objWriter->save("php://output");
?>