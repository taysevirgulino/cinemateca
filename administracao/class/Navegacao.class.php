<? 
class Navegacao { 
	 
	protected $_Itens;
	 
	public function __construct( $InsertHome = true ){
		$this->_Itens = $_Itens = array();
		if($InsertHome){
			$this->Adicionar("Painel", Url::Painel());
		}
	} 
	public function __destruct(){} 
	
	public function Adicionar($Label, $Url=""){
		$this->_Itens[] = array($Label, $Url);
	}
	
	public function AdicionarArray( $Array ){
		$this->_Itens = array_merge($this->_Itens, $Array);
	}
	
	public function Gerar(){
		return $this->_Itens;
	}
}
?>