{{-- @extends('layout.template')

@section('content')
<h1>Tambah Article</h1>
<div class="container">
    <form action="{{ route('article.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <label for="title">title</label>
        <input type="text" name="title">
        <br>
        <label for="title">summernote</label>
        <textarea id="summernote" name="editordata"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endsection --}}

@extends('layouts.main')
@section('content')
<html>

<head>
    <title>Create Article Form</title>

    <!-- Summernote -->
    <!-- include libraries(jQuery, bootstrap) -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <!-- include summernote css/js -->
</head>

<body>
    <section class="section">
        <div class="section-header">
            <h1>Create New Article</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-group">
                        <label for="article-content">Article Content</label>
                        <textarea name="article-content" class="form-control" id="article-content"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="article-items">Article Items</label>
                        <textarea name="article-items" class="summernote"></textarea>
                    </div> -->
                    <div class="form-group">
                        <label for="article-types">Article Types</label>
                        <input type="text" class="form-control" name="article-types">
                    </div>
                    <div class="form-group">
                        <label for="article-tags">Article Tags</label>
                        <input type="text" class="form-control" name="article-tags">
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="/article/index"><button type="button" class="btn btn-danger"><i
                                        class="fas fa-times"></i></button></a>
                            <a href="#"><button type="submit" class="btn btn-primary"><i
                                        class="fas fa-check"></i></button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- script -->

</body>

</html>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
            $('#article-content').summernote();
            });
</script>
@endsection