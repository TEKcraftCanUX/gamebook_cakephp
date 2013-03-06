<?php
App::uses('AppModel', 'Model');

class Book extends AppModel {
  public $belongsTo = array(
    'DefaultCharacterID' => array(
      'className' => 'Character',
      'foreignKey' => 'DefaultCharacterID'
    ));

  public $hasMany = array(
        'Chapter' => array(
            'className' => 'Chapter',
            'foreignKey' => 'BookID'
        	));

  public function getDefaultCharacter($ID) {
    $characterID = $this->read('DefaultCharacterID', $ID);
    return $characterID['Book']['DefaultCharacterID'];
  }

  public function getTitle($ID){
  	$bookTitle = $this->read('Title', $ID);
    return $bookTitle['Book']['Title'];
  }

  public function getChapters($ID){
  	 //$chapters = $this->Chapter->find('all', $ID);
  	$chapters = $this->Chapter->read('ID', $ID);
  	// return $chapters[''];
  	return array(1,3);
  }
}