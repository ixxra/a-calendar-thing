<?php

namespace App\Http\Controllers;

use App\Mail\EventEdited;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use Mail;

class EventController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event/index', [
            'events' => Event::orderBy('start_time')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'time' => 'required'
        ]);
        
        $time = explode(" - ", $request->input('time'));
        
        $event = new Event;
        $event->creator()->associate($request->user());
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->start_time = $time[0];
        $event->end_time = $time[1];
        $event->save();
        
        $request->session()->flash('success', 'The event was successfully saved!');

        Mail::to('rene.garcia@correo.uady.mx', 'Evento nuevo')
            ->send(new EventEdited($request->user(), $event, "Creo"));
        
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event/show', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        

        $participants = [];
        foreach($event->users()->get() as $u) {
            $participants[] = $u->id;
        }

        $users = [];
        foreach (User::all() as $u) {
            $users[] = [
                "id" => $u->id,
                "name" => $u->name,
                "email" => $u->email,
                "is_participant" => in_array($u->id, $participants)
            ];            
        }

        return view('event/edit', ['event' => $event,
        'users' => $users]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        $participants = $request -> input('participants');
        $users_ = User::find($participants);
        $event->users()->sync($users_);
                
        $this->validate($request, [
            'name' => 'required',
            'time' => 'required'
        ]);

        
        $time = explode(" - ", $request->input('time'));

        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->start_time = $time[0];
        $event->end_time = $time[1];
        $event->save();

        $request->session()->flash('status', 'Evento actualizado');
        
        return redirect()->route('events.index');
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Event  $event
 * @return \Illuminate\Http\Response
 */
public function destroy(Event $event)
{
    
    $event->delete();
    
    return redirect()->route('events.index');
}
}
