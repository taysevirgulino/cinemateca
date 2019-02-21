<? 
	class InstagramAPI {
		
		private $apiKey = 'f20ccc3d8c974ce9afce48a1c2a43126';
		private $apiSecret = '30c3ee4f95f84175b655a6a547597849';
		private $apiCallback = 'http://www.mvjtocantins.com.br/instagram/success.php';
		private $apiToken = '1428993282.f20ccc3.8c61469db3164d3289c60ca14538d7a7';
		
		public function Imagens($inCache=true){
			
			$itens = array();
			if( $inCache ){
				$itens = $_SESSION["INSTAGRAN_API"];
			}
			
			if( count($itens) <= 0 ){
				$instagram = new Instagram(array(
						'apiKey'      => $this->apiKey,
						'apiSecret'   => $this->apiSecret,
						'apiCallback' => $this->apiCallback
				));
				$instagram->setAccessToken( $this->apiToken );
				$result = $instagram->getUserMedia();
					
					
				foreach ($result->data as $media) {
					if ($media->type == 'image') {
						$itens[] = array(
								'imagem1' => $media->images->thumbnail->url, //150x150
								'imagem2' => $media->images->low_resolution->url, //306x306
								'imagem3' => $media->images->standard_resolution->url, //640x640
								'url' =>$media->link
						);
					}
				}
				
				$_SESSION["INSTAGRAN_API"] = $itens;
			}
			
			return $itens;
		}
		
	}
?>