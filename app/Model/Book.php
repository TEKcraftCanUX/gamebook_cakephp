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
  	 $chapters = $this->Chapter->find('all', array(
  	 		'conditions' => array('Chapter.BookID =' => $ID)
  	 	));
  	 //throw new Exception('test' . $ID);
  	 // store the ID's in an array (there's probably a built-in method to do this - feel free to edit below code if you know how)
  	 $chapterIDs = array();
  	 foreach ($chapters as $chapter){
  	 	array_push($chapterIDs, $chapter['Chapter']['ID']);
  	 }
  	 return $chapterIDs;
  }
}