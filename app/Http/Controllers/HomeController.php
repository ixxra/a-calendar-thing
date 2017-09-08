<?php



namespace App\Http\Controllers;
use App\Event;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->map(function($item, $key) {
                return [
                    "title" => $item['name'],
                    "start" => $item['start_time'],
                    "end" => $item['end_time'],
                    "url" => route('events.show', ['id' => $item['id']])
                ];
            });
        return view('home', ['events' => $events->toJson()]);
    }
}
