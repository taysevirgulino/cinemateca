<? 
	class AudioCategoriaManage2 extends AudioCategoriaManage {
		
		public static function consultarAttribute($attributeFieldNameComparer = null, $value = null, $searchComparer = null, $attributeFieldNameOrder = null, $searchOrder = null){
			$value = AudioCategoriaManage::consultarAttribute($attributeFieldNameComparer, $value, $searchComparer, $attributeFieldNameOrder, $searchOrder);
			for ($i = 0; $i < count($value); $i++) {
				$value[$i]['url'] = Url::Audios($value[$i]['id_audio_categoria'], $value[$i]['identificador'], $value[$i]['nome']);
			}
			return $value;
		}
		
	}
?>