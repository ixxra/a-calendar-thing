@extends('layouts.app')

@section('head')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-left">Events</div>
                    </div>
                    <div class="panel-body">
                        <ul>
                            @foreach ($events as $event)
                                <li>
                                    <div>{{$event->name}}</div>
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
