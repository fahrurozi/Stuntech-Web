@extends('layouts.main')
@section('content')
<html>
    <head>
        <title>Fun Stunting</title>
    </head>
    <body>
    <section class="section">
        <div class="section-header">
            <h1>Fun Stunting Level {{$level}}</h1>            
        </div> 
        <div class="section-table">
            <div class="card">
                <div class="card-header">
                    <a href="{{ (count($questions)<2?route('fun_stunting.create', $level):"") }}" class="float-right btn btn-primary" aria-disabled="{{(count($questions)>=3)?"true":"false"}}">New Question</a>
                </div>
                <div class="card-body">    
                    <div class="table-responsive">
                    <table class="table table-striped"   class= "col-md-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pertanyaan</th>
                                <th>List Jawaban</th>
                                <th>Kunci Jawaban</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($questions as $question)
                            <tr>
                                <?php $list_jawaban = json_decode($question->answers_content, true)['choices']; ?>
                                <td>{{$no}}.</td>
                                <td>Pertanyaan {{$no}} </td>
                                <td><a class="btn btn-success" href="" role="button">Lihat Pertanyaan</a></td>
                                <td>
                                    <ul>
                                        @foreach($list_jawaban as $key => $value)
                                        <li>{{$value}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{$list_jawaban[$question->correct_answer]}}</td>
                                <td>
                                    <a class="btn btn-success" href="" role="button">Detail Level</a>
                                    <a href="{{ route('fun_stunting.destroy', $question->id) }}"><button type="button" class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')"><i class="far fa-trash-alt"></i></button></a>
                                </td>
                            </tr>
                            <?php $no++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </body>
</html>
@endsection