<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MessageSubscriptionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_validates_a_post_request()
    {
        $this->post('api/messages', [])
            ->assertResponseStatus(422)
            ->seeJsonContains([
                "topic" => [
                    "The topic field is required."
                ],
                "body" => [
                    "The body field is required."
                ],
                "id" => [
                    "The id field is required."
                ]
            ]);
    }

    /**
     * @test
     */
    public function it_stores_a_message()
    {
        $this->expectsEvents(\App\Events\MessageCreated::class);
        
        $sensor = factory(\App\Sensor::class)->create();

        $id = $sensor->id;
        $topic = "/sensors/$id/status";
        $body = json_encode([ 'state' => 'on' ]);

        $this->post('api/messages', compact('id', 'topic', 'body'))
            ->assertResponseOk()
            ->seeJsonContains([ 'result' => true ])
            ->seeInDatabase('messages', [
                'sensor_id' => $id,
                'topic' => $topic,
                'body' => $body
            ]);

    }
}
