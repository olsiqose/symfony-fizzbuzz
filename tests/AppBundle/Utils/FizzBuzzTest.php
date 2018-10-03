<?php
/**
 * Created by PhpStorm.
 * User: olsi
 * Date: 18-10-03
 * Time: 7.42.MD
 */

namespace Tests\AppBundle\Utils;

use PHPUnit\Framework\TestCase;
use AppBundle\Utils\FizzBuzz;


class FizzBuzzTest extends TestCase
{

    public function testFizzBuzz()
    {
        $fizzbuzzObject = new FizzBuzz(15);
        $fizzbuzz = $fizzbuzzObject->buildFizzBuzz();

        $expectedResult = [
            1, 2, 'Fizz', 4, 'Buzz',
            'Fizz', 7, 8, 'Fizz', 'Buzz',
            11, 'Fizz', 13, 14, 'FizzBuzz'
        ];

        $this->assertEquals($expectedResult, $fizzbuzz);
    }
}