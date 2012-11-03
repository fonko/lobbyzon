<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses ( 'Controller', 'Controller' );

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $helpers = array ('Js' => array ('Jquery' ), 'Html', 'Form', 'Session', 'Time' );
	
	public $components = array (
			
			'Resize',
			
	'Session', 
	'Auth'=> array(
        'authenticate' => array(
            'Form' => array(
                'fields' => array(
                		'username' => 'email'
                		)
            		)
        		),
	'loginRedirect' => array ('controller' => 'Items', 'action' => 'index' ), 'logoutRedirect' => array ('controller' => 'Articles', 'action' => 'index' ), 'authorize' => array ('Controller' ) )

	, 'Currency' );
	
	public function isAuthorized($user) {
		
		if (isset ( $user ['role'] ) && $user ['role'] === 'admin') {
			
			return true;
		}
		
		return false;
	
	}
	
	public function beforeFilter() {
		

		$this->Currency->setVal ( 'UYU', 'USD' );
		$this->disableCache ();
		$description = __ ( 'The place where you can ask for things and they will come to you!' );
		$this->set ( 'description', $description );
		$this->Auth->allow ( 'index', 'view', 'account', 'add', 'verDeUsuario', 'confirm', 'destacados', 'sacoimagen' );
		$this->set ( 'usuario', $this->Auth->user ( 'role' ) );
	
	}

}
