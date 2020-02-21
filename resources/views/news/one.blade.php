@extends('layouts.main')

@section('title')
    {{$news['title']}}
@endsection
@section('content')
    <main role="main">
        <!-- Main jumbotron for a primary marketing message or call to action -->

        <div class="jumbotron">
            <div class="container">
                <h1 class="display-5">{{$news['title']}}</h1>
                <p>{{$news['content']}}</p>

            </div>
        </div>


        <div class="container">
            <div class="row">
            @forelse($newsAll as $item)
                <!-- Example row of columns -->

                    <div class="col-md-4 mb-3">
                        <h3>{{$item['title']}}</h3>
                        <p>{{mb_substr($item['content'], 0, 100)}} ...</p>
                        <p><a class="btn btn-secondary" href="{{route('news.newsOne', $item['id'])}}" role="button">Читать »</a></p>
                    </div>


                    <hr>
                @empty
                    <p>Нет новостей</p>
                @endforelse
            </div>
        </div>
    </main>
@endsection
