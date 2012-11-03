<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Article $Article
 * @property User $User
 */
class Question extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'question';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Article' => array(
			'className' => 'Article',
			'foreignKey' => 'article_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
