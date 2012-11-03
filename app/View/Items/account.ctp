<?php
$user = $this->session->read ();
?>
<div class="title_box">Categories</div>
<ul class="left_menu">
	<li class="odd ventas"><?php echo $this->Js->link('Vender', array('controller'=>'articles', 'action'=>'add'), array('update'=> '#center')); ?></li>
	<li class="even compras"><a href=#>Mis compras</a></li>
	<li class="odd preguntas"><a href=#>Mis Preguntas</a></li>
	<li class="even"><?php echo $this->Js->link(__('My Articles'), array('controller'=>'articles', 'action'=>'verDeUsuario', $user['Auth']['User']['id']), array('update'=>'#center'));?>
	

</ul>
