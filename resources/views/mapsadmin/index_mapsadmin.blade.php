@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Location</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Location</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="/mapsadmin/create" class="float-right btn btn-primary">New Location</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped"   class= "col-md-3">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Name</th>
                                <th>Gmaps</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>7.34325345</td>
                                <td>201.4324535</td>
                                <td>Rumah Sakit Panti Rapih</td>
                                <td>HbfeabbfuaeuabfJUASFI</td>
                                <td>    
                                    <div>
                                        <a href="/mapsadmin/details"><button type="button" class="btn btn-success"><i class="fas fa-eye"></i> </button></a>
                                        <a href="/mapsadmin/edit"><button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
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