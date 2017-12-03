@extends('app')

@section('content')

    <div class="col-md-8">
        @include('list')
    </div>
    <div class="col-md-offset-1 col-md-3">
        @if(Request::is('show/*'))
            @include('show')
        @else
            @include('new')
        @endif
    </div>
@stop