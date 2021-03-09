@extends('layout/main')

@section('container')
<div class="containerdata">
<form method="post" action="/category">
    {{ csrf_field() }}
    <div class="form-group h3">
        <label for="category">Input Category Name</label>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="txtName" placeholder="Name" required>
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
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($category as $data) 
    <tr>
        <td>  {{$data->id}} </td>
        <td>  {{$data->name}} </td>
        <td><button><a href="/category/{{ $data->id }}/edit"><span class="glyphicon glyphicon-edit"></span></a></button>
            <form action="/category/{{ $data->id }}" method="post" class="d-inline">
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
