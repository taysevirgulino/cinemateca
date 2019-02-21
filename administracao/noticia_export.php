<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = NoticiaManage::consultarNoticia(3, SearchMounter::MounterByQueryComparerOrder(NoticiaAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados Noticia")
								 ->setSubject("Dados Noticia")
								 ->setDescription("Dados Noticia")
								 ->setKeywords("Dados Noticia")
								 ->setCategory("Noticia");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("Código Notícia"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("Editoria"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Área Publicação"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("App Usuário Cadastro"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("App Usuário Edição"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("Chapéu"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("H1", utf8_encode("Título"));
	$objPHPExcel->getActiveSheet()->getStyle("H1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("I1", utf8_encode("Resumo"));
	$objPHPExcel->getActiveSheet()->getStyle("I1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("J1", utf8_encode("Texto"));
	$objPHPExcel->getActiveSheet()->getStyle("J1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("K1", utf8_encode("Link"));
	$objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("L1", utf8_encode("Link Abrir"));
	$objPHPExcel->getActiveSheet()->getStyle("L1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("M1", utf8_encode("Foto Crédito"));
	$objPHPExcel->getActiveSheet()->getStyle("M1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("N1", utf8_encode("Foto Descrição"));
	$objPHPExcel->getActiveSheet()->getStyle("N1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("N")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("O1", utf8_encode("Foto Arquivo"));
	$objPHPExcel->getActiveSheet()->getStyle("O1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("P1", utf8_encode("Foto Área Publicação"));
	$objPHPExcel->getActiveSheet()->getStyle("P1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Q1", utf8_encode("Click"));
	$objPHPExcel->getActiveSheet()->getStyle("Q1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("R1", utf8_encode("Slug"));
	$objPHPExcel->getActiveSheet()->getStyle("R1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("R")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("S1", utf8_encode("Url (Endereço) Curta"));
	$objPHPExcel->getActiveSheet()->getStyle("S1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("S")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("T1", utf8_encode("Data/Hora"));
	$objPHPExcel->getActiveSheet()->getStyle("T1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("T")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("U1", utf8_encode("Data/Hora Cadastro"));
	$objPHPExcel->getActiveSheet()->getStyle("U1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("U")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("V1", utf8_encode("Data/Hora Edição"));
	$objPHPExcel->getActiveSheet()->getStyle("V1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("V")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("W1", utf8_encode("Tipo"));
	$objPHPExcel->getActiveSheet()->getStyle("W1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("W")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("X1", utf8_encode("Status"));
	$objPHPExcel->getActiveSheet()->getStyle("X1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("X")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_noticia"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$ValueEditoria = EditoriaManage::buscarEditoria(1, $vobj[$i]["id_editoria"]);
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($ValueEditoria["nome"]));
		$ValueAreaPublicacao = AreaPublicacaoManage::buscarAreaPublicacao(1, $vobj[$i]["id_area_publicacao"]);
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($ValueAreaPublicacao["nome"]));
		$ValueAppUsuario = AppUsuarioManage::buscarAppUsuario(1, $vobj[$i]["id_app_usuario"]);
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($ValueAppUsuario["nome"]));
		$ValueAppUsuario = AppUsuarioManage::buscarAppUsuario(1, $vobj[$i]["id_app_usuario"]);
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($ValueAppUsuario["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode($vobj[$i]["chapeu"]));
		$objPHPExcel->getActiveSheet()->setCellValue("H".($i+2), utf8_encode($vobj[$i]["titulo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("I".($i+2), utf8_encode(System::_TextByHtml($vobj[$i]["resumo"])));
		$objPHPExcel->getActiveSheet()->setCellValue("J".($i+2), utf8_encode(System::_TextByHtml($vobj[$i]["texto"])));
		$objPHPExcel->getActiveSheet()->setCellValue("K".($i+2), utf8_encode($vobj[$i]["link"]));
		$objPHPExcel->getActiveSheet()->setCellValue("L".($i+2), utf8_encode($vobj[$i]["link_target"]));
		$objPHPExcel->getActiveSheet()->setCellValue("M".($i+2), utf8_encode($vobj[$i]["foto_credito"]));
		$objPHPExcel->getActiveSheet()->setCellValue("N".($i+2), utf8_encode($vobj[$i]["foto_descricao"]));
		$objPHPExcel->getActiveSheet()->setCellValue("O".($i+2), utf8_encode($vobj[$i]["foto_arquivo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("P".($i+2), utf8_encode($vobj[$i]["foto_area_publicacao"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Q".($i+2), utf8_encode($vobj[$i]["click"]));
		$objPHPExcel->getActiveSheet()->setCellValue("R".($i+2), utf8_encode($vobj[$i]["slug"]));
		$objPHPExcel->getActiveSheet()->setCellValue("S".($i+2), utf8_encode($vobj[$i]["url_curta"]));
		$objPHPExcel->getActiveSheet()->setCellValue("T".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("U".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora_cadastro"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("V".($i+2), utf8_encode(System::FormatarData($vobj[$i]["datahora_edicao"], "d/m/Y H:i:s")));
		$objPHPExcel->getActiveSheet()->setCellValue("W".($i+2), utf8_encode($vobj[$i]["tipo"]));
		$objPHPExcel->getActiveSheet()->setCellValue("X".($i+2), utf8_encode((($vobj[$i]["status"]==1) ? "Ativo" : "Inativo")));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);

	$fileName = "Noticia_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	$objWriter->save("php://output");
?>