@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Maps</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Maps</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('maps.create')}}" class="float-right btn btn-primary">New Location</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped"   class= "col-md-3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                {{-- <th>Gmaps</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registered_places as $key => $place)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$place->place_detail->name}}</td>
                                <td>{{$place->place_detail->geometry->location->lat}}</td>
                                <td>{{$place->place_detail->geometry->location->lng}}</td>
                                {{-- <td></td> --}}
                                <td>
                                    <a class="btn btn-primary" href="{{$place->place_detail->url}}" role="button" target="_blank">Open Map</a>
                                    <a href="{{ route('maps.destroy', $place->place_detail->place_id) }}"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
@endsection