<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = CronogramaFarolManage::consultarCronogramaFarol(3, SearchMounter::MounterByQueryComparerOrder(CronogramaFarolAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados CronogramaFarol")
								 ->setSubject("Dados CronogramaFarol")
								 ->setDescription("Dados CronogramaFarol")
								 ->setKeywords("Dados CronogramaFarol")
								 ->setCategory("CronogramaFarol");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("C�digo Cronograma Farol"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("T�tulo"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Cor"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("Peso"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Prioridade"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_cronograma_farol"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($vobj[$i]["titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($vobj[$i]["cor"]));
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($vobj[$i]["peso"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["prioridade"]));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);
	$objPHPExcel->getActiveSheet()->setAutoFilter( $objPHPExcel->getActiveSheet()->calculateWorksheetDimension() );

	$fileName = "CronogramaFarol_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	ob_end_clean();
	$objWriter->save("php://output");
?>