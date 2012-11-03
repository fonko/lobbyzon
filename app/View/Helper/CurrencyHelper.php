<?php 

App::uses('AppHelper', 'View/Helper');

class CurrencyHelper extends AppHelper {

/**
 * 
 * clase para pasar dolares/pesos pesos/dolares
 * 
 */

	
	private $fxRate;
// 	private $currencyBase;
// 	private $currencyForeign;
	
	public function setVal($currencyBase, $currencyForeign)
	{
		$url = 'http://download.finance.yahoo.com/d/quotes.csv?s='.$currencyBase.$currencyForeign.'=X&f=l1';

		$c = curl_init($url);
		curl_setopt($c, CURLOPT_HEADER, 0);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		$this->fxRate = doubleval(curl_exec($c));
		curl_close($c);
		
	}

	public function toBase($amount)
	{
		$this->setVal('USD', 'UYU');
		if($this->fxRate == 0)
			return 0;
			
		return  $this->fmtMoney($amount / $this->fxRate);
	}
	
	public function toForeign($amount)
	{
		$this->setVal('USD', 'UYU');
		if($this->fxRate == 0)
			return 0;
			
		return $this->fmtMoney($amount * $this->fxRate);
	}
	
	function fmtMoney($amount)
	{
		return sprintf('%.2f', $amount);
	}


}