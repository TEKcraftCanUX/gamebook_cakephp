<?php
App::uses('Book', 'Model');

class BookTest extends CakeTestCase {
  public $fixtures = array('app.book', 'app.character');

  public function setUp() {
    parent::setUp();
    $this->Book = ClassRegistry::init('Book');
  }

  public function testShouldHaveADefaultCharacter() {
    $result = $this->Book->getDefaultCharacter(1);
    $expected = 1;
    $this->assertEquals($expected, $result);

    $result = $this->Book->getDefaultCharacter(2);
    $expected = 2;
    $this->assertEquals($expected, $result);
  }

  public function testShouldHaveATitle() {
    $title = 'Treason at Helm\'s Deep';
    $result = $this->Book->getTitle(1);
    $this->assertEquals($title, $result);
  }

  public function testShouldHaveChapters() {
    $chapterID = array(1,3);
    $result = $this->Book->getChapters(2);
    $this->assertEquals($chapterID, $result);
  }

  /**
   * @expectedException Exception
  */
  public function testShouldReturnNotFoundIfBookDoesntExist() {
    $this->Book->getDefaultCharacter(-1);
  }

}
