<?php

namespace App\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;
use App\Events\SentMessageDoctor;
use App\Events\SentMessagePatient;
use Illuminate\Support\Facades\Auth;


class Chatbox extends Component
{

    //protected $listeners=['load_conversationDoctor','load_conversationPatient','refreshData'];
    public $receiver;
    public $selected_conversation;
    public $receviverUser;
    public $messages;
    public $auth_id;
    public $chat_page;
    public $event_name;


    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->auth_id = Auth::guard('patient')->user()->id;
        } else {
            $this->auth_id = Auth::guard('doctor')->user()->id;
        }
    }

    public function getListeners()
    {
        if (Auth::guard('patient')->check()) {
            $auth_id = Auth::guard('patient')->user()->id;
            $this->event_name = "SentMessagePatient";
            $this->chat_page = "chat2";
        } else {
            $auth_id = Auth::guard('doctor')->user()->id;
            $this->event_name = "SentMessageDoctor";
            $this->chat_page = "chat";
        }

        return [
            "echo-private:$this->chat_page.{$auth_id},$this->event_name" => 'broadcastMassage', 'load_conversationDoctor', 'load_conversationPatient', 'refreshData'
        ];
    }
    public function load_conversationDoctor(Conversation $conversation, Doctor $receiver ){

        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;
        $this->messages = Message::where('conversation_id',$this->selected_conversation->id)->get();
    }

    public function load_conversationPatient(Conversation $conversation, Patient $receiver ){
        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;
        $this->messages = Message::where('conversation_id',$this->selected_conversation->id)->get();
    }
    public function broadcastMassage($event)
    { 
        dd($event);
        // $broadcastMessage = Message::find($event['message']);
        // $broadcastMessage->read = 1;
        // $this->refreshData($broadcastMessage->id);
        

    }
    public function refreshData($message_id)
    {
        $newMessage = Message::findOrFail($message_id);
        $this->messages->push($newMessage);
    }


    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}