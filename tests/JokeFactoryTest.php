<?php

namespace Mansuang\Jokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Mansuang\Jokes\JokeFactory;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\HandlerStack;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {        
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 440, "joke": "Most tough men eat nails for breakfast. Chuck Norris does all of his grocery shopping at Home Depot.", "categories": [] } }'),
        ]);
                
        $handler = HandlerStack::create($mock);

        $client = new Client(['handler' => $handler]);

        $jokes = new JokeFactory($client);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('Most tough men eat nails for breakfast. Chuck Norris does all of his grocery shopping at Home Depot.', $joke);
    }
}
