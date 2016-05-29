<?php

namespace App\Repositories;

use App\Message;

class MessagesRepository
{
    public function store($id, $topic, $body)
    {
        return Message::create([
            'sensor_id' => $id,
            'topic' => $topic,
            'body' => $body
        ]);
    }
}
