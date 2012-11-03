<?php
App::uses('AppController', 'Controller');
/**
 * Shippings Controller
 *
 * @property Shipping $Shipping
 */
class ShippingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Shipping->recursive = 0;
		$this->set('shippings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Shipping->id = $id;
		if (!$this->Shipping->exists()) {
			throw new NotFoundException(__('Invalid shipping'));
		}
		$this->set('shipping', $this->Shipping->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Shipping->create();
			if ($this->Shipping->save($this->request->data)) {
				$this->Session->setFlash(__('The shipping has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipping could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Shipping->id = $id;
		if (!$this->Shipping->exists()) {
			throw new NotFoundException(__('Invalid shipping'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shipping->save($this->request->data)) {
				$this->Session->setFlash(__('The shipping has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shipping could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shipping->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Shipping->id = $id;
		if (!$this->Shipping->exists()) {
			throw new NotFoundException(__('Invalid shipping'));
		}
		if ($this->Shipping->delete()) {
			$this->Session->setFlash(__('Shipping deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shipping was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
