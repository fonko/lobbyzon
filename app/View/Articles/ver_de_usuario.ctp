
<div class="section">

<?php foreach($articles as $article): ?>
<?php



	if ($article ['Article'] ['currency'] == 1) {
		
		$article ['Article'] ['price2'] = $this->Currency->toForeign ( $article ['Article'] ['price'] );
		$moneda ['1'] = 'U$S';
		$moneda ['2'] = "$";
	
	} else {
		
		$article ['Article'] ['price2'] = $this->Currency->toBase ( $article ['Article'] ['price'] );
		$moneda ['1'] = "$";
		$moneda ['2'] = 'U$S';
	
	}


	
	echo $this->element('producto', array('article'=>$article, 'img' =>array('Image' => $article['Image']) , 'moneda' => $moneda, 'version' => 3));?>
	
<?php endforeach;?>
</div>