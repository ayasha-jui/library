@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <br><br><br>
        <h3>Issue A New Book</h3>
        <br>
        {!!Form::open(['action' => 'IssueteachersController@store', 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('name','Teacher\'s Name')}}
                {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'name'])}}
            </div>
            <div class="form-group">
                {{Form::label('access_no','Access No')}}
                {{Form::text('access_no','',['class' => 'form-control', 'placeholder' => 'access no'])}}
            </div> 
            {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}

        <div class="text-right">
            <a  href="/issueteachers" class="btn btn-info">Back</a>
        </div>
    </div>
@endsection