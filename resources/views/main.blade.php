@extends('layouts.main')

@section('title')
    {{$title}}
@endsection

@section('nav')
    @include('menu.main', ['categories'=>$categories])
@endsection

@section('nav')
    @include('menu.main', ['categories'=>$categories])
@endsection

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-5">{{$greeting['title']}}</h1>
            <p>{{$greeting['content']}}</p>
            <p><a class="btn btn-primary btn-lg" href="{{route('news.news')}}" role="button">Читать »</a></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
        @forelse($news as $item)
            <!-- Example row of columns -->

                <div class="col-md-4 mb-3">
                    <h3>{{$item->title}}</h3>
                    <p>{{mb_substr($item->content, 0, 100)}} ...</p>
                    <p><a class="btn btn-secondary" href="{{route('news.newsOne', $item->id)}}" role="button">Читать
                            »</a></p>
                </div>


                <hr>
                @if($loop->iteration > 5)
                    @break
                @endif
            @empty
                <p>Нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection