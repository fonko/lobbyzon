<div class="articles form">
<?php echo $this->Form->create('Article', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Article'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('item_id');
		//echo $this->Form->input('transaction_id');
		echo $this->Form->radio('transaction', array('1'=>'venta', '2'=>'subasta'), array('value'=>'1'));
		?>
			<fieldset>
				<legend>Descripcion</legend>
		
		<?php 
		echo $this->Form->textarea('description', array('class' => 'contact_textarea'));
		?>
				
			</fieldset>
		<?
		
		//echo $this->Form->input('payment_id');
		echo $this->Form->input('payment_id', array('1'=>'Contado', '2'=>'Credito', 'label' => __('Payment')), array( 'value'=>'1')); //ESTABA ACA!! CON EL LABVEL QUE NO ME FUNCA
// 		echo $this->Form->input('field', array(
// 				'before' => '--before--',
// 				'after' => '--after--',
// 				'between' => '--between---',
// 				'separator' => '--separator--',
// 				'options' => array('1'=>'Contado', '2'=>'Credito')
// 		));
		//echo $this->Form->input('shipping_id');
		echo $this->Form->input('shipping_id', array(
									'type' => 'select',
									'options'=>array('1'=>'A cargo del comprador', '2'=>'A cargo del vendedor'), 
									'label' => __('Shipping'), 
									'value'=>'2')
								);
		
		echo $this->Form->input('leading_article', array(
												'options' => array('1'=>'destacado', '2'=>'normal'), 
									'label' => __('Leading Article'), 
									'value'=>'2')
								);
		?>						'type'=>'select', 

					<fieldset>
						<legend>Precio</legend>
				
		<?php
		echo $this->Form->input('price', array(
									'type'=>'text',
									'label'=> false)
								);
		echo $this->Form->radio('currency', array('1'=>'dolares', '2'=>'pesos'), array('value'=>'2'));
		?>
								
							</fieldset>
		<?
		$user = $this->session->read();
		echo $this->Form->input('user_id', array('type'=>'hidden', 'value' => $user['Auth']['User']['id']));
		

	?>
	
	</fieldset>
	<fieldset>
		<legend><?php echo __('Add Image'); ?></legend>
	<?php
	for ($i=0; $i<4; $i++){
		echo $this->Form->input("Image.$i.image", array('type' => 'file'));
	?>
		<legend><?php echo __('Add Image description'); ?></legend>
	<?php
		echo $this->Form->input("Image.$i.description", array('type' => 'text'));
	}
	?>
	</fieldset>


<?php echo $this->Form->end('asdf'); ?>
</div>
