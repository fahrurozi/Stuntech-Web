@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Fun Stunting</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Fun Stunting</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped"   class= "col-md-3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $level = range(1,10);?>
                            @foreach($level as $key => $value)
                            <tr>
                                <td>{{$value}}</td>
                                <td>{{$value}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('fun_stunting.list', $value) }}" role="button">Detail Level</a>
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