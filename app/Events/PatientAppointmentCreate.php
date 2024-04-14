<?php

namespace App\Events;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PatientAppointmentCreate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $patient;
    public $section;
    public $doctor;
    public $doctor_id;
    public $admin_id;
    public $message;
    public $created_at;
    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $this->patient = $data['name'];
        $this->doctor_id = $data['doctor'];
        $this->doctor = Doctor::findOrFail($data['doctor'])->name;
        $this->section = Section::findOrFail($data['section'])->name;
        $this->message ="لقد تم عمل حجز باسم $this->patient للدكتور $this->doctor التابع لقسم $this->section" ;
        $this->created_at = date('Y-m-d H:i:s');
        $this->admin_id= 1;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return [
            new PrivateChannel('create-appointment.' . $this->admin_id),
        ];
    }
    public function broadcastAs()
    {
        return 'create-appointment';
    }
}
