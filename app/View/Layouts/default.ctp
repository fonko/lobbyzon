<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		::
		<?php echo $title_for_layout; ?>
		//-> 
		<?php echo $description?>
		
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
// echo $this->Html->css ('bootstrap');
// echo $this->Html->css ('bootstrap.min');
// echo $this->Html->css ('bootstrap-responsive');
// echo $this->Html->css ('bootstrap-responsive.min');
echo $this->Html->script ( 'boxOver' );
// echo $this->Html->script('jquery-1.7.2.min');
echo $this->Html->script ( 'jquery-1.8.1' );
echo $this->Html->script ( 'bootstrap' );
echo $this->Html->script ( 'bootstrap.min' );




echo $this->fetch ( 'meta' );
echo $this->fetch ( 'css' );
echo $this->fetch ( 'script' );

?>
</head>
<body>
<script>
$(document).ready(function () { 
$('.carousel').carousel({
  interval: 4000 // in milliseconds
})
});
 </script>    
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

			<div id=log>
		
		<?php
		$user = $this->session->read ();
		// pr($user);
		if (! isset ( $user ['Auth'] ['User'] ['id'] )) {
			
			?>		

        
        <div class="top_login">
					<table>
						<tr>
							<td>
        	<?php
			
			echo $this->Js->link ( $this->Html->image ( '/images/login.png' ), array ('controller' => 'users', 'action' => 'login' ), array ('escape' => false, 'update' => '#log', 'evalScripts' => true, 'before' => $this->Js->get ( '#busy-login' )->effect ( 'fadeIn', array ('buffer' => false ) ), 'complete' => $this->Js->get ( '#busy-login' )->effect ( 'fadeOut', array ('buffer' => false ) ) ) );
			?></td>
							<td><?php echo $this->Html->image('/images/login-load.gif', array('id' => 'busy-login')); ?></td>
						</tr>
					</table>
				</div>


		<?php
		} else {
			?>	


        <div class="top_login">
        	<?php echo $this->Html->link($this->Html->image('/images/logout.png'), array('controller'=>'users', 'action'=>'logout'), array('escape'=> false, 'onClick'=>'window.location.reload()'));?>
        </div>
		<?php } ?>  
		</div>
			<!-- top login -->
		</div>
		<div id="header">

			<div id="logo">
            <? echo $this->Html->link($this->Html->image('/images/logo.png'), '/', array('escape'=>false)); ?>
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

                         
	<?php
	
	if (! isset ( $user ['Auth'] ['User'] ['id'] )) {
		
		?>
                         <li>
                         
                        
                         <?php
		
		echo $this->Js->link ( 'Sign up', array ('controller' => 'Users', 'action' => 'add' ), array ('evalScripts' => true, 'before' => $this->Js->get ( '#busy-indicator' )->effect ( 'fadeIn', array ('buffer' => false ) ), 'complete' => $this->Js->get ( '#busy-indicator' )->effect ( 'fadeOut', array ('buffer' => false ) ), 'update' => '#center', 'class' => 'nav4' ) );
		$this->Js->get ( '.nav4' );
		$this->Js->event ( 'click', '$(".crumb_navigation").html("Home > Sign up")' );
		
		?> </li>
				<li class="divider"></li>     
                         
    <?php }else{ ?>
                         <li><?php
		$logo=$this->Html->image('/images/logo2.png');
		$usuario = $user ["Auth"] ["User"] ["username"];
		$path = '( ' . $usuario . ' ) Home ';
		$link_home = $this->Html->link ( $path, array ('controller' => 'Items', 'action' => 'index' ) );
		echo $this->Js->link ( 'My Account', array ('controller' => 'items', 'action' => 'account' ), array ('evalScripts' => true, 'before' => $this->Js->get ( '#busy-indicator' )->effect ( 'fadeIn', array ('buffer' => false ) ), 'complete' => $this->Js->get ( '#busy-indicator' )->effect ( 'fadeOut', array ('buffer' => false ) ), 'update' => '#left', 'class' => 'nav3' ) );
		$this->Js->get ( '.nav3' );
		$this->Js->event ( 'click', '$(".crumb_navigation").html(\'' . $link_home . '>> My Account\')' );
		$this->Js->event('click', '$("#center").html(\'<div class="center_title_bar">Bienvenido a su cuenta</div><div class="prod_box_big"><div class="top_prod_box_big"></div><div class="center_prod_box_big"><div class="product_img_big">'.$logo.'</div><div class="details_big_box"><div class="product_title_big">Utilice el menu de la izquierda para administrar su cuenta </div><div class="specifications"><br>Bienvenido nuevamente <span class="blue"><b>'.$usuario.'</b></span>, Esperamos que tengas un agradable sesion en lobbyzona hoy!</div></div></div><div class="bottom_prod_box_big"></div></div> \')');
		?></li>
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

		<!-- FIN DEL HEADER -->

		<div class="crumb_navigation">
				<?php
				$user = $this->session->read ();
				
				if (! isset ( $user ['Auth'] ['User'] ['id'] )) {
					echo __ ( 'Home' );
				} else {
					
					echo '( ' . $user ['Auth'] ['User'] ['username'] . ' ) Home';
				
				}
				?>
			</div>

		<!-- FIN DEL MENU YOU ARE HERE -->

		<div id="log_mensaje">
<?php echo $this->Session->flash(); ?>
</div>

<?php echo $this->fetch('content'); ?>
    
   <div class="footer">


			<div class="left_footer">
        <? echo $this->Html->image('/images/logo_abajo.png'); ?>
        </div>

			<div class="center_footer">
				<br />
        <? echo $this->Html->image('/images/payment.gif'); ?>
        </div>

			<div class="right_footer">
				<a href="index.html">home</a> <a href="details.html">about</a> <a
					href="details.html">sitemap</a> <a href="details.html">rss</a> <a
					href="contact.html">contact us</a>
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