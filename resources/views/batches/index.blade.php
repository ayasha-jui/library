<?php 
    use App\Student;
?>
@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
@endsection

@section('content')
    <div class="jumbotron img-fluid">
        <div class="container"><br>
            <h2 class="display-3"><em>Students</em></h2>
            <br><br>
            <!-- Button trigger modal -->
            <button type="button"   class="btn btn-dark" data-toggle="modal" data-target="#modalCenter">
               +Add Batch
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Add New Batch</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{action('BatchesController@store')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Batch No</label>
                                    <input type="text" name="title" class="form-control" placeholder="Batch" aria-describedby="batchHelp">
                                </div>
                                <div class="form-group">
                                    <label>Program Name</label>
                                    <input type="text" name="program" class="form-control" placeholder="Program" aria-describedby="progHelp">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @include('include.message')
        @if(count($batches) > 0)
            @foreach ($batches as $batch)
            <?php
                $studCount = Student::studcount($batch->id);
            ?>
                <div class="card">
                    <div class="card-body">
                        <a href="/batches/{{$batch->id}}"><h4>Batch'{{$batch->title}}({{$studCount}})</h4></a>
                        <p>Program:{{$batch->program}}</p>
                        created at {{$batch->created_at}} & updated at {{$batch->updated_at}}
                        <div class="container">
                            <div class="btn-group float-right">
                                <a class="btn btn-primary btn-sm" href="/batches/{{$batch->id}}/edit" role="button"><i class="fas fa-edit"></i></a>
                                {!!Form::open(['action' => ['BatchesController@destroy', $batch->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::button('<i class="fas fa-trash-alt"></i>',['type'=>'submit', 'class'=>'btn btn-danger btn-sm'])}}
                                {!!Form::close()!!}
                            </div>
                        </div>          
                    </div>
                </div>
            @endforeach
            <br>
            <div class="float-right">
                {{$batches->links()}}
            </div>
            @else
                <h3>No Batch To Show</h3>
        @endif
    </div>
@endsection