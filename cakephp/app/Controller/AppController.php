<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Html', 'Form', 'Flash','Session');
	public $components = array(
		'Flash','Session',
		'Auth' => array(
			'loginRedirect' => array( 'action' => 'index'),
			'logoutRedirect' => array(
				'controller' => 'posts',
				'action' => 'homeBlog'
			),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish'
				)
			),
			'authorize' => array('Controller')
		)
	);

	function beforeFilter() {
		//echo json_encode($this->request);exit;

		

		$this->Auth->allow('index', 'view','homeBlog','search_bar');
		
		$this->set('logged_in', $this->Auth->loggedIn());
		
		$this->set('current_user', $this->Auth->user());
		
	}

	public function isAuthorized($user) {
		
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}

		// Default deny
		return false;
	}

	//responsavel por armazenar info para navegacao de uma sessao ativa de um user especifico
	public function user_info($user_info){
		$this->Session->write('user_pic', $user_info['User']['user_pic']);
		$this->Session->write('user_name', $user_info['User']['username']);
		$this->Session->write('role', $user_info['User']['role']);
	}

}
