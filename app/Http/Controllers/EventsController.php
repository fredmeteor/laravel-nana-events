<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller


// public function __construct(event $events){


// $this->event = $events;
// }

{
    public function index($events){
      
        $events = Event::all();
        return view('events.index',['events' => Event::findOrFail($events)]);
        //dd($id);
      
    }
}
