<?php
// dd($articles);
?>
<h1>Article</h1>
<table border="1">
    <thead>
    <td>title</td>
    <td>content</td>
    </thead>
    @foreach($articles as $article)
    <tr>
        <td>{{ $article->title }}</td>
        <td>{!! $article->article_file_content !!}</td>
    </tr>
    @endforeach
</table>