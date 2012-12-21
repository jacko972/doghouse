<?php

require_once 'bootstrap.php';

class BeagleTest extends PHPUnit_Framework_TestCase
{
    private $_beagle;

    protected function setUp()
    {
        $this->_beagle = new Beagle('toto','M');
    }

    public function assertPreConditions()
    {
        $this->assertEquals('toto', $this->_beagle->getName());
        $this->assertEquals('M',$this->_beagle->getSex());
    }

    public function testIsADog()
    {
        $this->assertTrue(is_a($this->_beagle, 'Dog'));
    }

    public function testIsAMale()
    {
        $this->assertEquals('M',$this->_beagle->getSex());
    }

    public function testIsAFemale()
    {
        $this->_beagle->setSex('F');
        $this->assertEquals('F',$this->_beagle->getSex());
    }

    public function testItHasASex()
    {
        $this->assertTrue(in_array($this->_beagle->getSex(),array('M','F')));
    }


}
