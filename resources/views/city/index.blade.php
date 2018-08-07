@extends('layouts.main')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="pull-left">
                <h4>All Cities</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route("city.create") }}" class="btn btn-success">
                  <i class="glyphicon glyphicon-plus"></i>
                  Add City
                </a>
            </div>
        </div>
        
      <table class="table">

    @foreach($cities as $city)

            <tr>
              <td class="middle">
                <div class="media">

                  <div class="media-body">
                      <h4 class="media-heading">{{ $city->name }}</h4>

                  </div>                    
                </div>
              </td>
              <td width="100" class="middle">
                <div>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['city.destroy', $city->id]]) !!}
                      <a href="{{ route("city.edit", ['id' => $city->id]) }}" class="btn btn-circle btn-default btn-xs" title="Edit">
                        <i class="glyphicon glyphicon-edit"></i>
                      </a>
                      <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-circle btn-danger btn-xs" title="Edit">
                        <i class="glyphicon glyphicon-remove"></i>
                      </button>
                    {!! Form::close() !!}
                </div>
              </td>
            </tr>

   
        @endforeach

      </table>
    </div>

    <div class="text-center">
      <nav>
  
      </nav>
    </div>
@endsection
