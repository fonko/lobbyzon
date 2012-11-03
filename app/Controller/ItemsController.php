<?php
App::uses ( 'AppController', 'Controller' );
/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {
	
	public $paginate = array ('limit' => 30 );
	
	/**
	 * index method
	 *
	 * @return void
	 */
	
	public function index() {
		
		$this->Item->recursive = 0;
		$this->set ( 'items', $this->paginate () );
	
	}
	/**
	 * destacados method
	 *
	 * @throws NotFoundException
	 * @return void
	 */
	
	public function destacados(){
			if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
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
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
		
		$this->Item->id = $id;
		
		if (! $this->Item->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid item' ) );
		}
		
		
		$item = $this->Item->read ( null, $id );
	//	$trans = $this->Item->Article->Transaction->read();

		$this->set ( 'item', $item );
	//	$this->set ( 'trans', $trans );
	
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is ( 'post' )) {
			$this->Item->create ();
			if ($this->Item->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The item has been saved' ) );
				$this->redirect ( array ('action' => 'index' ) );
			} else {
				$this->Session->setFlash ( __ ( 'The item could not be saved. Please, try again.' ) );
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
		$this->Item->id = $id;
		if (! $this->Item->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid item' ) );
		}
		if ($this->request->is ( 'post' ) || $this->request->is ( 'put' )) {
			if ($this->Item->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The item has been saved' ) );
				$this->redirect ( array ('action' => 'index' ) );
			} else {
				$this->Session->setFlash ( __ ( 'The item could not be saved. Please, try again.' ) );
			}
		} else {
			$this->request->data = $this->Item->read ( null, $id );
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
		$this->Item->id = $id;
		if (! $this->Item->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid item' ) );
		}
		if ($this->Item->delete ()) {
			$this->Session->setFlash ( __ ( 'Item deleted' ) );
			$this->redirect ( array ('action' => 'index' ) );
		}
		$this->Session->setFlash ( __ ( 'Item was not deleted' ) );
		$this->redirect ( array ('action' => 'index' ) );
	}
	
	/**
	 * My_Account method
	 *
	 *
	 * @return void
	 */
	
	public function account() {
		
		if (! $this->Auth->loggedIn ()) {
			$this->Session->setFlash ( __ ( 'User not logged, please log in' ), 'default', array ('class' => 'error' ) );
			$this->redirect ( $this->Auth->redirect () );
		
		}
		
		if ($this->request->is ( 'ajax' )) {
			$this->layout = 'ajax';
		} else {
			$this->layout = 'default';
		}
	
	}
	
	/**
	 * before_filter method
	 *
	 *
	 * @return void
	 */
	
	public function beforeFilter() {
		
		parent::beforeFilter ();
		$this->set ( 'title_for_layout', __ ( 'Welcome to lobyzona.com' ) );
	}

}
