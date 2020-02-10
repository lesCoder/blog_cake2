<h1>Alteração de Usuário</h1>
<div class="users form">
<?php echo $this->Form->create('User',array('autocomplete' => 'off','enctype'=>'multipart/form-data'));?>

    <fieldset>        
        
        <?php
        echo	$this->Form->input('username',
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
        if($this->viewVars['current_user']['role'] == "admin"){
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author'),
            'label' => array('text' => '',)
        ));
    ?>
    <div class="form-group">
    <?php
    }else{
		echo $this->Form->input('role', array(
			'options' => array('visitante' => 'Visitante'), array('class' => 'class="form-control"','text' => '')
		));
    }?>
    
    <?php
    
    
        echo $this->Form->file('Document.user_pic');
    ?>
    <p>Você pode inserir um avatar aqui.<br></p>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
