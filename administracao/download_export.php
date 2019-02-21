<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = DownloadManage::consultarDownload(3, SearchMounter::MounterByQueryComparerOrder(DownloadAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados Download")
								 ->setSubject("Dados Download")
								 ->setDescription("Dados Download")
								 ->setKeywords("Dados Download")
								 ->setCategory("Download");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("Código Download"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("Download Categoria"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Nome"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("Descrição"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Arquivo"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("Imagem"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("H1", utf8_encode("Click"));
	$objPHPExcel->getActiveSheet()->getStyle("H1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("I1", utf8_encode("Data/Hora"));
	$objPHPExcel->getActiveSheet()->getStyle("I1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("J1", utf8_encode("Prioridade"));
	$objPHPExcel->getActiveSheet()->getStyle("J1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("K1", utf8_encode("Status"));
	$objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_download"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$ValueDownloadCategoria = DownloadCategoriaManage::buscarDownloadCategoria(1, $vobj[$i]["id_download_categoria"]);
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($ValueDownloadCategoria["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($vobj[$i]["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($vobj[$i]["descricao"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["arquivo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode($vobj[$i]["imagem"]));
		$objPHPExcel->getActiveSheet()->setCellValue("H".($i+2), utf8_encode($vobj[$i]["click"]));
		$objPHPExcel->getActiveSheet()->setCellValue("I".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("J".($i+2), utf8_encode($vobj[$i]["prioridade"]));
		$objPHPExcel->getActiveSheet()->setCellValue("K".($i+2), utf8_encode((($vobj[$i]["status"]==1) ? "Ativo" : "Inativo")));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

	$fileName = "Download_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	$objWriter->save("php://output");
?>