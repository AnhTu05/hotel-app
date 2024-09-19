<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id)
    {

        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate',
        ]);

        $data = new Booking();

        $data->room_id = $id;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        $data->status = 'Waiting';

        $startDate = $request->startDate;

        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
        ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'Room is already booked for this date');
        } 
        else {

            $data->start_date = $request->startDate;

            $data->end_date = $request->endDate;

            $data->save();

            return redirect()->back()->with('success', 'Booking added successfully');
        }

    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = new Contact();

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        $data->message = $request->message;

        $data->save();

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
