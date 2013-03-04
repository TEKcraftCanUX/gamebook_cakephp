<?php
App::uses('AppModel', 'Model');

class Chapter extends AppModel {
  public $belongsTo = array(
    'Book' => array(
      'className' => 'Book',
      'foreignKey' => 'BookID'
    ));

  

  
}