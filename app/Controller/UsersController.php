<?php
App::uses ( 'AppController', 'Controller' );
App::uses ( 'CakeEmail', 'Network/Email' );
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->disableCache ();
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default2';
		}
		$this->User->recursive = 0;
		$this->set ( 'users', $this->paginate () );
	}
	
	/**
	 * beforeFilter method
	 *
	 * @return void
	 */
	
	public function beforeFilter() {
		
		parent::beforeFilter ();
		$this->Auth->allow ( 'add', 'logout' ); // Letting users register
			                                        // themselves
	}
	
	/**
	 * login method
	 *
	 * @return void
	 */
	
	public function login() {
		
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default2';
		}
		

		
		if ($this->request->is ( 'post' )) {

			$usuario = $this->User->find ( 'first', array ('conditions' => array ('email' => $this->request->data ['User'] ['email'] ) ) );
			
			if (isset ( $usuario ['User'] ['id'] )) {
				
				$validado = $usuario ['User'] ['random_hash'] == 'activated';
				
				switch ($validado) {
					case true :
						
						if ($this->Auth->login ()) {
							$this->redirect ( $this->Auth->redirect () );
						} else {
							$this->layout = 'default2';
							
							$this->Session->setFlash ( __ ( 'invalid user name or password, try again' ), 'default', array ('class' => 'error' ) );
						
						}
						
						break;
					case false :
						
						$this->Session->setFlash ( __ ( 'You need to validate your email!' ), 'default', array ('class' => 'error' ) );
						break;
				
				}
			} else {
				$this->Session->setFlash ( __ ( 'You need to register!' ), 'default', array ('class' => 'error' ) );
			}
		}
	}
	
	/**
	 * logout method
	 *
	 * @return void
	 */
	
	public function logout() {
		$this->layout = 'ajax';
		if ($this->Auth->logout ()) {
			
			$this->redirect ( array ('controller' => 'items', 'action' => 'index' ) );
		} else {
			$this->Session->setFlash ( __ ( 'Invalid username or password, try again' ) );
		}
	}
	
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param $id string       	
	 * @return void
	 */
	public function view($id = null) {
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		$this->set ( 'user', $this->User->read ( null, $id ) );
	}
	
	/**
	 * confirm method
	 *
	 * @return void
	 */
	
	public function confirm($hash = null) {
		
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
		$usuario = $this->User->find ( 'first', array ('conditions' => array ('random_hash' => $hash ) ) );
		
		if (isset ( $usuario ['User'] ['id'] )) {
			$this->User->id = $usuario ['User'] ['id'];
			$this->User->set ( 'random_hash', 'activated' );
			$this->User->save ();
			$this->Session->setFlash ( __ ( 'User was confirmed! you may login now.' ) );
			// $this->redirect ( array ('controller'=> 'items', 'action' =>
			// 'index' ) );
		} else {
			$this->Session->setFlash ( __ ( 'User doesn\'t exist' ) );
		
		}
	
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
		if ($this->request->is ( 'post' )) {
			$this->User->create ();
			$random_hash = substr ( md5 ( uniqid ( rand (), true ) ), 16, 16 );
			$this->request->data ['User'] ['random_hash'] = $random_hash;
			if ($this->User->save ( $this->request->data )) {
				$email = new CakeEmail ();
				try {
					$email->template ( 'default' )->emailFormat ( 'html' )->to ( $this->request->data ['User'] ['email'] )->from ( 'info@lobbyzona.com' )->subject ( 'Estas a tan solo un paso!' )->viewVars ( array ('hash' => $random_hash ) )->send ();
				} catch ( SocketException $e ) {
					debug ( $e->getMessage () );
				}
				$this->Session->setFlash ( __ ( 'Now you need to confirm your account, go to your email!' ) );
				$this->redirect ( array ('action' => 'index' ) );
			} else {
				$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		}
	}
	
	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param $id string       	
	 * @return void
	 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->request->is ( 'post' ) || $this->request->is ( 'put' )) {
			if ($this->User->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The user has been saved' ) );
				$this->redirect ( array ('action' => 'index' ) );
			} else {
				$this->Session->setFlash ( __ ( 'The user could not be saved. Please, try again.' ) );
			}
		} else {
			$this->request->data = $this->User->read ( null, $id );
		}
	}
	
	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param $id string       	
	 * @return void
	 */
	public function delete($id = null) {
		if (! $this->request->is ( 'post' )) {
			throw new MethodNotAllowedException ();
		}
		$this->User->id = $id;
		if (! $this->User->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid user' ) );
		}
		if ($this->User->delete ()) {
			$this->Session->setFlash ( __ ( 'User deleted' ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->Session->setFlash ( __ ( 'User was not deleted' ) );
		$this->redirect ( array ('action' => 'index' ) );
	}
}
