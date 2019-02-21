<?php
interface AdapterServiceInterface {
	public function setEntity(EntityInterface $objectEntity);
	public function buscar($query);
	public function buscarTipo($tipo, $valor);
	public function buscarAttribute($attributeFieldNameComparer, $value, $searchComparer=null);
	public function consultar($query = null, $sort = null, $offset=null, $limit=null);
	public function consultarTipo($tipo, $valor);
	public function consultarAttribute($attributeFieldNameComparer=null, $value=null, $searchComparer=null, $attributeFieldNameOrder=null, $searchOrder=null);
	public function count($query);
	public function inserir();
	public function alterar();
	public function alterarAtributo($attributeFieldName);
	public function excluir();
}
?>