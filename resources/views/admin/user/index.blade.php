@extends('layouts.main')
@section('content')
<html>

<head>
    <title>User</title>
</head>

<body>
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
        </div>
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{route('stunting_info.create')}}" class="float-right btn btn-primary">New Article</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
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