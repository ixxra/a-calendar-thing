<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class TeamDashboardController extends Controller
{
    public function __construct(){
        $this -> middleware ('auth');
    }
    
    public function index(){
        $users = [];
        $events = [];

        foreach (User::all() as $u) {
            $users[] = $u->name;
            $u_events = [];
            foreach($u->events as $event){
                $date = new \DateTime($event->start_time);
                $d = $date->format("Ymd");
                $u_events[$d] = [
                    "date" => $d,
                    "name" => $event->name,
                    "desc" => $event->description,
                    "loc" => "Ubicacion desconocida"
                ];
            }
            $events[$u->name] = $u_events;
        }

        $jusers = json_encode($users);
        
        return view('team-dashboard.index', [
            'jusers' => $jusers,
        'events' => json_encode($events)]);
    }
}
