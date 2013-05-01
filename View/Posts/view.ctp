<h1><?php echo h($post['Post']['title']); ?>
	<small>
		<?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));?>
		<?php echo $this->Form->postLink('Delete', array('action'=>'delete')); ?>
	</small>
</h1>

<p>
	<small><?php echo h($post['Post']['created']); ?></br>
	<?php echo h($post['User']['username']); ?>
	</small>
</p>
<p><?php echo h($post['Post']['body']); ?></p>


