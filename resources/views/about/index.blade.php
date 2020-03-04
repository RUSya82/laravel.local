@extends('layouts.main')

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
            <h1 class="display-5">Мы один из лучших агрегаторов новостей</h1>
            <p>У нас Вы можете всегда найти свежие и актуальные новости!</p>
            <p><a class="btn btn-primary btn-lg" href="{{route('news.news')}}" role="button">Читать »</a></p>
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

    <div class="container mt-5 justify-content-center">
        <div class="row justify-content-center">
            <form action="{{route('about.addfeedback')}}" class="form-group col-5 mb-5" method="post">
                @csrf
                <h4>Оставьте свой отзыв</h4>
                <div class="form-group ">
                    <label for="username">Ваше имя</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>
                <div class="form-group ">
                    <label for="useremail">e-mail</label>
                    <input class="form-control" type="email" id="useremail" name="useremail" required>
                </div>

                <div class="form-group ">
                    <label for="feedbackText">Текст отзыва</label>
                    <textarea type="text" name="feedbackText" class="form-control" id="feedbackText" rows='5' required>
                    </textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Добавить отзыв" id="addNews">
                </div>
            </form>
        </div>

    </div>
@endsection