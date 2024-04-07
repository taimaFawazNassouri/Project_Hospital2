<?php

namespace App\Events;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SentMessageDoctor implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $sender, $message, $receiver, $conversation;
    /**
     * Create a new event instance.
     */
    public function __construct(Patient $sender, Message $message, Doctor $receiver, Conversation $conversation)
    {
        $this->sender = $sender;
        $this->message = $message;
        $this->receiver = $receiver;
        $this->conversation = $conversation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastWith()
    {
        return [
            'sender_email' => $this->sender->email,
            'message' => $this->message,
            'conversation_id' => $this->conversation->id,
            'receiver_email' => $this->receiver->email,
        ];
    }
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat.' . $this->receiver->id),
        ];
    }
}