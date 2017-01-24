<?php
namespace Elimuswift\Core;

class EnvatoApi {

	/**
	 * Envanto API bearer token
	 *
	 * @var string
	 **/
	private $bearer;
	
	/**
	 * Purchase verification endpoint
	 *
	 * @var string
	 **/
	protected $url = 'https://api.envato.com/v3/market/author/sale?code=';

	/** 
	 * Request headers
	 *
	 * @var array
	 **/
	private $headers;

	/**
	 * Create EnvantoApi Instance
	 * 
	 **/
	public function __construct($bearer)
	{
		$this->bearer = $bearer;
		$this->buildHeaders();
	}

	/**
	 * Make a call to the Envato API to verify purchase
	 *
	 * @return mixed Guzzle\Response::getBody()
	 * @param string $code 
	 **/
	public function getPurchaseData($code) 
	{
		$ch_verify = curl_init($this->url.$code);
	    curl_setopt($ch_verify, CURLOPT_HTTPHEADER, $this->headers);
	    curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);
	    curl_setopt($ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	    
	    $cinit_verify_data = curl_exec($ch_verify);
	    curl_close($ch_verify);
	    
	    if ($cinit_verify_data != "") {
	    	      return json_decode($cinit_verify_data, true);
	    }

	  	return ['error' => 'exception', 'description' => 'A server error was encountered please notify us if you see this']; 
		     
	}
  
	/**
	 * Verify purchase 
	 *
	 * @return string Array 
	 * @param string $code Purchase Code 
	 **/
	public function verifyPurchase(string $code ) 
	{
		$purchase = [];
		$purchase['response'] = (object) $this->getPurchaseData($code); 
		if($purchase->error)
			return $purchase['status'] = 'error';
		else
			return $purchase['status'] = 'success';
	}

	/**
	 * setting the header for the rest of the api
	 *
	 * @return void
	 * 
	 **/
	protected function buildHeaders()
	{
	    $headers = [
	    	'Content-type' => 'application/json',
			'Authorization' =>  'Bearer '.$this->bearer
		];
		$h = [];
		foreach ($headers as $key => $value) {
			$h[] = $key.':'.$value;
		}
		$this->headers = $h;

	}
}