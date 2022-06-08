@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Article Details</title>
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
                                <td class = "col-md-9">YAY</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Date</th>
                                <td class = "col-md-9">11 Januari 2020</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Article Items</th>
                                <td class = "col-md-9">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Article Types</th>
                                <td class = "col-md-9">Nutrition</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Article Tags</th>
                                <td class = "col-md-9">Breakfast</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Action</th>
                                <td class = "col-md-9">
                                <a href="/article/index"><button type="button" class="btn btn-primary">Back</button></a>
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