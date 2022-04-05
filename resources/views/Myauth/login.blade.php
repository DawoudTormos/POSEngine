
{{-- the layout--}}
@extends('layouts.layout')

@section('content')
{{--Checking the method at the beginning of the page --}}
@include('tools.check_method')


{{--Checking idf session exist --}}
@include('Myauth.check_session')

{{--CSS and html of the login --}}
@include('auth/login')


{{-- server sql backend with php --}}
@include('Myauth.check_login')


@endsection