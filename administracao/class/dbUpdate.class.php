<?
class dbUpdate extends db{
	protected $rsC;

	public function __construct(){ db::__construct(); }
	public function __destruct(){ db::__destruct(); }

	public function executar($sql){
		$this->rsC = @mysql_query($sql, $this->getConexao()) or print("<!-- ".mysql_error()."-->");
		return true; //($this->linhas() > 0) ? true : false;
	}

	public function linhas(){
		return( @mysql_affected_rows( $this->rsC ));
	}

}
?>