


<div class="prod_box">
	<div class="top_prod_box"></div>
	<div class="center_prod_box">
		<div class="product_title"><?php echo $article['Article']['name'];?></div>
		<div class="product_img">
			<a href="details.html"><img src="images/laptop.gif" alt="" title=""
				border="0"></a>
		</div>
		<div class="prod_price">
			<div id="output<?php echo $i; ?>" class="price"></div>
                 
                 <?php echo $moneda['2']; ?><input type="radio"
				id="currency<?php echo $i; ?>" name="currency"
				value="currency<?php echo $i; ?>"
				data-value="<?php echo $moneda['2']." ".$article['Article']['price2'];?>"><?php echo $moneda['1']; ?><input
				type="radio" id="currency<?php echo $i."b"; ?>" name="currency"
				value="currency<?php echo $i."b"; ?>"
				data-value="<?php echo $moneda['1']." ".$article['Article']['price']; ?>">

		</div>
	</div>
	<div class="bottom_prod_box"></div>
	<div class="prod_details_tab">
		<a href="#" title="header=[buy now] body=[&nbsp;] fade=[on]"><img
			src="images/cart.gif" alt="" title="" border="0" class="left_bt"></a>
			<label class="contact">Buy now</label>
			
<!-- 		<a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]"><img -->
<!-- 			src="images/favs.gif" alt="" title="" border="0" class="left_bt"></a> -->
<!-- 		<a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]"><img -->
<!-- 			src="images/favorites.gif" alt="" title="" border="0" class="left_bt"></a> -->
		
	</div>
</div>

