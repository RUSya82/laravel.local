@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('nav')
    @include('menu.main', ['categories'=>$categories])
@endsection

@section('content')

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-5">Привет, Admin! </h1>

            </div>
        </div>
        <div class="content-custom">

        </div>

@endsection
