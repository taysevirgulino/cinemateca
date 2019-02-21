<?
	require_once("config.inc.php");
	require_once("logon.inc.php");
	require_once "plugins/PHPExcel/PHPExcel.php";
	require_once "plugins/PHPExcel/PHPExcel/IOFactory.php";
	require_once "plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";

	$export_ide = System::_REQUEST("ide");
	$export = $_SESSION[$export_ide];

	if(empty($export)){ System::Redirect("index.php"); }

	$vobj = LojistaPessoaManage::consultarLojistaPessoa(3, SearchMounter::MounterByQueryComparerOrder(LojistaPessoaAttribute::_Table(), $export["SearchQueryComparerCollection"], $export["SearchQueryOrderCollection"]));

	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("ArtemSite")
								 ->setLastModifiedBy("ArtemSite")
								 ->setTitle("Dados LojistaPessoa")
								 ->setSubject("Dados LojistaPessoa")
								 ->setDescription("Dados LojistaPessoa")
								 ->setKeywords("Dados LojistaPessoa")
								 ->setCategory("LojistaPessoa");

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

	$objPHPExcel->getActiveSheet()->setCellValue("A1", utf8_encode("Código Lojista Pessoa"));
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("B1", utf8_encode("Identificador"));
	$objPHPExcel->getActiveSheet()->getStyle("B1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("C1", utf8_encode("Lojista"));
	$objPHPExcel->getActiveSheet()->getStyle("C1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("D1", utf8_encode("Lojista Pessoa Perfil"));
	$objPHPExcel->getActiveSheet()->getStyle("D1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("E1", utf8_encode("Usuário"));
	$objPHPExcel->getActiveSheet()->getStyle("E1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("F1", utf8_encode("Nome"));
	$objPHPExcel->getActiveSheet()->getStyle("F1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("G1", utf8_encode("E-mail"));
	$objPHPExcel->getActiveSheet()->getStyle("G1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("H1", utf8_encode("E-mail2"));
	$objPHPExcel->getActiveSheet()->getStyle("H1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("I1", utf8_encode("Telefone"));
	$objPHPExcel->getActiveSheet()->getStyle("I1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("J1", utf8_encode("Telefone2"));
	$objPHPExcel->getActiveSheet()->getStyle("J1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("K1", utf8_encode("Endereço"));
	$objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("L1", utf8_encode("Cidade"));
	$objPHPExcel->getActiveSheet()->getStyle("L1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("M1", utf8_encode("Estado"));
	$objPHPExcel->getActiveSheet()->getStyle("M1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("N1", utf8_encode("Cep"));
	$objPHPExcel->getActiveSheet()->getStyle("N1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("N")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("O1", utf8_encode("Observações"));
	$objPHPExcel->getActiveSheet()->getStyle("O1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("O")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("P1", utf8_encode("Receber E-mail"));
	$objPHPExcel->getActiveSheet()->getStyle("P1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("P")->setAutoSize(true);

	$objPHPExcel->getActiveSheet()->setCellValue("Q1", utf8_encode("Status"));
	$objPHPExcel->getActiveSheet()->getStyle("Q1")->applyFromArray($styleTitulo);
	$objPHPExcel->getActiveSheet()->getColumnDimension("Q")->setAutoSize(true);


	for ($i = 0; $i < count($vobj); $i++) {
		$objPHPExcel->getActiveSheet()->setCellValue("A".($i+2), utf8_encode($vobj[$i]["id_lojista_pessoa"]));
		$objPHPExcel->getActiveSheet()->setCellValue("B".($i+2), utf8_encode($vobj[$i]["identificador"]));
		$ValueLojista = LojistaManage::buscarLojista(1, $vobj[$i]["id_lojista"]);
		$objPHPExcel->getActiveSheet()->setCellValue("C".($i+2), utf8_encode($ValueLojista["nome"]));
		$ValueLojistaPessoaPerfil = LojistaPessoaPerfilManage::buscarLojistaPessoaPerfil(1, $vobj[$i]["id_lojista_pessoa_perfil"]);
		$objPHPExcel->getActiveSheet()->setCellValue("D".($i+2), utf8_encode($ValueLojistaPessoaPerfil["titulo"]));
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $vobj[$i]["id_usuario"]);
		$objPHPExcel->getActiveSheet()->setCellValue("E".($i+2), utf8_encode($ValueUsuario["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("F".($i+2), utf8_encode($vobj[$i]["nome"]));
		$objPHPExcel->getActiveSheet()->setCellValue("G".($i+2), utf8_encode($vobj[$i]["email"]));
		$objPHPExcel->getActiveSheet()->setCellValue("H".($i+2), utf8_encode($vobj[$i]["email2"]));
		$objPHPExcel->getActiveSheet()->setCellValue("I".($i+2), utf8_encode($vobj[$i]["telefone"]));
		$objPHPExcel->getActiveSheet()->setCellValue("J".($i+2), utf8_encode($vobj[$i]["telefone2"]));
		$objPHPExcel->getActiveSheet()->setCellValue("K".($i+2), utf8_encode($vobj[$i]["endereco"]));
		$objPHPExcel->getActiveSheet()->setCellValue("L".($i+2), utf8_encode($vobj[$i]["cidade"]));
		$objPHPExcel->getActiveSheet()->setCellValue("M".($i+2), utf8_encode($vobj[$i]["estado"]));
		$objPHPExcel->getActiveSheet()->setCellValue("N".($i+2), utf8_encode($vobj[$i]["cep"]));
		$objPHPExcel->getActiveSheet()->setCellValue("O".($i+2), utf8_encode(System::_TextByHtml($vobj[$i]["observacoes"])));
		$objPHPExcel->getActiveSheet()->setCellValue("P".($i+2), utf8_encode($vobj[$i]["receber_email"]));
		$objPHPExcel->getActiveSheet()->setCellValue("Q".($i+2), utf8_encode((($vobj[$i]["status"]==1) ? "Ativo" : "Inativo")));
	}

	$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);
	$objPHPExcel->getActiveSheet()->setAutoFilter( $objPHPExcel->getActiveSheet()->calculateWorksheetDimension() );

	$fileName = "LojistaPessoa_".date("d-m-Y_H-i-s").".xlsx";
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header("Content-Disposition: attachment;filename=\"$fileName\"");
	header("Cache-Control: max-age=0");
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
	ob_end_clean();
	$objWriter->save("php://output");
?>