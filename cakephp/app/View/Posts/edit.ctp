<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<h1>Edição de Postagem</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>

<script>
    CKEDITOR.replace('data[Post][body]');
</script>
