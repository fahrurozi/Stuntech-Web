@extends('layouts.main2')
@section('content')
<html>

<head>
    <title>Create Question</title>

</head>

<body>
    <section class="section">
        <div class="section-header">
            <h1>Create Question Level {{$level}}</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('fun_stunting.store', $level) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Level</label>
                        <input type="text" class="form-control" name="level" disabled value="{{$level}}">
                    </div>
                    <div class="form-group">
                        <label for="article-content">Pertanyaan</label>
                        <textarea name="question_content" rows="20" class="form-control"
                            id="question-content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="answer_content">List Jawaban</label>
                        <input type="text" class="form-control" name="answer_content[]" placeholder="Jawaban 1"
                            required>
                        <input type="text" class="form-control" name="answer_content[]" placeholder="Jawaban 2"
                            required>
                        <input type="text" class="form-control" name="answer_content[]" placeholder="Jawaban 3"
                            required>
                        <input type="text" class="form-control" name="answer_content[]" placeholder="Jawaban 4"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="correct_answer">Jawaban Benar</label>
                        <select class="form-control" name="correct_answer" style="height: auto" required>
                            <option disabled selected>- Pilih Kunci Jawaban -</option>
                            <option value="0">Jawaban 1</option>
                            <option value="1">Jawaban 2</option>
                            <option value="2">Jawaban 3</option>
                            <option value="3">Jawaban 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="{{ route('fun_stunting.list', $level) }}"><button type="button" class="btn btn-danger"><i
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
        
            $('#question-content').summernote({
                height: 100,
                dialogsInBody: true
            });
            });
</script>
@endsection