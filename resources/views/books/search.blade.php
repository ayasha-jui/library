<?php
    use App\Accessno;
?>
@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

@section('content')
    <div class="jumbotron img-fluid">
        <div class="container">
            <br><br>
            <h2 class="display-3"><p>{{$books->count()}} result(s) found</p></h2>
            <br><br>
        </div>
    </div>
    <div class="container">
        <form action="/searchBook" method="GET">
            <div class="input-group">
                <input type="search" name="search" value="{{$search}}" class="form-control" placeholder="search book">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </span>
            </div>
        </form>
    </div>
    <br><br>
    @if(count($books) > 0)
        <table class="table table-bordered table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author Name</th>
                <th scope="col">Category</th>
                <th scope="col">Edition</th>
                <th scope="col">Publisher</th>
                <th scope="col">+</th>
            </tr>
            </thead>
            <tbody>
                @foreach($books as $key => $book)
                <?php
                    $accessCount = Accessno::accesscount($book->id);
                ?>
                    <tr>
                        <th scope="row">{{$books->firstItem() + $key}}</th>
                        <td><a href="/books/{{$book->id}}">{{$book->title}}({{ $accessCount }})</a></td>
                        <td>{{$book->author_name}}</td>
                        <td>{{$book->category->name}}</td>
                        <td>{{$book->edition}}</td>
                        <td>{{$book->publisher}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/books/{{$book->id}}/edit" role="button"><i class="fas fa-edit"></i></a>
                            {!!Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST', 'class'=>'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::button('<i class="fas fa-trash-alt"></i>',['type'=>'submit', 'class'=>'btn btn-danger btn-sm'])}}
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
            <div class="float-right">
                {{$books->links()}}
            </div>
        @else
            <div class="container">
                <h2>No Book To Show</h2>
            </div>
    @endif
    
@endsection