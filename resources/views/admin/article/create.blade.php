@extends('layout.template')

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
@endsection