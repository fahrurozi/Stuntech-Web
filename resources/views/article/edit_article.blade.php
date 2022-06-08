@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Edit Article Form</title>
    </head>
<body>
    <section class="section">
        <div class="section-header">
            <h1>Edit Article</h1>
        </div> 
        <div class="card">
            <div class="card-body">
                <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">Title
                        <input type="text" name="title" class="form-control" value="#">
                    </div>
                    <div class="mb-3">Date 
                        <input type="date" name="date" class="form-control" value="#">
                    </div>
                    <div class="mb-3">Article Content 
                        <textarea type="textarea" name="article-content" class="form-control" value="#" id="task-textarea"></textarea>
                    </div>
                    <div class="mb-3">Article Types 
                        <input type="text" name="article-types" class="form-control" value="#">
                    </div>
                    <div class="mb-3">Article Tags 
                        <input type="text" name="article-tags" class="form-control" value="#">
                    </div>
                    <div class="float-right">
                        <a href="/article/index" class="btn btn-danger"><i class="fas fa-times"></i></a>
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