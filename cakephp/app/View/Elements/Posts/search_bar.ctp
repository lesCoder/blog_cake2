
<div class="card my-4">
    <h5 class="card-header">Busca</h5>
    <div class="card-body">
        <div class="input-group">
            <?php echo $this->Form->create(false, array(
    'url' => array('controller' => 'Posts', 'action' => 'search_bar'),
    'id' => 'search'
)); ?>

<?php echo    $this->Form->input(
            'text_busca',
            array(
                'label' => array('text' => '', 'class' => 'strong'), 'placeholder' => "Buscar por ...", 'class' => 'form-control',
                'div' => array('class' => "form-group " )                
            )
        );?>            
            
            <span class="input-group-btn">
            <?php echo $this->Form->button('Buscar',
array('label' => 'Save', 'class' => 'btn btn-secondary', 'div' => false)
        ); ?>
            </span>
            
        </div>
    </div>
</div>
