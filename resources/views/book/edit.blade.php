@extends('layout/main')

@section('container')
<div class="containerdata">
<form method="post" action="/book/{{ $book->isbn }}" enctype="multipart/form-data">
    @method('patch')
    {{ csrf_field() }}
    <div class="form-group h3">
        <label for="book">Edit Book Data</label>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="isbn" name="txtIsbn" placeholder="ISBN" value="{{ $book->isbn }}" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="title" name="txtTitle" placeholder="Title" value="{{ $book->title }}" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="author" name="txtAuthor" placeholder="Author" value="{{ $book->author }}" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="publisher" name="txtPublisher" placeholder="Publisher" value="{{ $book->publisher }}" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="description" name="txtDescription" placeholder="Description" value="{{ $book->description }}" required>
    </div>
    <div class="form-group">
            <select class="form-control " id="inputGroupSelect01" name="categoryId"  required>
                <option value="">Choose Category...</option>
                @foreach ($category as $data)
                    <option value="{{$data->id}}">{{$data->id}} - {{$data->name}}</option>
                @endforeach
            </select>
        </div>
    <div class="form-group">
            <label for="exampleFormControlFile1">Input Doc Photo</label>
            <input type="file" name="cover" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <input type="submit" name="btnSubmit" class="btn btn-default">
</form>
@endsection
