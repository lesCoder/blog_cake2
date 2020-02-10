<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {
	public $name = 'Comments';
	//public $hasOne = array('Post','User');
	
	public $belongsTo = array(
        'Comment' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
        )
    );

    
    public $validate = array(
        'body' => array(
            'rule' => 'notBlank'
        )
	);

	
}
