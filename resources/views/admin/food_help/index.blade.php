@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Food Help</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Food Help</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('food_help.create') }}" class="float-right btn btn-primary">New Food Help</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                            <tr>
                                <td>{{$location->id}}</td>
                                <td class="py-2"><img style="height: 100px; width: 150px" src="https://images.weserv.nl/?url={{getenv('API_URL')."static/".$location->article_cover_file}}" alt=""></td>
                                <td>{{$location->title}}</td>
                                <td>{{$location->article_sub_type}}</td>
                                <td>    
                                    <div>
                                        <a href="{{ route('food_help.show', $location->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-eye"></i> </button></a>
                                        <a href="{{ route('food_help.edit', $location->id) }}"><button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
                                        <a href="{{ route('food_help.destroy', $location->id) }}"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a>
                                    </div>
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