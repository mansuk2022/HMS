<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Backend\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
       return view('backend.event.index',[
        'events'=>Event::latest()->get()
       ]);
    }

    public function create()
    {
        return view('backend.event.create');
    }

    public function store(EventRequest $request)
    {
      $input=$request->all();
        $start_date = Carbon::createFromFormat('l d F Y - H:i', $request->start_date);
        $end_date = Carbon::createFromFormat('l d F Y - H:i', $request->end_date);
        $input["start_date"] = $start_date;
        $input["end_date"] = $end_date;

        Event::create($input);
        return redirect()
            ->route("event.index")
            ->with("message", "Event created successfully.");
        
    }

    
    public function show($id)
    {
        
    }

   
    public function edit(Event $event)
    {
        return view('backend.event.edit',
        ['event'=>$event]
    );
    }

    public function update(EventRequest $request, Event $event)
    {
        $input=$request->all();

        if($event->end_date != $request->end_date){
            $end_date = Carbon::createFromFormat('l d F Y - H:i', $request->end_date);

            $input["end_date"] = $end_date;
        }
        if ($event->start_date != $request->start_date) {
            $start_date = Carbon::createFromFormat('l d F Y - H:i', $request->start_date);
            $input["start_date"] = $start_date;
        }
        $event->update($input);
        return redirect()
            ->route("event.index")
            ->with("info", "Event updated successfully.");
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()
            ->route("event.index")
            ->with("message", "Event delete successfully.");
    }
}
