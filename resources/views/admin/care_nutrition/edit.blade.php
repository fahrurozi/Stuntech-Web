@extends('layouts.main')
@section('content')
<html>

<head>
    <title>Create Care Nutrition</title>

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
            <h1>Update Care Nutrition</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('care_nutrition.update', $article->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="article_cover_file" value="{{$article->article_cover_file}}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$article->title}}">
                    </div>
                    <div class="form-group">
                        <label for="article-content">Article Content</label>
                        <textarea name="article_content" rows="50" class="form-control"
                            id="article-content">{!! $article_content !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="article-content">Category</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="article_sub_type" value="breakfast"
                                id="flexRadioDefault1" {{($article->article_sub_type == "breakfast")?'checked':''}}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Breakfast
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="article_sub_type" value="lunch"
                                id="flexRadioDefault2" {{($article->article_sub_type == "lunch")?'checked':''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Lunch
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="article_sub_type" value="dinner"
                                id="flexRadioDefault2" {{($article->article_sub_type == "dinner")?'checked':''}}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Dinner
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="d-block">Tags</label>
                            <div class="form-check">
                                <input class="form-check-input" name="tags_list[]" value="protein" type="checkbox"
                                    id="article_tags1" {{in_array("protein", $article_tags)?'checked':''}}>
                                <label class="form-check-label" for="article_tags1">
                                    Protein
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="tags_list[]" value="karbohidrat" type="checkbox"
                                    id="article_tags2" {{in_array("karbohidrat", $article_tags)?'checked':''}}>
                                <label class="form-check-label" for="article_tags2">
                                    Karbohidrat
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="tags_list[]" value="lemak" type="checkbox"
                                    id="article_tags3" {{in_array("lemak", $article_tags)?'checked':''}}>
                                <label class="form-check-label" for="article_tags3">
                                    Lemak
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Cover</label>
                        <input type="file" class="form-control-file" id="cover" name="cover">
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="{{ route('care_nutrition') }}"><button type="button" class="btn btn-danger"><i
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