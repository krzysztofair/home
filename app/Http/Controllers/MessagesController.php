<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Http\Requests\MessageStoreRequest;
use App\Repositories\MessagesRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class MessagesController extends Controller
{
    /**
     * @var MessagesRepository
     */
    protected $messages;

    /**
     * MessagesController constructor.
     * @param MessagesRepository $messages
     */
    public function __construct(MessagesRepository $messages)
    {
        $this->messages = $messages;
    }

    public function store(MessageStoreRequest $request)
    {
        $arguments = $request->only(['id', 'topic', 'body']);

        if ( $message = $this->messages->store(...array_values($arguments)) ) {

            event(new MessageCreated($message));

            return response()->json([
                'result' => true
            ]);
        }

        return response('', 500)->json([
            'result' => false
        ]);
    }
}
