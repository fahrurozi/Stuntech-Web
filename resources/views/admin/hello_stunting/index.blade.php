@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Hello Stunting</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Hello Stunting</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('hello_stunting.create') }}" class="float-right btn btn-primary">New Hello Stunting</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Photo</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Hospital</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->id}}</td>
                                <td class="py-2"><img style="height: 100px; width: 150px" src="https://images.weserv.nl/?url={{getenv('API_URL')."static/".$doctor->article_cover_file}}" alt=""></td>
                                <td>{{$doctor->title}}</td>
                                <td>{{$doctor->article_tags}}</td>
                                <td>{{$doctor->article_sub_type}}</td>
                                <td>    
                                    <div>
                                        <a href="{{ route('hello_stunting.show', $doctor->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-eye"></i> </button></a>
                                        <a href="{{ route('hello_stunting.edit', $doctor->id) }}"><button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
                                        <a href="{{ route('hello_stunting.destroy', $doctor->id) }}"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a>
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