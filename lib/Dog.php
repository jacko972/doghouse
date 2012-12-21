<?php

abstract class Dog implements DogNeedsInterface, DogMoodsInterface, SplSubject
{
    /**
     * @var string
     * name of the dog
     */
    private $_hairColor;
    private $_name;
    private $_sex;
    private $observers = [];

    public function __construct($name, $sex)
    {
        $this->setName($name);
        $this->setSex($sex);
        $this->attach(new DogMonitor());
    }

    public function isBarking()
    {
        return 'wouaf wouaf';
    }

    public function setHairColor(Color $color)
    {
        $this->_hairColor = $color;
        return $this;
    }

    public function getHairColor()
    {
        return $this->_hairColor;
    }

    /**
     * @param $sex
     */
    public function setSex($sex)
    {
        $this->_sex = $sex;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->_sex;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param $name
     * @return Dog
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    public function attach(SplObserver $observer)
    {
        $id = spl_object_hash($observer);
        if (!isset($this->observers[$id])) {
            $this->observers[$id] = $observer;
        }
        return $this;
    }

    public function detach(SplObserver $observer)
    {
        $id = spl_object_hash($observer);
        if (!isset($this->observers[$id])) {
            throw new RuntimeException('unable to detach observer requested');
        }
        unset($this->observers[$id]);
        return $this;
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }


    /**
     * indicate if the dog want sleep
     * @return string
     */
    public function sleep()
    {
        $this->notify();
        return "hey buddy I want to sleep";
    }

    /**
     * indicate if the dog want drink
     * @return string
     */
    public function drink()
    {
        $this->notify();
        return "hey buddy I'm thirsty";
    }

    /**
     * indicate if the dog want feed
     * @return string
     */
    public function feed()
    {
        $this->notify();
        return "hey buddy I'm hungry";
    }

    /**
     * indicate if the dog want walk
     * @return string
     */
    public function walk()
    {
        $this->notify();
        return "hey buddy take me for a walk";
    }

    /**
     * indicate if the dog want make a pooh
     * @return string
     */
    public function makePooh()
    {
        $this->notify();
        return "hey buddy I want to poop";
    }

    /**
     * @return bool
     */
    public function isAMale()
    {
        return $this->_isAMale;
    }

    public function __toString()
    {
        return sprintf('dog\'s name : %s and it\'s a %s', $this->getName(), get_class($this));
    }

    public function isExcited()
    {

    }

    public function likePlay()
    {

    }

    public function likeToBeGroomed()
    {

    }


}
