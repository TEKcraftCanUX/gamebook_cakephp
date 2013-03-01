<?php
class CharacterFixture extends CakeTestFixture {
  /* Optional. Set this property to load fixtures to a different test datasource */
  public $useDbConfig = 'test';
  
  public $fields = array(
    'ID' => array('type' => 'integer', 'key' => 'primary'),
    'Name' => array('type' => 'string', 'length' => 255, 'null' => false)
  );

  public $records = array(
    array('ID' => 1, 'Name' => 'Folcwine'),
    array('ID' => 2, 'Name' => 'Rana')
  );
}