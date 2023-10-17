@extends('layouts.plantilla')

@section('title', 'Course ' . $course)

@section('content')
    <h1>Welcome to Course: {{$course}}</h1>
@endsection
