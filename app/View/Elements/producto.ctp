<?php $preguntas = $this->requestAction ('/questions/index/'.$article['Article']['id']); 

$cadena="";
echo '<div id="wrapper-questions">';
foreach ($preguntas as $pregunta){
	
	$cadena .= '<div id="header-questions"><strong>'.$pregunta['User']['username'].'</strong></div>';
	$cadena .= '<div id="content-questions"><strong>'.$pregunta['Question']['question'].'</strong></div>';
	$cadena .= '<div id="footer-questions"></div>';
	$cadena .= '<br />';
	
	
	
}

echo '</div>';

?>

<script>

$(document).ready(function () { 

$('#preguntado').html('<?php echo $cadena;?>');	
	
});
	
</script>

<?php 
$usuario = $this->session->read();
switch ($version){
	case 1:
		
		
	?>
	
	<div class="prod_box_big">
	<div class="top_prod_box_big"></div>
	<div class="center_prod_box_big">

		<div class="product_img_big">
			<?php 
				
				if(isset($img['0'])){
				echo $this->Html->image('/images/'.$img['0']['Image']['name'].'t.'.$img['0']['Image']['ext'], array('url' => '/images/'.$img['0']['Image']['name'].'.'.$img['0']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
			?>
			<div class="thumbs">
			<?php 
				
				if(isset($img['1'])){
				echo $this->Html->image('/images/'.$img['1']['Image']['name'].'t.'.$img['1']['Image']['ext'], array('url' => '/images/'.$img['1']['Image']['name'].'.'.$img['1']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
				 
				
				if(isset($img['2'])){
				echo $this->Html->image('/images/'.$img['2']['Image']['name'].'t.'.$img['2']['Image']['ext'], array('url' => '/images/'.$img['2']['Image']['name'].'.'.$img['2']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
				 
				
				if(isset($img['3'])){
				echo $this->Html->image('/images/'.$img['3']['Image']['name'].'t.'.$img['3']['Image']['ext'], array('url' => '/images/'.$img['3']['Image']['name'].'.'.$img['3']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
			?>
			</div>
		</div>
		<div class="details_big_box">
			<div class="product_title_big"><?php echo $article['Article']['name'];?></div>
			<div class="">
				<span class="specifications"><?php echo __('Category'); ?>:</span> <span
					class="blue"><?php echo $this->Html->link($article['Item']['name'], array('controller' => 'items', 'action' => 'view', $article['Item']['id'])); ?></span><br>

				<span class="specifications"><?php echo __('Transaction'); ?>:</span>
				<span class="blue"><?php echo $article['Article']['name']; ?></span><br>

				<span class="specifications"><?php echo __('Description'); ?>:</span> <?php echo h($article['Article']['description']); ?>
                            
                            <br> <span class="specifications"> <?php echo __('Shipping'); ?>:</span><span
					class="blue"><?php echo __('Handled by:').' '.$ship['Shipping']['name'];?></span><br>

			</div>
			<div class="prod_price_big">
				<span class="reduce"><?php echo $moneda['2']." ".$article['Article']['price2']; ?></span>
				<span class="price"><?php echo $moneda['1']." ".$article['Article']['price']; ?></span>
			</div>

			<a href="#" class="addtocart">add to cart</a> <a href="#"
				onclick="$('.reduce').show();" class="compare">compare</a>
		</div>
	</div>
	<div class="bottom_prod_box_big"></div>
</div>
<div id="preguntas" class="center_title_bar">Preguntas realizadas</div>
<div id="preg_display" class="prod_box_big">
	<div class="top_prod_box_big"></div><div class="center_prod_box_big"><div class="product_img_big"><?php echo $this->Html->image('/images/new_question.png'); echo $this->Js->link(__('Add new question'), '/questions/add/'.$article['Article']['id'], array('update' => '#lugar')); ?></div><div class="details_big_box"><div class="product_title_big"><?php echo __('Recuerde no dejar datos personales o su cuenta sera eliminada');?>  </div><div class="specifications"><br> <span class="blue"><b><?php echo $usuario['Auth']['User']['username'];?></b></span><?php echo __(', Evacua cualquier duda que tengas con el dueño del articulo')?><br><div id="preguntado"></div></div><span id="lugar"></span></div></div><div class="bottom_prod_box_big"></div>
	
</div>
	<?
$this->Js->get ( '#preguntas' );
$this->Js->event('click', '$("#preg_display").show()');

	
		break;
case 2:
	


$img = $this->requestAction ('/articles/sacoimagen/'.$article['Article']['id']);


?>
<div class="prod_box_big">
	<div class="top_prod_box_big"></div>
	<div class="center_prod_box_big">

		<div class="product_img_big">
			<?php 
				
				if(isset($img['0'])){
				echo $this->Html->image('/images/'.$img['0']['Image']['name'].'t.'.$img['0']['Image']['ext'], array('url' => '/images/'.$img['0']['Image']['name'].'.'.$img['0']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
			?>
			<div class="thumbs">
			<?php 
				
				if(isset($img['1'])){
				echo $this->Html->image('/images/'.$img['1']['Image']['name'].'t.'.$img['1']['Image']['ext'], array('url' => '/images/'.$img['1']['Image']['name'].'.'.$img['1']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
				 
				
				if(isset($img['2'])){
				echo $this->Html->image('/images/'.$img['2']['Image']['name'].'t.'.$img['2']['Image']['ext'], array('url' => '/images/'.$img['2']['Image']['name'].'.'.$img['2']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
				 
				
				if(isset($img['3'])){
				echo $this->Html->image('/images/'.$img['3']['Image']['name'].'t.'.$img['3']['Image']['ext'], array('url' => '/images/'.$img['3']['Image']['name'].'.'.$img['3']['Image']['ext']));
				}else{ echo $this->Html->image('/images/no_photo.png'); } 
				
			?>
			</div>
		</div>
		<div class="details_big_box">
			<div class="product_title_big"><?php echo $article['Article']['name'];?></div>
			<div class="">
				<span class="specifications"><?php echo __('Category'); ?>:</span> <span
					class="blue"><?php echo $this->Html->link($categoria, array('controller' => 'items', 'action' => 'view', $catid)); ?></span><br>

				<span class="specifications"><?php echo __('Transaction'); ?>:</span>
				<span class="blue"><?php echo $article['Article']['name']; ?></span><br>

				<span class="specifications"><?php echo __('Description'); ?>:</span> <?php echo h($article['Article']['description']); ?>
                            
                            <br> <span class="specifications"> <?php echo __('Shipping'); ?>:</span><span
					class="blue"><?php echo __('Handled by:').' '.$ship['Shipping']['name'];?></span><br>

			</div>
			<div class="prod_price_big">
				<span class="reduce"><?php echo $moneda['2']." ".$article['Article']['price2']; ?></span>
				<span class="price"><?php echo $moneda['1']." ".$article['Article']['price']; ?></span>
			</div>

			<a href="#" class="addtocart">add to cart</a> <a href="#"
				onclick="$('.reduce').show();" class="compare">compare</a>
		</div>
	</div>
	<div class="bottom_prod_box_big"></div>
</div>
<?php 
	break;
	
case 3:
	?>
	<div class="prod_box_big">
	<div class="top_prod_box_big"></div>
	<div class="center_prod_box_big">
	
	<div class="product_img_big">
	<?php
	
	if(isset($img['Image']['0'])){
		echo $this->Html->image('/images/'.$img['Image']['0']['name'].'t.'.$img['Image']['0']['ext'], array('url' => '/images/'.$img['Image']['0']['name'].'.'.$img['Image']['0']['ext']));
	}else{ echo $this->Html->image('/images/no_photo.png');
	}
	
	?>
				<div class="thumbs">
				<?php 
					
					if(isset($img['Image']['1'])){
					echo $this->Html->image('/images/'.$img['Image']['1']['name'].'t.'.$img['Image']['1']['ext'], array('url' => '/images/'.$img['Image']['1']['name'].'.'.$img['Image']['1']['ext']));
					}else{ echo $this->Html->image('/images/no_photo.png'); } 
					
					 
					
					if(isset($img['Image']['2'])){
					echo $this->Html->image('/images/'.$img['Image']['2']['name'].'t.'.$img['Image']['2']['ext'], array('url' => '/images/'.$img['Image']['2']['name'].'.'.$img['Image']['2']['ext']));
					}else{ echo $this->Html->image('/images/no_photo.png'); } 
					
					 
					
					if(isset($img['Image']['3'])){
					echo $this->Html->image('/images/'.$img['Image']['3']['name'].'t.'.$img['Image']['3']['ext'], array('url' => '/images/'.$img['Image']['3']['name'].'.'.$img['Image']['3']['ext']));
					}else{ echo $this->Html->image('/images/no_photo.png'); } 
					
				?>
				</div>
			</div>
			<div class="details_big_box">
				<div class="product_title_big"><?php echo $article['Article']['name'];?></div>
				<div class="">
					<span class="specifications"><?php echo __('Category'); ?>:</span> <span
						class="blue"><?php echo $this->Html->link($article['Item']['name'], array('controller' => 'items', 'action' => 'view', $article['Item']['id'])); ?></span><br>
	
					<span class="specifications"><?php echo __('Transaction'); ?>:</span>
					<span class="blue"><?php echo $article['Article']['name']; ?></span><br>
	
					<span class="specifications"><?php echo __('Description'); ?>:</span> <?php echo h($article['Article']['description']); ?>
	                            
	                            <br> <span class="specifications"> <?php echo __('Shipping'); ?>:</span><span
						class="blue"><?php echo __('Handled by:').' '.$ship['Shipping']['name'];?></span><br>
	
				</div>
				<div class="prod_price_big">
					<span class="reduce"><?php echo $moneda['2']." ".$article['Article']['price2']; ?></span>
					<span class="price"><?php echo $moneda['1']." ".$article['Article']['price']; ?></span>
				</div>
	
				<a href="#" class="addtocart">add to cart</a> <a href="#"
					onclick="$('.reduce').show();" class="compare">compare</a>
			</div>
		</div>
		<div class="bottom_prod_box_big"></div>
	</div>
		

<?php 

}

?>
