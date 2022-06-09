@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Edit Trace Form</title>
    </head>
<body>
    <section class="section">
        <div class="section-header">
            <h1>Edit Trace</h1>
        </div> 
        <div class="card">
            <div class="card-body">
                <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="week">Week</label>
                            <input type="number" class="form-control" id="week" placeholder="0, 1, 2, etc." value="#">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="height">Height</label>
                            <input type="number" class="form-control" id="height" placeholder="1, 2, 3, etc." value="#">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" id="weight" placeholder="1, 2, 3, etc." value="#">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ageday">Age Day</label>
                            <input type="number" class="form-control" id="ageday" placeholder="1, 2, 3, etc." value="#">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exclusiveasi">Exclusive Asi</label>
                            <!-- <input type="dropdown" class="form-control" id="inputPassword4" placeholder="Password"> -->
                            <select class="custom-select" id="exclusiveasi" value="#">
                                <option selected>Choose</option>
                                <option value="1">False</option>
                                <option value="2">True</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="diseasehistory">Disease History</label>
                            <!-- <input type="dropdown" class="form-control" id="inputPassword4" placeholder="Password"> -->
                            <select class="custom-select" id="diseasehistory" value="#">
                                <option selected>Choose</option>
                                <option value="1">False</option>
                                <option value="2">True</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Immunization History</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="imunizationhistory1" value="#">
                            <label class="form-check-label" for="imunizationhistory1">
                            Covid
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="imunizationhistory2" value="#">
                            <label class="form-check-label" for="imunizationhistory2">
                            Campak
                            </label>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="/trace/index" class="btn btn-danger"><i class="fas fa-times"></i></a>
                        <a href="#"><button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button></a>  
                    </div>
                </form> 
            </div>
        </div>    
    </div>
</body>
</html>
@endsection
