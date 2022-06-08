@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Article</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Article</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="/article/create" class="float-right btn btn-primary">New Article</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Article Types</th>
                                <th>Article tags</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>YAY</td>
                                <td>11 Januari 2020</td>
                                <td>Nutrition</td>
                                <td>Breakfast</td>
                                <td>    
                                    <div>
                                        <a href="/article/details"><button type="button" class="btn btn-success"><i class="fas fa-eye"></i> </button></a>
                                        <a href="/article/edit"><button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
                                        <a href="#"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
@endsection