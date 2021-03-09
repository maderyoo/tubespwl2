@extends('layout/main')

@section('container')
<div class="containerdata">
<form method="post" action="/category/{{ $category->id }}">
    @method('patch')
    {{ csrf_field() }}
    <div class="form-group h3">
        <label for="category">Edit Category Name</label>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="txtName" placeholder="Name" value="{{ $category->name }}" required>
    </div>
    <input type="submit" name="btnSubmit" class="btn btn-default">
</form>
@endsection