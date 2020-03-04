@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('nav')
    @include('menu.admin', ['categories'=>$categories])
@endsection

@section('content')

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-5">Привет, Admin! </h1>

            </div>
        </div>
        @if (session('success'))
            <div class="container">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
            @forelse($news as $item)
                <!-- Example row of columns -->

                    <div class="col-md-4 mb-3 mt-5">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ mb_substr($item->content, 0, 100) }} ...</p>
                        <p>
                            <a class="btn btn-secondary" href="{{route('news.newsOne', $item)}}" role="button">Читать
                                »
                            </a>
                            <a href="{{ route('admin.editNews', $item) }}"><button type="button" class="btn btn-success">Изменить</button></a>
                            <a href="{{ route('admin.deleteNews', $item) }}"><button type="button" class="btn btn-danger">Удалить</button></a>
                        </p>
                    </div>


                    <hr>
                @empty
                    <p>Нет новостей</p>
                @endforelse
                {{ $news->links() }}
            </div>
        </div>

@endsection
