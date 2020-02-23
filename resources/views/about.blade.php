@extends('layouts.main')

@section('title')
    {{$title}}
@endsection

@section('content')
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-5">Мы один из лучших агрегаторов новостей</h1>
                <p>У нас Вы можете всегда найти свежие и актуальные новости!</p>
                <p><a class="btn btn-primary btn-lg" href="{{route('news.news')}}" role="button">Читать »</a></p>
            </div>
        </div>

@endsection