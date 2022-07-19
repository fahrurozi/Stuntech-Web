@extends('layouts.main2')
@section('content')
<html>

<head>
    <title>Edit Hello Stunting</title>

</head>

<body>
    <section class="section">
        <div class="section-header">
            <h1>Edit Hello Stunting</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('hello_stunting.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="article_cover_file" value="{{$article->article_cover_file}}">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" name="title" value="{{$article->title}}">
                    </div>
                    <div class="form-group">
                        <label for="article_tags">Position</label>
                        <input type="text" class="form-control" name="article_tags" value="{{$article->article_tags}}">
                    </div>
                    <div class="form-group">
                        <label for="article-content">Description</label>
                        <textarea name="article_content" rows="50" class="form-control" id="article-content">{!! $article_content !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Tempat Praktik</label>
                        <input type="text" class="form-control" name="article_sub_type" value="{{$article->article_sub_type}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Foto</label>
                        <input type="file" class="form-control-file" id="cover" name="cover">
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="{{ route('hello_stunting') }}"><button type="button" class="btn btn-danger"><i
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