<h1>Postagens</h1>
<?php if($logged_in):?>
<p><?php echo $this->Html->link('Nova Postagem', array('action' => 'add'),array('class' =>'btn btn-primary',)); ?></p>
<?php endif; ?>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Título</th>
        <?php if($logged_in):?>
        <th>Ação</th>
        <?php endif; ?>
        <th>Data de Criação</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo as informações dos posts -->

    <?php  foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <?php if($logged_in):?>
            <td>
                <?php echo $this->Html->link($post['Post']['title'], array('action' => 'edit', $post['Post']['id']));?>
            </td>
            <?php else: ?>
                <td>
                <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
            </td>
            <?php endif; ?>
            <?php if($logged_in):?>
            <td>
                <?php echo $this->Form->postLink(
                    'Apagar',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?'));
                ?>
            </td>
            <?php endif; ?>
            <td><?php echo $post['Post']['created']; ?></td>
        </tr>
    <?php endforeach; ?>

</table>
<?php
	$this->end();
?>
