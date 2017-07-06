<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddressControllerTest extends WebTestCase
{
    public function testGetaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/address');
    }

    public function testPostaddress()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/postAddress');
    }

}
