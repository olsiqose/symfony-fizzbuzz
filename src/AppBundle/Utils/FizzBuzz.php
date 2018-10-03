<?php
/**
 * Created by PhpStorm.
 * User: olsi
 * Date: 18-10-03
 * Time: 7.27.MD
 */

namespace AppBundle\Utils;


class FizzBuzz
{
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function buildFizzBuzz()
    {
        $array = [];
        for ($i=1; $i<=(int) $this->number; $i++ )
        {
            if($i%3 == 0 && $i%5 == 0)
                array_push($array,'FizzBuzz');
            else if($i%3==0)
                array_push($array,'Fizz');
            else if($i%5==0)
                array_push($array,'Buzz');
            else
                array_push($array,$i);
        }

        return $array;
    }
}