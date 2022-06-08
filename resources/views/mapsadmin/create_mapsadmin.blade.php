@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Create New Location Form</title>

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
            <h1>Create New Location</h1>
        </div> 
        <div class="card">
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="number" class="form-control" name="latitude">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="mumber" class="form-control" name="longitude">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="gmaps">Gmaps</label>
                        <input type="text" class="form-control" name="gmaps">
                    </div>
                    <div class="form-group">
                        <label for="image-url">Image URL</label>
                        <input type="text" class="form-control" name="image-url">
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="/mapsadmin/index"><button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button></a>
                            <a href="#"><button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button></a>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </section>
        <!-- script -->
        <!-- <script type="text/javascript">
            $(document).ready(function() {
            $('.summernote').summernote();
            });
        </script> -->
    </body>
</html>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#task-textarea'))
        .catch (error => {
            console.error(error);
        });
</script>
@endsection



