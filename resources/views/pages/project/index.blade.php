@extends('layouts.main-layout')
@section('head')
    <title>Projects</title>
@endsection
@section('content')
    <h1>Projects</h1>
    <a style="font-size: 50px;" href="{{ route('project.create') }}">CREATE</a>
    <br>
    <br>
    <ul style="list-style-type: none;">
        @foreach ($projects as $project)
        <br>
            <li>
                {{ $project -> name }} :
                {{ $project -> type -> name }}
                <br>
                <a href="{{ route('project.edit', $project -> id) }}">EDIT ME</a>
                <br>
                Technologies:
                <ul>
                    @foreach ($project -> technologies as $technology)
                        <li>
                            {{ $technology -> name }}
                        </li>
                    @endforeach
                </ul>
                @if ($project -> image)
                <img src="{{ asset('/storage/' . $project -> image) }}" width="100px">
                @endif 
            </li>
            <br>
        @endforeach
    </ul>
@endsection