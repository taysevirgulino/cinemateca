<? 
	class NoticiaComentarioManage2 extends NoticiaComentarioManage { 
		
		public static function Count( $Id ){
			$sql = "SELECT 
					  COUNT(`tb_noticia_comentario`.id_noticia_comentario) AS count
					FROM
					  `tb_noticia_comentario`
					WHERE
					  `tb_noticia_comentario`.id_noticia = $Id";
			
			return SearchMysqlQuery::CountBySql($sql);
		}
		
		public static function QuantidadeHoje( ){
			$sql = "SELECT
					  COUNT(`tb_noticia_comentario`.id_noticia) AS `count`
					FROM
					  `tb_noticia_comentario`
					WHERE
					   (YEAR(`tb_noticia_comentario`.datahora) = ".date("Y").") AND (MONTH(`tb_noticia_comentario`.datahora) = ".date("m").") AND (DAY(`tb_noticia_comentario`.datahora) = ".date("d").")";
			
			return SearchMysqlQuery::CountBySql($sql);
		}
		
		public static function ComentariosByNoticia($IdNoticia){
			$sql = "SELECT 
					  `tb_noticia_comentario`.*
					FROM
					  `tb_noticia_comentario`
					WHERE
					  `tb_noticia_comentario`.`status` = 1 AND 
					  `tb_noticia_comentario`.id_noticia = $IdNoticia
					ORDER BY
					  `tb_noticia_comentario`.datahora DESC";
			
			return NoticiaComentarioManage::consultarNoticiaComentario(3, $sql);
		}
		
		public static function Comentar($IdNoticia, $Nome, $Email, $Mensagem, $Url){
			$Nome = System::_QueryString(base64_decode($Nome));
			$Email = System::_QueryString(base64_decode($Email));
			$Mensagem = System::_QueryString(base64_decode($Mensagem));
			$Url = System::_QueryString(base64_decode($Url));
			
			return NoticiaComentarioManage::inserirNoticiaComentario(-1, null, null, $IdNoticia, $Nome, $Email, $Url, $Mensagem, $_SERVER['REMOTE_ADDR'], date("Y-m-d H:i:s"), 0);
		}
	} 
?>