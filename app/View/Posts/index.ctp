<!-- File: /app/View/Posts/index.ctp -->
<h1>Blog posts</h1>
<?php echo $this->Html->link('Add Post', array('controller'=>'posts','action'=>'add')); ?>
<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Created</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
	<!-- Here is where we loop through our $posts 
		array, printing out post info -->
		
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post['Post']['id']; ?></td>
		<td>
			<?php 
			/*
			 * For URL = www.example.com/controller/action/param1/param2
			 * 
			 * param1,param2,etc are parameters of the action() method defined in
			 * the controller and will be passed to the method when the URL is requested.
			 */
			echo $this->Html->link($post['Post']['title'], array('controller' => 'posts','action'=>'view',$post['Post']['id'])); ?>
		</td>
		<td>
        <?php echo $post['Post']['created']; ?>
    </td>
    <td>
        <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));?>
    </td>
    <td>
        <?php echo $this->Form->postLink('Delete', 
        								array('action' => 'delete', $post['Post']['id']), 
        								array('confirm' => 'Are you sure?'));?>
    </td>
	</tr>
	<?php endforeach; ?>
	
</table>