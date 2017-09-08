@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default container-fluid">
                    <div class="panel-heading">
                        <h1>Panel de administración</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h2 class="col-xs-6">Usuarios</h2>
                            <div class="col-xs-6">
                                <a href="{{route('users.create')}}" class="btn btn-primary pull-right">Nuevo</a>
                            </div>
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Correo</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th>{{$user->name}}</th>
                                            <th>{{$user->surname}}</th>
                                            <th>{{$user->email}}</th>
                                            <th>
                                                <a href="{{route('users.edit', ['id' => $user->id])}}" class="btn btn-primary btn-sm">
                                                    Editar
                                                </a>
                                                <a href="{{route('confirmUserDelete', ['user' => $user])}}" class="btn btn-danger btn-sm delete-user-btn" data-toggle="" data-target="#myModal" data-user="{{$user->name}} {{$user->surname}} ({{$user->email}})" data-url="{{route('users.destroy', ['user' => $user])}}">
                                                    Eliminar
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('tail')
    <!-- <script src="//cdn.jsdelivr.net/bootstrap/3/js/bootstrap.js"></script> -->

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Por favor, confirme la operación</h4>
                </div>
                <div class="modal-body">
                    <p>Confirma que desea eliminar al usuario <em><strong><span id="dialog-user"></span></strong></em>?.</p>
                </div>
                <div class="modal-footer">
                    <div class="btn-toolbar">
                        <form id="delete-user-form" action="#" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script>
     $(".delete-user-btn").click(function(event) {
         event.preventDefault();

         var button = $(this);
         var user = button.data('user');
         var url = button.data('url');
         var dialog = $("#myModal");
         var form = $("#delete-user-form");

         form.attr('action', url);

         dialog.find('#dialog-user').text(user);
         dialog.modal('show');
     });
     </script>
@endsection
