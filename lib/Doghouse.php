<?php

class Doghouse implements Countable
{
    const MAX_NB_DOG = 1;

    /**
     * @var int
     */
    private $_number;

    /**
     * @var SplObjectStorage
     */
    private $_dog;


    public function __construct($number)
    {
        $this->_dog = new SplObjectStorage();
        $this->setNumber($number);
        $this->_bAvailable = true;
    }

    public function getNumber()
    {
        return $this->_number;
    }

    public function setNumber($number)
    {
        $this->_number = $number;
    }

    /**
     * @return bool
     */
    public function isAvailable()
    {
        return count($this) == 0;
    }

    public function isFull()
    {
        return count($this) == self::MAX_NB_DOG;
    }
    /**
     * take a dog
     * @param Dog $dog
     */
    public function take(Dog $dog)
    {
        if(!$this->isAvailable())
        {
            throw new DoghouseException('the doghouse is not available');
        }

        if($this->isFull())
        {
            throw new DoghouseException('the doghouse can\'t accept others dogs');
        }

        $this->_dog->attach($dog);
    }


    /**
     * release a dog
     * @param Dog $dog
     */
    public function release(Dog $dog)
    {
        $this->_dog->detach($dog);
    }

    public function count()
    {
        return count($this->_dog);
    }
}
