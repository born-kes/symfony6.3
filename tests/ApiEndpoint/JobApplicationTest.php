<?php

namespace App\Tests\ApiEndpoint;

use App\Entity\JobApplication\JobApplication;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobApplicationTest extends WebTestCase
{
    /**
     * @test
     */
    public function shouldSupplyAnswer()
    {
        $client = static::createClient();
        $url = JobApplication::ENDPOINT;
        $data = [
            "firstName" => "John",
            "lastName" => "Doe",
            "email" => "user@example.com",
            "phone" => "+382475766170",
            "position" => "mid",
            "level" => 0,
            "expectedSalary" => 0,
            "isNew" => 0
        ];

        $client->request(
            'POST',
            "/api/{$url}",
            [],
            [],
            ['CONTENT_TYPE' => 'application/ld+json'],
            json_encode($data)
        );

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    /**
     * @test
     */
    public function shouldSupplyAnswerForId()
    {
        $client = static::createClient();
        $url = str_replace('{id}', 1, JobApplication::ENDPOINT_ID);

        $client->request('GET', "/api/{$url}");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    /**
     * @test
     */
    public function shouldSupplyAnswerForCollectionNew()
    {
        $client = static::createClient();
        $url = JobApplication::ENDPOINT_COLLECTION_NEW;

        $client->request('GET', "/api/{$url}");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    /**
     * @test
     */
    public function shouldSupplyAnswerForCollectionOld()
    {
        $client = static::createClient();
        $url = JobApplication::ENDPOINT_COLLECTION_OLD;

        $client->request('GET', "/api/{$url}");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }
}