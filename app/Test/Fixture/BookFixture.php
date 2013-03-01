<?php
class BookFixture extends CakeTestFixture {
  /* Optional. Set this property to load fixtures to a different test datasource */
  public $useDbConfig = 'test';
  
  public $fields = array(
    'ID' => array('type' => 'integer', 'key' => 'primary'),
    'Title' => array('type' => 'string', 'length' => 255, 'null' => false),
    'DefaultCharacterID' => array('type' => 'integer', 'null' => false, 'key' => 'foreign')
  );

  public $records = array(
    array('ID' => 1, 'Title' => 'Treason at Helm\'s Deep', 'DefaultCharacterID' => 1),
    array('ID' => 2, 'Title' => 'A Spy in Isengard', 'DefaultCharacterID' => 2)
  );
}