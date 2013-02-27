<?php
App::uses('AppController', 'Controller');
/**
 * Game Controller
 *
 * 
 */
class GameController extends AppController {
	public function start(){
		$this->redirect(array('controller' => 'BookList', 
			'action'=>'index'));
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Dealer->recursive = 0;
		$this->set('dealers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Dealer->id = $id;
		if (!$this->Dealer->exists()) {
			throw new NotFoundException(__('Invalid dealer'));
		}
		$this->set('dealer', $this->Dealer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dealer->create();
			if ($this->Dealer->save($this->request->data)) {
				$this->Session->setFlash(__('The dealer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dealer could not be saved. Please, try again.'));
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
		$this->Dealer->id = $id;
		if (!$this->Dealer->exists()) {
			throw new NotFoundException(__('Invalid dealer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Dealer->save($this->request->data)) {
				$this->Session->setFlash(__('The dealer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dealer could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Dealer->read(null, $id);
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
		$this->Dealer->id = $id;
		if (!$this->Dealer->exists()) {
			throw new NotFoundException(__('Invalid dealer'));
		}
		if ($this->Dealer->delete()) {
			$this->Session->setFlash(__('Dealer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Dealer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
