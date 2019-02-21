<?php
	class SiteManage extends AbstractEntityManage implements EntityManageInterface {
		
		public static function SitesByAppUsuarioGrupo($IdAppUsuarioGrupo){
			$adapter = Config::getAdapterService('Site');
				
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
						
					$objSiteGrupo = new SiteGrupo();
					$itens = $objSiteGrupo->consultar(
						SearchMounter::MounterByComparer(SiteGrupoAttribute::_Table(), SiteGrupoAttribute::IdAppUsuarioGrupo(), SearchComparer::Igual(), $IdAppUsuarioGrupo)
					);
					$in = array();
					foreach ($itens as $value) {
						$in[] = $value->getIdSite();
					}
					if( count($in) <= 0){
						return array();
					}
					$query = array(
						SiteAttribute::IdSite() => array('$in' => $in)
					);
					$sort = SearchOrderMongo::Mounter(SiteAttribute::Titulo(), SearchOrder::Crescente());
						
					return SiteManage::consultar($query, $sort);
				} break;
				default:{
					$sql = "SELECT DISTINCT 
							  `tb_site`.*
							FROM
							  `tb_site_grupo`
							  INNER JOIN `tb_site` ON (`tb_site_grupo`.id_site = `tb_site`.id_site)
							WHERE
							  `tb_site_grupo`.id_app_usuario_grupo = $IdAppUsuarioGrupo";
						
					return SiteManage::consultar($sql);
				} break;
			}
			
			return array();
		}
		
	}
?>