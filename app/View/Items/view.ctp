<div class="items view">
	<h2><?php  echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($item['Item']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related Articles'); ?></h3>
	<?php if (!empty($item['Article'])): ?>
	<table cellpadding="0" cellspacing="0">
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
	
	$categoria = $item['Item']['name'];
	$catid= $item['Item']['id'];
	

		$i = 0;
		foreach ( $item ['Article'] as $article ) :


		
	if ($article  ['currency'] == 1) {
		
		$article  ['price2'] = $this->Currency->toForeign ( $article ['price'] );
		$moneda ['1'] = 'U$S';
		$moneda ['2'] = "$";
	
	} else {
		
		$article  ['price2'] = $this->Currency->toBase ( $article ['price'] );
		$moneda ['1'] = "$";
		$moneda ['2'] = 'U$S';
	
	}
	
	

 //echo $this->element('producto', array('article'=>$article, 'moneda' => $moneda));
 echo $this->element('producto', array('article'=>array('Article' => $article, ), 'moneda' => $moneda, 'categoria' => $categoria, 'catid' => $catid, 'version' => 2 ));


 endforeach; 

 endif; ?>

<!-- 	<div class="actions"> -->
<!-- 		<ul> -->
			<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
<!-- 		</ul> -->
<!-- 	</div> -->
</div>
