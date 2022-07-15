@extends('layouts.main2')
@section('content')
<html>

<head>
    <title>Create Food Help</title>

</head>

<body>
    <section class="section">
        <div class="section-header">
            <h1>Create New Food Help</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('food_help.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="article_cover_file" value="{{$article->article_cover_file}}">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" name="title" value="{{$article->title}}">
                    </div>
                    <div class="form-group">
                        <label for="article-content">Description</label>
                        <textarea name="article_content" rows="50" class="form-control" id="article-content">{!! $article_content !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Alamat</label>
                        <input type="text" class="form-control" name="article_sub_type" value="{{$article->article_sub_type}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Cover</label>
                        <input type="file" class="form-control-file" id="cover" name="cover">
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="{{ route('food_help') }}"><button type="button" class="btn btn-danger"><i
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