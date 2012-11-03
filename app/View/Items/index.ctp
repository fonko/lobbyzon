
<div class="left_content" id="left">
	<!-- h3><?php echo __('Actions'); ?></h3 -->

	<div class="title_box">Categories</div>
	<ul class="left_menu">
		<?php
		$i = 1;
		foreach ( $items as $item ) {
			echo "<li class=";
			?>
				<?=($i&1) ? "odd" : "even"?>
				
		<?php
			echo " >";
			echo $this->Js->link ( $item ['Item'] ['name'], 'http://www.lobbyzona.com/items/view/' . $item ['Item'] ['id'], array ('update' => '#center' ) );
			echo "</li>";
			$i ++;
		}
		
		?>
	</ul>
</div>


<div class="center_content" id="center">
	<div class="center2">
		<?php echo $this->Html->image('/images/ajax-loader.gif', array('id' => 'busy-indicator')); ?>
	</div>

<?php 

$articles = $this->requestAction ( '/articles/destacados' );

	echo $this->element('carrusel', compact('articles'));
	
?>
	
<?php

$Currency = $this->Helpers->load ( 'Currency' );
$articles = $this->requestAction ( '/articles/index' );
$i = 0;

foreach ( $articles as $article ) {
	$i ++;
	if ($article ['Article'] ['currency'] == 1) {
		
		$article ['Article'] ['price2'] = $this->Currency->toForeign ( $article ['Article'] ['price'] );
		$moneda ['1'] = 'U$S';
		$moneda ['2'] = "$";
	
	} else {
		
		$article ['Article'] ['price2'] = $this->Currency->toBase ( $article ['Article'] ['price'] );
		$moneda ['1'] = "$";
		$moneda ['2'] = 'U$S';
	
	}
	
	echo $this->element ( 'productoChico', array ('article' => $article, 'moneda' => $moneda, 'i' => $i ) );
	echo $this->element ( 'productoChicoJquery', compact ( 'i' ) );
}

?>



</div>

<div class="right_content">asfdas</div>


