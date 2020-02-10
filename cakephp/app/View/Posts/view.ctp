<!-- File: /app/View/Posts/view.ctp -->
<?php
//die( json_encode($x) );

?>
<h1><?php echo $post['Post']['title'] ?></h1>

<p><small>Publicação: <?php echo $post['Post']['created'] ?></small></p>

<p><?php echo $post['Post']['body'] ?></p>

<div class="card my-4">
	<h5 class="card-header">Deixe um comentário:</h5>
	<div class="card-body">
		<?php
		echo $this->Form->create('Comment', array(
			'url' => array('controller' => 'Comments', 'action' => 'add'),
			'id' => 'form-login',
			'inputDefaults' => array('label' => false, 'div' => false),
		));

		
		?>
		<div class="form-group">
			<?= $this->Form->input('body', array('rows' => '3', 'class' => 'form-control')) ?>
			<?= $this->Form->hidden('post_id', array('value' => $post['Post']['id'])) ?>
			<?= $this->Form->hidden('user_id', array('value' => $this->viewVars['current_user']['id'])) ?>
		</div>
		<?= $this->Form->end(array('label' => 'Enviar', 'class' => 'btn btn-primary')) ?>
	</div>
</div>

<div class="card my-4">
	<h5 class="card-header">Outros Comentários</h5>
	<?php

	?>
	<div class="card-body">
		<?php foreach ($post['Comment'] as $comment) : ?>

			<div class="media mb-4">
				<?php if (isset($comment['user_pic'])) : ?>
					<img style='width: 65px;' class="img-responsive rounded float-left" src="data:image/jpeg;base64,<?= $comment['user_pic'] ?>" />
				<?php else : ?>
					<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
				<?php endif ?>

				<div class="media-body">
					<h5 class="mt-0"><?= $comment['username'] ?></h5>
					<?= $comment['body'] ?>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
</div>