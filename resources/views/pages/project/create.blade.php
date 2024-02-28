@extends('layouts.main-layout')
@section('head')
    <title>Projects</title>
@endsection
@section('content')
    <h1>NEW PROJECT</h1>
    <form method="POST" enctype="multipart/form-data" >

        @csrf
        @method("POST")

        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="type_id">Type</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type -> id }}">
                    {{ $type -> name }}
                </option>
            @endforeach
        </select>
        <br>
        @foreach ($technologies as $technology)
            <div>
                <input
                    type="checkbox"
                    name="technology_id[]"
                    value="{{ $technology -> id }}"
                    id="{{ 'technology-' . $technology -> id }}"
                >
                <label for="{{ 'technology-' . $technology -> id }}">
                    {{ $technology -> name }}
                </label>
            </div>
        @endforeach
        <br>
        <label for="image">IMAGE</label>
        <input type="file" name="image" id="image" accept="image">
        <br>
        <input type="submit" value="CREATE">
    </form>
@endsection