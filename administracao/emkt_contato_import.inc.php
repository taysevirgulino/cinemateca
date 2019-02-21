<?
	$link_add = "emkt_contato_import.php";
	$link_edit = "emkt_contato_import.php";
	$link_remove = "emkt_contato_import.php";
	$link_list = "emkt_contato_import.php";

	$frm_texto = System::_POST("FrmTexto");
	$frm_file = $_FILES["FrmFile"];
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	$frm_qtd_listas = intval($_POST["qtdListas"]);
	$vlistas = array(); $vi = 0;
	for($i=0; $i < $frm_qtd_listas; $i++){
		$value = intval($_POST["rbLista".$i]);
		if(!empty($value)){
			$vlistas[$vi] = $value;
			$vi++;
		}
	}

	if ( ! Validacao::isVazio($frm_bt) ){
		
		if( count($vlistas) <= 0 ){
			$label_alerta_erro .="Selecione no mínimo uma lista.#";
		}
		
		$Mailing1 = array();
		
		if( ! Validacao::isVazio($frm_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_file, "files/mailing/$prename", 3)){
				$filename = "files/mailing/".$prename.$upload->getName();
				
				$handle = @fopen($filename, "r");
				$buffer = "";
				if ($handle) {
				    while (!feof($handle)) {
				    	$buffer .= trim(fgets($handle, 4096))."; ";
				    }
				    fclose($handle);
				}

				$Mailing1 = EmktEmail::EmailsByString(strtolower($buffer));
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}		
		
		$Mailing2 = EmktEmail::EmailsByString($frm_texto);
		
		$Mailing = array_merge($Mailing1, $Mailing2);
		
		if( Validacao::isVazio($label_alerta_erro) ){
			
			$cont = 0;
			for ($i=0; $i < count($Mailing); $i++){
				$obj = new EmktContato();
				$obj->setEmktContato(-1, null, "", trim($Mailing[$i]), 1);
				if($obj->inserirEmktContato()){
					for($j=0; $j < count($vlistas); $j++){
						EmktContatoListaManage::inserirEmktContatoLista(-1, null, $obj->getIdEmktContato(), $vlistas[$j]);
					}
					$cont++;
				}
			}
			
			System::AlertRedirect("- Foram importados $cont e-mails;", "emkt_contato_list.php");
			
		}
	}
?>