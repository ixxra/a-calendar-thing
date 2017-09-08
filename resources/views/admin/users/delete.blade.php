@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Por favor, confirme la operación</h3>
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            Confirma que desea eliminar al usuario <em><strong>{{$user->name}} {{$user->surname}} ({{$user->email}})?</strong></em>
                        </div>
                        <hr>
                        <div class="btn-toolbar">
                            <form method="POST" action="{{route('users.destroy', ['user' => $user])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">
                                    Eliminar
                                </button>
                            </form>
                            <a href="{{route('admin')}}" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
