<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
		<table>
			<?php echo $this->Html->image('/images/ajax-loader.gif', array('id' => 'busy-indicator')); ?>
    <?php
		echo "<tr>
				<td>".__('Name')."</td>
				<td>";
		echo $this->Form->input('nombre', array('label'=>false));
		echo "</td></tr><tr><td>".__('Last Name')."</td><td>";
		echo $this->Form->input('apellido', array('label'=>false));
		echo "</td></tr><tr><td>".__('E-mail')."</td><td>";
		echo $this->Form->input('email', array('label'=>false));
		echo "</td></tr><tr><td>".__('Cellular')."</td><td>";
		echo $this->Form->input('cellular', array('type'=>'text', 'label'=>false));
		echo "</td></tr><tr><td>".__('Password')."</td><td>";
        echo $this->Form->input('password', array('label'=>false));
		echo "</td></tr><tr><td>".__('Username')."</td><td>";
        echo $this->Form->input('username', array('label'=>false));
		echo $this->Form->hidden('role', array('value'=>'author'));
 		echo "</td></tr>";
    ?>
	</table>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>



