<? 
	class ArquivoManage2 extends ArquivoManage {
	    
	    public static function Interacao_Email(Arquivo $objArquivo){
	        $sql = sprintf(
	            'SELECT 
                  tb_usuario.*
                FROM
                  tb_usuario
                WHERE
                  tb_usuario.id_usuario IN (SELECT tb_usuario.id_usuario FROM tb_arquivo_historico INNER JOIN tb_usuario ON (tb_arquivo_historico.id_usuario_responsavel = tb_usuario.id_usuario) WHERE tb_arquivo_historico.id_arquivo = %1$s) OR 
                  tb_usuario.id_usuario IN (SELECT tb_usuario.id_usuario FROM tb_arquivo_historico INNER JOIN tb_usuario ON (tb_arquivo_historico.id_usuario = tb_usuario.id_usuario) WHERE tb_arquivo_historico.id_arquivo = %1$s)'
	           , $objArquivo->getIdArquivo()     
	        );
            $objUsuario = new Usuario();
            $itens = $objUsuario->consultar(array("__sql"=>$sql));

            foreach ($itens as $usuario) {
                $mail = new Email(CurrentSite::Site());
                $mail->Arquivo_Interacao($usuario, $objArquivo);
            }
	    }
	    
	}
?>