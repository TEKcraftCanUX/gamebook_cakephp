<?php
class ChapterFixture extends CakeTestFixture {
  /* Optional. Set this property to load fixtures to a different test datasource */
  public $useDbConfig = 'test';
  
  public $fields = array(
    'ID' => array('type' => 'integer', 'key' => 'primary'),
    'Text' => array('type' => 'string', 'length' => 1000, 'null' => false),
    'BookID' => array('type' => 'integer', 'key' => 'foreign')
  );

  public $records = array(
    array('ID' => 1, 'Text' => 'On this First Level stairwell, the base of one of Orthanc\'s four huge spiral staircases looms above you. The solid stone helix fills the chamber so that only the next turn is visible. You pause, and fancy that you can hear distant, echoing steps! Only silence greets your straining ears, however. The ancient tower is haunted by the memory of long-dead Lords and Mystics. From here you can either climb up or enter the Entrance Hall. Move on.', 'BookID' => 2),
    array('ID' => 3, 'Text' => 'Here on the first floor stairwell begins one of the four spiraling stairways hewn out of the ebony rock of Orthanc. The stairwell faces you, its gleaming silver rail twisting skyward into the gloom above. From here you can either climb up or enter the Entrance hall.', 'BookID' => 2)
  );
}