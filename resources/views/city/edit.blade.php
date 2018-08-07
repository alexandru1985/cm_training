@extends('layouts.main')

@section('content')

    <div class="panel panel-default">
            <div class="panel-heading">
              <strong>Edit City</strong>
            </div>
            {!! Form::model($city, ['route' => ['city.update', $city->id], 'method' => 'PATCH']) !!}

            @include("city.form")

            {!! Form::close() !!}
          </div>

@endsection
