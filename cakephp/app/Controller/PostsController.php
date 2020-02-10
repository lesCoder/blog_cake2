<?php
App::uses('AppController', 'Controller');
App::uses('Comment', 'Model');
App::uses('User', 'Model');

class PostsController extends AppController
{

	public $components = array('Flash');

	public function index()
	{

		$this->set('posts', $this->Post->find('all'));
	}

	public function get_users_comments($posts)
	{
		$User = new User();
		$user_comment = [];
		foreach ($posts['Comment'] as $key => $value) {
			$user_comment = $User->findById($value['user_id'], array('username','user_pic'));
			
			$posts['Comment'][$key]['username'] = $user_comment['User']['username'];
			$posts['Comment'][$key]['user_pic'] = $user_comment['User']['user_pic'];
		}
		
		//inverte a ordem dos comentários para ficar do mais recente para o último
		$posts['Comment'] = array_reverse($posts['Comment']);
		return $posts;
	}

	public function view($id)
	{
		$posts = $this->Post->findById($id,"",array('id desc'));		
		//faz a busca pelo nome do autor do comentario e insere no array
		$posts = $this->get_users_comments($posts);

		$this->set('post', $posts);
	}

	public function homeBlog()
	{

		$this->set('homeBlog', $this->Post->find('all', array(
			'order' => array('id DESC')
		)));
	}

	public function add()
	{

		if ($this->request->is('post')) {

			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('Your post has been saved.'));
				return $this->redirect(array('action' => 'homeBlog'));
			}
		}
	}

	function edit($id = null)
	{
		$this->Post->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Post->findById($id);
		} else {
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success('Your post has been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}

	function delete($id)
	{
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Post->delete($id)) {
			$this->Flash->success('The post with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}

	public function isAuthorized($user)
	{
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

	public function search_bar(){

		$s = htmlspecialchars($this->request->data['text_busca'], ENT_QUOTES, 'utf-8');

		$r = $this->Post->query("select id,title,created from posts WHERE title RLIKE  '[[:<:]]".$s."[[:>:]]' or body RLIKE '[[:<:]]".$s."[[:>:]]';");
		$data[0]['Post'] = $r[0]['posts'];
		//var_dump($r);
		//die();
		$this->set('posts',$data);
		$this -> render('/Posts/index');


		//$this->redirect('/Posts/view',301);

	}
}
