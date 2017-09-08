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
                    <div class="col-xs-4"><h4>Calendario</h4></div>
                    <div class="col-xs-8">
                        <div class="btn-toolbar pull-right">
                            <a href="{{route('events.create')}}" class="btn btn-success">
                                Crear Evento
                            </a>
                            
                            <a href="{{route('events.index')}}" class="btn btn-primary">
                                Ver lista de eventos
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id='calendar'></div>
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
             events: {!! $events !!}
         });

     });
    </script>
@endsection
