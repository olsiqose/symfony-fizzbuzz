<?php
/**
 * Created by PhpStorm.
 * User: olsi
 * Date: 18-10-02
 * Time: 10.14.MD
 */

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class ApiController extends Controller
{
    /**
     * @var integer HTTP status code - 200 (OK) by default
     */
    protected $statusCode = 200;

    /**
     * Gets the value of statusCode.
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of statusCode.
     *
     * @param integer $statusCode the status code
     *
     * @return self
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Returns a JSON response
     *
     * @param array $data
     * @param array $headers
     *
     */
    public function respond($data, $headers = [])
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => 'application/json'
        ];
        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

    /**
     * Sets an error message and returns a JSON response
     *
     * @param string $errors
     *
     */
    public function respondWithErrors($errors = [], $headers = [])
    {
        $data = [
            'errors' => $errors,
        ];

        $headers = ['Access-Control-Allow-Origin' => '*'];
        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

}