@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Trace Details</title>
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
                                <th class = "col-md-3">Week</th>
                                <td class = "col-md-9">0</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Height</th>
                                <td class = "col-md-9">4</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Weight</th>
                                <td class = "col-md-9">5</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Age Day</th>
                                <td class = "col-md-9">0</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Exclusive Asi</th>
                                <td class = "col-md-9">True</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Disease History</th>
                                <td class = "col-md-9">False</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Immunization History</th>
                                <td class = "col-md-9">Covid | Campak</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Action</th>
                                <td class = "col-md-9">
                                <a href="/trace/index"><button type="button" class="btn btn-primary">Back</button></a>
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