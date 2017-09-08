@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
@endsection


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{route('events.update',  ['id' => $event->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="panel panel-default container-fluid">
                        <div class="panel-heading row">
                            <h4 class="col-xs-4">Editar Evento</h4>
                            <div class="btn-toolbar pull-right col-xs-4">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a type="button" href="{{route('events.show', ['id' => $event->id])}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Nombre del evento" name="name" value="{{$event->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" id="description" rows="3" name="description">{{$event->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="time">Fecha</label>
                                <input name="time" type="text" class="form-control">
                                <small id="timeHelp" class="form-text text-muted">En caso de no tener fecha de término, omitir la segunda fecha.</small>
                            </div>
                            <div class="form-group">
                                <label for="participants">Usuarios que participan</label>
                                <div class="btn-toolbar pull-right">
                                    <button type="button" class="btn btn-xs btn-success" id="select-all-participants-button">
                                        Todos
                                    </button>
                                    <button type="button" class="btn btn-xs btn-danger" id="deselect-all-participants-button">
                                        Ninguno
                                    </button>
                                </div>
                                @foreach($users as $user)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox"
                                                   name="participants[]"
                                                   value="{{$user["id"]}}"
                                                   @if($user["is_participant"])
                                                   checked
                                                   @endif
                                                   class="form-check-input participant">
                                            {{$user["name"]}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>


                
@endsection

@section('tail')
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    
    <script type="text/javascript">
     $(function () {
         $('input[name="time"]').daterangepicker({
             "startDate":"{{$event->start_time}}",
             "endDate":"{{$event->end_time}}",
             "locale": {
                 //"format": "DD/MM/YYYY",
                 "format": "YYYY-MM-DD",
                 "separator": " - ",
                 "applyLabel": "Aceptar",
                 "cancelLabel": "Cancelar",
                 "fromLabel": "Desde",
                 "toLabel": "Hasta",
                 "customRangeLabel": "Custom",
                 "weekLabel": "W",
                 "daysOfWeek": [
                     "Do",
                     "Lu",
                     "Ma",
                     "Mi",
                     "Ju",
                     "Vi",
                     "Sa"
                 ],
                 "monthNames": [
                     "Enero",
                     "Febrero",
                     "Marzo",
                     "Abril",
                     "Mayo",
                     "Junio",
                     "Julio",
                     "Agosto",
                     "Septiembre",
                     "Octubre",
                     "Noviembre",
                     "Diciembre"
                 ],
                 "firstDay": 1
             },
         });
     });


     $('#select-all-participants-button').click(function(){
         $('.participant').prop('checked', true);
     });

     $('#deselect-all-participants-button').click(function(){
         $('.participant').prop('checked', false);
     });
    </script>
@endsection
