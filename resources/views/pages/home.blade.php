@extends('layouts.app')

@section('content')

    <div class="container">

        @foreach($sensors as $sensor)

            @include("partials.sensor", [ 'sensor' => $sensor ])

        @endforeach

    </div>

@endsection