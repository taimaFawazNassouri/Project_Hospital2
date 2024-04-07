<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Patient;


class CreateInvoice implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $patient;
    public $doctor_id;
    public $invoice_id;
    public $message;
    public $created_at;

    
    public function __construct($data)
    {
        $patient = Patient::findOrFail( $data['patient']);

        $this->patient = $patient->name;
        $this->doctor_id = $data['doctor_id'];
        $this->invoice_id = $data['invoice_id'];
        $this->message = 'كشف جديد';
        $this->created_at = date('Y-m-d H:m:s');



    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
           new PrivateChannel('create_invoice'),

        ];
    }
    public function broadcastAs()
    {
        return 'create_invoice';
    }
}
