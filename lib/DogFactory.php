<?php

class DogFactory
{
    public static function create($dogType,$dogName,$dogSex)
    {
        switch (strtolower($dogType))
        {
            case 'chihawawa':
                $dog = new Chihawawa($dogName,$dogSex);
                break;
            case 'beagle':
                $dog = new Beagle($dogName,$dogSex);
                break;
            case 'bernese':
                $dog = new Bernese($dogName,$dogSex);
                break;
            default:
                throw new Exception('dog type unknow');
        }

        return $dog;
    }
}
