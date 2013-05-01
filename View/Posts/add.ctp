<h1>Add Post</h1>
<?php 
echo $this->Form->create('Post'); 
echo $this->Form->input('title');
?>

<!-- Examples used to understand that hardcoding the input field will NOT generate error messages automagically.
<label for="PostTitle">Title</label>
<input name="data[Post][title]" id="PostTitle" /> -->

<?php 
echo $this->Form->input('body',array('rows'=>'3'));
echo $this->Form->end('Save Post');
?>
