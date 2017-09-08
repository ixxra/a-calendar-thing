@extends('layouts.app')

@section('head')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <h3>Eventos</h3>
                            </div>
                            <div class="col-xs-6">
                                <a href="{{route('events.create')}}" class="btn btn-success pull-right">Nuevo</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul>
                            @foreach ($events as $event)
                                <li>
                                    <div>
                                        <a href="{{ route('events.show', ['id' => $event->id]) }}">{{$event->name}}</a>
                                    </div>
                                    <div>{{$event->description}}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('tail')
@endsection
