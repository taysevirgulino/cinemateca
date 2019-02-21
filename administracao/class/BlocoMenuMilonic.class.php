<?
class BlocoMenuMilonic{
	
	protected $myPath;
	protected $myDataMenu, $myDataDisplay;
	
	public function __construct(){}
	public function __destruct(){}
	
	protected function montarMenu($valor, $tipo){
		
		if( $tipo == 1){ // Montar Pai
			$menu = new BlocoMenu();
			
			$sql = "SELECT 
					  tb_bloco_menu.*
					FROM
					  tb_bloco_menu
					WHERE
					  tb_bloco_menu.`status` = 1 AND 
					  tb_bloco_menu.id_bloco_menu_pai = 0
					ORDER BY
					  tb_bloco_menu.prioridade";
			
			$vmenu = $menu->consultarBlocoMenu(3, $sql);
			$mp = "";
			
			for ($i=0; $i < count($vmenu); $i++){
				$mp = $mp."aI(\"";
				
				$image = "";
				if( ! empty( $image ) ){
					$mp = $mp."image=menu/icones/".$image.";";
				}
				$url = $vmenu[$i]->getUrl();
				if( ! empty( $url ) ){
					$mp = $mp."url=".$url.";";
				}
				$mp = $mp."text=".$vmenu[$i]->getNome().";status=".$vmenu[$i]->getNome().";";
				
				if( BlocoMenuManage::FilhosCount($vmenu[$i]->getIdBlocoMenu()) > 0 ){
					$mp = $mp."showmenu=MenuItem".$vmenu[$i]->getIdBlocoMenu().";";
					$this->montarMenu($vmenu[$i]->getIdBlocoMenu(), 2);
				}
				$mp = $mp."\"); ";	
			}			
			$this->myDataDisplay = $mp;

		}else if ( $tipo == 2) { // Montar Filhos

			$menuf = new BlocoMenu();
			
			$sql = "SELECT 
					  tb_bloco_menu.*
					FROM
					  tb_bloco_menu
					WHERE
					  tb_bloco_menu.`status` = 1 AND 
					  tb_bloco_menu.id_bloco_menu_pai = $valor
					ORDER BY
					  tb_bloco_menu.prioridade";
			
			$vmenuf = $menuf->consultarBlocoMenu(3, $sql);
			
			$mf = "with(milonic=new menuname(\"MenuItem".$valor."\")){ style=menuItemStyle; ";
			
			for ($i=0; $i < count($vmenuf); $i++){
				$mf = $mf."aI(\"";
				
				$image = "";
				if( ! empty( $image ) ){
					$mf = $mf."image=menu/icones/".$image.";";
				}
				$url = $vmenuf[$i]->getUrl();
				if( ! empty( $url ) ){
					$mf = $mf."url=".$url.";";
				}
				$mf = $mf."text=".$vmenuf[$i]->getNome().";status=".$vmenuf[$i]->getNome().";";
				
				if( BlocoMenuManage::FilhosCount($vmenuf[$i]->getIdBlocoMenu()) > 0 ){
					$mf = $mf."showmenu=MenuItem".$vmenuf[$i]->getIdBlocoMenu().";";
					$this->montarMenu($vmenuf[$i]->getIdBlocoMenu(), 2);
				}
				$mf = $mf."\"); ";	
			}			
			$mf = $mf." }";
			
			$this->myDataMenu = $this->myDataMenu." ".$mf;
		}
	}
	
	public function gerarMenu($path){
		$this->setPath( $path );
		
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
			  "		borderstyle=\"none\"; ".
			  "		borderwidth=0; ".
			  "		fontfamily=\"Verdana, Tahoma, Arial\"; ".
			  "		fontsize=\"10\"; ".
			  "		fontstyle=\"normal\"; ".
			  "		fontweight=\"bold\"; ".
			  "		headerbgcolor=\"#ffffff\"; ".
			  "		headercolor=\"#000000\"; ".
			  //"		offbgcolor=\"#f4f4f4\"; ".
			  "		offcolor=\"#494134\"; ".
			  //"		onbgcolor=\"#000\"; ".
			  "		oncolor=\"#000\"; ".
			  "		outfilter=\"randomdissolve(duration=0.3)\"; ".
			  "		overfilter=\"Fade(duration=0.2);Alpha(opacity=90);Shadow(color=#777777', Direction=135, Strength=5)\"; ".
			  "		padding=5; ".
			  "		pagebgcolor=\"#DFD2A6\"; ".
			  "		pagebgimage=\"template/gonzagao/images/menu_bg.jpg\"; ".
			  "		pagecolor=\"#494134\"; ".
			  "		separatorcolor=\"#F4F4F4\"; ".
			  "		separatorsize=8; ".
			  "		separatorimage=\"template/gonzagao/images/menu_bg.jpg\"; ".
			  "		subimage=\"administracao/menu/arrow.gif\"; ".
			  "		subimagepadding=2; ".
			  "} ".
			  "with(menuItemStyle=new mm_style()){ ".
			  "		bordercolor=\"#B39849\"; ".
			  "		borderstyle=\"solid\"; ".
			  "		borderwidth=1; ".
			  "		fontfamily=\"Verdana, Tahoma, Arial\"; ".
			  "		fontsize=\"10\"; ".
			  "		fontstyle=\"normal\"; ".
			  "		fontweight=\"bold\"; ".
			  "		headerbgcolor=\"#ffffff\"; ".
			  "		headercolor=\"#000000\"; ".
			  "		offbgcolor=\"#CCB87D\"; ".
			  "		offcolor=\"#494134\"; ".
			  "		onbgcolor=\"#fff\"; ".
			  "		oncolor=\"#000\"; ".
			  "		outfilter=\"randomdissolve(duration=0.3)\"; ".
			  "		overfilter=\"Fade(duration=0.2);Alpha(opacity=90);Shadow(color=#777777', Direction=135, Strength=5)\"; ".
			  "		padding=7; ".
			  "		pagebgcolor=\"#CCB87D\"; ".
			  "		pagecolor=\"black\"; ".
			  "		separatorcolor=\"#B39849\"; ".
			  "		separatorsize=1; ".
			  "		subimage=\"administracao/menu/arrow.gif\"; ".
			  "		subimagepadding=2; ".
			  "		itemwidth=\"170\"; ".
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
}
?>