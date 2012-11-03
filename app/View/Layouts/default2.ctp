<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><--!
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?> --> 
	</title>
	<?php
	echo $this->Html->meta ( 'icon' );
	
	?>
<!--[if IE 6]>
<?
echo $this->Html->css ( 'iecss' );
?>
<![endif]-->
<?
echo $this->Html->css ( 'style' );
echo $this->Html->script ( 'boxOver' );
echo $this->Html->script ( 'jquery-1.7.2.min' );

echo $this->fetch ( 'meta' );
echo $this->fetch ( 'css' );
echo $this->fetch ( 'script' );

?>
</head>
<body>

	<div id="main_container">
		<div class="top_bar">
			<div class="top_search">
				<div class="search_text">
					<a href="#">Advanced Search</a>
				</div>
				<input type="text" class="search_input" name="search" />
			<? echo $this->Html->image('/images/search.gif'); ?>
            
        </div>

			<div class="languages">
				<div class="lang_text">Languages:</div>
				<a href="#" class="lang"><? echo $this->Html->image('/images/en.gif'); ?></a>
				<a href="#" class="lang"><? echo $this->Html->image('/images/de.gif'); ?></a>
			</div>

			<!-- top login -->
		</div>
		<div id="header">

			<div id="logo">
            <? echo $this->Html->link($this->Html->image('/images/logo.png'), array('controller' => 'Items', 'action' => 'index'), array('escape' => false) ); ?>
	    </div>

			<div class="oferte_content">
				<div class="top_divider"><? echo $this->Html->image('/images/header_divider.png'); ?></div>
				<div class="oferta">

					<div class="oferta_content">
                	<? echo $this->Html->image('/images/laptop.png', array('class'=> 'oferta_img')); ?>
                	
                    <div class="oferta_details">
							<div class="oferta_title">Samsung GX 2004 LM</div>
							<div class="oferta_text">Lorem ipsum dolor sit amet, consectetur
								adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
								exercitation ullamco</div>
							<a href="details.html" class="details">details</a>
						</div>
					</div>
					<div class="oferta_pagination">

						<span class="current">1</span> <a href="#?page=2">2</a> <a
							href="#?page=3">3</a> <a href="#?page=3">4</a> <a href="#?page=3">5</a>

					</div>

				</div>
				<div class="top_divider">
					<img src="images/header_divider.png" alt="" title="" width="1"
						height="164" />
				</div>

			</div>
			<!-- end of oferte_content-->


		</div>
		<div id="menu_tab">
			<div class="left_menu_corner"></div>
			<ul class="menu">
				<li><?php echo $this->Html->link('Home', array('controller'=> 'Items', 'action'=>'index'), array('class'=>'nav1')); ?></li>
				<li class="divider"></li>
				<!-- li><a href="#" class="nav2">Products</a></li >
                         <li class="divider"></li-->
				<!-- li><a href="#" class="nav3">Specials</a></li >
                         <li class="divider"></li-->
                         
	<?php
	
	if (! isset ( $user ['Auth'] ['User'] ['id'] )) {
		
		?>
                         <li><?php echo $this->Html->link('Sign up', array('controller'=> 'Users', 'action'=>'add'), array('onClick'=>'window.location.reload()', 'class'=>'nav4')); ?> </li>
				<li class="divider"></li>     
                         
    <?php }else{ ?>
                         <li><a href="#" class="nav3">My account</a></li>
				<li class="divider"></li>
                         
    <?php } ?>
                         <li><a href="#" class="nav5">Shipping </a></li>
				<li class="divider"></li>
				<li><a href="contact.html" class="nav6">Contact Us</a></li>
				<li class="divider"></li>
				<li class="currencies">Currencies <select
					style="visibility: visible;">
						<option>US Dollar</option>
						<option>Euro</option>
				</select>
				</li>
			</ul>

			<div class="right_menu_corner"></div>
		</div>



		<br> <br>
<?php echo $this->Session->flash(); ?>
<br> ESTOY EN EL DEFAULT 2 CTP <br>
<?php echo $this->fetch('content'); ?>
<br> <br> <br>


									<div class="footer">


										<div class="left_footer">
        <? echo $this->Html->image('/images/footer_logo.png'); ?>
        </div>

										<div class="center_footer">
											<br />
        <? echo $this->Html->image('/images/payment.gif'); ?>
        </div>

										<div class="right_footer">
											<a href="index.html">home</a> <a href="details.html">about</a>
											<a href="details.html">sitemap</a> <a href="details.html">rss</a>
											<a href="contact.html">contact us</a>
										</div>

									</div>
									<div class=debug>
	<?php
	
	echo $this->element ( 'sql_dump' );
	echo $this->Js->writeBuffer ();
	
	?>
</div>
	
	</div>
	<!-- end of main_container -->


	</center>
</body>
</html>