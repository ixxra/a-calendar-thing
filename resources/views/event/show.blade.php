@extends('layouts.app')


@section('head')
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading row">
                        <h2 class="col-xs-6">
                            {{$event->name}} 
                        </h2>
                        <div class="col-xs-6">
                            <div class="btn-toolbar pull-right" role="toolbar">
                                <div>
                                    <form action="{{route('events.destroy', ['id' => $event->id])}}" method="POST">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                                </div>
                                <a class="btn btn-primary" href="{{route('events.edit', ['id' => $event->id])}}">Editar</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="card-block">
                            <p class="card-text">{{$event->description}}</p>
                            <p class="card-text">Creado por <em>{{$event->creator->name}}.</em></p>
                            <p class="card-text">Participan:
                            <ul>
                                @foreach($event->users as $u)
                                    <li>{{$u->name}}</li>
                                @endforeach
                            </ul>
                            </p>
                            <div id="calendar"></div>
                            <p class="card-text text-left">
                                <small class="text-muted">
                                    Creado por <strong>{{$event->creator->name}}</strong>.
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('tail')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/locale/es.js'></script>
    <script>
     $(document).ready(function() {
         $('#calendar').fullCalendar({
             header: {
                 left:   'title',
                 center: 'month,agendaWeek,agendaDay',
                 right:  'today prev,next',                 
             },
             events: [
                 {
                     title: "{{$event->name}}",
                     start: "{{$event->start_time}}",
                     end: "{{$event->end_time}}"
                 }
             ]
         });

         $('#calendar').fullCalendar('gotoDate', "{{$event->start_time}}");
     });
    </script>
@endsection


