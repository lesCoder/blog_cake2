<?php
App::uses('AppController', 'Controller');

class CommentsController extends AppController {
    

    public function index() {

        $this->set('comments', $this->Comment->find('all'));
    }

    public function view($id) {

        $this->set('Comment', $this->Comment->findById($id));
    }

	public function add() {
		
		//var_dump($this->request);
		//exit;
		
		if ($this->request->is('post')) {

			//Added this line
			//$this->request->data['Comment']['user_id'] = 2;
			$this->request->data['Comment']['user_id'] = $this->Auth->user('id');
			if ($this->Comment->save($this->request->data)) {
				$this->Flash->set('Seu comentário foi registrado');
				
				//die( json_encode($this->referer()) );
				return $this->redirect($this->referer());
				//return $this->redirect(array('controller' => 'posts', 'action' => 'homeBlog'));
			}
		}
	}

	function edit($id = null) {
		$this->Comment->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Comment->findById($id);
		} else {
			if ($this->Comment->save($this->request->data)) {
				$this->Flash->success('Your post has been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function delete($id) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Comment->delete($id)) {
			$this->Flash->success('The post with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$CommentId = (int) $this->request->params['pass'][0];
			if ($this->Comment->isOwnedBy($CommentId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
	
	public function hist_comments(){
		$user_id = $this->Auth->user();
		/*TERMINAR*/ 
		$r = $this->Comment->query("select id,body from comments where user_id = ".$user_id['id']);
		//var_dump($r);exit;
		$this -> render('/comments/edit/');
		
		//die('oi');
	}

	function beforeFilter() {
		
		//echo json_encode($this->request);exit;

		if(!$this->Auth->login()){
			$this->Auth->authError = "Para fazer um comentário você precisa estar logado.";
			return true;
		}
		
}
}
