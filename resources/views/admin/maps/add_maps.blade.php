@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Add Maps</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Add Maps</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                  
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
                                <th>Alamat</th>
                                <th>Action</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($all_places as $key => $place)
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$place->name}}</td>
                               <td>{{$place->geometry->location->lat}}</td>
                               <td>{{$place->geometry->location->lng}}</td>
                               <td>{{$place->formatted_address}}</td>
                               <td><a class="btn btn-primary" href="{{route('maps.store', $place->place_id)}}" role="button" >Add</a></td>
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