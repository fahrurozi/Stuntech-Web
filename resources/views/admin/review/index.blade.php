@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Review</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Review</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped"   class= "col-md-3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                {{-- <th>Latitude</th>
                                <th>Longitude</th> --}}
                                <th>Address</th>
                                {{-- <th>Gmaps</th> --}}
                                <th style="width: 180px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registered_places as $key => $place)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$place->place_detail->name}}</td>
                                {{-- <td>{{$place->place_detail->geometry->location->lat}}</td>
                                <td>{{$place->place_detail->geometry->location->lng}}</td> --}}
                                <td>{{$place->place_detail->formatted_address}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('review.show', $place->db_data->id) }}" role="button">Show Review</a>
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