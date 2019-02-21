<?php
	require_once("config.inc.php");

	/* executar no final do dia */
	documentos(); 
	fotos(); 
	
	function documentos(){
	    $sql = "SELECT 
                  tb_documento.id_empreendimento,
                  COUNT(tb_documento.id_documento) AS documentos
                FROM
                  tb_documento
                WHERE
                  tb_documento.`status` = 1 AND 
                  tb_documento.datahora LIKE '".date("Y-m-d")."%'
                GROUP BY
                  tb_documento.id_empreendimento";
	    
	    
	    $adapter = Config::getAdapterService("Documento");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute();
		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);
	    
	    foreach ($itens as $value) {
	        $objEmpreendimento = new Empreendimento();
	        $objEmpreendimento->_setData( $value );
	        
	        $idsUsuario = MensagemManage2::Usuarios_Empreendimento($objEmpreendimento);
	         
	        foreach ($idsUsuario as $idUsuario) {
	            $usuario = new Usuario();
	            if( $usuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $idUsuario) ){
	                $mail = new Email(CurrentSite::Site());
	                $mail->Documento_Novos($usuario, $value['documentos']);
	            }
	        }
	    }
	    
	}
	
	function fotos(){
	    $sql = "SELECT 
                  tb_foto.id_lojista,
                  COUNT(tb_foto.id_foto) AS fotos
                FROM
                  tb_foto
                WHERE
                  tb_foto.`status` = 1 AND 
                  tb_foto.datahora LIKE '".date("Y-m-d")."%'
                GROUP BY
                  tb_foto.id_lojista";
	    
	    
	    $adapter = Config::getAdapterService("Foto");
		$prepare = $adapter->getConnection()->prepare($sql);
		$result = $prepare->execute();
		$itens = $prepare->fetchAll(PDO::FETCH_ASSOC);
	    
	    foreach ($itens as $value) {
	        $objLojista = new Lojista();
	        $objLojista->buscarAttribute(LojistaAttribute::IdLojista(), $value['id_lojista']);
	        
	        $idsUsuario = MensagemManage2::Usuarios_Lojista($objLojista);
	         
	        foreach ($idsUsuario as $idUsuario) {
	            $usuario = new Usuario();
	            if( $usuario->buscarAttribute(UsuarioAttribute::IdUsuario(), $idUsuario) ){
	                $mail = new Email(CurrentSite::Site());
	                $mail->Foto_Novas($usuario, $objLojista, $value['fotos']);
	            }
	        }
	    }
	    
	}