@extends('layout')

@section('title', 'Login')

@include('include.header')
@section('content')
    <div>
{{ auth()->user() }}




    </div>
@endsection
