


@extends('layouts.main-layout')
@section('head')
    <title>Projects</title>
@endsection
@section('content')
    <h1>Types</h1>
    <ul>
        @foreach ($types as $type)
            <li>
                {{ $type -> name }}:
                
                <br>
                <ul>
                    @foreach ($type -> projects as $project)
                        <li>
                            {{ $project -> name }}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection