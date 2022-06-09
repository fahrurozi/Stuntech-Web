@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Create Trace Form</title>

        <!-- Summernote -->
        <!-- include libraries(jQuery, bootstrap) -->
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

        <!-- include summernote css/js -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Create New Trace</h1>
        </div> 
        <div class="card">
            <div class="card-body">
            <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="week">Week</label>
                            <input type="number" class="form-control" id="week" placeholder="0, 1, 2, etc.">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="height">Height</label>
                            <input type="number" class="form-control" id="height" placeholder="1, 2, 3, etc.">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" id="weight" placeholder="1, 2, 3, etc.">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ageday">Age Day</label>
                            <input type="number" class="form-control" id="ageday" placeholder="1, 2, 3, etc.">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exclusiveasi">Exclusive Asi</label>
                            <!-- <input type="dropdown" class="form-control" id="inputPassword4" placeholder="Password"> -->
                            <select class="custom-select" id="exclusiveasi">
                                <option selected>Choose</option>
                                <option value="1">False</option>
                                <option value="2">True</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="diseasehistory">Disease History</label>
                            <!-- <input type="dropdown" class="form-control" id="inputPassword4" placeholder="Password"> -->
                            <select class="custom-select" id="diseasehistory">
                                <option selected>Choose</option>
                                <option value="1">False</option>
                                <option value="2">True</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Immunization History</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="imunizationhistory1">
                            <label class="form-check-label" for="imunizationhistory1">
                            Covid
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="imunizationhistory2">
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
    </section>
    </body>
</html>
@endsection




