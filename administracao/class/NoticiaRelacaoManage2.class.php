<? 
	class NoticiaRelacaoManage2 extends NoticiaRelacaoManage { 
		
		public static function Noticias_Relacionadas($IdNoticia, $Limit=100){
			return NoticiaManage2::Noticias_Relacionadas($IdNoticia, $Limit);
		}
		
		public static function Gerenciar($IdNoticia, $vNoticiasStr){
			if($IdNoticia <= 0){
				return false;
			}
		
			$obj = new NoticiaRelacao();
			$objects = $obj->consultar(
				SearchMounter::MounterByComparer(NoticiaRelacaoAttribute::_Table(), NoticiaRelacaoAttribute::IdNoticia(), SearchComparer::Igual(), $IdNoticia)
			);
			foreach ($objects as $relacao) {
				$relacao->excluir();
			}

			for ($i=0; $i < count($vNoticiasStr); $i++){
				$id_noticia = explode("[#", $vNoticiasStr[$i]);
				$id_noticia = intval($id_noticia[1]);
				
				$obj = new NoticiaRelacao();
				$obj->setIdNoticiaRelacao( -1 );
				$obj->setIdentificador( null );
				$obj->setIdNoticia( $IdNoticia );
				$obj->setIdNoticiaLigacao( $id_noticia );
				
				$obj->inserir();
			}
		
			return true;
		}
		
		public static function NoticiasByNoticia( $IdNoticia ){
			$Noticias = NoticiaRelacaoManage2::Noticias_Relacionadas($IdNoticia);
				
			$vobj = array();
				
			for($i=0; $i < count($Noticias); $i++){
				$vobj[$i] = base64_encode($Noticias[$i]["titulo"]." (".System::FormatarData($Noticias[$i]["datahora"], "d/m/y Hhi").") [#".$Noticias[$i]["id_noticia"]."]");
			}
				
			return $vobj;
		}

	} 
?>