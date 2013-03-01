<?php
App::uses('AppModel', 'Model');

class Book extends AppModel {
  public $belongsTo = array(
    'DefaultCharacterID' => array(
      'className' => 'Character',
      'foreignKey' => 'DefaultCharacterID'
    ));

  public function getDefaultCharacter($ID) {
    $characterID = $this->read('DefaultCharacterID', $ID);
    return $characterID['Book']['DefaultCharacterID'];
  }
}