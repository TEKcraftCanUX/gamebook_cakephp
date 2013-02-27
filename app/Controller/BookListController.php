<?php
App::uses('AppController', 'Controller');
/**
 * Game Controller
 *
 * 
 */
class BookListController extends AppController {
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BookList->recursive = 0;
		$this->set('books');
	}
}
