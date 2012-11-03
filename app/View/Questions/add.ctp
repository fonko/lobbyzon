<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Add Question'); ?></legend>
	<?php
		echo $this->Form->input('question', array(
									'type'=>'textarea',
									'label'=>false
								));
		//echo $this->Form->input('article_id');
		//echo $this->Form->input('answer');
		$user = $this->session->read();
		echo $this->Form->input('user_id', array('type'=>'hidden', 'value' => $user['Auth']['User']['id']));
		echo $this->Form->input('article_id', array('type'=>'hidden', 'value'=> $article['Article']['id']));
		//echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Js->submit(__('Submit'), array('update' => '#preguntado', 'div' => true, 'type' => 'html', 'async' => true));?>
<?php echo $this->Form->end(); ?>
</div>

