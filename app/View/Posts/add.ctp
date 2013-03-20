<h1>Add Post</h1>
<?php 
echo $this->Form->create('Post'); 
// echo $this->Form->input('title'); 
?>
<input name="data[Post][title]" maxlength="50" type="text" id="PostTitle">
<?php 
echo $this->Form->input('body',array('rows'=>'3'));
echo $this->Form->end('Save Post');
?>
