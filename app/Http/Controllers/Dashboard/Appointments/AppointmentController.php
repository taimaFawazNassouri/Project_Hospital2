<?php

namespace App\Http\Controllers\Dashboard\Appointments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;
use Twilio\Rest\Client;


class AppointmentController extends Controller
{
    public function unCompletedAppointment(){
        $appointments = Appointment::where('type', 'unComplete')->get();
        return view('Dashboard.Appointments.unCompleted',compact('appointments'));
    }

    public function CompletedAppointment(){
        $appointments = Appointment::where('type', 'complete')->get();
        return view('Dashboard.Appointments.Completed',compact('appointments'));

    }

    public function finishedAppointment(){
        $appointments = Appointment::where('type', 'finished')->get();
        return view('Dashboard.Appointments.Finished',compact('appointments'));

    }

    public function approvalAppointment(String $id ,Request $request){
        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'appointment' =>$request->appointment,
            'type' => 'complete'
        ]);

        //send email to mailtrap
        Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name,$appointment->appointment));

        //send message mob
    //     $receiverNumber = $appointment->phone;
    //     $message = "عزيزي المريض" . " " . $appointment->name . " " . "تم حجز موعدك بتاريخ " . $appointment->appointment;

    //     $account_sid = getenv("TWILIO_SID");
    //     $auth_token = getenv("TWILIO_TOKEN");
    //     $twilio_number = getenv("TWILIO_FROM");

    //     $twilio = new Client($account_sid, $auth_token);

    //     $message = $twilio->messages
    //       ->create($receiverNumber , // to
    //         array(
    //           "from" => "+12514188832",
    //           "body" => $message
    //         )
    //       );
    
    // print($message->account_sid);

        session()->flash('add');
        return back();
    }

    public function destroy($id)
    {
        Appointment::destroy($id);
        session()->flash('delete');
        return back();
    }
    
}
