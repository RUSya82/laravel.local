@extends('layouts.main')

@section('title')
    {{$title}}
@endsection
@section('nav')
    @include('menu.main', ['categories'=>$categories])
@endsection
@section('content')


        <div class="container">
            <div class="row">
            @forelse($news as $item)
                <!-- Example row of columns -->

                    <div class="col-md-4 mb-3 mt-5">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ mb_substr($item->content, 0, 100) }} ...</p>
                        <p><a class="btn btn-secondary" href="{{route('news.newsOne', $item)}}" role="button">Читать
                                »</a></p>
                    </div>


                    <hr>
                @empty
                    <p>Нет новостей</p>
                @endforelse
                {{ $news->links() }}
            </div>
        </div>

@endsection
