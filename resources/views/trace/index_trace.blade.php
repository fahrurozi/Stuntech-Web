@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Trace</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Trace</h1>
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="/trace/create" class="float-right btn btn-primary">New Trace</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <!-- <table class="table table-striped"   class= "col-md-3">
                        <thead>
                            <tr>
                                <th>Week</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Age Day</th>
                                <th>Exclusive Asi</th>
                                <th>Disease History</th>
                                <th>Immunization History</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0</td>
                                <td>4</td>
                                <td>5</td>
                                <td>0</td>
                                <td>True</td>
                                <td>False</td>
                                <td>Covid|Campak</td>
                                <td>    
                                    <div>
                                        <a href="/mapsadmin/details"><button type="button" class="btn btn-success"><i class="fas fa-eye"></i></button></a>
                                        <a href="/mapsadmin/edit"><button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
                                        <a href="#"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                    </div>
                    <div class="row" >
                        <div class="col-12 col-md-6 col-lg-3" >
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                                        <div class="dropdown-menu">
                                            <a href="/trace/details" class="dropdown-item has-icon"><i class="fas fa-eye"></i> Details</a>
                                            <a href="/trace/edit" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>   
                                </div>
                                <div class="card-body">
                                    <h6 style="color: #6777ef"><center>Week 0</center></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
@endsection