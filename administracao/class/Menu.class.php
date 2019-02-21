<?
class Menu{
	
	protected $myPath, $myGrupo;
	protected $myDataMenu, $myDataDisplay;
	
	public function __construct(){}
	public function __destruct(){}
	
	protected function montarMenu($valor, $tipo){
		
		if( $tipo == 1){ // Montar Pai
			$menu = new AppComponenteMenu();
			
			$sql = "SELECT 
					  tb_app_componente_menu.*
					FROM
					  tb_app_componente_menu
					  INNER JOIN tb_app_componente ON (tb_app_componente_menu.id_app_componente_menu = tb_app_componente.id_app_componente)
					  INNER JOIN tb_app_componente_permissao ON (tb_app_componente.id_app_componente = tb_app_componente_permissao.id_app_componente)
					WHERE
					  (tb_app_componente_permissao.id_app_usuario_grupo = ".$this->myGrupo.") AND 
					  (tb_app_componente_menu.tipo = 1) AND 
					  (tb_app_componente_menu.`status` = 1)
					ORDER BY
					  prioridade";
			
			$vmenu = $menu->consultarAppComponenteMenu(3, $sql);
			$mp = "";
			
			for ($i=0; $i < count($vmenu); $i++){
				$mp = $mp."aI(\"";
				
				$image = $vmenu[$i]->getImagem();
				if( ! empty( $image ) ){
					$mp = $mp."image=menu/icones/".$image.";";
				}
				$url = $vmenu[$i]->getUrl();
				if( ! empty( $url ) ){
					$mp = $mp."url=".$url.";";
				}
				$mp = $mp."text=".$vmenu[$i]->getDescricao().";status=".$vmenu[$i]->getDescricao().";";
				
				if( $vmenu[$i]->quantidadeFilhos() > 0 ){
					$mp = $mp."showmenu=MenuItem".$vmenu[$i]->getIdAppComponenteMenu().";";
					$this->montarMenu($vmenu[$i]->getIdAppComponenteMenu(), 2);
				}
				$mp = $mp."\"); ";	
			}			
			$this->myDataDisplay = $mp;

		}else if ( $tipo == 2) { // Montar Filhos

			$menuf = new AppComponenteMenu();
			$menuf->setIdAppComponenteMenu($valor);
			
			$sql = "SELECT 
					  tb_app_componente_menu.*
					FROM
					  tb_app_componente_menu
					  INNER JOIN tb_app_componente ON (tb_app_componente_menu.id_app_componente_menu = tb_app_componente.id_app_componente)
					  INNER JOIN tb_app_componente_permissao ON (tb_app_componente.id_app_componente = tb_app_componente_permissao.id_app_componente)
					WHERE
					  (tb_app_componente_permissao.id_app_usuario_grupo = ".$this->myGrupo.") AND 
					  (tb_app_componente_menu.tipo = 0) AND 
					  (tb_app_componente_menu.`status` = 1) AND 
					  (tb_app_componente_menu.id_app_componente_menu_pai = ".$menuf->getIdAppComponenteMenu().")
					ORDER BY
					  prioridade ";
			
			$vmenuf = $menuf->consultarAppComponenteMenu(3, $sql);
			
			$mf = "with(milonic=new menuname(\"MenuItem".$menuf->getIdAppComponenteMenu()."\")){ style=menuItemStyle; ";
			
			for ($i=0; $i < count($vmenuf); $i++){
				$mf = $mf."aI(\"";
				
				$image = $vmenuf[$i]->getImagem();
				if( ! empty( $image ) ){
					$mf = $mf."image=menu/icones/".$image.";";
				}
				$url = $vmenuf[$i]->getUrl();
				if( ! empty( $url ) ){
					$mf = $mf."url=".$url.";";
				}
				$mf = $mf."text=".$vmenuf[$i]->getDescricao().";status=".$vmenuf[$i]->getDescricao().";";
				
				if( $vmenuf[$i]->quantidadeFilhos() > 0 ){
					$mf = $mf."showmenu=MenuItem".$vmenuf[$i]->getIdAppComponenteMenu().";";
					$this->montarMenu($vmenuf[$i]->getIdAppComponenteMenu(), 2);
				}
				$mf = $mf."\"); ";	
			}			
			$mf = $mf." }";
			
			$this->myDataMenu = $this->myDataMenu." ".$mf;
		}
	}
	
	public function gerarMenu($path, $grupo){
		$this->setPath( $path );
		$this->setGrupo( $grupo );
		
		$this->montarMenu("", 1);
	}

	public function displayConfig(){
		return "<script type=\"text/javascript\" src=\"".$this->myPath."/milonic_src.js\"></script> ".
			  "<noscript>Erro Menu</noscript> ".
			  "<script type=\"text/javascript\"> ".
			  "if(ns4)_d.write(\"<scr\"+\"ipt type=text/javascript src=".$this->myPath."/mmenuns4.js><\/scr\"+\"ipt>\"); ".
			  "  else _d.write(\"<scr\"+\"ipt type=text/javascript src=".$this->myPath."/mmenudom.js><\/scr\"+\"ipt>\"); ".
			  "</script> ".
			  "<script type=\"text/javascript\"> ".
			  "_menuCloseDelay=500; ".
			  "_menuOpenDelay=150; ".
			  "_subOffsetTop=2; ".
			  "_subOffsetLeft=-2; ".
			  "with(menuStyle=new mm_style()){ ".
			  "		bordercolor=\"#FFFFFF\"; ".
			  "		borderstyle=\"solid\"; ".
			  "		borderwidth=1; ".
			  "		fontfamily=\"Verdana, Tahoma, Arial\"; ".
			  "		fontsize=\"10\"; ".
			  "		fontstyle=\"normal\"; ".
			  "		fontweight=\"bold\"; ".
			  "		headerbgcolor=\"#ffffff\"; ".
			  "		headercolor=\"#000000\"; ".
			  "		offbgcolor=\"#f4f4f4\"; ".
			  "		offcolor=\"#515151\"; ".
			  "		onbgcolor=\"#CCCCCC\"; ".
			  "		oncolor=\"#ffffff\"; ".
			  "		outfilter=\"randomdissolve(duration=0.3)\"; ".
			  "		overfilter=\"Fade(duration=0.2);Alpha(opacity=90);Shadow(color=#777777', Direction=135, Strength=5)\"; ".
			  "		padding=5; ".
			  "		pagebgcolor=\"#F1F1F1\"; ".
			  "		pagecolor=\"black\"; ".
			  "		separatorcolor=\"#F4F4F4\"; ".
			  "		separatorsize=8; ".
			  "		subimage=\"menu/arrow.gif\"; ".
			  "		subimagepadding=2; ".
			  "} ".
			  "with(menuItemStyle=new mm_style()){ ".
			  "		bordercolor=\"#CCCCCC\"; ".
			  "		borderstyle=\"solid\"; ".
			  "		borderwidth=1; ".
			  "		fontfamily=\"Verdana, Tahoma, Arial\"; ".
			  "		fontsize=\"10\"; ".
			  "		fontstyle=\"normal\"; ".
			  "		fontweight=\"bold\"; ".
			  "		headerbgcolor=\"#ffffff\"; ".
			  "		headercolor=\"#000000\"; ".
			  "		offbgcolor=\"#F4F4F4\"; ".
			  "		offcolor=\"#515151\"; ".
			  "		onbgcolor=\"#CCCCCC\"; ".
			  "		oncolor=\"#000000\"; ".
			  "		outfilter=\"randomdissolve(duration=0.3)\"; ".
			  //"		overfilter=\"Fade(duration=0.2);Alpha(opacity=90);Shadow(color=#777777', Direction=135, Strength=5)\"; ".
			  "		padding=7; ".
			  "		pagebgcolor=\"#F1F1F1\"; ".
			  "		pagecolor=\"black\"; ".
			  "		separatorcolor=\"#CCCCCC\"; ".
			  "		separatorsize=1; ".
			  "		subimage=\"menu/arrow.gif\"; ".
			  "		subimagepadding=2; ".
			  "		itemwidth=\"190\"; ".
			  "} ".
			  "".$this->myDataMenu." ".
			  "drawMenus(); ".
			  "</script>";		
	
	}

	public function displayMenu(){
		return "<script> ".
			   "	with(milonic=new menuname(\"Main Menu\")){ ".
			   "		style=menuStyle; ".
			   "		top=155; ".
			   "		left=200; ".
			   "		alwaysvisible=1; ".
			   "		orientation=\"horizontal\"; ".
			   "		overfilter=\"\"; ".
			   "		position=\"relative\"; ".
			   //"		itemwidth=\"157\"; ".
			   "		".$this->myDataDisplay." ".
			   "	} ".
			   "	drawMenus(); ".
			   "</script> ".
			   "<a href=\"http://www.milonic.com/removelink.php\" style=\"display:none;\">http://www.milonic.com/removelink.php</a>";
	}
	
	public function setPath( $valor ){ $this->myPath = $valor; }
	public function getPath(){ return $this->myPath; }

	public function setGrupo( $valor ){ $this->myGrupo = $valor; }
	public function getGrupo(){ return $this->myGrupo; }
}
?>