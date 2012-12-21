<?php

require_once 'bootstrap.php';

class DoghouseTest extends PHPUnit_Framework_TestCase
{
    private $_doghouse;
    private $_dog;

    protected function setUp()
    {
        $this->_doghouse = new Doghouse('111');
        $this->_dog = new Beagle('juju','M');
    }

    public function testIfItHasANumber()
    {
        $this->assertEquals('111',$this->_doghouse->getNumber());
    }

    public function testTakeADog()
    {
        $this->assertTrue($this->_doghouse->isAvailable());
        $this->_doghouse->take(new Beagle('bichon','M'));
        $this->assertEquals(1,count($this->_doghouse));
        $this->assertFalse($this->_doghouse->isAvailable());
    }

    public function testReleaseADog()
    {
        $this->_doghouse->take($this->_dog);
        $this->assertEquals(1,count($this->_doghouse));
        $this->assertFalse($this->_doghouse->isAvailable());
        $this->_doghouse->release($this->_dog);
        $this->assertEquals(0,count($this->_doghouse));
        $this->assertTrue($this->_doghouse->isAvailable());
   }

    /**
     * @expectedException DoghouseException
     *
     */
    public function testCanAcceptOnlyOneDog()
    {
        $this->_doghouse->take($this->_dog);
        $this->_doghouse->take(new Chihawawa('mimi','F'));
    }

    /**
     * @expectedException DoghouseException
     * @expectedExceptionMessage the doghouse is not available
     */
    public function testCanTakeADogOnlyIfItIsAvailable()
    {
        $this->_doghouse->take($this->_dog);
        $this->assertFalse($this->_doghouse->isAvailable());
        $this->_doghouse->take(new Chihawawa('mimi','F'));
    }

}
