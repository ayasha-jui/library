@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <br><br><br>
        <h3>Edit Book</h3>
        <br>
        {!!Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('author_name','Author Name')}}
                {{Form::text('author_name','',['class' => 'form-control', 'placeholder' => 'Auhor_Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('name','Category')}}
                {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'category'])}}
            </div>
            <div class="form-group">
                {{Form::label('publisher','Publisher')}}
                {{Form::text('publisher','',['class' => 'form-control', 'placeholder' => 'Publisher'])}}
            </div>
            <div class="form-group">
                {{Form::label('edition','Edition')}}
                {{Form::text('edition','',['class' => 'form-control', 'placeholder' => 'Edition'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}

        <div class="text-right">
            <a  href="/books" class="btn btn-info">Back</a>
        </div>
    </div>
@endsection