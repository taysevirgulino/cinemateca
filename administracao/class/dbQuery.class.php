<?
class dbQuery extends db{

	protected $rsC, $registro;
	
	public function __construct(){ db::__construct(); }
	public function __destruct(){ 
		mysql_free_result($this->rsC);
		db::__destruct(); 
	}

	public function consultar($sql){
		$this->rsC = mysql_query($sql, $this->getConexao()) or die( $sql." | ".mysql_error() );
		return ($this->linhas() > 0) ? true : false;
	}
	
	public function registro(){
		$this->registro = mysql_fetch_array($this->rsC);
		return $this->registro;
	}
	
	public function valor($campo){
		return( $this->registro[$campo] );
	}
	
	public function linhas(){
		return( mysql_num_rows($this->rsC) );
	}
}
?>