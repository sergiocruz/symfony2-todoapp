<?php

namespace Cruz\TodoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testGet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}');
    }

    public function testPost()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

}
