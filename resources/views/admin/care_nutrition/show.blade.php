{{-- {{dd(stripslashes(file_get_contents("http://127.0.0.1:8000/static/articles/tesadsffsdf_09_06_2022.html")))}} --}}
@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Care Nutrition Details</title>
    </head>
    <body>
        <section class ="section">
            <div class ="section-header">
            <h1>Details</h1>
        </div>
        <div class = "card">
            <div class ="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class = "col-md-3">Title</th>
                                <td class = "col-md-9">{{$article->title}}</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Date</th>
                                <td class = "col-md-9">{{$article->date}}</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Article Content</th>
                                <td class = "col-md-9">{!! $article_content !!}</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Article Types</th>
                                <td class = "col-md-9">{{$article->article_type}}</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Category</th>
                                <td class = "col-md-9">{{$article->article_sub_type}}</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Article Tags</th>
                                <td class = "col-md-9">@foreach(explode("|",$article->article_tags) as $tag)<span class="badge badge-pill badge-info mx-1">{{$tag}}</span>@endforeach</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Article Cover</th>
                                <td class = "col-md-9"><img style="height: 200px" src="http://127.0.0.1:8000/static/{{$article->article_cover_file}}" alt=""></td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Action</th>
                                <td class = "col-md-9">
                                <a href="{{ route('care_nutrition') }}"><button type="button" class="btn btn-primary">Back</button></a>
                                </td>
                            </tr>
                        </thead>
                </table>
                </div>
            </div>
        </div>
        </section>
    </body>
</html>
@endsection