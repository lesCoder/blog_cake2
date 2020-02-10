<h1>Usuários Registrados</h1>
<p><?php echo $this->Html->link('Novo usuário', array('action' => 'add'),array('class' =>'btn btn-primary',)); ?></p>
<table>
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<?php if($logged_in):?>
		<th>Ação</th>
		<?php endif; ?>
		<th>Data de Criação</th>
	</tr>

	<?php foreach ($users as $user) : ?>
		<tr>
			<td><?php echo $user['User']['id']; ?></td>
			<?php if($logged_in):?>
				
			<td>
				<?php echo $this->Html->link($user['User']['username'], array('action' => 'edit', $user['User']['id'])); ?>
			</td>
			<?php else: ?>
				
				<?php endif; ?>
			<td>
				<?php echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $user['User']['id']),
					array('confirm' => 'Comfirma a deleção?')
				);
				?>
			</td>
			<td><?php echo $user['User']['created']; ?></td>
		</tr>
	<?php endforeach; ?>

</table>
