<?php

namespace App\Livewire\Chat;
use App\Models\Conversation;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Message;
use Livewire\Component;
use App\Events\SentMessageDoctor;
use App\Events\SentMessagePatient;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Facades\Auth;



class SendMessage extends Component
{
    public $selected_conversation, $receviverUser, $sender ,$message, $body='';
   #[Validate('required', message: 'لا يمكن ارسال رسالة فارغة')]
    protected $listeners=['updateMessage','updateMessage2','dispatchSentMessage'];


    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->sender = Auth::guard('patient')->user();
        } else {
            $this->sender = Auth::guard('doctor')->user();
        }
    }

    public function updateMessage(Conversation $conversation, Patient $receiver ){
        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;
    }
    public function updateMessage2(Conversation $conversation, Doctor $receiver ){
        $this->selected_conversation = $conversation;
        $this->receviverUser = $receiver;


    }
  
    public function sendMessage(){
       
        if($this->body == null){
            return null;

        }
        $this->message =  Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_email' => $this->sender->email,
            'receiver_email' => $this->receviverUser->email,
            'body' => $this->body,
        ]);
        $this->selected_conversation->update([
            'last_time_message'
            => $this->message->created_at
        ]);
        $this->reset('body');
        $this->dispatch('refreshData', message_id: $this->message->id)->to('chat.chatbox');
        $this->dispatch('refreshData')->to('chat.chatlist');
        $this->dispatch('dispatchSentMessage')->self();
    }

    public function dispatchSentMessage(){
        if ((Auth::guard('patient')->check())) {
            broadcast(new SentMessageDoctor(
                $this->sender,
                $this->message,
                $this->receviverUser,
                $this->selected_conversation

            ));
        } else {
            broadcast(new SentMessagePatient(
                $this->sender,
                $this->message,
                $this->receviverUser,
                $this->selected_conversation

            ));
        }


    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
