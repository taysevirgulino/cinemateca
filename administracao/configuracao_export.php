<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = ConfiguracaoManage::consultarConfiguracao(3, SearchMounter::MounterByQueryComparerOrder(ConfiguracaoAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados Configuracao")
								 ->setSubject("Dados Configuracao")
								 ->setDescription("Dados Configuracao")
								 ->setKeywords("Dados Configuracao")
								 ->setCategory("Configuracao");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("Código Configuração"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("Nome"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Número"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("Cargo"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Estado"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("Slogan"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("H1", utf8_encode("Partido"));
	$objPHPExcel->getActiveSheet()->getStyle("H1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("I1", utf8_encode("Coligação"));
	$objPHPExcel->getActiveSheet()->getStyle("I1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("J1", utf8_encode("Cnpj"));
	$objPHPExcel->getActiveSheet()->getStyle("J1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("K1", utf8_encode("E-mail"));
	$objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("L1", utf8_encode("Telefone"));
	$objPHPExcel->getActiveSheet()->getStyle("L1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("M1", utf8_encode("Endereço Completo"));
	$objPHPExcel->getActiveSheet()->getStyle("M1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("N1", utf8_encode("Rodape"));
	$objPHPExcel->getActiveSheet()->getStyle("N1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("N")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("O1", utf8_encode("Twitter Status"));
	$objPHPExcel->getActiveSheet()->getStyle("O1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("P1", utf8_encode("Twitter Username"));
	$objPHPExcel->getActiveSheet()->getStyle("P1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Q1", utf8_encode("Twitter Password"));
	$objPHPExcel->getActiveSheet()->getStyle("Q1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("R1", utf8_encode("Twitter Rss Url (Endereço)"));
	$objPHPExcel->getActiveSheet()->getStyle("R1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("R")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("S1", utf8_encode("Link Twitter"));
	$objPHPExcel->getActiveSheet()->getStyle("S1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("S")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("T1", utf8_encode("Link Orkut"));
	$objPHPExcel->getActiveSheet()->getStyle("T1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("T")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("U1", utf8_encode("Link Youtube"));
	$objPHPExcel->getActiveSheet()->getStyle("U1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("U")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("V1", utf8_encode("Link Facebook"));
	$objPHPExcel->getActiveSheet()->getStyle("V1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("V")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("W1", utf8_encode("Link Flickr"));
	$objPHPExcel->getActiveSheet()->getStyle("W1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("W")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("X1", utf8_encode("Analytics Key"));
	$objPHPExcel->getActiveSheet()->getStyle("X1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("X")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Y1", utf8_encode("Template Topo"));
	$objPHPExcel->getActiveSheet()->getStyle("Y1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Y")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Z1", utf8_encode("Template Conteúdo"));
	$objPHPExcel->getActiveSheet()->getStyle("Z1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Z")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_configuracao"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($vobj[$i]["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($vobj[$i]["numero"]));
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($vobj[$i]["cargo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["estado"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode($vobj[$i]["slogan"]));
		$objPHPExcel->getActiveSheet()->setCellValue("H".($i+2), utf8_encode($vobj[$i]["partido"]));
		$objPHPExcel->getActiveSheet()->setCellValue("I".($i+2), utf8_encode($vobj[$i]["coligacao"]));
		$objPHPExcel->getActiveSheet()->setCellValue("J".($i+2), utf8_encode($vobj[$i]["cnpj"]));
		$objPHPExcel->getActiveSheet()->setCellValue("K".($i+2), utf8_encode($vobj[$i]["email"]));
		$objPHPExcel->getActiveSheet()->setCellValue("L".($i+2), utf8_encode($vobj[$i]["telefone"]));
		$objPHPExcel->getActiveSheet()->setCellValue("M".($i+2), utf8_encode($vobj[$i]["endereco_completo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("N".($i+2), utf8_encode(System::_TextByHtml($vobj[$i]["rodape"])));
		$objPHPExcel->getActiveSheet()->setCellValue("O".($i+2), utf8_encode((($vobj[$i]["twitter_status"]==1) ? "Ativo" : "Inativo")));
		$objPHPExcel->getActiveSheet()->setCellValue("P".($i+2), utf8_encode($vobj[$i]["twitter_username"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Q".($i+2), utf8_encode($vobj[$i]["twitter_password"]));
		$objPHPExcel->getActiveSheet()->setCellValue("R".($i+2), utf8_encode($vobj[$i]["twitter_rss_url"]));
		$objPHPExcel->getActiveSheet()->setCellValue("S".($i+2), utf8_encode($vobj[$i]["link_twitter"]));
		$objPHPExcel->getActiveSheet()->setCellValue("T".($i+2), utf8_encode($vobj[$i]["link_orkut"]));
		$objPHPExcel->getActiveSheet()->setCellValue("U".($i+2), utf8_encode($vobj[$i]["link_youtube"]));
		$objPHPExcel->getActiveSheet()->setCellValue("V".($i+2), utf8_encode($vobj[$i]["link_facebook"]));
		$objPHPExcel->getActiveSheet()->setCellValue("W".($i+2), utf8_encode($vobj[$i]["link_flickr"]));
		$objPHPExcel->getActiveSheet()->setCellValue("X".($i+2), utf8_encode($vobj[$i]["analytics_key"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Y".($i+2), utf8_encode($vobj[$i]["template_topo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Z".($i+2), utf8_encode($vobj[$i]["template_conteudo"]));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

	$fileName = "Configuracao_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	$objWriter->save("php://output");
?>