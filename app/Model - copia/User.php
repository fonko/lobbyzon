<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
	
	
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	public $name = 'User';
	public $hasMany = array(
			'Article' => array(
					'className'     => 'Article',
					'foreignKey'    => 'user_id',
// 					'conditions'    => array('Article.status' => '1'),
// 					'order'         => 'Article.created DESC',
// 					'limit'         => '5',
// 					'dependent'     => true
			)
	);

}
