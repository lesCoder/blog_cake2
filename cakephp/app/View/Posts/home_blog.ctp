<?php
$first = true;
$i = 0;

?>
<?php foreach ($homeBlog as $post) : $text_color = 'success'; ?>
  <?php
  if ($first) :  $first = false; ?>
    <div class="jumbotron p-4 p-md-6 text-white rounded bg-dark">
      <div class="col-md-12 px-0">
        <h1 class="display-4 font-italic"><?= $post['Post']['title'] ?></h1>
        <p class="lead my-3"><?= $post['Post']['body'] ?></p>

        <p class="lead mb-0"><?= $this->Html->link('Continue Lendo...', array('action' => 'view', $post['Post']['id']), array('class' => 'btn btn-dark float-right',)) ?></p>
      </div>
    </div>
  <?php

  else :
    $i++;
  ?>

    <?php /*Usando para controlar a criação da div que mantem junto dois quadros*/
    if ($i % 2) : $text_color = 'primary'; ?>
      <div class="row mb-2">
      <?php endif; ?>
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-<?= $text_color ?>">Tecnologia</strong>
            <h3 class="mb-0"><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?></h3>
            <div class="mb-1 text-muted"><?= date('F j, Y', strtotime($post['Post']['created'])) ?></div>
            <p class="card-text mb-auto"><?= substr($post['Post']['body'], 0, -10) ?></p><br>
            <?= $this->Html->link('Continue Lendo...', array('action' => 'view', $post['Post']['id']), array('class' => 'stretched-link',)) ?>
          </div>
        </div>
      </div>

      <?php if ($text_color == 'success') : ?>
      </div>
    <?php endif; ?>

  <?php endif;

  ?>
<?php endforeach; ?>
<?php if ($i % 2) : ?>
  </div>
<?php endif; ?>