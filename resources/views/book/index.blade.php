@extends('layout/main')

@section('container')
<div class="containerdata">
<form method="post" action="/book" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group h3">
        <label for="book">Input Book Data</label>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="isbn" name="txtIsbn" placeholder="ISBN" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="title" name="txtTitle" placeholder="Title" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="author" name="txtAuthor" placeholder="Author" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="publisher" name="txtPublisher" placeholder="Publisher" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="description" name="txtDescription" placeholder="Description" required>
    </div>
    <div class="form-group">
            <select class="form-control " id="inputGroupSelect01" name="categoryId" required>
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

    @if (session('status'))
    <br><br>
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

<br><br>

<table id="myTable" class="display">
    <thead>
    <tr>
        <th>ISBN</th>
        <th>Cover</th>
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Description</th>
        <th>Category Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($book as $data) 
    <tr>
        <td>  {{$data->isbn}} </td>
        <td> <img class="img-tbl maximum" src="{{ asset('uploads/' . $data->cover) }}" /> </td>
        <td>  {{$data->title}} </td>
        <td>  {{$data->author}} </td>
        <td>  {{$data->publisher}} </td>
        <td>  {{$data->description}} </td>
        <td>  {{$data->name}} </td>
        <td><button><a href="/book/{{ $data->isbn }}/edit"><span class="glyphicon glyphicon-edit"></a></span></button>
            <form action="/book/{{ $data->isbn }}" method="post" class="d-inline">
                @method('delete')
                {{ csrf_field() }}
                <button><a style="color:red"><span class="glyphicon glyphicon-trash"></span></a></button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
