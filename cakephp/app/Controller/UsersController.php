<?php

App::uses('AppController', 'Controller');


class UsersController extends AppController
{

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function isAuthorized($user)
    {
        //controla apenas qd for edição e deleção
        if (in_array($this->action, array('edit', 'delete'))) {
            //se for admin pode acessar tudo.
            if (isset($user['role']) && $user['role'] === 'admin') {
                return true;
            }
            //se o id do user logado for diferente do user selecionado, nega acesso
            if ($user['id'] != $this->request->params['pass'][0]) {
                return false;
            }
        }
        return true;
    }

    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all'));
    }

    public function view($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add()
    {

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {

                $this->save_pic($this->request->data);


                //já loga o user após a criacao
                if ($this->Auth->login()) {


                    $user_info = $this->User->findById(
                        $this->Auth->user('id'),
                        array('user_pic', 'username', 'role')
                    );

                    $this->user_info($user_info);
                }
                //die($this->Session->read('user_pic'));
                $this->Flash->set('Usuário salvo com sucesso');
                return $this->redirect($this->Auth->redirect());
                //return $this->redirect($this->referer());
                //$this->redirect(array('controller' => 'users', 'action' => 'edit/' . $this->User->id));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->save_pic($this->request->data);

            if ($this->User->save($this->request->data)) {

                $user_info = $this->User->findById(
                    $this->Auth->user('id'),
                    array('user_pic', 'username', 'role')
                );
                $this->user_info($user_info);

                $this->Flash->success(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->Auth->user('id') == $this->User->id) {
            $this->Session->setFlash('Você não pode excluir o seu próprio usuário');
            return $this->redirect($this->referer());
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function login()
    {

        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                $user_info = $this->User->findById(
                    $this->Auth->user('id'),
                    array('user_pic', 'username', 'role')
                );

                $this->user_info($user_info);

                //$this->redirect($this->Auth->redirect());
                $this->redirect($this->referer());
            } else {
                $this->Flash->set('Usuário ou senha inválido(s)');
            }
        }

        if (isset($this->viewVars['current_user']['id'])) {




            if ($this->viewVars['current_user']['role'] == 'admin') {
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->redirect(array('controller' => 'users', 'action' => 'edit/' . $this->viewVars['current_user']['id']));
            }
        }
    }

    public function logout()
    {
        $this->Session->destroy('user_pic');
        //$this->Session->write('user_pic', $this->viewVars['current_user']['user_pic']);
        $this->redirect($this->Auth->logout());
    }

    public function save_pic($data)
    {
        if (isset($data['Document']['user_pic']['tmp_name']) && !empty($data['Document']['user_pic']['tmp_name'])) {

            $tmp = $data['Document']['user_pic']['tmp_name'];
            $x = base64_encode(file_get_contents($tmp));
            return $this->User->saveField('user_pic', $x);
        }
        return false;
    }
}
