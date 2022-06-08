@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Edit Location Form</title>
    </head>
<body>
    <section class="section">
        <div class="section-header">
            <h1>Edit Location</h1>
        </div> 
        <div class="card">
            <div class="card-body">
                <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">Latitude
                        <input type="number" name="latitude" class="form-control" value="#">
                    </div>
                    <div class="mb-3">Longitude
                        <input type="number" name="longitude" class="form-control" value="#">
                    </div>
                    <div class="mb-3">Name
                        <input type="text" name="name" class="form-control" value="#">
                    </div>
                    <div class="mb-3">Gmaps
                        <input type="text" name="gmaps" class="form-control" value="#">
                    </div>
                    <div class="mb-3">Image URL
                        <input type="text" name="image-url" class="form-control" value="#">
                    </div>
                    <div class="float-right">
                        <a href="/mapsadmin/index" class="btn btn-danger"><i class="fas fa-times"></i></a>
                        <a href=""><button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button></a>  
                    </div>
                </form>
            </div>
        </div>    
    </div>
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