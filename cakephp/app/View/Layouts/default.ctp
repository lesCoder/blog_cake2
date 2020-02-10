<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>

<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('bootstrap-grid.min');
	echo $this->Html->css('bootstrap-reboot.min');
	echo $this->Html->css('blog');

	echo $this->Html->script('jquery');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->script('bootstrap.bundle.min');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>

<body>
<div id="container" class="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="<?=$this->Html->url(array('controller' => 'posts', 'action' => 'homeBlog'))?>">Blogão</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<?php echo $this->Html->link(
							'Home',
							array('controller' => 'posts', 'action' => 'homeBlog'),
							array('class' => 'nav-link')
						);
						?>
					</li>
					<li class="nav-item">
						<?php echo $this->Html->link(
							'Área do usuário',
							array('controller' => 'users', 'action' => 'login'),
							array('class' => 'nav-link')
						);
						?>
					</li>
					<?php if ($this->Session->read('role') == 'admin') : ?>
					<li class="nav-item">
					<?php echo $this->Html->link(
								'Criar Postagem',
								array('controller' => 'posts', 'action' => 'add'),
								array('class' => 'nav-link')
							);
							?>
					</li>
					<li class="nav-item">
					<?php echo $this->Html->link(
								'Editar Postagens',
								array('controller' => 'posts', 'action' => 'index'),
								array('class' => 'nav-link')
							);
							?>
					</li>
					<?php endif; ?>
					<?php if ($logged_in) : ?>
						<li class="nav-item">
							<?php echo $this->Html->link(
								'Sair',
								array('controller' => 'users', 'action' => 'logout'),
								array('class' => 'nav-link')
							);
							?>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	
		<div class="row" style='margin-top:4%'>
			<div class="col-lg-8 col-sm-12">
				<header class="blog-header py-3">
					<!-- <div class="row flex-nowrap justify-content-between align-items-center" >

     <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
        </a>
		<?php if ($logged_in) : ?>
				Olá <?= $current_user['username']; ?>. <?= $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-sm btn-outline-secondary')) ?>
			<?php else : ?>
				<?= $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-sm btn-outline-secondary')) ?>
			<?php endif; ?>
      </div>
    </div>-->
				</header>
					<?php echo $this->Session->flash('auth'); ?>
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
			</div>
			<!--<div id="footer">
					<?php echo $this->Html->link(
						$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
						'https://cakephp.org/',
						array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
					);
					?>
					
				</div>
				-->
			<div class="col-lg-4 col-sm-12">
			<?php echo $this->element('Posts/search_bar'); ?>

				
					
				<div class="card my-4 xs-col-12">
				<?php if ($logged_in) : ?>
					<h5 class="card-header">Perfil - <?=$this->Session->read('user_name')?></h5>
				<?php else: ?>
					<h5 class="card-header">Não Logado</h5>
				<?php endif ?>
					<div class="card-body">
						<div class="input-group">
							<div class="text-center">
							<?php if ( $logged_in && $this->Session->check('user_pic') ) : ?>
								<img style='width: 100%;' class="img-responsive rounded float-left" src="data:image/jpeg;base64,<?= $this->Session->read('user_pic') ?>" />
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
	<p>
						<?php //echo $cakeVersion; ?>
					</p>
</body>

</html>
