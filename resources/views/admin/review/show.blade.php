{{-- {{dd(stripslashes(file_get_contents("http://127.0.0.1:8000/static/articles/tesadsffsdf_09_06_2022.html")))}} --}}
@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Review Details</title>
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
                                <th class = "col-md-3">Nama Tempat</th>
                                <td class = "col-md-9">{{$maps->place_name}}</td>
                            </tr>
                            <tr>
                                <th>Formatted Address</th>
                            </tr>
                            <tr>
                                <th class="col-md-3">Foto</th>
                                <td class="col-md-9"><img src="{{$maps->img_url}}" width="250px" height="250px" alt="" srcset=""></td>
                            </tr>
                        </thead>
                </table>
                </div>
            </div>
        </div>

        <div class = "card">
            <div class ="card-body">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>User</th>
                                <th>Rating</th>
                                <th>Description</th>
                                <th style="width: 70px">Action</th>
                            </thead>
                            <tbody>
                                <?php $i=0 ?>
                                @foreach($review->reviews as $item)
                                <?php $i++ ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->user}}</td>
                                    <td>{{$item->rating}}</td>
                                    <td>{{$item->desc}}</td>
                                    <td><a href="{{ route('review.destroy', $item->id) }}"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </body>
</html>
@endsection