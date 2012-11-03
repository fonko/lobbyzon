<div class="shippings view">
<h2><?php  echo __('Shipping'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shipping['Shipping']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($shipping['Shipping']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shipping'), array('action' => 'edit', $shipping['Shipping']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shipping'), array('action' => 'delete', $shipping['Shipping']['id']), null, __('Are you sure you want to delete # %s?', $shipping['Shipping']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shippings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Articles'); ?></h3>
	<?php if (!empty($shipping['Article'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Transaction Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Payment Id'); ?></th>
		<th><?php echo __('Shipping Id'); ?></th>
		<th><?php echo __('Leading Article'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shipping['Article'] as $article): ?>
		<tr>
			<td><?php echo $article['id']; ?></td>
			<td><?php echo $article['name']; ?></td>
			<td><?php echo $article['item_id']; ?></td>
			<td><?php echo $article['transaction_id']; ?></td>
			<td><?php echo $article['description']; ?></td>
			<td><?php echo $article['payment_id']; ?></td>
			<td><?php echo $article['shipping_id']; ?></td>
			<td><?php echo $article['leading_article']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), null, __('Are you sure you want to delete # %s?', $article['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
