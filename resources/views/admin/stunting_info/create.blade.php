@extends('layouts.main2')
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
            <h1>Create New Stunting Info</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('stunting_info.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="article-content">Article Content</label>
                        <textarea name="article_content" rows="50" class="form-control" id="article-content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Cover</label>
                        <input type="file" class="form-control-file" id="cover" name="cover">
                      </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="{{ route('stunting_info') }}"><button type="button" class="btn btn-danger"><i
                                        class="fas fa-times"></i></button></a>
                            <a href="#"><button type="submit" class="btn btn-primary"><i
                                        class="fas fa-check"></i></button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


</body>

</html>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        
            $('#article-content').summernote({
                height: 400,
                dialogsInBody: true
            });
            });
</script>
@endsection