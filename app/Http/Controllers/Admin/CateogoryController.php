<?php

namespace App\Http\Controllers\Admin;

use App\Models\booking;
use App\Models\client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CateogoryController extends Controller
{
    public function index()
    {
        // $SQLstring2 = "insert into booking(UserID, ServiceID, Message) 
        // select UserID, $service, '$message' FROM $TableName where
        //  name = '$name' AND address = '$Address';"; 
        
    }

public function create() {
    //error_log(request('Name'));
    $client = new client();
    $name = request('Name');
    $address = request('Street_address');
    $client->Name = request('Name');
    $client->Address = request('Street_address');
    $client->city = request('city');
    $client->state = request('state');
    $client->zip = request('zip');
    $client->phone = request('phone');
    $client->email = request('email');

    $booking = new booking();
    $booking->serviceid = request('service');
    $booking->message = request('message');
    $a = request('service');
    $b = request('message');
   $client->save();
    $booking2 = DB::insert('insert into bookings(UserID, ServiceID, Message)
    select userid, '.$a.', "'.$b.'" from clients where name = "'.$name.'" AND address = "'.$address.'"');
    
        //error_log($booking2);
        // dd($booking2);
        //$booking->save();
    return view('checker');
}

public function store() {
    
   // error_log($client);
    //
    
    return view('checked');
    return redirect('/')->with('mssg', "Thank you for your entry! Hope to see you soon!");
}

}
