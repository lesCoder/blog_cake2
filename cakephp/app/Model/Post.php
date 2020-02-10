<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {
	public $name = 'Post';
	public $hasMany = 'Comment';

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
        )
	);

    
	public function isOwnedBy($post, $user) {
		return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}
}
