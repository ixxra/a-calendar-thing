@extends('layouts.app')

@section('head')
    <link href="{{asset('css/team_dashboard.css')}}" rel="stylesheet" type="text/css">
    <link rel="icon"
          href="https://clojurescript.org/images/cljs-logo-icon-32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/0.4.0/balloon.min.css">
@endsection

    @section('content')
        <div class="panel-body">
            <div id="app">
                <h2>Calendario de eventos</h2>
                <p>Debes tener javascript activado para utilizar este calendario.</p>
            </div>
        </div>
@endsection


@section('tail')
    <script src="{{asset('js/events_dashboard.js')}}" type="text/javascript"></script>
    <script>
     (function bootstrap_all () {
         
         function randomDate(start, end) {
             return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
         }

         function randomEventName (){
             var events = ["Conferencia", "Clase", "Exposicion", "Taller"];
             return events[Math.floor(Math.random() * events.length)];
         }

         var start = new Date();
         var end = new Date(2018, 3, 30);
         
         var users = JSON.parse('{!!  $jusers !!}');
         var events = JSON.parse('{!!  $events !!}');

         window.users = users;
         window.events = events;
         //var events = {"Marco": null, "Carlos": null,
         //              "Minerva": null, "Jimena": null
         //};

         
         /* users.forEach(function (user) {
          *     var ev = {};
          *     for (var i = 0; i < 60; i++){
          *         var d = randomDate(start, end)
          *             .toISOString()
          *             .slice(0,10)
          *             .replace(/-/g, '');
          *         var name = randomEventName();
          *         ev[d] = {date: d, name: name, desc: name,
          *                  loc: "Merida"
          *         };
          *     }
          *     events[user] = ev;
          * });*/ 
         
         /* var events = {"Marco": {"20170803": {date: "20170803",
          *                                      name: "Clases", desc: "Clases de matematicas",
          *                                      loc: "Facultad de matematicas"}}, "Jimena": {"20170822": {date: "20170822",
          *                                                                                                name: "Conferencia", desc: "Evento organizado en Fmat",
          *                                                                                                loc: "Auditorio de la facultad de ingenieria"}}};
          */
         events_dashboard.core.start_app(users, events);
     })()
    </script>
@endsection
