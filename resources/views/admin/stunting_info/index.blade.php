{{-- @extends('layout.template')

@section('content')
<?php
// dd($articles);
?>
<h1>Article</h1>
<a href="{{ route('article.create') }}">Tambah</a>
<table class="table">
    <thead>
        <td>title</td>
        <td>content</td>
    </thead>
    @foreach($articles as $article)
    <tr>
        <td>{{ $article->title }}</td>
        <td>{!! $article->article_file_content !!}</td>
    </tr>
    @endforeach
</table>
@endsection --}}
@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Stunting Info</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Stunting Info</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('stunting_info.create')}}" class="float-right btn btn-primary">New Article</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Article Types</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td><img style="height: 100px; width: 150px" src="{{getenv('API_URL')."static/".$article->article_cover_file}}" alt=""></td>
                                <td>{{$article->title}}</td>
                                <td>{{$article->date}}</td>
                                <td>{{$article->article_type}}</td>
                                <td>    
                                    <div>
                                        <a href="{{ route('stunting_info.show', $article->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-eye"></i> </button></a>
                                        <a href="{{ route('stunting_info.edit', $article->id) }}"><button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
                                        <a href="{{ route('stunting_info.destroy', $article->id) }}"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a>
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