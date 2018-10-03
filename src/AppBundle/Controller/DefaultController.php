<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Utils\FizzBuzz;



class DefaultController extends ApiController
{
    /**
     * @Route("/api/fizzbuzz", name="homepage")
     */
    public function index(Request $request)
    {

        //Get the number
        $number = $request->query->get('number');

        //Validate the input
        $errors = $this->validateInput($number);
        if( count($errors) != 0)
            return $this->setStatusCode(400)->respondWithErrors($errors);

        //Get the fizzbuzz array
        $fizzbuzz = new FizzBuzz($number);
        $data = ['fizzbuzz' => $fizzbuzz->buildFizzBuzz()];

        return $this->respond($data);
    }


    private function validateInput($input)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($input, array(
            new NotBlank(),
            new Assert\Type("numeric")
        ));

        $errors = [];

        if (0 !== count($violations))
            // iterate through violations
            foreach ($violations as $violation)
                array_push($errors,  $violation->getMessage());


        return $errors;
    }

    private function buildFizzBuzz($input)
    {
        $array = [];
        for ($i=1; $i<=(int) $input; $i++ )
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
