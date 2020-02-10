<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));?>
    <fieldset>
        <legend>
            <?php echo __('Insira seu usuário e senha'); ?>
        </legend>
	<?php echo	$this->Form->input('username',
		array(
        'label' => array('text' => '', 'class' => 'strong'), 'placeholder' => "Usuário", 'class' => 'form-control',
        'div' => array('class' => "form-group ".($this->Form->isFieldError('username') ? 'has-error' : '') ),
        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))
        )
	);
	echo	$this->Form->input('password',
		array(
        'label' => array('text' => '', 'class' => 'strong'), 'placeholder' => "Senha", 'class' => 'form-control',
        'div' => array('class' => "form-group ".($this->Form->isFieldError('password') ? 'has-error' : '') ),
        'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block has-error'))
        )
	);
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<br>

<?= $this->Html->link('Ainda não tem Cadastro? Clique aqui.', array('controller' => 'Users', 'action' => 'add'),array('class' => 'btn btn-primary ',)) ?>
</div>
