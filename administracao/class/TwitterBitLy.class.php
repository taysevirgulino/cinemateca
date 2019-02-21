<?php

class TwitterBitLy {
	private static function _ApiKey(){
		return "R_f7b19bb611e82a5b42c1fa247b741a6d";
	}
	private static function _ApiLogin(){
		return "onorte";
	}
	
	public static function Short($url){
		return TwitterBitLy::get_bitly_short_url($url, TwitterBitLy::_ApiLogin(), TwitterBitLy::_ApiKey());
	}
	
	private static function get_bitly_short_url($url,$login,$appkey,$format='txt') {
		$connectURL = 'http://api.bit.ly/v3/shorten?login='.$login.'&apiKey='.$appkey.'&uri='.urlencode($url).'&format='.$format;
		return TwitterBitLy::curl_get_result($connectURL);
	}
	
	/* returns expanded url */
	private static function get_bitly_long_url($url,$login,$appkey,$format='txt') {
		$connectURL = 'http://api.bit.ly/v3/expand?login='.$login.'&apiKey='.$appkey.'&shortUrl='.urlencode($url).'&format='.$format;
		return TwitterBitLy::curl_get_result($connectURL);
	}
	
	/* returns a result form url */
	private static function curl_get_result($url) {
		return false;
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}	
}
?>