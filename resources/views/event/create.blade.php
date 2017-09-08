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
                <form action="{{route('events.store')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="panel panel-default container-fluid">
                        <div class="panel-heading row">
                            <div class="col-xs-4">
                                <h4>Crear Evento</h4>
                            </div>
                            <div class="col-xs-4 pull-right">
                                <div class="btn-toolbar">
                                    <a type="button" href="{{route('home')}}" class="btn btn-danger pull-right">Cancelar</a>
                                    <button type="submit" class="btn btn-primary pull-right">Crear</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Nombre del evento" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="time">Fecha</label>
                                <input name="time" type="text" class="form-control">
                                <small id="timeHelp" class="form-text text-muted">En caso de no tener fecha de término, omitir la segunda fecha.</small>
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
                 "locale": {
                     //"format": "DD/MM/YYYY",
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
    </script>
@endsection
