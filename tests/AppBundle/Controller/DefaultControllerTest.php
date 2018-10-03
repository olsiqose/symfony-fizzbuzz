<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/fizzbuzz');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/api/fizzbuzz?number=5');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
