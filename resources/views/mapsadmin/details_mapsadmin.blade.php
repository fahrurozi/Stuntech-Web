@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Location Details</title>
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
                                <th class = "col-md-3">Latitude</th>
                                <td class = "col-md-9">7.34325345</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Longitude</th>
                                <td class = "col-md-9">201.4324535</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Name</th>
                                <td class = "col-md-9">Rumah Sakit Panti Rapih</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Gmaps</th>
                                <td class = "col-md-9">HbfeabbfuaeuabfJUASFI</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Image URL</th>
                                <td class = "col-md-9">http://172.26.74.148:8000/static/img/SyarifHidayatullahHospital_ChIJ5fzHvinwaS4RCc9xQwxf03o_first.png</td>
                            </tr>
                            <tr>
                                <th class = "col-md-3">Action</th>
                                <td class = "col-md-9">
                                <a href="/mapsadmin/index"><button type="button" class="btn btn-primary">Back</button></a>
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