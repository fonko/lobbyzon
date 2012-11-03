<?php
$Currency = $this->Helpers->load ( 'Currency' );

$version = 1;

if ($article ['Article']['currency'] == 1) {
	
	$article ['Article']['price2'] = $this->Currency->toForeign ( $article ['Article']['price'] );
	$moneda ['1'] = 'U$S';
	$moneda ['2'] = "$";

} else {
	
	$article ['Article']['price2'] = $this->Currency->toBase ( $article ['Article']['price'] );
	$moneda ['1'] = "$";
	$moneda ['2'] = 'U$S';

}
	

 
 echo $this->element('producto', compact('article','moneda','ship', 'img', 'version'));

?>