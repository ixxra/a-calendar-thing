<html>
    <head></head>
    <body style="background: black; color: white">
        <h1>Aviso</h1>
        <p>
            {{$user->name}}(<a href="mailto:{{$user->email}}">{{$user->email}}</a>) {{$action}} el evento <em>{{$event->name}}</em> programado para {{$event->start_time}}.
        </p>
        <p>
            <a href="{{route('events.show', ['id' => $event->id])}}" class="btn btn-primary">Ir al evento</a>
        </p>
    </body>
</html>
