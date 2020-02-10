<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<h1>Edição de Cometário</h1>
<?php
echo $this->Form->create('Comment');

echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');
?>

<script>
    CKEDITOR.replace('data[Comment][body]');
</script>