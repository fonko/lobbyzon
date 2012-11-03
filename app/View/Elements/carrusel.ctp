
	<div id="myCarousel" class="carousel slide">
		<!-- Carousel items -->
		<div class="carousel-inner">
		<?php 
		$i=0;
		foreach($articles as $article):
		
		?>
		
			<div class="item<?=($i==0) ? " active" : ""?>">
				<div class="carousel-caption">
					<h4><?php echo $article['Article']['name'];?></h4>
					<p><?php echo h($article['Article']['description']); ?></p>
				</div>
				<?php echo $this->Html->image('/images/'.$article['Article']['id']."-0d.".$article['Image']['0']['ext']); ?>
			</div>
		<?php
		$i++; 
		endforeach 
		?>
			
		</div>
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>