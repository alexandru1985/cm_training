@extends('layouts.main')

@section('content')

    <div class="panel panel-default">
            <div class="panel-heading">
              <strong>Add City</strong>
            </div>
            {!! Form::open(['route' => 'city.store']) !!}
            
            @include("city.form")

            {!! Form::close() !!}
          </div>

@endsection