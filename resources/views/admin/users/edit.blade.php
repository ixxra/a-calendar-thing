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
                <form action="{{route('users.update', ['id' => $user->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="panel panel-default container-fluid">
                        <div class="panel-heading row">
                            <div class="col-xs-4">
                                <h4>Editar usuario</h4>
                            </div>
                            <div class="col-xs-4 pull-right">
                                <div class="btn-toolbar">
                                    <a type="button" href="{{route('admin')}}" class="btn btn-danger pull-right">Cancelar</a>
                                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Nombre completo" name="name" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="surname">Apellido</label>
                                <input type="text" class="form-control" id="description" rows="3" name="surname" placeholder="Apellido(s)" value="{{$user->surname}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input name="email" type="text" class="form-control" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input name="password" type="password" class="form-control">
                            </div>                            
                            <div class="form-group">
                                <label for="confirmPassword">Confirmar contraseña</label>
                                <input name="confirmPassword" type="password" class="form-control">
                            </div>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
