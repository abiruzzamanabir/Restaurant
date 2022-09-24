<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Notifications\Notification\ReservationAdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Notification\ReservationUserNotification;
use App\Notifications\Notification\ReservationCancelNotification;
use App\Notifications\Notification\ReservationSuccessfullNotification;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'date' =>'required',
            'time' =>'required',
            'subject' =>'required',
            'message' =>'required',
        ]);

        $reservationid= str_replace(' ','_',$request->name.' '. rand(0,999999));
        
        $data=Reservation::create([
            'reservation_id' => $reservationid,
            'name' => $request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'date' =>$request->date,
            'time' =>$request->time,
            'subject' =>$request->subject,
            'message' =>$request->message,
            'type' =>'Pending',
        ]);
        $data->notify(new ReservationUserNotification($data));
        Notification::route('mail', [
            'abiruzzamanabir636@gmail.com' => 'Abiruzzaman Abir',
        ])->notify(new ReservationAdminNotification($data));

        return back() ->with('success','Reservation Request Submitted Successfully.We will contact with you soon.');
    }
    public function updateToReserved($id)
    {
        $data = Reservation::findOrFail($id);



            $data->update([
                'type' => 'Reserved',
            ]);

            $data->notify(new ReservationSuccessfullNotification($data));

        return back()->with('success-main', 'Reserved successfully');
    }
    public function updateToCancel($id)
    {
        $data = Reservation::findOrFail($id);


        
            $data->update([
                'type' => 'Cancel',
            ]);
            $data->notify(new ReservationCancelNotification($data));

        return back()->with('success-main', 'Reserve Canceled');
    }
}
